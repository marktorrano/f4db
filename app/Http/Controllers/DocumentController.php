<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use Ixudra\Curl\Facades\Curl;
use DB;

class DocumentController extends Controller
{
    //
    public function printReport($id, $lang = 'fr')
    {

        $images['index'] = [
            'facade',
            'access_to_telco_room',
            'floor_plan',
            'building_layout',
            'intro_on_facade_cabling_proposal',
            'intro_underground_proposal',
            'vertical_shaft_present_img',
            'copper_intro',
            'customer_interested_in_fiber'
        ];

        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $id;

        $resCDB = Curl::to($path)->asJson()->get();
        $oData = json_encode($resCDB);
        $aData = json_decode($oData, true);


        $aData['lang'] = $lang;

        if (isset($aData['bu_type']) && $aData['bu_type'] == 'mdu' && isset($aData['nr_lu']) && $aData['nr_lu'] >= 1) {
            if (isset($aData['quandrant'])) {
                if ($aData['quandrant'] == 'a' || $aData['quandrant'] == 'c' || $aData['quandrant'] == 'e') {
                    $aData['hasTSA'] = true;
                }
            }
        } else {
            $aData['hasTSA'] = false;
        }

        foreach ($images['index'] as $imageIndex) {
            if (isset($aData[$imageIndex]) && ($imageIndex == 'copper_intro' || $imageIndex == 'customer_interested_in_fiber')) {
                $aData['copper_intro']['img_outside'] = []; //initialize img outside array
                $aData['copper_intro']['img_inside'] = []; //initialize img inside array
                $aData['customer_interested_in_fiber']['img_outside'] = []; //initialize img outside array
                $aData['customer_interested_in_fiber']['img_inside'] = []; //initialize img inside array
                $aData['existing_intro']['number_of_pages'] = [];
                $imgCount = 0;
                if ($aData['copper_intro'] && isset($aData['copper_intro']['copper_intro_photos'])) {
                    if (isset($aData['copper_intro']['copper_intro_photos'][0]['outside']['doc_type_image'])) {
                        foreach ($aData['copper_intro']['copper_intro_photos'][0]['outside']['doc_type_image'] as $image) {
                            $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                            $res = Curl::to($path)->asJson()->get();
                            $data = json_encode($res);
                            $arr = json_decode($data, true);
                            if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                                $nearlineId = $arr['edited_nearline_id'];
                                $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            array_push($aData['copper_intro']['img_outside'], $imgPath); //img url outside
                            $imgCount++;
                        }
                    }
                    if (isset($aData['copper_intro']['copper_intro_photos'][0]['inside']['doc_type_image'])) {
                        foreach ($aData['copper_intro']['copper_intro_photos'][0]['inside']['doc_type_image'] as $image) {
                            $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                            $res = Curl::to($path)->asJson()->get();
                            $data = json_encode($res);
                            $arr = json_decode($data, true);
                            if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                                $nearlineId = $arr['edited_nearline_id'];
                                $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            array_push($aData['copper_intro']['img_inside'], $imgPath); //img url inside
                            $imgCount++;
                        }
                    }
                    if (isset($aData['customer_interested_in_fiber']['desired_fiber_photos'][0]['outside']['doc_type_image'])) {
                        foreach ($aData['customer_interested_in_fiber']['desired_fiber_photos'][0]['outside']['doc_type_image'] as $image) {
                            $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                            $res = Curl::to($path)->asJson()->get();
                            $data = json_encode($res);
                            $arr = json_decode($data, true);
                            if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                                $nearlineId = $arr['edited_nearline_id'];
                                $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            array_push($aData['customer_interested_in_fiber']['img_outside'], $imgPath); //img url outside
                            $imgCount++;
                        }

                    }
                    if (isset($aData['customer_interested_in_fiber']['desired_fiber_photos'][0]['inside']['doc_type_image'])) {
                        foreach ($aData['customer_interested_in_fiber']['desired_fiber_photos'][0]['inside']['doc_type_image'] as $image) {
                            $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                            $res = Curl::to($path)->asJson()->get();
                            $data = json_encode($res);
                            $arr = json_decode($data, true);
                            if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                                $nearlineId = $arr['edited_nearline_id'];
                                $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            array_push($aData['customer_interested_in_fiber']['img_inside'], $imgPath); //img url inside
                            $imgCount++;
                        }
                    }
                    $aData['existing_intro']['number_of_pages'] = $imgCount/6;
                }


            } else if (isset($aData[$imageIndex]['doc_type_image'])) {
                $aData[$imageIndex]['img'] = []; //initialize img array
                foreach ($aData[$imageIndex]['doc_type_image'] as $image) {
                    $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                    $res = Curl::to($path)->asJson()->get();
                    $data = json_encode($res);
                    $arr = json_decode($data, true);

                    if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                        $nearlineId = $arr['edited_nearline_id'];
                        $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                    }
                    array_push($aData[$imageIndex]['img'], $imgPath); //img url
                }

                $aData[$imageIndex]['number_of_pages'] = ceil((count($aData[$imageIndex]['img'])) / 6);
            }
        }

        $aData['survey_outside_started'] = date('Y-m-d');

//        dd($aData);
        if ($resCDB) { //data is in couchDB

            $response = view('documents.ssr', [
                'data' => $aData
            ]);

        } else { //data is in f4db

            return false;
        }

        return $response;
    }

    public function printAgreement($id, $lang = 'nl')
    {

        $images['index'] = [

        ];

        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $id;

        $res = Curl::to($path)->asJson()->get();
        $oData = json_encode($res);
        $aData = json_decode($oData, true);

        $aData['lang'] = $lang;


        if ($res) { //data is in couchDB

            $response = view('documents.tsa', [
                'data' => $aData]);

        } else { //data is in f4db

            return false;
        }

        return $response;


    }

}
