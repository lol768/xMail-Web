<?php

// Template functions
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('/about', array('as' => 'about', 'uses' => 'HomeController@getAbout'));
Route::get('/contact', array('as' => 'contact', 'uses' => 'HomeController@getContact'));
Route::get('/download', array('as' => 'download', 'uses' => 'HomeController@getDownload'));
Route::get('/terms', array('as' => 'terms', 'uses' => 'HomeController@getTerms'));
Route::get('/privacy', array('as' => 'privacy', 'uses' => 'HomeController@getPrivacyPolicy'))->before('auth');
Route::get('/servers', array('as' => 'servers', 'uses' => 'HomeController@getServers'));

// Account functions
Route::get('/register', array('as' => 'register', 'uses' => 'AuthController@getRegister'))->before('guest');
Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@getLogin'))->before('guest');
Route::get('/forgotpass', array('as' => 'forgotpass', 'uses' => 'AuthController@getForgotPassword'))->before('guest');
Route::get('/registercode', array('as' => 'registercode', 'uses' => 'AuthController@getRegisterCode'))->before(array('checkregcode', 'guest'));
Route::get('/resendregcode', array('as' => 'resendregcode', 'uses' => 'AuthController@getResendRegCode'))->before(array('guest'));
Route::get('/signout', array('as' => 'signout', 'uses' => 'AuthController@getSignout'))->before('auth');

Route::post('/register', array('uses' => 'AuthController@postRegister'))->before('csrf');
Route::post('/resendregcode', array('uses' => 'AuthController@postResendRegCode'))->before('csrf');

// API functions
Route::get('/api/v1/mcserver/{ip}/{port}/{token}', array('as' => 'mcserver', 'uses' => 'ApiController@getMcServer'));
