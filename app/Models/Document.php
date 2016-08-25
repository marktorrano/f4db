<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Ixudra\Curl\Facades\Curl;


class Document extends Model
{
    //
    public static function getData($id, $lang)
    {
        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $id;

        $resCDB = Curl::to($path)->get();
        if ($resCDB) {
            $res = json_decode($resCDB, true);

            $res['server'] = '';
            if ($_ENV['DB_HOST'] == '192.168.101.34') {
                $res['server'] = 'Test';
            } else $res['server'] = 'Live';

            if (isset($res['unit_details']['LU'])) {
                $res['total_units'] = count($res['unit_details']['LU']) + count($res['unit_details']['BU-S']) + count($res['unit_details']['BU-L']) + count($res['unit_details']['SU']);
                $totalUnits = $res['total_units'];
                $res['total_units_number_of_pages'] = ceil($totalUnits / 37);
            }

            $res['lang'] = $lang;
            if (isset($res['bu_type']) && $res['bu_type'] == 'mdu' && isset($res['nr_lu']) && $res['nr_lu'] >= 1) {
                if (isset($res['quadrant'])) {
                    if ($res['quadrant'] == 'a' || $res['quadrant'] == 'c' || $res['quadrant'] == 'e') {
                        $res['hasTSA'] = true;
                    }
                }
            } else {
                $res['hasTSA'] = false;
            }

            $res['survey_outside_started'] = date('Y-m-d');
            $res['survey_inside_finished'] = date('Y-m-d');
            $res['image_count_per_page'] = 4;

            LOG::info('Lam MK: ' . $res['lam_mk'] . ' has been opened');

            return $res;
        } else return false;
    }

    public static function getImage($image)
    {
        $path = 'http://' . $_ENV['DB_USERNAME'] . ':' . $_ENV['DB_PASSWORD'] . '@' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . '/' . $_ENV['DB_DATABASE'] . '/' . $image;
        $res = Curl::to($path)->get();
        $arr = json_decode($res, true);

        if($res){
            Log::info($image . ' = '. $arr['edited_nearline_id']);
            return $arr;
        }else {
            Log::warning($image . ' has no nearline id ');
            return false;
        }

    }

    public static function getLocation($address)
    {

        if ($address) {
            $street = str_replace(' ', '+', $address['street']);
            $houseNumber = str_replace(' ', '+', $address['house_number']);
            $postalCode = str_replace(' ', '+', $address['postal_code']);
            $city = str_replace(' ', '+', $address['city']);

            $path = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $street . '+' . $houseNumber . ',+' . $postalCode . '+' . $city . '&key=' . $_ENV['GOOGLE_API_KEY'];

            $res = Curl::to($path)->get();
            $data = json_decode($res, true);
            if ($res) {
                $data['latitude'] = $data['results'][0]['geometry']['location']['lat'];
                $data['longitude'] = $data['results'][0]['geometry']['location']['lng'];
                return $data;
            } else {
                $data['latitude'] = '';
                $data['longitude'] = '';
            }
        } else {
            return false;
        }

    }
}
