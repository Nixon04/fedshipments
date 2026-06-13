<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PostUsersController;
use Illuminate\Support\Facades\Route;

Route::controller(GeneralController::class)->group(function (){
    Route::get('/','MainHome');
    Route::get('/about-us', 'About');
    Route::get('/services', 'Services');
    Route::get('/tracker', 'Tracker');
    Route::get('/contact', 'Contact');

    Route::get('/privacy', 'Privacy');

    Route::get('/services/air-freight', 'AirFreight');
    Route::get('/services/ocean-freight', 'Ocean');
    Route::get('/services/logistics', 'Logistics');
    Route::get('/services/warehouse', 'WareHouse');
    Route::get('/services/brokage', 'Brokage');

    Route::get('/c/tracking-location/{id}', 'LocationTracker');
});


Route::controller(PostUsersController::class)->group(function (){
    Route::post('/web_api/v1/send-message','SendEmail');
    // for admin
    Route::prefix('/web_api/v1/back-end-api')->group(function () {
        Route::post('/login', 'LoginAccount');
        Route::post('/register', 'RegisterAccount');
        Route::post('/create-shipment', 'CreateShipment');
        Route::post('/tracking-id', 'TrackerID');
        Route::get('/shipment-history', 'ShipmentLog');
        Route::post('/update-location', 'ShipmentUpdate');
        Route::post('/delete-shipment', 'DeleteShipment');
        Route::post('/update-address', 'CompanyAddress');
        Route::post('/logout', 'AccountLogout');
    });
   
});


Route::controller(AdminController::class)->group(function (){
    Route::get('/jay-funds/backend/login','AdminLogin');
    Route::middleware('user.session.id')->group(function() {
        Route::get('/jay-funds/dashboard/home','HomeDashboard');
        Route::get('/jay-funds/dashboard/settings','Settings');
        Route::get('/jay-funds/dashboard/shipment','Shipment');
        Route::get('/jay-funds/dashboard/shipment-update/{id}','ShipmentUpdate');
        Route::get('/jay-funds/dashboard/history','History');
    });

});


