<?php

/**
 * Fiber 4 Belgium Model
 *
 * @author Jurjen Beukenhorst <jurjen.beukenhorst@jfs.be>
 * @copyright Copyright (c) Janssens Field Services 2016
 */

namespace App\Models;

use Doctrine\CouchDB\HTTP\HTTPException;
use Doctrine\CouchDB\View\DesignDocument as DoctrineDesignDocument;

/**
 * Fiber4Belgium
 */
class Fiber4Belgium
{
    /**
     * Building fields
     * @access public
     * @var array
     */
    public static $buildingFields = [
        'building-lam-key'                    => 'lam_mk',
        'building-lam-street-code'            => 'lam_street_code',
        'building-street'                     => 'street',
        'building-house-number'               => 'house_number',
        'building-house-number-suffix'        => 'house_number_suffix',
        'building-postal-code'                => 'postal_code',
        'building-city'                       => 'city',
        'building-suburb'                     => 'suburb',
        'building-lambert-pos-x'              => 'lam_pos_x',
        'building-lambert-pos-y'              => 'lam_pos_y',
        'building-name'                       => 'name',
        'building-wall-mount'                 => 'wall_mount',
        'building-survey-reason'              => 'survey_reason',
        'building-number-floors'              => 'numbr_floors',
        'building-height-cable'               => 'height_cable',
        'building-vertical-cabling-type-orig' => 'vertical_cabling_type_orig',
        'building-vertical-cabling-type-new'  => 'vertical_cabling_type_new',
        'building-intro-tube'                 => 'intro_tube',
        'building-survey-flag'                => 'survey_flag',
        'cadaster'                            => 'cadaster',
        'fiberhood'                           => 'fiberhood',
        'loop'                                => 'loop',
        'loop-bloc'                           => 'loop_bloc',
        'main-address'                        => 'main_address',
        'building-secondary-address'          => 'secondary_address',
        'building-quadrant'                   => 'quadrant',
        'building-distribution'               => 'planned_distribution',
        'building-protected-facade'           => 'patrimony',
        'mdu-sdu'                             => 'bu_type',
        'ifh-building-survey-action'          => 'ifh_building_survey_action',
    ];

    /**
     * Unit fields
     * @access public
     * @var array
     */
    public static $unitFields = [
        'uluid'                                   => 'uluid',
        'f4db-created'                            => 'f4db_created',
        'changed'                                 => 'changed',
        'source-id'                               => 'source_id',
        'source-type'                             => 'source_type',
        'username'                                => 'username',
        'fiberhood'                               => 'fiberhood',
        'loop'                                    => 'loop',
        'loop-bloc'                               => 'loop_bloc',
        'survey-state'                            => 'survey_state',
        'survey-state-surveyor'                   => 'survey_state_surveyor',
        'survey-state-surveyor-jfs-id'            => 'survey_state_surveyor_jfs_id',
        'building-group-id'                       => 'building_group_id',
        'building-group-name'                     => 'building_group_name',
        'unit-lu-key'                             => 'lu_key',
        'unit-sequence'                           => 'sequence',
        'unit-number-termination-points'          => 'number_termination_points',
        'unit-postal-box'                         => 'postal_box',
        'unit-apartment'                          => 'apartment',
        'unit-building-block'                     => 'building_block',
        'unit-floor-number'                       => 'floor_number',
        'unit-other-ref'                          => 'other_ref',
        'inside-survey-flag'                      => 'survey_inside_flag',
        'unit-cadaster-flag'                      => 'cadaster_flag',
        'unit-cadaster-details'                   => 'cadaster_details',
        'unit-cadaster-type'                      => 'cadaster_type',
        'unit-cadaster-type-description'          => 'cadaster_type_description',
        'unit-cadaster-subtype'                   => 'cadaster_subtype',
        'unit-intro-street'                       => 'intro_street',
        'unit-intro-house-number'                 => 'intro_house_number',
        'unit-intro-house-number-suffix'          => 'intro_house_number_suffix',
        'unit-intro-city'                         => 'intro_city',
        'unit-intro-postal-code'                  => 'intro_postal_code',
        'unit-f4b-comment'                        => 'f4b_comment',
        'survey-outside-survinator-received'      => 'survey_outside_survinator_received',
        'survey-outside-started'                  => 'survey_outside_started',
        'survey-outside-finished'                 => 'survey_outside_finished',
        'survey-inside-started'                   => 'survey_inside_started',
        'survey-inside-finished'                  => 'survey_inside_finished',
        'survey-inside-validation'                => 'survey_inside_validation',
        'survey-outside-design-validation'        => 'survey_outside_design_validation',
        'underground-permit-requested'            => 'underground_permit_requested',
        'underground-permit-feedback-expected'    => 'underground_permit_feedback_expected',
        'underground-permit-feedback-received'    => 'underground_permit_feedback',
        'underground-permit-approval'             => 'underground_permit_approval',
        'construction-start-estimate'             => 'construction_start_estimate',
        'construction-started'                    => 'construction_started',
        'construction-intro-start'                => 'construction_intro_start',
        'construction-riser-start'                => 'construction_riser_start',
        'construction-unit-start'                 => 'construction_unit_start',
        'operator-acceptance-intro'               => 'operator_acceptance_intro',
        'operator-acceptance-riser'               => 'operator_acceptance_riser',
        'operator-acceptance-unit'                => 'operator_acceptance_unit',
        'customer-interested-in-fiber'            => 'customer_interested_in_fiber',
        'syndic'                                  => 'syndic',
        'owner'                                   => 'owner',
        'acp-vme'                                 => 'acp',
        'occupant'                                => 'occupant',
        'company'                                 => 'company',
        'name'                                    => 'name',
        'address'                                 => 'address',
        'postal-code'                             => 'postal_code',
        'city'                                    => 'city',
        'country'                                 => 'country',
        'phone'                                   => 'phone',
        'email'                                   => 'email',
        'date'                                    => 'date',
        'internal-ref'                            => 'internal_ref',
        'comment'                                 => 'comment',
        'language-preference'                     => 'language_preference',
        'date-ssv-draft'                          => 'date_ssv_draft',
        'date-ssv-validation-f4b'                 => 'date_ssv_validation_f4b',
        'date-tpa-sent-proximus'                  => 'date_tpa_sent_proximus',
        'existing-infrastructure-electricity'     => 'existing_infrastructure_electricity',
        'existing-infrastructure-coax'            => 'existing_infrastructure_coax',
        'existing-infrastructure-multitaps'       => 'existing_infrastructure_multitaps',
        'existing-infrastructure-public-lighting' => 'existing_infrastructure_public_lighting',
        'utac'                                    => 'utac',
        'inside-technical-room-present'           => 'insde_technical_room_present',
        'inside-cdf-present'                      => 'insde_cdf_present',
        'inside-cdf-connection-type'              => 'insde_cdf_connection_type',
        'inside-electrical-installation-present'  => 'insde_electrical_installation_present',
        'inside-existing-vertical-cabling'        => 'insde_existing_vertical_cabling',
        'inside-existing-vertical-cabling-type'   => 'insde_existing_vertical_cabling_type',
        'inside-coax-installation-present'        => 'insde_coax_installation_present',
        'street-objects'                          => 'street_objects',
        'street-objects-remarks'                  => 'street_objects_remarks',
        'street-obstructions'                     => 'street_obstructions',
        'street-obstructions-remarks'             => 'street_obstructions_remarks',
        'general-situation-remarks'               => 'general_situation_remarks',
        'splitter'                                => 'splitter',
        'vertical-shaft-present'                  => 'vertical_shaft_present',
        'vertical-shaft-accessible'               => 'vertical_shaft_accessible',
        'horizontal-shaft-present'                => 'horizontal_shaft_present',
        'horizontal-shaft-accessible'             => 'horizontal_shaft_accessible',
        'area-id'                                 => 'area_id',
        'area-name'                               => 'area_name',
        'unit-lam-subaddress-key'                 => 'lam_subaddress_key',
        'building-lam-city-code'                  => 'lam_city_code',
        'ifh-status'                              => 'ifh_status',
        'ifh-building-group-survey-action'        => 'ifh_building_group_survey_action',
        'ifh-unit-type'                           => 'ifh_unit_type',
        'ifh-unit-survey-action'                  => 'ifh_unit_survey_action',
        'ifh-building-comments'                   => 'ifh_building_comments',
        'ifh-unit-comments'                       => 'ifh_unit_comments',
        'internal-jfs'                            => 'internal_jfs',
        'internal-jacops'                         => 'internal_jacops',
        'internal-fabricom'                       => 'internal_fabricom',
        'site-survey-report-nr'                   => 'survey_site_report_nr',
    ];

