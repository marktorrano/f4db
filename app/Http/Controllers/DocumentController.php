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
    public function printDocument($id, $lang = 'nl')
    {

        $images['index'] = [
            'facade',
            'access_to_telco_room',
            'floor_plan',
            'building_layout',
            'intro_on_facade_cabling_proposal',
            'intro_underground_proposal'
        ];

        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $id;

        $res = Curl::to($path)->asJson()->get();
        $oData = json_encode($res);
        $aData = json_decode($oData, true);

        foreach ($images['index'] as $imageIndex) {
            if (isset($aData[$imageIndex]['doc_type_image'])) {
                foreach ($aData[$imageIndex]['doc_type_image'] as $image) {
                    $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
                    $res = Curl::to($path)->asJson()->get();
                    $data = json_encode($res);
                    $arr = json_decode($data, true);

                    //get url from api http://survinator.fiber4belgium.be/api/auth $name and $password
                    $response = Curl::to($_ENV['SURVINATOR'] . '/api/auth')
                        ->withData([
                            'name'     => 'f4db',
                            'password' => 'Tr6lySxCh5z2KioS5Fe1'
                        ])
                        ->asJson(true)
                        ->post();

                    //TODO to be changed get nearlineId from couchDB for each image[index]
                    $nearlineId = 'Dpk0n9PoRyfNLm7yHiDwk0pl4KhQhZDS';

                    if (isset($response['token'])) {
                        //get image url http://survinator.fiber4belgium.be/api/image/Dpk0n9PoRyfNLm7yHiDwk0pl4KhQhZDS?token=[TOKEN]
                        $path = $_ENV['SURVINATOR'] . '/api/image/' . $nearlineId . '?token=' . $response['token'];
                        $resImg = Curl::to($path)
                            ->asJson(true)
                            ->get();

                        $aData[$imageIndex] = $resImg; //img url
                    }

                }
            }
        }

        dd($aData);


        if ($res) { //data is in couchDB

            if (isset($aData['bu_type']) && $aData['bu_type'] == 'msu' && $aData['nr_lu'] >= 1) {

                if ($aData['quandrant'] == 'a' || $aData['quandrant'] == 'c' || $aData['quandrant'] == 'e') {
                    $aData['hasTSA'] = true;
                }
            } else {
                $aData['hasTSA'] = false;
            }

            if ($lang == 'fr') {

                $response = view('documents.ssr-fr', [
                    'data' => $aData
                ]);
            }
            if ($lang == 'nl') {
                $response = view('documents.ssr-nl', [
                    'data' => $aData
                ]);
            }
        } else { //data is in f4db

            return false;
        }

        return $response;
    }

}
