<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ixudra\Curl\Facades\Curl;


class Document extends Model
{
    //
    public static function getData($id){
        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $id;

        $resCDB = Curl::to($path)->get();

        if($resCDB){
            $res = json_decode($resCDB, true);
            $res['server'] = '';
            if ($_ENV['DB_HOST'] == '192.168.101.34') {
                $res['server'] = 'Test';
            } else $res['server'] = 'Live';

            $res['survey_outside_started'] = date('Y-m-d');
            $res['survey_inside_finished'] = date('Y-m-d');
            $res['image_count_per_page'] = 4;

            return $res;
        }else return false;
    }

    public static function getImage($image){
        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
        $res = Curl::to($path)->get();
        $arr = json_decode($res, true);

        return $arr;
    }

    public static function getLocation($address){

        if($address){
            $street = str_replace(' ', '+', $address['street']);
            $houseNumber = str_replace(' ', '+', $address['house_number']);
            $postalCode = str_replace(' ', '+', $address['postal_code']);
            $city = str_replace(' ', '+', $address['city']);

            $path = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $street . '+' . $houseNumber . ',+' . $postalCode . '+' . $city . '&key=' . $_ENV['GOOGLE_API_KEY'];

            $res = Curl::to($path)->get();
            $data = json_decode($res, true);
            if ($res) {
                return $data['results'][0]['geometry']['location'];
            } else {
                return false;
            }
        }else{
            return false;
        }

    }
}
