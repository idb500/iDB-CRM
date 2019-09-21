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

// Home Page
Route::get('/home', 'ApiKeyController@index')->name('home');

// Role, Users
    Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users', 'UserController');
    Route::get('userslist', 'UserController@usersList'); 
    Route::resource('products','ProductController');
    Route::resource('stage', 'StageController');
    Route::resource('category', 'CategoryController');
   
   
    Route::get('contact', ['uses'=>'ContactController@index', 'middleware' => ['permission:list']]);
    Route::get('list/{listid}', ['uses'=>'ContactController@listdata', 'middleware' => ['permission:contact']]);
    Route::post('store', ['uses'=>'ContactController@store', 'middleware' => ['permission:contact-assigned']]);
    Route::post('listnote', ['uses'=>'ContactController@listnote', 'middleware' => ['permission:list-note']]);
    Route::post('listnote2', ['uses'=>'ContactController@listnote2', 'middleware' => ['permission:list-note']]);
    Route::post('listnote3', ['uses'=>'ContactController@listnote3', 'middleware' => ['permission:list-note']]);
    Route::post('remainder', ['uses'=>'ContactController@remainder', 'middleware' => ['permission:list-note']]);
 //   Route::get('users-list', 'ContactController@usersList');
    
  
    Route::get('contactlist', ['uses'=>'ContactController@contactlist', 'middleware' => ['permission:contact-list']]);
});

// Update Company Profile
Route::post('/update/cprofile', 'ApiKeyController@UpdateCompany')->name('home');
// Offline Transaction
Route::post('/offline/tnx', 'ApiKeyController@OfflineTnx')->name('home');
// DownloadApp
Route::get('/download/app', 'ApiKeyController@DownloadApp')->name('home');
// Approve Transaction
Route::post('approve/tnx', 'ApiKeyController@ApproveTnx')->name('home');
// Get API Keys
Route::get('api/keys', 'ApiKeyController@ApiKeys')->name('home');
// Re-generate API Key
Route::post('api/regenerate', 'ApiKeyController@ApiRegenerate')->name('home');
// Payment Init
Route::get('payment', ['as' => 'payment', 'uses' => 'PaymentController@payment']);
# Status Route
Route::get('payment/status', ['as' => 'payment.status', 'uses' => 'PaymentController@status']);