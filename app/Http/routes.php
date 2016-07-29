<?php

Route::get('/', function () {
    return view('pages.survinator');
});

Route::group(['middleware' => 'web'], function () {

    Route::post('signatures/{lang}/{docType}', function($lang, $docType, Illuminate\Http\Request $request)
    {

        $data = json_decode($request->getContent(), true);

//        dd($data);

        if($lang == 'fr' && $docType == 'ssr'){

            return view('documents.ssr-fr', ['data' => $data]);

        }
        if($lang == 'nl' && $docType == 'ssr'){

            return view('documents.ssr-nl', ['data' => $data]);

        }
        if($lang == 'fr' && $docType == 'tsa'){

            return view('documents.tsa-fr', ['data' => $data]);

        }
        if($lang == 'fr' && $docType == 'tsa'){

            return view('documents.tsa-fr', ['data' => $data]);

        }

    });

});

