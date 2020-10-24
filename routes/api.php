<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'v1/', 'namespace' => 'Sanjok\Blog\Api'], function () {
        Route::resource('posts', 'PostApiController');
        Route::group(['prefix' => 'posts'], function () {

            // Route::post('{post_id}', 'PostApiController@update');
            Route::post('toggle-status/{id}', 'PostApiController@toggleStatus');
            Route::get('limit/{limit}', 'PostApiController@getLimitedPosts')->name('api.posts.limit');
        });


        Route::get('popular/posts', 'PostApiController@getPopularPosts')->name('api.posts.popular');


        // Route::get('category/{category}', 'PostApiController@getPostsByCategory')->name('api.posts.category');
        Route::get('filter', 'PostApiController@filterPost')->name('api.posts.filter');

        Route::apiResource('users', 'UserApiController');



        Route::group(['prefix' => 'category', 'as' => 'api.category.'], function () {
            Route::resource('/', 'CategoryApiController', ['only' => [
                'index', 'show', 'store', 'update', 'destroy'
            ]]);
        });
    });
});
