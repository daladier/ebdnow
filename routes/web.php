<?php

use illuminate\Http\Request;

$this->group(['middleware' => ['auth'],'namespace' => 'Admin', 'prefix' => 'admin'],function (){
     Route::get('/', 'AdminController@index')->name('admin.home');
     Route::get('balance', 'BalanceController@index')->name('admin.balance');
     Route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');
     Route::post('deposit', 'BalanceController@depositStore')->name('deposit.store');
});

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

