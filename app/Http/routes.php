<?php

Route::get('/', function () {
    return view('pages.survinator');
});
Route::post('documents', 'DocumentController@printReport');
Route::post('agreement', 'DocumentController@printAgreement');
