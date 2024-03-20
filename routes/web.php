<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\usereventsController;
use App\Http\Controllers\usereventdetailsController;
use App\Http\Controllers\eventtypesController;
use App\http\Controllers\usersController;
use App\Http\Controllers\resellersController;
use App\Http\Controllers\accountsettingsController;






// Dashboard
Route::get('/dashboard',"dashboardController@index");
Route::get('/graphreport',"graphreportController@index");

// Blogs
Route::get('/blogs',"BlogController@index")->name('blog.list');
Route::get('/blogs/create',"BlogController@create")->name('blog.create');
Route::post('/blogs/store',"BlogController@store")->name('blog.store');
Route::get('/blogs/edit/{id}',"BlogController@edit")->name('blog.edit');
Route::post('/blogs/update/{id}',"BlogController@update")->name('blog.update');
Route::delete('/blogs/delete',"BlogController@destroy")->name('blog.delete');
Route::get('/blogs/show/{id}',"BlogController@show")->name('blog.show');

Route::get('/card',"CardController@index")->name('card.list');

Route::post('/card/store',"CardController@store")->name('card.store');
Route::delete('/card/delete',"CardController@destroy")->name('card.delete');


// Send All users mail
Route::get('/send-all-users-mail', 'MailController@sendAllUsersMail')->name('send.all.users.mail');
// Login
route::get('/',"loginController@index");
route::get('/login',"loginController@index");
route::post('/checklogin',"loginController@auth");

Route::get('/logout', "loginController@logout");


Route::group(['middleware' => 'admin_auth'], function () {
    
// Dashboard
    Route::get('/dashboard',"dashboardController@index");
});
Route::get('/get-csrf-token', 'CardTemplateController@getCSRFToken');

Route::get('/card-templates',"CardTemplateController@index")->name('card-template-list');
Route::get('/card-templates/all',"CardTemplateController@allTemplates")->name('all-templates');
Route::get('/card-templates/add',"CardTemplateController@create")->name('card-template-add');
Route::post('/card-templates/store',"CardTemplateController@store")->name('card-template-store');
Route::post('/save-blob',"CardTemplateController@update")->name('card-template-update');
Route::get('/card-templates/event/get-card', 'CardTemplateController@getCard');
Route::delete('/card-template/delete',"CardTemplateController@destroy")->name('delete-template');
Route::get('/card-templates/view',"CardTemplateController@viewTemplate")->name('view-template');
// Users Index, Add, Get, Update
route::get('/users',"usersController@index");
route::post('/users/added',"usersController@AddUserData");
route::get('/users/{userID}',"usersController@getUserData");
route::post('/users/update',"usersController@updateUserData");
route::delete('/users/delete',"usersController@deleteUserData")->name('delete-user');

// Promotional
route::get('/promotional',"usersController@promolist");

// Resellers
route::get('/resellers',"resellersController@index");
route::post('/reseller/added',"resellersController@AddResellerData");
route::get('/resellers/{userID}',"resellersController@getResellerData");
route::post('/resellers/update',"resellersController@updateresellerData");
//add Coupon 
// route::get('/resellerscoupon/{userID}',"resellersController@getReselleruserData");
route::post('/resellercoupon/added',"resellersController@resellercoupon");
route::get('/resellercoupondetails/{userID}',"resellersController@getcouponData");

// Prices
route::get('/prices',"pricesController@index");
route::post('/prices/updated',"pricesController@pricesUpdate");

// Event Types  Add, Get, Update
route::get('/eventtypes',"eventtypesController@index");
route::post('/eventtype/added',"eventtypesController@addeventtype");
route::get('/eventtypes',"eventtypesController@getEventtypedata");
route::post('/eventtype/updated',"eventtypesController@updateEventtypeData");
// Event Type detail
route::get('/eventtypedetails/{eventtypeID}',"eventtypesController@eventtypedetail");
route::post('/cards/added',"eventtypesController@eventtypeCardUpload");


// User Events 
route::get('/userevents',"usereventsController@index");

