<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\NewsCategory;

class NewsCategoryController extends Controller
{
    //

    public function get_news_categories()
    {
        return response()
            ->json([
                'status' => true, 
                'results' => $this->_get_news_categories(), 
                'errors' => null, 
                'message' => 'Successfully accessed [news_categories] API endpoint.']);
    }

    private function _get_news_categories()
    {
        return NewsCategory::all();
    }


    public function create_news_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'bail|required',
            'icon' => 'bail|regex:/^(0x)[a-z0-9]{4}$/|required', //validate that hexadecimal values only should be specified.
            'font_family' => 'bail|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'results' => null,
                'errors' => $validator->getMessageBag()->toArray(),
                'message' => null,
            ]);
        }

        return $this->_create_news_category($request);        
    }

    private function _create_news_category(Request $request)
    {
        
        $newsCategory = new NewsCategory();
        $newsCategory->category = $request->category;
        $newsCategory->icon = $request->icon;
        $newsCategory->font_family = $request->font_family;

        try {
           
            if ($newsCategory->save()) {
                
                return response()->json([
                    'status' => true,
                    'results' => $newsCategory,
                    'errors' => null,
                    'message' => 'Category created succefully.',
                ]);
            }

        } catch (QueryException $qe) {

            return response()->json([
                'status' => false,
                'results' => null,
                'errors' => 'Sorry, our database is currently upgrading.',
                'message' => 'Sorry, our database is currently upgrading.',
            ]);
        }
    }
}
