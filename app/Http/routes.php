<?php

Route::get('/', function () {
    return view('pages.survinator');
});
Route::get('documents/{id}/{lang}', 'DocumentController@printReport');
Route::get('agreement/{id}/{lang}', 'DocumentController@printAgreement');
