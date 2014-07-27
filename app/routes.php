<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));

Route::get('/archive', array('as' => 'archive', 'uses' => 'HomeController@getArchive'));

Route::post('/login', array('as' => 'login', 'uses' => 'HomeController@postLogin'));

Route::get('/set/{mark}/{id}', array('as' => 'set', 'uses' => 'HomeController@getSet'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'HomeController@getLogout'));