    /**
     * getData()
     */
    public static function getData($term)
    {
        $client = new \GuzzleHttp\Client;

        $term = urlencode($term);

        $res = $client->request('GET', "https://f4db.fiber4belgium.be/api/v1/export/search?term=$term&format=survey", [
            'auth' => ['jurjen.beukenhorst', 'LajOshyopec8']
        ]);

        return json_decode($res->getBody()->getContents());
    }

    /**
     * couchDb
     */
    public static function couchdb()
    {
        $connection = \DB::connection('couchdb');
        $couchdb = $connection->getCouchDB();
        $couchdb->createDesignDocument('documents', new DesignDocument());

        $queryLamMk = $couchdb->createViewQuery('documents', 'by_lam_mk');
        $queryLamMk->setReduce(false);
        $queryLamMk->setIncludeDocs(true);

        $queryUluid = $couchdb->createViewQuery('documents', 'by_uluid');
        $queryUluid->setReduce(false);
        $queryUluid->setIncludeDocs(true);

        $return = new \stdClass;
        $return->couchdb = $couchdb;
        $return->queryLamMk = $queryLamMk;
        $return->queryUluid = $queryUluid;
        return $return;
    }

    /**
     * getAttachment()
     */
    public static function getAttachment($couchdb, $id, $fileName)
    {
        $attachmentPath = '/' . $couchdb->getDatabase() . '/' . $id . '/' . $fileName;
        $response = $couchdb->getHttpClient()->request('GET', $attachmentPath, null, true);

        if ($response->status != 200) {
            throw HTTPException::fromResponse($attachmentPath, $response);
        }

        return $response->body;
    }
}


/**
 * DesignDocument
 */
class DesignDocument implements DoctrineDesignDocument
{
    public function getData()
    {
        return [
            'language' => 'javascript',
            'views' => [
                'by_lam_mk' => [
                    'map' => 'function(doc) {
                        if(doc.type == \'building\') {
                            emit(doc.lam_mk, doc._id);
                        }
                    }',
                    'reduce' => '_count'
                ],

                'by_uluid' => [
                    'map' => 'function(doc) {
                        if(doc.type == \'unit\') {
                            emit(doc.uluid, doc._id);
                        }
                    }',
                    'reduce' => '_count'
                ],
            ],
        ];
    }
}
