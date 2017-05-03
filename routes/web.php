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


use App\Book;
use Illuminate\Http\Request;



/*　本のダッシュボードを表示 */
Route::get('/', 'BooksController@index');

/*　本を詳細を表示 */
Route::post('/detail/{books}','BooksController@detail');

/*　本を追加 */
Route::post("/books",'BooksController@store');

/*　本を更新 */
Route::post("/books/update",'BooksController@update');

/*　本を削除 */
Route::delete('/book/{book}','BooksController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index');
