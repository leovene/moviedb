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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies/upcoming/{page?}', 'MoviesController@listUpcoming');
Route::get('/movies/findupcoming/{title}/{page?}', 'MoviesController@findUpcoming');
Route::get('/movies/toprated/{page?}', 'MoviesController@listTopRated');
Route::get('/movies/find/{title}/{page?}', 'MoviesController@findMovie');
Route::get('/movies/totalpages', 'MoviesController@getTotalPages');
