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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {return view('welcome'); });

Route::get('security/xss', 'Security\CrossSiteScriptingController@index')->name('posts');
Route::post('storeComment', ['as' => 'storeComment', 'uses' => 'Security\CrossSiteScriptingController@attack']);

Route::get('security/csrf', 'Security\CrossSiteRequestForgeryController@index');
Route::post('transferGold', ['as' => 'transferGold', 'uses' => 'Security\CrossSiteRequestForgeryController@attack']);

Route::get('security/error-reporting', 'Security\ErrorReportingController@index');
Route::get('error-reporting', 'ErrorReportingController@index');

Route::get('security/sql', 'Security\StructuredQueryLanguageController@index');
Route::post('retrieveUsers', ['as' => 'retrieveUsers', 'uses' => 'RetrieveUsersController@index']);

Route::get('security/hashing', 'Security\HashingController@index');
Route::post('hashString', ['as' => 'hashString', 'uses' => 'Security\HashingController@hash']);

Route::get('security/encryption', 'Security\EncryptionController@index');
Route::post('encryptString', ['as' => 'encryptString', 'uses' => 'Security\EncryptionController@encrypt']);

Route::get('security/mass-assignment', 'Security\MassAssignmentController@index');
Route::post('registerStudents', ['as' => 'registerStudents', 'uses' => 'Security\MassAssignmentController@registerStudents']);