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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cwdemo', function () {
    return '<h1>プログラムデモ</h1><ul><li><a href="/cwdemo/contacts">お問い合わせフォームデモ</a></li></ul>';
});
Route::get('/cwdemo/contacts', function() {
	return view('contact.index');
});
Route::get('/cwdemo/contacts/form', function() {
    return view('contact.form');
});
Route::get('/cwdemo/contacts/sent', function () {
    return view('contact.sent');
});
Route::get('/cwdemo/contacts/list', 'ContactsController@list');
Route::get('/cwdemo/contacts/detail/{id}', 'ContactsController@detail');
Route::post('/cwdemo/contacts/create', 'ContactsController@create');
