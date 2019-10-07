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
Route::get('/template', 'TemplateController@template');
Route::get('/ticket', 'TicketController@template');
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
    Route::get('nooflist/{listid}', ['uses'=>'ContactController@nooflist', 'middleware' => ['permission:contact']]);
    Route::post('store', ['uses'=>'ContactController@store', 'middleware' => ['permission:contact-assigned']]);
    Route::post('listnote', ['uses'=>'ContactController@listnote', 'middleware' => ['permission:list-note']]);
    Route::post('listnote2', ['uses'=>'ContactController@listnote2', 'middleware' => ['permission:list-note']]);
    Route::post('listnote_contact', ['uses'=>'ContactController@listnote_contact', 'middleware' => ['permission:list-note']]);
    Route::post('listnote_contact_opportunity', ['uses'=>'ContactController@listnote_contact_opportunity', 'middleware' => ['permission:list-note']]);
    Route::post('listnote_contact_lead', ['uses'=>'ContactController@listnote_contact_lead', 'middleware' => ['permission:list-note']]);
    Route::post('remainder', ['uses'=>'ContactController@remainder']);
 //   Route::get('users-list', 'ContactController@usersList');

 Route::post('addreply_form', ['uses'=>'ContactController@addreply_form', 'middleware' => ['permission:list-note']]);
 Route::post('stageform', ['uses'=>'ContactController@stageform', 'middleware' => ['permission:list-note']]);
 
    Route::get('contactlist', ['uses'=>'ContactController@contactlist', 'middleware' => ['permission:contact-list']]);
    Route::get('opportunitylist', ['uses'=>'ContactController@opportunitylist']);
    Route::get('leadlist', ['uses'=>'ContactController@leadlist']);
    Route::get('transfer_opportunity/{id}', ['uses'=>'ContactController@transfer_opportunity']);
    
    Route::get('clientlist', ['uses'=>'ContactController@clientlist']);
    Route::post('multiple_transfer_opportunity', ['uses'=>'ContactController@multiple_transfer_opportunity']);
    Route::get('transfer_lead/{id}', ['uses'=>'ContactController@transfer_lead']);
    
    Route::get('transfer_client/{id}', ['uses'=>'ContactController@transfer_client']);
    Route::post('multiple_transfer_lead', ['uses'=>'ContactController@multiple_transfer_lead']);
    
    Route::post('remaindercont', ['uses'=>'ContactController@remaindercont']);
    Route::post('remainder_contact', ['uses'=>'ContactController@remainder_contact']);
    Route::post('remainder_contact_opportunity', ['uses'=>'ContactController@remainder_contact_opportunity']);
    Route::post('remainder_contact_lead', ['uses'=>'ContactController@remainder_contact_lead']);
    Route::resource('note_type', 'Note_typeController');
    Route::resource('settings/reply_type', 'ReplytypeController');
    Route::resource('settings/bigdatastage', 'BigdataStageController');
    
    Route::resource('settings/campaignstatus', 'CampaignStatusController');
    Route::get('contactdetails/{id}', ['uses'=>'ContactController@contactdetails']);
    Route::get('createlist', 'ContactController@createlist');
    Route::post('listcreatestore2', 'ContactController@listcreatestore');

    // Template SMS
Route::get('template/sms', ['uses'=>'TemplateController@smsindex', 'middleware' => ['permission:sms-template-list']]);
Route::get('template/sms/create', ['uses'=>'TemplateController@smscreate', 'middleware' => ['permission:sms-template-create']]);
Route::post('template/sms/store', ['uses'=>'TemplateController@smsstore', 'middleware' => ['permission:sms-template-create']]);
Route::get('template/sms/edit/{id}', ['uses'=>'TemplateController@smsedit', 'middleware' => ['permission:sms-template-update']]);
Route::post('template/sms/update/{id}', ['uses'=>'TemplateController@smsupdate', 'middleware' => ['permission:sms-template-update']]);
Route::delete('template/sms/destroy/{id}', ['uses'=>'TemplateController@smsdestroy', 'middleware' => ['permission:sms-template-delete']]);
Route::get('template/sms/show/{id}', ['uses'=>'TemplateController@smsshow', 'middleware' => ['permission:sms-template-show']]);  
    // Template Email
    Route::get('template/email', ['uses'=>'TemplateController@emailindex', 'middleware' => ['permission:email-template-list']]);
    Route::get('template/email/create', ['uses'=>'TemplateController@emailcreate', 'middleware' => ['permission:email-template-list']]);
    Route::post('template/email/store', ['uses'=>'TemplateController@emailstore', 'middleware' => ['permission:email-template-list']]);
    Route::get('template/email/edit/{id}', ['uses'=>'TemplateController@emailedit', 'middleware' => ['permission:email-template-list']]);
    Route::post('template/email/update/{id}', ['uses'=>'TemplateController@emailupdate', 'middleware' => ['permission:email-template-list']]);
    Route::delete('template/email/destroy/{id}', ['uses'=>'TemplateController@emaildestroy', 'middleware' => ['permission:email-template-list']]);
    Route::get('template/email/show/{id}', ['uses'=>'TemplateController@emailshow', 'middleware' => ['permission:email-template-list']]);  
        // Template Whatsapp
