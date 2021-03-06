<?php


Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/detail/{slug}', 'HomeController@getSingle')->name('detail-product');

Route::group(['middleware' => ['auth', 'verified', 'can:admin'], 'prefix' => 'backoffice', 'namespace' => 'Admin'], function () {

    Route::resource('users', 'UserController');
    Route::resource('partners', 'PartnerController');
});

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('partner/register', 'PartnerRegisterController@create')->name('register-partner');
    Route::post('partner', 'PartnerRegisterController@partnerRegister')->name('partner.register');

    Route::post('checkorder', 'OrderController@onProcess')->name('init.order');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/{username}', 'ProfileController@index')->name('profile');
        Route::get('/{username}/edit', 'ProfileController@edit')->name('edit-profile');
        Route::get('/{username}/change_password', 'ProfileController@editPassword')->name('edit-password');
        Route::put('/edit/{profile}', 'ProfileController@updateProfile')->name('update.profile');
        Route::put('/change_password/{user}', 'ProfileController@updatePassword')->name('update.password');

    });

    Route::resource('product', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::post('upload-image', 'ProductController@uploadImage')->name('upload.image');
    Route::delete('delete-image/{id}', 'ProductController@deleteImage')->name('delete.image');

    Route::resource('booking', 'BookingController');
    Route::post('pre/booking', 'BookingController@preStore')->name('booking.pre.store');

    Route::group(['prefix' => 'resource'], function () {
        Route::get('province', 'LocationController@getProvince')->name('resource.province');
        Route::get('cities/{id}', 'LocationController@getCity')->name('resource.cities');
        Route::get('districts/{id}', 'LocationController@getDistrict')->name('resource.district');

    });
});

Route::get('explore', 'HomeController@explore')->name('explore');
Route::get('search/{s?}', 'HomeController@search')->name('search');
Route::get('/pembayaran', function () {
    return view('budayaku.formpembayaran');
});
Route::get('/daftartransaksi', function () {
    return view('budayaku.daftartransaksi');
});
Route::get('/rincian', function () {
    return view('budayaku.rincian');
});

Route::get('/payment/invoices', function () {
    return view('budayaku.user.services.riwayat-pemesanan');
})->name('booking-list');

Route::get('/payment/invoices/{idtr}', function () {
    return view('budayaku.user.services.detail-transaksi');
})->name('detail-transaksi');

Route::get('/dashboard', function(){
    return view('budayaku.user.profile.dashboard');
})->name('dashboard.client');

