<?php

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('users/login', 'UserController@login')->middleware('guest');
Route::post('users/login', 'UserController@login')->middleware('guest');
Route::get('users/logout', 'UserController@logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| F4DB documents
|--------------------------------------------------------------------------
*/

Route::post('documents', 'DocumentController@printReport')->middleware('auth');
Route::post('agreement', 'DocumentController@printAgreement')->middleware('auth');

Route::get('/', function () {
    return view('pages.survinator');
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| Tests
|--------------------------------------------------------------------------
*/

Route::get('imageapi', function () {
    $res = \Curl::to('http://survinator.fiber4belgium.be/api/auth')->withData([
        'name'     => 'survinator',
        'password' => 'rB5pwBPOgWvqx1QFQqkR'
    ])->post();
    $arr = json_decode($res, true);


    return $arr['token'];
});



Route::get('test', function () {


    $path = 'http://' . $_ENV['OPENERP_URL'] . ':' . $_ENV['OPENERP_PORT'];

    $res = \Curl::to($path)->withData([
        'username' => 'test.it.security11',
        'password' => 'tambayan'
    ])->get();

});