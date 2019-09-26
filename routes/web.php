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
Route::get('/sales', 'CategoryController@sales');
Route::get('/bigdata', 'CategoryController@bigdata');
Route::get('/help', 'CategoryController@help');
Route::get('/kb', 'CategoryController@kb');
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
    Route::post('listnote_contact', ['uses'=>'ContactController@listnote_contact', 'middleware' => ['permission:list-note']]);
    Route::post('listnote_contact_opportunity', ['uses'=>'ContactController@listnote_contact_opportunity', 'middleware' => ['permission:list-note']]);
    Route::post('listnote_contact_lead', ['uses'=>'ContactController@listnote_contact_lead', 'middleware' => ['permission:list-note']]);
    Route::post('remainder', ['uses'=>'ContactController@remainder']);
 //   Route::get('users-list', 'ContactController@usersList');
    
 
    Route::get('contactlist', ['uses'=>'ContactController@contactlist', 'middleware' => ['permission:contact-list']]);
    Route::get('opportunitylist', ['uses'=>'ContactController@opportunitylist']);
    Route::get('leadlist', ['uses'=>'ContactController@leadlist']);
    Route::get('transfer_opportunity/{id}', ['uses'=>'ContactController@transfer_opportunity']);
    
    Route::post('multiple_transfer_opportunity', ['uses'=>'ContactController@multiple_transfer_opportunity']);
    Route::get('transfer_lead/{id}', ['uses'=>'ContactController@transfer_lead']);
    
    Route::post('multiple_transfer_lead', ['uses'=>'ContactController@multiple_transfer_lead']);
    
    Route::post('remaindercont', ['uses'=>'ContactController@remaindercont']);
    Route::post('remainder_contact', ['uses'=>'ContactController@remainder_contact']);
    Route::post('remainder_contact_opportunity', ['uses'=>'ContactController@remainder_contact_opportunity']);
    Route::post('remainder_contact_lead', ['uses'=>'ContactController@remainder_contact_lead']);
    Route::resource('note_type', 'Note_typeController');
    Route::get('contactdetails/{id}', ['uses'=>'ContactController@contactdetails']);
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

// Ticket Status View
Route::get('tickets/settings/status', 'TicketController@TicketStatus');

// Ticket Status Create View
Route::get('ticket/settings/status/create', 'TicketController@TicketStatusCreate');

// Ticket Status Create
Route::post('ticket/settings/status/store', 'TicketController@TicketStatusStore');

// Ticket Status Edit View
Route::get('ticket/settings/status/{id}', 'TicketController@TicketStatusEdit');

// Ticket Status Update
Route::post('ticket/settings/status/update', 'TicketController@TicketStatusUpdate');

// Ticket Status Delete
Route::post('ticket/settings/status/delete', 'TicketController@TicketStatusDelete');

/*********************************************************************************/

// Priority View
Route::get('tickets/settings/priority', 'TicketController@Priority');

// Priority Create View
Route::get('ticket/settings/priority/create', 'TicketController@TicketPriorityCreate');

// Priority Create
Route::post('ticket/settings/priority/store', 'TicketController@TicketPriorityStore');

// Priority Edit View
Route::get('ticket/settings/priority/{id}', 'TicketController@TicketPriorityEdit');

// Priority Update
Route::post('ticket/settings/priority/update', 'TicketController@TicketPriorityUpdate');

// Priority Delete
Route::post('ticket/settings/priority/delete', 'TicketController@TicketPriorityDelete');

/*********************************************************************************/

// Ticket Category View
Route::get('tickets/settings/category', 'TicketController@Category');

// Ticket Category Create View
Route::get('ticket/settings/category/create', 'TicketController@TicketCategoryCreate');

// Ticket Category Create
Route::post('ticket/settings/category/store', 'TicketController@TicketCategoryStore');

// Ticket Category Edit View
Route::get('ticket/settings/category/{id}', 'TicketController@TicketCategoryEdit');

// Ticket Category Update
Route::post('ticket/settings/category/update', 'TicketController@TicketCategoryUpdate');

// Ticket Category Delete
Route::post('ticket/settings/category/delete', 'TicketController@TicketCategoryDelete');

/******************************************************/
Route::get('ticket/create', 'TicketController@TicketCreate');
Route::get('tickets/', 'TicketController@index');
Route::post('ticket/store/', 'TicketController@TicketStore');