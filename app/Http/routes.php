<?php

Route::get('/', function () {
    return view('pages.survinator');
});

Route::group(['middleware' => 'web'], function () {

    Route::post('signatures/{id}', 'DocumentController@printDocument');

});

