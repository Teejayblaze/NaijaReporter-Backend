<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use App\NewsAuthor;
use App\NewsAuthorBankDetails;
use App\NewsAuthorType;

class NewsAuthorController extends Controller
{
    //


    public function create_news_author(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'bail|required',
            'lastname' => 'bail|required',
            'phone' => 'bail|required|unique:news_authors',
            'gender' => 'bail|required',
            'dob' => 'bail|required|date',
            'email' => 'bail|required|email|unique:news_author_types',
            'password' => 'bail|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'results' => null,
                'errors' => $validator->getMessageBag()->toArray(),
                'message' => null,
            ]);
        }

        return $this->_create_news_author($request);
    }

    private function _create_news_author(Request $request)
    {
        $imagePath = "";
        if ($request->hasFile('avatar')) {
            $imagePath = Storage::putFile('public/author_avatar', $request->file('avatar'));
        }

        $newsAuthor = new NewsAuthor();
        $newsAuthorBank = new NewsAuthorBankDetails();
        $newsAuthorType = new NewsAuthorType();


        $newsAuthor->firstname = $request->firstname;
        $newsAuthor->lastname = $request->lastname;
        $newsAuthor->phone = $request->phone;
        $newsAuthor->gender = $request->gender;
        $newsAuthor->dob = $request->dob;
        $newsAuthor->avatar = $imagePath;

        try {
            
            if ($newsAuthor->save()) {
                
                $author_id = $newsAuthor->id;

                $newsAuthorType->author_id = $author_id;
                $newsAuthorType->email = $request->email;
                $newsAuthorType->password = \bcrypt($request->password);
                // $newsAuthorType->token = JWT.encode($token) TODO: ensure to implement JWT for revalidating token authentication.
                $newsAuthorType->is_news_author = $request->is_news_author;

                $newsAuthorType->save(); // Save to DB.


                if ($request->is_news_author) {

                    $newsAuthorBank->account_holder_fullname = $request->account_holder_name;
                    $newsAuthorBank->account_number = $request->account_number;
                    $newsAuthorBank->bank_name = $request->bank_name;
                    $newsAuthorBank->author_id = $author_id;
                    $newsAuthorBank->save(); // Save to DB.

                    return response()->json([
                        'status' => true,
                        'results' => [],
                        'errors' => null,
                        'message' => 'We have save all information successfuly.'
                    ]); 
                }

                return response()->json([
                    'status' => true,
                    'results' => [],
                    'errors' => null,
                    'message' => 'We have save all information successfuly.'
                ]); 
                // davis123@123, test password.
            }

        } catch (QueryException $qe) {
            return response()->json([
                'status' => false,
                'results' => null,
                'errors' => 'Sorry, our database is upgrading.',
                'message' => 'Sorry, our database is upgrading.'
            ]);
        } 
    }
}
