<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use App\NewsReports;
use App\NewsImages; 
use App\SimilarNews;
use App\CustomNewsReportModel;
use App\CustomSimilarNewsModel;
use App\CustomNewsAuthorModel;
use Carbon\Carbon;

class NewsReportController extends Controller
{
    private $port = 8000;
    private $bgColorCode = ['0xfff5f7d6', '0xfff6d6f7', '0xffe9e9e9', '0xffedcdf5', '0xfff5cdd4', '0xffd3cdf5', '0xffcdeaf5'];
    
    //
    public function create_news(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'author_id' => 'bail|required|numeric|gt:0',
            'news_title' => 'bail|required|max:255',
            'news_body' => 'bail|required',
            'news_category_id' => 'bail|required|gt:0',
            'news_caption_images' => 'bail|required'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'results' => null,
                'errors' => $validator->getMessageBag()->toArray(),
                'message' => null,
            ]);
        }

        return $this->_create_news($request);
    }


    private function _create_news(Request $request)
    {

        $newsReport = new NewsReports();
        $newsReport->news_title = $request->news_title;
        $newsReport->news_body = $request->news_body;
        $newsReport->news_category_id = $request->news_category_id;
        $newsReport->author_id = $request->author_id;

        try {
            
            if ($newsReport->save()) {

                $news_report_id = $newsReport->id;

                if ($request->hasFile('news_caption_images')) {

                    $uploaded_images = $request->file('news_caption_images');
                    foreach ($uploaded_images as $key => $image) {

                        $newsImage = new NewsImages();
                        $newsImage->news_report_id = $news_report_id;
                        $newsImage->path = Storage::putFile('public/news_image_caption', $image);
                        $newsImage->save();

                    }
                }

                $indexing = $this->_newsReportIndexing($request->news_title);
                $indexing .= $this->_newsReportIndexing($request->news_body);

                $similarNews = new SimilarNews();
                $similarNews->news_report_id = $news_report_id;
                $similarNews->indexes = $indexing;
                $similarNews->save();

                return response()->json([
                    'status' => true,
                    'results' => [],
                    'errors' => null,
                    'message' => 'We have received your news and it\'s subjected to review by our team.\n 
                         Once approved you will be rewarded accordingly.\n
                         Thanks for taking out time to report the awesome news.',
                ]);
            }

        } catch (QueryException $qe) {
            return response()->json([
                'status' => false,
                'results' => null,
                'errors' => 'Sorry, our database is upgrading.',
                'message' => 'Sorry, our database is upgrading.',
            ]);
        }
    }


    public function most_recently_featured()
    {
        $newsReports = NewsReports::distinct('news_category_id')->orderBy('created_at', 'desc')->get();

        if ($newsReports) {
            $temp = 0;
            $mostRecentRecords = [];
            $bgColorCodeIter = 0;
            foreach ($newsReports as $key => $newsReport) { 
                // filter the recent uploaded news.
                if ($temp == $newsReport->news_category_id) continue;
                // we take only the filtered useful resultset we want.
                // we should first index the news_title column and search for the similarity in our database.
                $indexes = $this->_newsReportIndexing($newsReport->news_title);
                // let's separate each token by exploding to search for each indexed charater.
                $explodedIndexes = explode(' ', $indexes);
                // now let's search each token in the DB of indexed data.
                $indexedDomainIds = $this->get_news_within_domain_search($explodedIndexes);
                // dd($indexedDomainIds);
                // let's search for the real news record since we now have the similar record from our indexed search.
                $similarNewsRecord = $this->get_similar_news($indexedDomainIds, $newsReport->id);

                $imagePath = '';
                
                // check if news image length is more than 1 
                if (count($newsReport->newsImageRecords) > 1) {
                    $imagePath = [];
                    foreach ($newsReport->newsImageRecords as $key => $newImageRecord) {
                        array_push($imagePath, config('app.url') . ':' . $this->port . Storage::url($newImageRecord->path));
                    }
                } else {
                    $imagePath = config('app.url') . ':' . $this->port . Storage::url($newsReport->newsImageRecords[0]->path);
                }

                // we want to get the author of this news and format the eloquent data-structure details based on our custom model
                $newsAuthorDets = $newsReport->newsAuthorRecords;
                $newsAuthor = new CustomNewsAuthorModel(
                    $newsAuthorDets->id,
                    $newsAuthorDets->lastname .' '. $newsAuthorDets->firstname,
                    config('app.url') . ':' . $this->port . Storage::url($newsAuthorDets->avatar),
                    $newsAuthorDets->intro
                );

                // we want to format our resultset to comply with the model we have from the mobile app.
                // hence we have created a custom model class for that.
                $newsReportsModel = new CustomNewsReportModel(
                    $newsReport->id,
                    $newsReport->newsCategoryRecords->category,
                    $newsReport->news_title,
                    $newsReport->news_body,
                    date('d/m/Y', strtotime($newsReport->created_at)),
                    // Carbon::humans($newsReport->created_at),
                    $imagePath,
                    $this->bgColorCode[$bgColorCodeIter%count($this->bgColorCode)],
                    $similarNewsRecord,
                    50,
                    1000,
                    $newsAuthor
                ); 
                
                array_push($mostRecentRecords, $newsReportsModel);
                $temp = $newsReport->news_category_id;
                $bgColorCodeIter++;
            }
        }

        return response()
            ->json([
                'status' => true, 
                'results' => $mostRecentRecords, 
                'errors' => null, 
                'message' => 'Successfully accessed [most_recently_featured] API endpoint.']);
    }


    public function get_all_news_by_category()
    {
        return response()
            ->json([
                'status' => true, 
                'results' => null, 
                'errors' => null, 
                'message' => 'Successfully accessed [get_all_news_by_category] API endpoint.']);
    }

    /**
     * Search for similar news based on tokenized metaphones.
     * @param array $explodedIndexes
     * @return array [array of new_report_id]
     */
    private function get_news_within_domain_search($explodedIndexes = [])
    {
        $domainSearchResult = SimilarNews::where(function($query) use ($explodedIndexes) {
            foreach ($explodedIndexes as $key => $explodedIndex) {
                $query->where('indexes', 'like', '%'.$explodedIndex.'%') ;   
            }
        })->get()->toArray();

        return array_column($domainSearchResult, 'news_report_id');
    }


    /**
     * Get the real news records based the similar news ids found earlier.
     * @param array $domainIds
     * @param int $exclude_id
     * @return array [array of NewsReports eloquent]
     */
    private function get_similar_news($domainIds = [], $exclude_id = 0)
    {
        if ( count($domainIds) ) {

            if (in_array($exclude_id, $domainIds)) array_splice($domainIds, array_search($exclude_id, $domainIds));

            $similarNewsRecord = count($domainIds) ? NewsReports::whereIn('id', $domainIds)->get() : [];

            $similarNews = [];

            // we convert the eloquent data structure to our custom similar model
            if (count($similarNewsRecord)) {
                foreach ($similarNewsRecord as $key => $similarNewsRec) {
                    array_push($similarNews, new CustomSimilarNewsModel(
                        $similarNewsRec->id,
                        $similarNewsRec->news_body,
                        config('app.url') . ':' . $this->port . Storage::url($similarNewsRec->newsImageRecords[0]->path),
                        date('d/m/Y', strtotime($similarNewsRec->created_at)) .' - Popularly read',
                        $similarNewsRec->newsAuthorRecords->lastname . ' ' . $similarNewsRec->newsAuthorRecords->firstname
                    ));
                }
            }

            return $similarNews;
        }
        
        return [];
    }


    private function _newsReportIndexing($sentences)
    {
        $indexes = '';
        $tokenized = explode(' ', $sentences);
        foreach ($tokenized as $key => $token) {
            $indexes .= metaphone($token) .' '; 
        }
        return $indexes;
    }
}
