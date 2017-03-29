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

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/admin', [
  'uses' => 'AdminController@index',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);

 Route::get('/admin/staty/', [
  'uses' => 'AdminController@staty2',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);
 Route::get('/admin/staty/id/{id?}', [
  'uses' => 'AdminController@staty3',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);
 Route::get('/admin/staty/{start?}/{end?}', [
  'uses' => 'AdminController@staty',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);
 Route::post('/admin/staty/search', [
  'uses' => 'AdminController@staty4',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);
 Route::get('/admin/staty/search/{start?}/{end?}/{search?}/{search2?}/{od?}/{do?}',  [
  'uses' => 'AdminController@staty4',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);

 Route::post('/admin/staty/search/', [
  'uses' => 'AdminController@staty5',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);

Route::get('/logout', [
  'uses' => 'AdminController@logout',
]);
