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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'PagesController@index');
Route::get('/scratch', 'PagesController@scratchPad');

/**
 * Must be logged in to visit
 */
Route::middleware(['auth'])->group(function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/account', 'AccountController@index')->name('account.index');
    Route::post('/account', 'AccountController@update')->name('account.update');

    Route::prefix('address')->group(function() {
        Route::get('/', 'AddressController@index')->name('addresses');
        Route::post('/', 'AddressController@store')->name('new-address');
        Route::patch('{address}/edit', 'AddressController@update')->name('update-address');
        Route::delete('{address}', 'AddressController@destroy')->name('delete-address');
    });

    Route::prefix('tracking')->group(function() {
        Route::get('/', 'TrackingController@index')->name('tracking');
        Route::post('/', 'TrackingController@trackingResults')->name('tracking-results');
    });

    Route::prefix('booking')->group(function() {
        Route::get('/', 'BookingController@index')->name('send-a-parcel');
        Route::post('/', 'BookingController@rateRequest')->name('rate-request');

        Route::get('chooseService', function() {abort(404);});
        Route::post('chooseService', 'BookingController@chooseService')->name('choose-service');

        Route::get('details', 'BookingController@shipmentDetails')->name('shipment-details');

        Route::get('submitDetails', function() {abort(404);});
        Route::post('submitDetails', 'BookingController@submitDetails')->name('submit-details');

        Route::get('review', 'BookingController@reviewShipments')->name('review-shipments');

        Route::get('confirm', function() {abort('404');});
        Route::post('confirm', 'BookingController@confirmBooking')->name('booking.confirm');

        Route::get('confirmation', 'BookingController@bookingConfirmation')->name('booking.confirmation');
    });

    Route::post('/booking/process', 'BookingController@completeBooking')->name('complete-booking');
    Route::get('/booking/complete', 'BookingController@bookingCompletionInfo');

    Route::prefix('shipment')->group(function() {
        Route::delete('{shipment}', 'ShipmentController@destroy')->name('delete-shipment');
    });

    Route::get('/bookinghistory', 'BookingHistoryController@index')->name('booking-history');
    Route::get('/bookinghistory/{id}', 'BookingHistoryController@booking')->name('booking.info');

    Route::get('/label/{shipmentUuid}/Labels', 'LabelsController@serve')->name('label.serve');
});





Route::middleware(['auth', 'admin'])->prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::prefix('/carriers')->group(function() {
        Route::get('/', 'CarrierController@index')->name('admin.carriers.index');
        Route::post('/', 'CarrierController@store')->name('admin.carriers.store');

        Route::get('/profile/{carrier}', 'CarrierController@profile')->name('admin.carriers.profile');

        Route::post('/toggleStatus', 'CarrierController@toggleStatus')->name('admin.carriers.toggleStatus');
    });

    Route::prefix('tariffs')->group(function() {
        Route::get('/', 'TariffController@index')->name('admin.tariffs.index');
        Route::get('/view/{tariff}', 'TariffController@show')->name('admin.tariffs.show');
        Route::post('/sales', 'TariffController@storeSales')->name('admin.tariffs.storeSales');
        Route::post('/cost', 'TariffController@storeCost')->name('admin.tariffs.storeCost');
    });

    Route::prefix('customers')->group(function() {
        Route::get('/', 'AccountController@customers')->name('accounts.customers');
        Route::get('/profile/{user}', 'AccountController@customerProfile')->name('admin.customers.profile');
    });

    Route::prefix('surcharges')->group(function() {
        Route::get('/', 'SurchargesController@index')->name('admin.surcharges.index');
    });

    Route::prefix('remotearea')->group(function() {
        Route::get('/', 'RemoteAreasController@index')->name('admin.remoteareas.index');
    });

    Route::prefix('services')->group(function() {
        Route::get('/', 'ServicesController@index')->name('admin.services.index');
    });

    Route::prefix('shipment')->group(function() {
        Route::get('/', 'ShipmentController@index')->name('admin.shipments.index');
        Route::get('{shipment}', 'ShipmentController@info')->name('admin.shipment.info');
    });
});
