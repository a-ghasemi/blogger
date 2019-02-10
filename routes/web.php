<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@Posts');

Route::get('/post/{id}', 'HomeController@onePost');

Route::get('fetch_posts', 'HomeController@FetchPosts');
Route::get('fetch_comments', 'HomeController@FetchComments');
