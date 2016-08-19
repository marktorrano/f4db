<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Ixudra\Curl\Facades\Curl;
use DB;
use App\Models\Document;

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

        $aData = Document::getData($id);

        if ($aData) {
            $Image = new Document;
            //get coordinates from googleAPI
            $aData['geo_location'] = Document::getLocation($aData);
            if ($aData['geo_location']) {
                $aData['latitude'] = $aData['geo_location']['lat'];
                $aData['longitude'] = $aData['geo_location']['lng'];
            } else {
                $aData['latitude'] = '';
                $aData['longitude'] = '';
            }
            if (isset($aData['unit_details']['LU'])) {
                $aData['total_units'] = count($aData['unit_details']['LU']) + count($aData['unit_details']['BU-S']) + count($aData['unit_details']['BU-L']) + count($aData['unit_details']['SU']);
                $totalUnits = $aData['total_units'];
                $aData['total_units_number_of_pages'] = ceil($totalUnits / 37);
            }

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
                                $arr = $Image->getImage($image);
                                $imgRemarks = ' ';
                                if ($arr == null) {
                                    $imgPath = $_ENV['SURVINATOR'];
                                } else if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
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
                                $arr = $Image->getImage($image);
                                $imgRemarks = ' ';
                                if ($arr == null) {
                                    $imgPath = $_ENV['SURVINATOR'];
                                } else if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
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
                    $aData[$imageIndex]['img_remarks'] = [];
                    foreach ($aData[$imageIndex]['doc_type_image'] as $image) {
                        $arr = $Image->getImage($image);
                        $imgRemarks = ' ';
                        if ($arr == null) {
                            $imgPath = $_ENV['SURVINATOR'];
                        } else if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                            $nearlineId = $arr['edited_nearline_id'];
                            if (isset($arr['is_main']) && $arr['is_main'] == 1) {
                                $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            if (isset($arr['remarks'])) {
                                $imgRemarks = $arr['remarks'];
                            } else {
                                $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                        }
                        array_push($aData[$imageIndex]['img_remarks'], $imgRemarks);
                        array_push($aData[$imageIndex]['img'], $imgPath); //img url
                    }

                    $aData[$imageIndex]['number_of_pages'] = ceil((count($aData[$imageIndex]['img'])) / $aData['image_count_per_page']);
                }
            }
            $aData['fiber'] = [];
            if (isset($aData['customer_interested_in_fiber']['desired_fiber_photos'])) {
                foreach ($aData['customer_interested_in_fiber']['desired_fiber_photos'] as $intro) {
                    $fiber = new Document;
                    $intro['desired_fiber_address'];
                    $aRemarksOut = [];
                    $aPathsOut = [];
                    $aRemarksIn = [];
                    $aPathsIn = [];
                    foreach ($intro['outside']['doc_type_image'] as $image) {
                        $arr = $Image->getImage($image);
                        $imgRemarks = ' ';
                        if ($arr == null) {
                            $imgPath = $_ENV['SURVINATOR'];
                        } else if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
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
                        $arr = $Image->getImage($image);
                        $imgRemarks = ' ';
                        if ($arr == null) {
                            $imgPath = $_ENV['SURVINATOR'];
                        } else if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
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

                    array_push($aData['fiber'], $fiber);
                }
            }

            //data is in couchDB
//            dd($aData);
            $response = view('documents.ssr', [
                'data' => $aData
            ]);

        } else { //data is in f4db

            return response()->view('errors.404', ['error' => 'Oops! The document you are requesting was not found or is not ready...']);

        }

        return $response;
    }


    public function printAgreement($id, $lang)
    {
        //Define image arrays
        $images['index'] = [
            'facade',
            'intro_underground_proposal',
            'intro_on_facade_cabling_proposal'
        ];

        $aData = Document::getData($id);
        $Image = new Document;

        if ($aData) {
            $aData['image_count_per_page'] = 4;
            $aData['survey_outside_started'] = date('Y-m-d');
            $aData['survey_inside_finished'] = date('Y-m-d');
            $aData['lang'] = $lang;

            foreach ($images['index'] as $imageIndex) {
                if (isset($aData[$imageIndex]['doc_type_image'])) {
                    //Initialize arrays
                    $aData[$imageIndex]['img'] = [];
                    $aData[$imageIndex]['main_img'] = [];
                    $aData[$imageIndex]['img_remarks'] = [];
                    foreach ($aData[$imageIndex]['doc_type_image'] as $image) {
                        $arr = $Image->getImage($image);
                        $imgRemarks = ' ';
                        if (isset($arr['original_nearline_id']) || $arr['edited_nearline_id']) {
                            $nearlineId = $arr['edited_nearline_id'];
                            if (isset($arr['remarks'])) {
                                $imgRemarks = $arr['remarks'];
                            }
                            if (isset($arr['is_main']) && $arr['is_main'] == 1) {
                                $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            } else {
                                $aData[$imageIndex]['main_img'] = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                            }
                            $imgPath = $_ENV['SURVINATOR'] . '/image/' . $nearlineId;
                        }
                        array_push($aData[$imageIndex]['img_remarks'], $imgRemarks);
                        array_push($aData[$imageIndex]['img'], $imgPath);
                    }

                    $aData[$imageIndex]['number_of_pages'] = ceil((count($aData[$imageIndex]['img'])) / $aData['image_count_per_page']);
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

            $response = view('documents.tsa', [
                'data' => $aData]);
        } else { //data is in f4db

            return response()->view('errors.404', ['error' => 'Oops! The document you are requesting was not found...']);

        }

        return $response;


    }


}