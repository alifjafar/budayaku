<?php

Route::get('/', function () {
    return view('budayaku.homepage');
})->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('partner/register', 'PartnerRegisterController@create')->name('register-partner');
    Route::post('partner', 'PartnerRegisterController@partnerRegister')->name('partner.register');
});


Route::get('/detail/{slug}', function () {
    return view('budayaku.detailproduct');
})->name('detail-product');

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

Route::group(['prefix' => 'user'], function () {
    Route::get('/{username}', 'ProfileController@index')->name('profile');
    Route::get('/{username}/edit', 'ProfileController@edit')->name('edit-profile');
    Route::get('/{username}/change_password', 'ProfileController@editPassword')->name('edit-password');
});

Route::get('/payment/invoices', function () {
    return view('budayaku.user.services.riwayat-pemesanan');
})->name('booking-list');

Route::get('/payment/invoices/{idtr}', function () {
    return view('budayaku.user.services.detail-transaksi');
})->name('detail-transaksi');
