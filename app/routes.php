<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    return View::make('hello');
});

Route::get('register', 'AuthController@getRegister');
Route::post('register', 'AuthController@postRegister');
Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');

Route::group(array('before' => 'auth'), function () {

    Route::get('admin', 'AdminController@index');
    Route::get('logout', 'AuthController@logout');
    Route::resource('posts', 'PostController');
    Route::get('balance', array('as' => 'balance', 'uses' => 'AccountController@balance'));
    Route::resource('accounts', 'AccountController');
    Route::resource('methods', 'PaymentMethodController');
    Route::resource('payees', 'PayeeController');
    Route::resource('payers', 'PayerController');
    Route::resource('transactions', 'TransactionController');
    Route::get('expense', array('as' => 'expense', 'uses' => 'CategoryController@expense'));
    Route::get('income', array('as' => 'income', 'uses' => 'CategoryController@income'));
    Route::post('postCategory', array('as' => 'postCategory', 'uses' => 'CategoryController@postCategory'));
    Route::get('editCategory/{id}', array('as' => 'editCategory', 'uses' => 'CategoryController@editCategory'))->where('id', '[1-9][0-1]*');
    Route::post('updateCategory/{id}', array('as' => 'updateCategory', 'uses' => 'CategoryController@updateCategory'))->where('id', '[1-9][0-1]*');
    Route::get('deleteCategory/{id}', array('as' => 'deleteCategory', 'uses' => 'CategoryController@deleteCategory'))->where('id', '[1-9][0-1]*');
});