Route::get('template/whatsapp', ['uses'=>'TemplateController@whatsappindex', 'middleware' => ['permission:whatsapp-template-list']]);
Route::get('template/whatsapp/create', ['uses'=>'TemplateController@whatsappcreate', 'middleware' => ['permission:whatsapp-template-list']]);
Route::post('template/whatsapp/store', ['uses'=>'TemplateController@whatsappstore', 'middleware' => ['permission:whatsapp-template-list']]);
Route::get('template/whatsapp/edit/{id}', ['uses'=>'TemplateController@whatsappedit', 'middleware' => ['permission:whatsapp-template-list']]);
Route::post('template/whatsapp/update/{id}', ['uses'=>'TemplateController@whatsappupdate', 'middleware' => ['permission:whatsapp-template-list']]);
Route::delete('template/whatsapp/destroy/{id}', ['uses'=>'TemplateController@whatsappdestroy', 'middleware' => ['permission:whatsapp-template-list']]);
Route::get('template/whatsapp/show/{id}', ['uses'=>'TemplateController@whatsappshow', 'middleware' => ['permission:whatsapp-template-list']]);

Route::get('stage/rule/{id}', ['uses'=>'StageController@rule', 'middleware' => ['permission:Stage-rule-list']]);
Route::get('stage/addrule/{id}', ['uses'=>'StageController@addrule', 'middleware' => ['permission:Stage-rule-create']]);
Route::post('stage/rulestore', ['uses'=>'StageController@rulestore', 'middleware' => ['permission:Stage-rule-create']]);
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
Route::get('tickets/settings/status', ['uses'=>'TicketController@TicketStatus', 'middleware' => ['permission:Ticket-status-list']]);

// Ticket Status Create View
Route::get('ticket/settings/status/create', ['uses'=>'TicketController@TicketStatusCreate', 'middleware' => ['permission:Ticket-status-create']]);

// Ticket Status Create
Route::post('ticket/settings/status/store', ['uses'=>'TicketController@TicketStatusStore', 'middleware' => ['permission:Ticket-status-create']]);

// Ticket Status Edit View
Route::get('ticket/settings/status/{id}', ['uses'=>'TicketController@TicketStatusEdit', 'middleware' => ['permission:Ticket-status-update']]);

// Ticket Status Update
Route::post('ticket/settings/status/update', ['uses'=>'TicketController@TicketStatusUpdate', 'middleware' => ['permission:Ticket-status-update']]);

// Ticket Status Delete
Route::post('ticket/settings/status/delete', ['uses'=>'TicketController@TicketStatusDelete', 'middleware' => ['permission:Ticket-status-delete']]);

/*********************************************************************************/

// Priority View
Route::get('tickets/settings/priority', ['uses'=>'TicketController@Priority', 'middleware' => ['permission:Ticket-priority-list']]);

// Priority Create View
Route::get('ticket/settings/priority/create', ['uses'=>'TicketController@TicketPriorityCreate', 'middleware' => ['permission:Ticket-priority-create']]);

// Priority Create
Route::post('ticket/settings/priority/store', ['uses'=>'TicketController@TicketPriorityStore', 'middleware' => ['permission:Ticket-priority-create']]);

// Priority Edit View
Route::get('ticket/settings/priority/{id}', ['uses'=>'TicketController@TicketPriorityEdit', 'middleware' => ['permission:Ticket-priority-update']]);

// Priority Update
Route::post('ticket/settings/priority/update', ['uses'=>'TicketController@TicketPriorityUpdate', 'middleware' => ['permission:Ticket-priority-update']]);

// Priority Delete
Route::post('ticket/settings/priority/delete', ['uses'=>'TicketController@TicketPriorityDelete', 'middleware' => ['permission:Ticket-priority-delete']]);

/*********************************************************************************/

// Ticket Category View
Route::get('tickets/settings/category', ['uses'=>'TicketController@Category', 'middleware' => ['permission:Ticket-category-list']]);

// Ticket Category Create View
Route::get('ticket/settings/category/create', ['uses'=>'TicketController@TicketCategoryCreate', 'middleware' => ['permission:Ticket-category-create']]);

// Ticket Category Create
Route::post('ticket/settings/category/store', ['uses'=>'TicketController@TicketCategoryStore', 'middleware' => ['permission:Ticket-category-create']]);

// Ticket Category Edit View
Route::get('ticket/settings/category/{id}', ['uses'=>'TicketController@TicketCategoryEdit', 'middleware' => ['permission:Ticket-category-update']]);

// Ticket Category Update
Route::post('ticket/settings/category/update', ['uses'=>'TicketController@TicketCategoryUpdate', 'middleware' => ['permission:Ticket-category-update']]);

// Ticket Category Delete
Route::post('ticket/settings/category/delete', ['uses'=>'TicketController@TicketCategoryDelete', 'middleware' => ['permission:Ticket-category-delete']]);

/******************************************************/
Route::get('ticket/create', ['uses'=>'TicketController@TicketCreate', 'middleware' => ['permission:ticket-create']]);
Route::get('tickets/', ['uses'=>'TicketController@index', 'middleware' => ['permission:ticket-list']]);
Route::post('ticket/store/', ['uses'=>'TicketController@TicketStore', 'middleware' => ['permission:ticket-create']]);