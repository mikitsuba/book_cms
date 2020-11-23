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

//本 ダッシュボード表示
Route::get('/', 'BooksController@index');
//登録処理
Route::post('/books','BooksController@store');
//更新画面
Route::post('/booksedit/{book}','BooksController@edit'); //{book}とコントローラーの'book'は一致させる必要がある
//更新処理
Route::post('/books/update','BooksController@update');
//本を削除
Route::delete('/book/{book}','BooksController@destroy');

// 認証
Auth::routes();
Route::get('/home', 'BooksController@index')->name('home');