// User Event Details
route::get('/eventalldetails',"usereventdetailsController@eventall");

//  Index
route::get('/userevents/{userID}',"usereventdetailsController@index");

// Event ID Get ( Main )
route::get('/userevents/{userID}/{eventID}',"usereventdetailsController@eventIDget");

// Event Update
route::post('/event/update',"usereventdetailsController@updateGeneralInforData");

// Guest List Add, Update
route::post('/guest/added',"usereventdetailsController@addGuestlistData");
route::post('/guest/update',"usereventdetailsController@updateGuestInforData");

// Meal Add, Delete
route::post('/meal/added',"usereventdetailsController@addmeal");
route::post('/meal/updated',"usereventdetailsController@updateMealInforData");
route::post('/meal/delete',"usereventdetailsController@DeleteMeal");

route::post('/cardimages/updated',"usereventdetailsController@updatedcardimages");

// Card Add, Delete
route::post('/card/added',"usereventdetailsController@addcard");
route::post('/card/update',"usereventdetailsController@updateCardInforData");

// Table Add, Delete
route::post('/table/added',"usereventdetailsController@addtable");
route::post('/table/updated',"usereventdetailsController@updateGuestTableInforData");
route::post('/table/delete',"usereventdetailsController@DeleteTable");

// Add New Event (New Event Model) 
route::post('/addnewEvent/added',"usereventdetailsController@addnewEvent");

// Coupens
route::get('/coupons',"couponsController@index");
route::post('/coupon/add',"couponsController@cinsert");
route::post('/coupon/update',"couponsController@cupdate");

// Coupon Details
route::get('/coupons',"couponsController@index");
route::get('/coupon/{codeID}',"couponsController@coupondetails");
route::post('/coupon/updated',"couponsController@cupdate");

//Counpon Status Edit
route::get('/couponstatus/{codeID}',"apiController@couponstatus");

// Records
route::get('/records',"recordsController@index");
route::get('/records/{invoiceID}',"recordsController@getamountData");

// Stickers
route::get('/sticker',"eventtypesController@viewSticker");
route::post('/sticker/add',"eventtypesController@stickerUpload");
route::get('/api/deleteSticker/{stickerID}', "apiController@DeleteSticker");



//------------------------------------------------------------------API - apiController-----------------------------------------

// QR System
route::get('/api/getqr/{txt}',"apiController@makeQR");


// Events Delete API
route::get('/api/deleteEvent/{eventID}',"apiController@DeleteEventData");


// ---------------------------------------------------------------------------------------------
// Page UserEvents/userid/eventid 
// General Information API
route::get('/api/generalInformation/{userID}/{eventID}',"apiController@getGeneralInfo");

// Meals API
route::get('/api/mealdata/{mealID}',"apiController@getMealData");
route::get('/api/deletemeal/{userID}/{eventID}/{mealID}',"apiController@mealDeletedData");
route::get('/api/deletetable/{userID}/{eventID}/{tableID}',"apiController@tableDeletedData");

// Guest List API 
route::get('/api/guestList/{guestID}',"apiController@getGuestData");
route::get('/api/deleteguest/{userID}/{eventID}/{guestID}',"apiController@guestDeletedData");

//card Images API
route::get('/api/cardimages/{cardID}',"apiController@getCardImages");

// Card List API
route::get('/api/cardList/{cardID}',"apiController@getCardData");

// Guest Table API
route::get('/api/tableList/{tableID}',"apiController@getGuestTableData");


// Event Types API
route::get('/api/eventtypeList/{eventtypeID}',"apiController@EventTypeData");
route::get('/api/deleteEventtype/{eventtypeID}',"apiController@EventTypeDeletedData");

//  event cards Background
route::get('/api/deleteEventtypebackground/{imageID}',"apiController@deleteEventBG");


// coupon
route::get('/api/coupon/{codeID}',"apiController@CodeData");

// refunds
route::get('/api/refund/{codeID}',"apiController@toBeRefund");
route::get('/api/refunded/{codeID}',"apiController@refunded");

