<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function (){

    // EndPoint for News Publishing and Retrieval.
    Route::get('/news/recent/featured', 'NewsReportController@most_recently_featured');
    Route::get('/news/all/news/category', 'NewsReportController@get_all_news_by_category');
    Route::post('/news/create', 'NewsReportController@create_news');



    // EndPoint for creating and retrieving Category of news.
    Route::get('/news/category', 'NewsCategoryController@get_news_categories');
    Route::post('/news/category', 'NewsCategoryController@create_news_category');
    

    // EndPoint for Author registration.
    Route::post('/news/author', 'NewsAuthorController@create_news_author');


    // 

});
