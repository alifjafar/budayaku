<?php


Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/detail/{slug}', 'HomeController@getSingle')->name('detail-product');

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('partner/register', 'PartnerRegisterController@create')->name('register-partner');
    Route::post('partner', 'PartnerRegisterController@partnerRegister')->name('partner.register');

    Route::post('checkorder', 'OrderController@onProcess')->name('init.order');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/{username}', 'ProfileController@index')->name('profile');
        Route::get('/{username}/edit', 'ProfileController@edit')->name('edit-profile');
        Route::get('/{username}/change_password', 'ProfileController@editPassword')->name('edit-password');
        Route::put('/edit/{profile}','ProfileController@updateProfile')->name('update.profile');
        Route::put('/change_password/{user}','ProfileController@updatePassword')->name('update.password');
    });

    Route::resource('product', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::post('upload-image','ProductController@uploadImage')->name('upload.image');
    Route::delete('delete-image/{id}', 'ProductController@deleteImage')->name('delete.image');
});

Route::get('/pembayaran', function () {
    return view('budayaku.formpembayaran');
});
Route::get('/daftartransaksi', function () {
    return view('budayaku.daftartransaksi');
});
Route::get('/rincian', function () {
    return view('budayaku.rincian');
});
Route::get('/explore', function () {
    return view('budayaku.daftarkesenian');
});


Route::get('/payment/invoices', function () {
    return view('budayaku.user.services.riwayat-pemesanan');
})->name('booking-list');

Route::get('/payment/invoices/{idtr}', function () {
    return view('budayaku.user.services.detail-transaksi');
})->name('detail-transaksi');
