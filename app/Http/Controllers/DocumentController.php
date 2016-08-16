<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use Ixudra\Curl\Facades\Curl;
use DB;
use App\Models\Image;

class DocumentController extends Controller
{
    //
    public function printReport($id, $lang)
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
            'horizontal_shaft_present_img',
            'vertical_shaft_present_img',
            'floor_plan',
            'building_layout'
        ];

        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $id;

        $resCDB = Curl::to($path)->asJson()->get();
        $oData = json_encode($resCDB);
        $aData = json_decode($oData, true);

        $aData['geo_location'] = $this->getLocation($aData);

        if($aData['geo_location']){
            $aData['latitude'] = $aData['geo_location']['lat'];
            $aData['longitude'] = $aData['geo_location']['lng'];
        }

        $aData['total_units'] = count($aData['unit_details']['LU']) + count($aData['unit_details']['BU-S']) + count($aData['unit_details']['BU-L']) + count($aData['unit_details']['SU']);
        $totalUnits = $aData['total_units'];
        $aData['total_units_number_of_pages'] = ceil($totalUnits / 37);

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
            if (isset($aData[$imageIndex]) && ($imageIndex == 'copper_intro')) {
                $aData['copper_intro']['img_outside'] = []; //initialize img outside array
                $aData['copper_intro']['img_outside_remarks'] = []; //initialize img outside array
                $aData['copper_intro']['img_inside'] = []; //initialize img inside array
                $aData['copper_intro']['img_inside_remarks'] = []; //initialize img inside array
                $imgCount = 0;
                if ($aData['copper_intro'] && isset($aData['copper_intro']['copper_intro_photos'])) {
                    if (isset($aData['copper_intro']['copper_intro_photos'][0]['outside']['doc_type_image'])) {
                        foreach ($aData['copper_intro']['copper_intro_photos'][0]['outside']['doc_type_image'] as $image) {
                            $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                            $res = Curl::to($path)->asJson()->get();
                            $data = json_encode($res);
                            $arr = json_decode($data, true);
                            $imgRemarks = '';
                            if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                                $nearlineId = $arr['edited_nearline_id'];
                                $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                                if (isset($arr['remarks'])) {
                                    $imgRemarks = $arr['remarks'];
                                }
                            }
                            array_push($aData['copper_intro']['img_outside_remarks'], $imgRemarks); //img remarks outside
                            array_push($aData['copper_intro']['img_outside'], $imgPath); //img url outside
                            $imgCount++;
                        }
                        $aData['copper_intro']['img_outside_pages'] = ceil($imgCount / 6);
                        $imgCount = 0;
                    }
                    if (isset($aData['copper_intro']['copper_intro_photos'][0]['inside']['doc_type_image'])) {
                        foreach ($aData['copper_intro']['copper_intro_photos'][0]['inside']['doc_type_image'] as $image) {
                            $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                            $res = Curl::to($path)->asJson()->get();
                            $data = json_encode($res);
                            $arr = json_decode($data, true);
                            $imgRemarks = '';
                            if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                                $nearlineId = $arr['edited_nearline_id'];
                                $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            if (isset($arr['remarks'])) {
                                $imgRemarks = $arr['remarks'];
                            }
                            array_push($aData['copper_intro']['img_inside_remarks'], $imgRemarks); //img remarks inside
                            array_push($aData['copper_intro']['img_inside'], $imgPath); //img url inside
                            $imgCount++;
                        }
                        $aData['copper_intro']['img_inside_pages'] = ceil($imgCount / 6);
                    }

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
                        if (isset($arr['is_main']) && $arr['is_main'] == 1) {
                            $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                        }
                        if (isset($arr['is_main']) && $arr['is_main'] == 1) {
                            $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                        } else {
                            $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                        }
                        $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                    }
                    array_push($aData[$imageIndex]['img'], $imgPath); //img url
                }

                $aData[$imageIndex]['number_of_pages'] = ceil((count($aData[$imageIndex]['img'])) / 6);
            }
        }
        $aData['fiber'] = [];
        if (isset($aData['customer_interested_in_fiber']['desired_fiber_photos'])) {
            foreach ($aData['customer_interested_in_fiber']['desired_fiber_photos'] as $intro) {
                $fiber = new Image();
                $intro['desired_fiber_address'];
                foreach ($intro['outside']['doc_type_image'] as $image) {
                    $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                    $res = Curl::to($path)->asJson()->get();
                    $data = json_encode($res);
                    $arr = json_decode($data, true);
                    if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                        $nearlineId = $arr['edited_nearline_id'];
                        $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                    }
                    if (isset($arr['remarks'])) {
                        $imgRemarks = $arr['remarks'];
                    }
                    $aRemarksOut[] = $imgRemarks;
                    $aPathsOut[] = $imgPath;
                }
                foreach ($intro['inside']['doc_type_image'] as $image) {
                    $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                    $res = Curl::to($path)->asJson()->get();
                    $data = json_encode($res);
                    $arr = json_decode($data, true);
                    if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                        $nearlineId = $arr['edited_nearline_id'];
                        $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                    }
                    if (isset($arr['remarks'])) {
                        $imgRemarks = $arr['remarks'];
                    }
                    $aRemarksIn[] = $imgRemarks;
                    $aPathsIn[] = $imgPath;
                }

                $fiber->address = $intro['desired_fiber_address'];

                $fiber->remarksOut = $aRemarksOut;
                $fiber->imagesOut = $aPathsOut;

                $fiber->remarksIn = $aRemarksIn;
                $fiber->imagesIn = $aPathsIn;

                $fiber->numberOfImages = count($aPathsIn) + count($aPathsOut);

                array_push($aData['fiber'], json_decode($fiber, true));
            }
        }

        $aData['survey_outside_started'] = date('Y-m-d');
        $aData['survey_inside_finished'] = date('Y-m-d');

        if ($resCDB) { //data is in couchDB

            $response = view('documents.ssr', [
                'data' => $aData
            ]);

        } else { //data is in f4db

            return false;
        }

        return $response;
    }

    public function getLocation($address)
    {

        $street = str_replace(' ', '+', $address['street']);
        $houseNumber = str_replace(' ', '+', $address['house_number']);
        $postalCode = str_replace(' ', '+', $address['postal_code']);
        $city = str_replace(' ', '+', $address['city']);

        $path = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $street . '+' . $houseNumber . ',+' . $postalCode . '+' . $city . '&key=' . $_ENV['GOOGLE_API_KEY'];

        $res = Curl::to($path)->asJson()->get();
        $res = json_encode($res);
        $data = json_decode($res, true);
        if($res){
            return $data['results'][0]['geometry']['location'];
        }else {
            return false;
        }
    }

    public function printAgreement($id, $lang)
    {

        $images['index'] = [
            'facade',
            'intro_underground_proposal',
            'intro_on_facade_cabling_proposal'

        ];

        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $id;

        $res = Curl::to($path)->asJson()->get();
        $oData = json_encode($res);
        $aData = json_decode($oData, true);

        $aData['lang'] = $lang;
        foreach ($images['index'] as $imageIndex) {
            if (isset($aData[$imageIndex]['doc_type_image'])) {
                $aData[$imageIndex]['img'] = []; //initialize img array
                $aData[$imageIndex]['main_img'] = [];
                foreach ($aData[$imageIndex]['doc_type_image'] as $image) {
                    $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                    $res = Curl::to($path)->asJson()->get();
                    $data = json_encode($res);
                    $arr = json_decode($data, true);

                    if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                        $nearlineId = $arr['edited_nearline_id'];
                        if (isset($arr['is_main']) && $arr['is_main'] == 1) {
                            $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                        } else {
                            $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                        }
                        $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                    }
                    array_push($aData[$imageIndex]['img'], $imgPath); //img url
                }

                $aData[$imageIndex]['number_of_pages'] = ceil((count($aData[$imageIndex]['img'])) / 6);
            }
        }
        $totalLu = 0;
        $aData['total_lu'] = [];
        if (isset($aData['nr_lu'])) {
            $totalLu += $aData['nr_lu'];
        }
        if (isset($aData['nr_bu_s'])) {
            $totalLu += $aData['nr_bu_s'];
        }
        if (isset($aData['nr_bu_l'])) {
            $totalLu += $aData['nr_bu_l'];
        }
        if (isset($aData['nr_su'])) {
            $totalLu += $aData['nr_su'];
        }
        $aData['total_lu'] = $totalLu;

        if ($res) { //data is in couchDB

            $response = view('documents.tsa', [
                'data' => $aData]);

        } else { //data is in f4db

            return false;
        }

        return $response;


    }


}