<?php

// Template functions
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('/about', array('as' => 'about', 'uses' => 'HomeController@getAbout'));
Route::get('/contact', array('as' => 'contact', 'uses' => 'HomeController@getContact'));
Route::get('/download', array('as' => 'download', 'uses' => 'HomeController@getDownload'));
Route::get('/terms', array('as' => 'terms', 'uses' => 'HomeController@getTerms'));
Route::get('/privacy', array('as' => 'privacy', 'uses' => 'HomeController@getPrivacyPolicy'));
Route::get('/servers', array('as' => 'servers', 'uses' => 'HomeController@getServers'));

Route::post('/contact', array('uses' => 'HomeController@postContact'))->before('csrf');

Route::get('/about/developers', array('as' => 'about_developers', 'uses' => 'HomeController@getAboutDevelopers'));
Route::get('/about/owners', array('as' => 'about_owners', 'uses' => 'HomeController@getAboutOwners'));
Route::get('/about/players', array('as' => 'about_players', 'uses' => 'HomeController@getAboutPlayers'));
Route::get('/about/networks', array('as' => 'about_networks', 'uses' => 'HomeController@getAboutNetworks'));

// Account functions
Route::get('/register', array('as' => 'register', 'uses' => 'AuthController@getRegister'))->before('guest');
Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@getLogin'))->before('guest');
Route::get('/forgotpass', array('as' => 'forgotpass', 'uses' => 'AuthController@getForgotPassword'))->before('guest');
Route::get('/registercode', array('as' => 'registercode', 'uses' => 'AuthController@getRegisterCode'))->before(array('checkregcode', 'guest'));
Route::get('/resendregcode', array('as' => 'resendregcode', 'uses' => 'AuthController@getResendRegCode'))->before(array('guest'));
Route::get('/signout', array('as' => 'signout', 'uses' => 'AuthController@getSignout'))->before('auth');

Route::post('/register', array('uses' => 'AuthController@postRegister'))->before('csrf');
Route::post('/login', array('uses' => 'AuthController@postLogin'))->before('csrf');
Route::post('/resendregcode', array('uses' => 'AuthController@postResendRegCode'))->before('csrf');

// Mail functions
Route::get('/mailbox', array('as' => 'mailbox', 'uses' => 'MailController@getMailbox'))->before('auth');

// API functions
Route::get('/api/v1/mcserver/{ip}/{port}/{token}', array('as' => 'mcserver', 'uses' => 'ApiController@getMcServer'));
Route::get('/api/v1/user/verify/{token}', array('as' => 'userverify', 'uses' => 'ApiController@getRegConfirm'));
Route::get('/api/v1/user/purgetokens/{secret}', array('as' => 'purgetokens', 'uses' => 'ApiController@getPurgeOldCodes'));
