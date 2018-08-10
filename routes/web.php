<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'ltes'], function(){
	Route::get('/', 'LteController@index')->name('ltes.index');
	Route::get('/create', 'LteController@create')->name('ltes.create');
});

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'DashboardController@index')->name('dashboard.index');

	Route::group(['prefix'=>'partners'], function(){
		Route::get('/', 'PartnerController@index')->name('partner.index');
		Route::get('/create', 'PartnerController@create')->name('partner.create');
		Route::post('/create', 'PartnerController@store')->name('partner.register');
	});

	Route::group(['prefix' => '/types'], function (){
		Route::get('/', 'TypeController@index')->name('types.index');
		Route::get('/create', 'TypeController@create')->name('types.create');
		Route::post('/create', 'TypeController@store')->name('types.store');
	  Route::get('/destroy/{id}', 'TypeController@destroy')->name('types.delete');
	});
	
	Route::group(['prefix' => '/menu'], function(){
		Route::get('/', 'MenuController@index')->name('menu.index');
		Route::get('/create', 'MenuController@create')->name('menu.create');
		Route::post('/create', 'MenuController@store')->name('menu.store');
		Route::get('/edit/{id}', 'MenuController@edit')->name('menu.edit');
		Route::post('/edit/{id}', 'MenuController@update')->name('menu.update');
		Route::delete('/delete/{id}', 'MenuController@destroy')->name('menu.delete');
	});
});