<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['domain' => 'shullworks.com'], function () {
	
	Route::get('/', function () {
	    return view('index');
	});

});

Route::group(['domain' => '{account}.shullworks.com'], function () {

	Route::get('/', function(){
		$user = Auth::user();
		if ($user) {
			return view('dashboard.index');
		} else {
			return view('auth.login');
		}
	});
	Route::post('/', 'Auth\AuthController@postLogin');
	Route::get('/logout', 'Auth\AuthController@logout');
	Route::get('/login', function () {
	    return redirect('/');
	});

	Route::post('/search', 'MiscController@postSearch');

	Route::get('/cases', 'LegalCaseController@getIndex');
	Route::get('/case/{id}', 'LegalCaseController@getLegalCase');
	Route::get('/case/{id}/status/{status}', 'LegalCaseController@getStatusChange');
	Route::post('/case/{id}/action', 'LegalCaseController@postLegalCaseAction');
	Route::post('/case/{id}/note', 'LegalCaseController@postLegalCaseNote');
	Route::post('/case/{id}/file', 'LegalCaseController@postLegalCaseFile');
	Route::get('/case/{case_id}/file/delete/{file_id}', 'LegalCaseController@deleteLegalCaseFile');
	Route::get('/case/{id}/delete', 'LegalCaseController@deleteLegalCase');

	Route::post('/case/update', 'LegalCaseController@updateLegalCase');

	Route::get('/users', 'UserController@getIndex');
	Route::get('/user/{id}', 'UserController@getUser');
	Route::post('/user/update', 'UserController@updateUser');
	Route::post('/user/changepass', 'UserController@updateUserPassword');

	Route::get('/contacts', 'ContactController@getIndex');
	Route::get('/contact/{id}', 'ContactController@getContact');

	Route::post('/contact/update', 'ContactController@updateContact');

	Route::get('/profile', 'UserController@getProfile');

});