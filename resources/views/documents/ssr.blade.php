@extends('layouts.app')


@section('content')

    @if($data['lang'] == 'nl')
        <?php require_once(app_path() . '/includes/ssr_nl.php') ?>
        @push('styles')
        <link rel="stylesheet" href="{{asset('assets/css/ssr-nl.css')}}"/>
        @endpush
    @else
        <?php require_once(app_path() . '/includes/ssr_fr.php') ?>
        @push('styles')
        <link rel="stylesheet" href="{{asset('assets/css/ssr-fr.css')}}"/>
        @endpush
    @endif

    <style>
        pre {
            font-size: 11px;
        }

        @media print {
            .header {
                position: absolute;
                margin-top: -1cm;
                height: 2cm;
                width: 170mm;
                background-image: url({{asset('assets/img/header_logo_proximus.png')}}) !important;
                background-repeat: no-repeat !important;
            }

            h1, h3, h4, h5, h6 {
                color: rgb(92, 45, 145) !important;
            }

            h2 {
                font-family: "Proximus-Regular", "Courier New", Courier, monospace;
                font-size: 26px;
                color: rgb(0, 164, 193) !important;
            }

        }

    </style>

    <div class="book" style="position: relative">

        {{--Front Page--}}
        <div class="page index">
            <div class="header index">
                <div class="headerTitle">
                    <?=$t['page01.headerTitle']?>
                </div>
            </div>
            <div class="subpage index">
                <div class="facade-img">
                    @if(isset($data['facade']['img']))
                        @foreach(($data['facade']['img']) as $imgUrl)
                            <img src="{!! $imgUrl !!}">
                        @endforeach
                    @endif
                </div>
                <br>
                <br>
                <br>
                <h3><?=$t['page01.adressesMdu']?></h3>
                <div>
                    <table>
                        <tr>
                            <td><?=$t['page01.adresses']?></td>
                            <td>
                                <ul class="list">
                                    <li>
                                        {!!  $data['street'] . ' ' . $data['house_number'] . ', ' . $data['postal_code'] . ' ' . $data['city']!!}
                                    </li>
                                    @if(isset($data['secondary_address']))
                                        @foreach($data['secondary_address'] as $address)
                                            <li>
                                                {!!  $address['street'] . ' ' . $address['house_number'] . ', ' . $address['postal_code'] . ' ' . $address['city']!!}
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="footer index"></div>
        </div>

        {{--General Information--}}
        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">

                <h3><?=$t['page02.h3.generalInformation']?></h3>

                <div>
                    <div id="general_information">
                        <div>
                            <li><?=$t['page02.li.dateSurvey']?><?php ?>
                                @if(isset($data['survey_outside_started']))
                                    <span>{!! $data['survey_outside_started'] !!}</span> @endif</li>
                            <li><?=$t['page02.li.dateFile']?>@if(isset($data['survey_inside_finished']))
                                    <span>{!! $data['survey_inside_finished'] !!}</span>  @endif</li>
                            <li><?=$t['page02.li.refSyndic']?></li>
                        </div>
                        <div>
                            <li><?=$t['page02.li.numberUnits']?>
                                LU:<span> @if(isset($data['nr_lu'])){!! $data['nr_lu'] !!}@else
                                        0</span> @endif</li>
                            <li><?=$t['page02.li.numberUnits']?>
                                BU-S:<span> @if(isset($data['nr_bu_s'])){!! $data['nr_bu_s'] !!}@else
                                        0</span> @endif</li>
                            <li><?=$t['page02.li.numberUnits']?>
                                BU-L:<span> @if(isset($data['nr_bu_l'])){!! $data['nr_bu_l'] !!}@else
                                        0</span> @endif</li>
                            <li><?=$t['page02.li.numberUnits']?>
                                NR-SU:<span> @if(isset($data['nr_su'])){!! $data['nr_su'] !!}@else
                                        0</span> @endif</li>
                            <li><?=$t['page02.li.numberFloors']?>
                                <span> @if(isset($data['nr_total'])){!! $data['nr_total'] !!}</span> @endif
                            </li>
                        </div>
                    </div>
                </div>
                <ul style="clear:both">

                </ul>

                <h3><?=$t['page02.h3.informationSyndicAcpOwner']?></h3>

                <table>
                    <thead>
                    <tr>
                        <th><?=$t['page02.th.syndicAcpOwner']?></th>
                        <th><?=$t['page02.th.contact']?></th>
                        <th><?=$t['page02.th.email']?></th>
                        <th><?=$t['page02.th.phone']?></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data['syndic']))
                        @foreach($data['syndic'] as $syndic)
                            <tr>
                                <td>@if(isset($syndic['name'])){!! ucwords($syndic['name']) !!} - Syndic @endif</td>
                                <td>@if(isset($syndic['name_contact'])){!! ucwords($syndic['name_contact']) !!} @endif</td>
                                <td>@if(isset($syndic['email'])){!! $syndic['email'] !!} @endif</td>
                                <td>@if(isset($syndic['primary_phone_contact'])){!! $syndic['primary_phone_contact'] !!} @endif</td>
                            </tr>
                        @endforeach
                    @endif
                    @if(isset($data['acp']))
                        @foreach($data['acp'] as $acp)
                            <tr>
                                <td>@if(isset($acp['name'])){!! ucwords($acp['name']) !!} - ACP @endif</td>
                                <td>@if(isset($acp['name_contact'])){!! ucwords($acp['name_contact']) !!} @endif</td>
                                <td>@if(isset($acp['email'])){!! $acp['email'] !!} @endif</td>
                                <td>@if(isset($acp['primary_phone_contact'])){!! $acp['primary_phone_contact'] !!} @endif</td>
                            </tr>
                        @endforeach
                    @endif
                    @if(isset($data['owner']))
                        @foreach($data['owner'] as $owner)
                            <tr>
                                <td>@if(isset($owner['name'])){!! $owner['name'] !!} - Propriétaire @endif</td>
                                <td>@if(isset($owner['name_contact'])){!! $owner['name_contact'] !!} @endif</td>
                                <td>@if(isset($owner['email'])){!! $owner['email'] !!} @endif</td>
                                <td>@if(isset($owner['primary_phone_contact'])){!! $owner['primary_phone_contact'] !!} @endif</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>


                <h3><?=$t['page02.h3.presentDuringVisit']?></h3>

                <table>
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data['present_during_visit']))
                        @foreach($data['present_during_visit'] as $pdv)
                            <tr>
                                <td>@if(isset($pdv['name'])){!! $pdv['name'] !!}@endif</td>
                                <td>@if(isset($pdv['email'])){!! $pdv['email'] !!}@endif</td>
                                <td>@if(isset($pdv['primary_phone_contact'])){!! $pdv['primary_phone_contact'] !!}@endif</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>


                <h3><?=$t['page02.h3.introFiberhoodCadasterIfh']?></h3>

                <table>
                    <thead>
                    <tr>
                        <th><?=$t['page02.th.name']?></th>
                        <th><?=$t['page02.th.reference']?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?=$t['page02.td.fiberhood']?></td>
                        <td>@if(isset($data['fiberhood'])){!! $data['fiberhood'] !!}@endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.cadaster']?></td>
                        <td>@if(isset($data['cadaster'])){!! $data['cadaster'] !!}@endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.mduLamKeyIfm']?></td>
                        <td>@if(isset($data['lam_mk'])){!! $data['lam_mk'] !!}@endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.plannedDistribution']?></td>
                        <td>@if(isset($data['planned_distribution'])){!! ucwords($data['planned_distribution']) !!}@endif</td>
                    </tr>
                    </tbody>
                </table>


                <h3><?=$t['page02.table.h3.visualFacadeAndStreet']?></h3>

                <table>
                    <thead>
                    <tr>
                        <th><?=$t['page02.th.facade']?></th>
                        <th><?=$t['page02.th.details']?></th>
                        <th><?=$t['page02.th.yesNo']?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?=$t['page02.td.facadeType']?></td>
                        <td>@if(isset($data['patrimony_remarks'])){!! $data['patrimony_remarks'] !!}@endif</td>
                        <td>@if(isset($data['patrimony'])) @if($data['patrimony'] == 'yes') <?=$t['yes']?> @if($data['patrimony'] == 'no') <?=$t['no']?>  @else
                                &nbsp; @endif @endif @endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.electricalCablesPresent']?></td>
                        <td>@if(isset($data['existing_infrastructure_electricity_remarks'])){!! $data['existing_infrastructure_electricity_remarks'] !!}@endif</td>
                        <td>@if(isset($data['existing_infrastructure_electricity']))
                                @if($data['existing_infrastructure_electricity'] == 'yes') <?=$t['yes']?>
                                @else <?=$t['no']?>
                                @endif
                            @endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.coaxCablesPresent']?></td>
                        <td>@if(isset($data['existing_infrastructure_public_lighting_remarks'])){!! $data['existing_infrastructure_public_lighting_remarks'] !!}@endif</td>
                        <td>@if(isset($data['existing_infrastructure_public_lighting']))
                                @if($data['existing_infrastructure_public_lighting'] == 'yes') <?=$t['yes']?>
                                @else <?=$t['no']?>
                                @endif
                            @endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.multiTapCoaxPresent']?></td>
                        <td>@if(isset($data['existing_infrastructure_multitaps_remarks'])){!! $data['existing_infrastructure_multitaps_remarks'] !!}@endif</td>
                        <td>@if(isset($data['existing_infrastructure_multitaps']))
                                @if($data['existing_infrastructure_multitaps'] == 'yes') <?=$t['yes']?>
                                @else <?=$t['no']?>
                                @endif
                            @endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.publicLightningPresent']?></td>
                        <td>@if(isset($data['existing_infrastructure_public_lighting_remarks'])){!! $data['existing_infrastructure_public_lighting_remarks'] !!}@endif</td>
                        <td>@if(isset($data['existing_infrastructure_public_lighting']))
                                @if($data['existing_infrastructure_public_lighting'] == 'yes') <?=$t['yes']?>
                                @else <?=$t['no']?>
                                @endif
                            @endif</td>
                    </tr>
                    </tbody>
                </table>
                <ul class="list">
                    <li><?=$t['page02.li.remarks']?> @if(isset($data['publicity_remarks'])){!! ucfirst($data['publicity_remarks']) !!} @endif</li>
                </ul>

                <br>
                <table>
                    <thead>
                    <tr>
                        <th><?=$t['page02.th.street']?></th>
                        <th><?=$t['page02.th.details']?></th>
                        <th><?=$t['page02.th.yesNo']?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?=$t['page02.td.streetFurniture']?></td>
                        <td>@if(isset($data['street_objects_remarks'])){!! $data['street_objects_remarks'] !!}@endif</td>
                        <td>@if(isset($data['street_objects']))
                                @if($data['street_objects'] == 'yes') <?=$t['yes']?>
                                @else <?=$t['no']?>
                                @endif
                            @endif </td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.facadeObstruction']?></td>
                        <td>@if(isset($data['street_obstructions_remarks'])){!! $data['street_obstructions_remarks'] !!}@endif</td>
                        <td>@if(isset($data['street_obstructions']))
                                @if($data['street_obstructions'] == 'yes') <?=$t['yes']?>
                                @else<?=$t['no']?>
                                @endif
                            @endif </td>
                    </tr>
                    </tbody>
                </table>
                <ul class="list">
                    <li><?=$t['page02.li.remarks']?> @if(isset($data['general_situation_remarks'])) {!! ucfirst($data['general_situation_remarks']) !!}@endif </li>
                </ul>


            </div>
            <div class="footer"></div>
        </page>

        {{--Installation Page--}}
        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">

                <h3><?=$t['page03.h3.existingTelcoInstall']?></h3>

                <div class="existing-telco">
                    <table>
                        <tbody>
                        <tr>
                            <th colspan="2" width="212">
                                <strong><?=$t['page03.th.repariteurType']?> Copper Intro</strong>
                            </th>
                            <th colspan="4" width="434">
                                <strong>
                                    &nbsp; @if(isset($data['coper_intro_type'])) @if($data['coper_intro_type'] == 'new') <?= $t['new'] ?> @else <?= $t['old'] ?> @endif @endif</strong>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table>
                        <tbody>
                        <tr id="equipment">
                            <th width="157">
                                <strong><?=$t['page03.th.tools']?></strong>
                            </th>
                            <th width="90">
                                <strong><?=$t['page03.th.hdpe']?></strong>
                            </th>
                            <th width="90">
                                <strong><?=$t['page03.th.lasbox']?></strong>
                            </th>
                            <th width="90">
                                <strong><?=$t['page03.th.fiber']?></strong>
                            </th>
                            <th width="90">
                                <strong><?=$t['page03.th.rack']?></strong>
                            </th>
                            <th width="130">
                                <strong><?=$t['page03.th.subduct']?></strong>
                            </th>
                        </tr>
                        <tr id="equipment-answer">
                            <td width="157">&nbsp;</td>
                            <td width="90">@if(isset($data['equipment_present']) && ($data['equipment_present'] == 'hdpe'))
                                    X @endif</td>
                            <td width="90">@if(isset($data['equipment_present']) && ($data['equipment_present'] == 'splice_box'))
                                    X @endif</td>
                            <td width="90">@if(isset($data['equipment_present']) && ($data['equipment_present'] == 'fiber'))
                                    X @endif</td>
                            <td width="90">@if(isset($data['equipment_present']) && ($data['equipment_present'] == 'rack'))
                                    X @endif</td>
                            <td width="130">@if(isset($data['equipment_present']) && ($data['equipment_present'] == 'subduct'))
                                    X @endif </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table>
                        <tbody>
                        <tr>
                            <th colspan="2" width="212">
                                <strong><?=$t['page03.th.existingTechnicalAdvantage']?></strong>
                            </th>
                            <th colspan="2" width="138">
                                <strong><?=$t['page03.th.yesNo']?></strong>
                            </th>
                            <th colspan="2" width="296">
                                <strong><?=$t['page03.th.accessible']?> </strong>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;<?=$t['page03.td.vertical']?>
                            </td>
                            <td colspan="2"
                                width="138">@if(isset($data['vertical_shaft_present'])) @if($data['vertical_shaft_present'] == 'no' || $data['vertical_shaft_present'] == 'no-accessible') <?= $t['no']?> @else <?= $t['yes']?>  @endif @endif</td>
                            <td colspan="2"
                                width="296">@if(isset($data['vertical_shaft_present']) && ($data['vertical_shaft_present'] == 'no-accessible' || $data['vertical_shaft_present'] == 'yes-accessible')) @if($data['vertical_shaft_present'] == 'no-accessible') <?= $t['no']?> @else <?= $t['yes']?> @endif @endif</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;<?=$t['page03.td.horizontal']?>
                            </td>
                            <td colspan="2"
                                width="138">@if(isset($data['horizontal_shaft_present'])) @if($data['horizontal_shaft_present'] == 'no' || $data['horizontal_shaft_present'] == 'no-accessible') <?= $t['no']?> @else <?= $t['yes']?>  @endif @endif</td>
                            <td colspan="2"
                                width="296">@if(isset($data['horizontal_shaft_present']) && ($data['horizontal_shaft_present'] == 'no-accessible' || $data['horizontal_shaft_present'] == 'yes-accessible') ) @if($data['vertical_shaft_present'] == 'no-accessible') <?= $t['no']?> @else <?= $t['yes']?> @endif @endif</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;<?=$t['page03.td.electricity']?>&eacute;
                            </td>
                            <td colspan="4"
                                width="434">@if(isset($data['electricity_in_telco'])) @if($data['electricity_in_telco'] == 'no-accessible') <?= $t['no']?> @else <?= $t['yes']?> @endif @endif</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;<?=$t['page03.td.detailsHt']?>&nbsp;
                            </td>
                            <td colspan="4"
                                width="434">@if(isset($data['installation_remarks'])){!! ucfirst($data['installation_remarks']) !!} @endif</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;<?=$t['page03.td.roomForTools']?>
                            </td>
                            <td colspan="4" width="434">
                                <strong>@if(isset($data['installation_space'])) @if($data['installation_space'] == 'no-accessible') <?= $t['no']?> @else <?= $t['yes']?> @endif @endif</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table>
                        <tbody>
                        <tr>
                            <th colspan="2" width="212">
                                <strong><?=$t['page03.th.cdf']?></strong>
                            </th>
                            <th colspan="2" width="217">
                                <strong><?=$t['page03.th.existingVerticalCabling']?></strong>
                            </th>
                            <th colspan="2" width="217">
                                <strong><?=$t['page03.th.coax']?></strong>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">&nbsp;</td>
                            <td colspan="2" width="217">&nbsp;</td>
                            <td colspan="2" width="217">&nbsp;</td>
                        </tr>
                        <tr>
                            <th width="154">
                                <strong><?=$t['page03.th.connections']?></strong>
                            </th>
                            <th width="57">
                                <strong></strong>
                            </th>
                            <th width="151">&nbsp;</th>
                            <th width="66">
                                <strong></strong>
                            </th>
                            <th width="170">&nbsp;</th>
                            <th width="47">
                                <strong></strong>
                            </th>
                        </tr>
                        <tr>
                            <td width="154">&nbsp;</td>
                            <td width="57">&nbsp;</td>
                            <td width="151">&nbsp;</td>
                            <td width="66">&nbsp;</td>
                            <td colspan="2" width="217">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.kroneBlocks']?>
                            </td>
                            <td width="57"
                                class="align-center">@if(isset($data['insde_cdf_connection_type']) && $data['insde_cdf_connection_type'] == 'krone')
                                    <strong>X</strong>@endif</td>
                            <td width="151">
                                <?=$t['page03.td.fiber']?>
                            </td>
                            <td width="66"
                                class="align-center">@if(isset($data['existing_vertical_cabling']) && $data['existing_vertical_cabling'] == 'fiber')
                                    <strong>X</strong>@endif</td>
                            <td width="170">
                                <?=$t['page03.td.multitapsTelcoRoom']?>
                            </td>
                            <td width="47"
                                class="align-center">@if(isset($data['coax_installations']) && $data['coax_installations'] == 'multitab-in-technical-room')
                                    <strong>X</strong>@endif</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.siemensBlocks']?>
                            </td>
                            <td width="57"
                                class="align-center">@if(isset($data['insde_cdf_connection_type']) && $data['insde_cdf_connection_type'] == 'siemens')
                                    <strong>X</strong>@endif</td>
                            <td width="151">
                                <?=$t['page03.td.cat5orCat6']?>
                            </td>
                            <td width="66"
                                class="align-center">@if(isset($data['existing_vertical_cabling']) && (($data['existing_vertical_cabling'] == 'cat5') || ($data['existing_vertical_cabling'] == 'cat6')))
                                    <strong>X</strong>@endif</td>
                            <td width="170">
                                <?=$t['page03.td.coaxAmount']?>
                            </td>
                            <td width="47"
                                class="align-center">@if(isset($data['coax_installations']) && $data['coax_installations'] == '')
                                    <strong>X</strong>@endif</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.adcModules']?>
                            </td>
                            <td width="57"
                                class="align-center">@if(isset($data['insde_cdf_connection_type']) && $data['insde_cdf_connection_type'] == 'hds')
                                    <strong>X</strong>@endif</td>
                            <td width="151">
                                <?=$t['page03.td.cat3orVvt']?>
                            </td>
                            <td width="66"
                                class="align-center">@if(isset($data['existing_vertical_cabling']) && $data['existing_vertical_cabling'] == 'vvt')
                                    <strong>X</strong>@endif</td>
                            <td width="170">
                                <?=$t['page03.td.multitapsPaliers']?>
                            </td>
                            <td width="47"
                                class="align-center">@if(isset($data['coax_installations']) && $data['coax_installations'] == '')
                                    <strong>X</strong>@endif</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.screwed']?>
                            </td>
                            <td width="57"
                                class="align-center">@if(isset($data['insde_cdf_connection_type']) && $data['insde_cdf_connection_type'] == 'screwed')
                                    <strong>X</strong>@endif</td>
                            <td width="151">
                                <?=$t['page03.td.redWhiteJumper']?>
                            </td>
                            <td width="66"
                                class="align-center">@if(isset($data['existing_vertical_cabling']) && $data['existing_vertical_cabling'] == 'redwhite')
                                    <strong>X</strong>@endif</td>
                            <td width="170">
                                <?=$t['page03.td.directCoax']?>
                            </td>
                            <td width="47"
                                class="align-center">@if(isset($data['coax_installations']) && $data['coax_installations'] == '')
                                    <strong>X</strong>@endif</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.soldered']?>
                            </td>
                            <td width="57"
                                class="align-center">@if(isset($data['insde_cdf_connection_type']) && $data['insde_cdf_connection_type'] == 'bolted')
                                    <span>X</span>@endif</td>
                            <td width="151">
                                <?=$t['page03.td.flatCable']?>
                            </td>
                            <td width="66"
                                class="align-center">@if(isset($data['existing_vertical_cabling']) && $data['existing_vertical_cabling'] == 'flatcable')
                                    <span>X</span>@endif</td>
                            <td width="170">
                                <?=$t['page03.td.coaxUnknown']?>
                            </td>
                            <td width="47"
                                class="align-center">@if(isset($data['coax_installations']) && (($data['coax_installations'] == 'unknown') || ($data['coax_installations'] == 'other')))
                                    <span>X</span>@endif</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.connectionUnknown']?>
                            </td>
                            <td width="57"
                                class="align-center">@if(isset($data['insde_cdf_connection_type']) && (($data['insde_cdf_connection_type'] == 'unknown') || ($data['insde_cdf_connection_type'] == 'other')))
                                    <span>X</span>@endif</td>
                            <td width="151">
                                <?=$t['page03.td.existingVerticalCablingUnknown']?>
                            </td>
                            <td width="66"
                                class="align-center">@if(isset($data['existing_vertical_cabling']) && (($data['existing_vertical_cabling'] == 'unknown') || ($data['existing_vertical_cabling'] == 'other')))
                                    <span>X</span>@endif</td>
                            <td colspan="2" width="217">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <h3><?=$t['page03.h3.remarks']?></h3>

                <div style="border: 1px solid black; padding: 6px; font-size: 10px; height:8.5cm">
                    @if(isset($data['requirements_to_enter_telco_room'])){!! ucfirst($data['requirements_to_enter_telco_room']) !!} @endif
                </div>


            </div>
            <div class="footer"></div>
        </page>

        {{--Intro Page--}}
        @if(isset($data['copper_intro']['img_outside']) && count($data['copper_intro']['img_outside']) > 0)
            <page size="A4" class="page" id="existing_intro_outside">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">
                    <h3>8. <?=$t['existingIntro']?></h3>
                    <h4><?=$t['exterior']?></h4>

                    <div class="doc-img">
                        @if(isset($data['copper_intro']['img_outside']))
                            @if(count($data['copper_intro']['img_outside']) > $data['image_count_per_page'])
                                <div class="items">
                                    @for($ctr_copper_outside=0; $ctr_copper_outside < $data['image_count_per_page']; ++$ctr_copper_outside)
                                        <img src="{!! $data['copper_intro']['img_outside'][$ctr_copper_outside] !!}"
                                             alt=""/>
                                        @if(isset($data['copper_intro']['img_outside_remarks'][$ctr_copper_outside]))
                                            <div class="remarks">
                                                {!! $data['copper_intro']['img_outside_remarks'][$ctr_copper_outside] !!}</div> @endif
                                    @endfor
                                </div>
                                <?php $ctr_copper_outside=$data['image_count_per_page']?>
                            @else
                                <div class="items">
                                    @for($ctr_img = 0; $ctr_img < count($data['copper_intro']['img_outside']); $ctr_img++)
                                        <img src="{!! $data['copper_intro']['img_outside'][$ctr_img] !!}"
                                             alt="Not available"/>
                                        @if(isset($data['copper_intro']['img_outside_remarks'][$ctr_img]))
                                            <div class="remarks">
                                                {!! $data['copper_intro']['img_outside_remarks'][$ctr_img] !!} </div> @endif
                                </div>
                                @endfor
                            @endif
                        @endif
                    </div>
                </div>
                <div class="footer index"></div>
            </page>

            @if(isset($data['copper_intro']['img_outside_pages']) && $data['copper_intro']['img_outside_pages'] > 1)
                @for($ctr2 = 1; $ctr2<$data['copper_intro']['img_outside_pages']; $ctr2++)
                    <page size="A4" class="page">
                        <div class="header">
                            <div class="headerTitle"></div>
                        </div>
                        <div class="subpage">
                            <h4><?=$t['exterior']?><?=$t['continued']?></h4>

                            <div class="doc-img">
                                @if(count($data['copper_intro']['img_outside']) < $data['existing_intro']['img_outside_pages']*$data['image_count_per_page'])
                                    <div class="items">
                                        @for($ctr_copper_outside; $ctr_copper_outside < count($data['copper_intro']['img_outside']); $ctr_copper_outside++)
                                            <img src="{!! $data['copper_intro']['img_outside'][$ctr_copper_outside] !!}"
                                                 alt=""/>
                                            @if(isset($data['copper_intro']['img_outside_remarks'][$ctr_copper_outside]))
                                                <div class="remarks">
                                                    {!! $data['copper_intro']['img_outside_remarks'][$ctr_copper_outside] !!}</div> @endif
                                        @endfor
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="footer index"></div>
                    </page>
                @endfor
            @endif
        @endif

        @if(isset($data['copper_intro']['img_inside']) && count($data['copper_intro']['img_inside']) > 0)
            <page size="A4" class="page" id="existing_intro_inside">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">

                    <h4><?=$t['interior']?></h4>

                    <div class="doc-img">
                        @if(isset($data['copper_intro']['img_inside']))
                            @if(count($data['copper_intro']['img_inside']) > $data['image_count_per_page'])
                                <div class="items">
                                    @for($ctr_copper_inside=0; $ctr_copper_inside < $data['image_count_per_page']; ++$ctr_copper_inside)
                                        <img src="{!! $data['copper_intro']['img_inside'][$ctr_copper_inside] !!}"
                                             alt=""/>
                                        @if(isset($data['copper_intro']['img_inside_remarks'][$ctr_copper_inside]))
                                            <div class="remarks">
                                                {!! $data['copper_intro']['img_inside_remarks'][$ctr_copper_inside] !!}</div> @endif
                                    @endfor
                                    <?php $ctr_copper_inside=$data['image_count_per_page']?>
                                </div>
                            @else
                                <div class="items">
                                    @for($ctr_img = 0; $ctr_img < count($data['copper_intro']['img_inside']); $ctr_img++)
                                        <img src="{!! $data['copper_intro']['img_inside'][$ctr_img] !!}"
                                             alt="Not available"/>
                                        <div class="remarks">
                                            {!! $data['copper_intro']['img_inside_remarks'][$ctr_img] !!} </div>
                                    @endfor
                                </div>
                            @endif
                        @endif
                    </div>


                </div>
                <div class="footer index"></div>
            </page>

            @if(isset($data['copper_intro']['img_inside_pages']) && $data['copper_intro']['img_inside_pages'] > 1)
                @for($ctr2 = 1; $ctr2<$data['copper_intro']['img_inside_pages']; $ctr2++)
                    <page size="A4" class="page">
                        <div class="header">
                            <div class="headerTitle"></div>
                        </div>
                        <div class="subpage">
                            <h4><?=$t['interior']?><?=$t['continued']?></h4>

                            <div class="doc-img">
                                @if(count($data['copper_intro']['img_inside']) < $data['existing_intro']['img_inside_pages']*$data['image_count_per_page'])
                                    <div class="items">
                                        @for($ctr_copper_inside; $ctr_copper_inside < count($data['copper_intro']['img_inside']); $ctr_copper_inside++)
                                            <img src="{!! $data['copper_intro']['img_inside'][$ctr_copper_inside] !!}"
                                                 alt=""/>
                                            <div class="remarks">
                                                {!! $data['copper_intro']['img_inside_remarks'][$ctr_copper_inside] !!}</div>
                                        @endfor
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="footer index"></div>
                    </page>
                @endfor
            @endif
        @endif

        @if(isset($data['fiber']))
            @foreach($data['fiber'] as $fiber)
                <page size="A4" class="page" id="future_intro">
                    <div class="header">
                        <div class="headerTitle"></div>
                    </div>
                    <div class="subpage">

                        <h3><?=$t['futureIntro']?></h3>

                        <div class="doc-img">
                            <div class="address" style="width: 100%; height: 2em">
                                Address:
                            </div>
                            @if(isset($fiber['imagesOut']))
                                <div class="items">
                                    <h4><?=$t['exterior']?></h4>
                                    @foreach($fiber['imagesOut'] as $entry => $value)
                                        <img src="{!! $fiber['imagesOut'][$entry] !!}" alt="Not Available">
                                        @if(isset($fiber['remarksOut'][$entry]))
                                            <div class="remarks">
                                                {!! $fiber['remarksOut'][$entry] !!}</div> @endif
                                    @endforeach
                                </div>
                                <div class="items">
                                    <h4><?=$t['interior']?></h4>
                                    @foreach($fiber['imagesIn'] as $entry => $value)
                                        <img src="{!! $fiber['imagesIn'][$entry] !!}" alt="Not Available">
                                        @if(isset($fiber['remarksIn'][$entry]))
                                            <div class="remarks">
                                                {!! $fiber['remarksIn'][$entry] !!}</div> @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="footer index"></div>
                </page>

            @endforeach
        @endif

        {{--Access to telco room--}}

        <page size="A4" class="page" id="access_to_telco_room">

            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3><?=$t['page05.h3.acceessToProximusTools']?></h3>

                <div style="border: 1px solid black; padding: 6px; font-size: 10px; height:2.5cm">
                    @if(isset($data['requirements_to_enter_telco_room'])){!! $data['requirements_to_enter_telco_room'] !!} @endif
                </div>

                <br>

                <div class="doc-img">
                    @if(isset($data['access_to_telco_room']['img']))
                        @if(count($data['access_to_telco_room']['img']) > $data['image_count_per_page'])
                            @for($ctr=0; $ctr < $data['image_count_per_page']; $ctr++)
                                <div class="items">
                                    <img src="@if(isset($data['access_to_telco_room']['img'][$ctr])){!! $data['access_to_telco_room']['img'][$ctr] !!} @endif"
                                         alt=""/>
                                    @if(isset($data['access_to_telco_room']['img_remarks'][$ctr]))
                                        <div class="remarks">
                                            {!! $data['access_to_telco_room']['img_remarks'][$ctr] !!}</div> @endif
                                </div>
                            @endfor
                        @else
                            @foreach($data['access_to_telco_room']['img'] as $imgUrl)
                                <div class="items">
                                    <img src="{!! $imgUrl !!}" alt=""/>
                                    <div class="remarks">
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    @endif
                </div>

            </div>
            <div class="footer index"></div>

        </page>

        <?php $pageNumber = 2; $ctr=$data['image_count_per_page'];?>
        @while($data['access_to_telco_room']['number_of_pages'] >= $pageNumber)
                <page size="A4" class="page">
                    <div class="header">
                        <div class="headerTitle"></div>
                    </div>
                    <div class="subpage">
                        <h4><?=$t['page05.h3.acceessToProximusTools']?><?=$t['continued']?></h4>

                        <div class="doc-img">
                            @if(count($data['access_to_telco_room']['img']) < $data['access_to_telco_room']['number_of_pages']*$data['image_count_per_page'])
                                @for($ctr; $ctr < ($data['image_count_per_page']*$pageNumber); $ctr++)
                                    <div class="items">
                                        <img src="@if(isset($data['access_to_telco_room']['img'][$ctr])){!! $data['access_to_telco_room']['img'][$ctr] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['access_to_telco_room']['img_remarks'][$ctr]))
                                            <div class="remarks">
                                                {!! $data['access_to_telco_room']['img_remarks'][$ctr] !!} </div>@endif
                                    </div>
                                @endfor
                            @endif
                        </div>

                    </div>
                    <div class="footer index"></div>
                </page>
            <?php $pageNumber++ ?>
        @endwhile

        {{--Aerial View--}}
        <page size="A4" class="page" id="cadastal">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3><?=$t['page06.h3.existingSituation']?></h3>

                <h4><?=$t['page06.h4.googleView']?></h4>
                @if(isset($data['geo_location']))
                    <div id="map"></div>
                    <br/>
                    <div id="markers">
                        <button id="marker" class="btn btn-primary">Remove Marker</button>
                        <button id="marker-show" class="btn btn-primary hide">Show Marker</button>
                    </div>
                @else
                    <h3>View not available</h3>
                @endif

            </div>
            <div class="footer index"></div>
        </page>


        {{--Horizontal shaft--}}
        @if(isset($aData['horizontal_shaft_present']) && $aData['horizontal_shaft_present'] == 'yes' && $data['planned_distribution'] == 'underground')
            <page size="A4" class="page" id="horizontal_shaft_present">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">

                    <h3>11. <?=$t['page10.h4.schemaHorizontal']?></h3>

                    <div class="doc-img">
                        @if(isset($data['horizontal_shaft_present_img']['img']))
                            @if(count($data['horizontal_shaft_present_img']['img']) > $data['image_count_per_page'])
                                @for($ctr_horizontal_shaft=0; $ctr_horizontal_shaft < $data['image_count_per_page']; ++$ctr_horizontal_shaft)
                                    <div class="items">
                                        <img src="@if(isset($data['horizontal_shaft_present_img']['img'][$ctr_horizontal_shaft])){!! $data['horizontal_shaft_present_img']['img'][$ctr_horizontal_shaft] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['horizontal_shaft_present_img']['img_remarks'][$ctr_horizontal_shaft]))
                                            <div class="remarks">
                                                {!! $data['horizontal_shaft_present_img']['img_remarks'][$ctr_horizontal_shaft] !!}</div> @endif
                                    </div>
                                @endfor
                                <?php $ctr_horizontal_shaft=$data['image_count_per_page']?>
                            @else
                                @foreach($data['horizontal_shaft_present_img']['img'] as $imgUrl)
                                    <div class="items">
                                        <img src="{!! $imgUrl !!}" alt=""/>
                                        <div class="remarks"></div>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>

            @if(isset($data['horizontal_shaft_present_img']['number_of_pages']) && $data['horizontal_shaft_present_img']['number_of_pages'] > 1)
                @for($ctr2 = 1; $ctr2<$data['horizontal_shaft_present_img']['number_of_pages']; $ctr2++)
                    <page size="A4" class="page" class="horizontal-shaft-present-img">
                        <div class="header">
                            <div class="headerTitle"></div>
                        </div>
                        <div class="subpage">

                            <div class="doc-img">
                                @if(count($data['horizontal_shaft_present_img']['img']) < $data['horizontal_shaft_present_img']['number_of_pages']*$data['image_count_per_page'])
                                    @for($ctr_horizontal_shaft; $ctr_horizontal_shaft < count($data['horizontal_shaft_present_img']['img']); $ctr_horizontal_shaft++)
                                        <div class="items">
                                            <img src="@if(isset($data['horizontal_shaft_present_img']['img'][$ctr_horizontal_shaft])){!! $data['horizontal_shaft_present_img']['img'][$ctr_horizontal_shaft] !!} @endif"
                                                 alt=""/>
                                            @if(isset($data['horizontal_shaft_present_img']['img_remarks'][$ctr_horizontal_shaft]))
                                                <div class="remarks">
                                                    {!! $data['horizontal_shaft_present_img']['img_remarks'][$ctr_horizontal_shaft] !!}</div> @endif
                                        </div>
                                    @endfor
                                @endif
                            </div>

                        </div>
                        <div class="footer index"></div>
                    </page>
                @endfor
            @endif
        @endif

        {{--Vertical shaft--}}
        @if(isset($data['vertical_shaft_present_img']['img']) && $data['planned_distribution'] == 'facade')

            <page size="A4" class="page" id="vertical_shaft_present_img">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">

                    <h4><?=$t['page10.h4.schemaHorizontal']?></h4>

                    <div class="doc-img">
                        @if(isset($data['vertical_shaft_present_img']['img']))
                            @if(count($data['vertical_shaft_present_img']['img']) > $data['image_count_per_page'])
                                @for($ctr_vertical_shaft=0; $ctr_vertical_shaft < $data['image_count_per_page']; ++$ctr_vertical_shaft)
                                    <div class="items">
                                        <img src="@if(isset($data['vertical_shaft_present_img']['img'][$ctr_vertical_shaft])){!! $data['vertical_shaft_present_img']['img'][$ctr_vertical_shaft] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['vertical_shaft_present_img']['img_remarks'][$ctr_vertical_shaft]))
                                            <div class="remarks">
                                                {!! $data['vertical_shaft_present_img']['img_remarks'][$ctr_vertical_shaft] !!}</div> @endif
                                    </div>
                                @endfor
                            @else
                                @foreach($data['vertical_shaft_present_img']['img'] as $imgUrl)
                                    <div class="items">
                                        <img src="{!! $imgUrl !!}" alt=""/>
                                        <div class="remarks"></div>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
        @endif

        <?php $pageNumber = 2; $ctr_vertical_shaft=$data['image_count_per_page']?>
        @while($data['vertical_shaft_present_img']['number_of_pages'] >= $pageNumber)
                <page size="A4" class="page" class="vertical-shaft-present-img">
                    <div class="header">
                        <div class="headerTitle"></div>
                    </div>
                    <div class="subpage">
                        <h4><?=$t['page10.h4.schemaHorizontal']?><?=$t['continued']?></h4>
                        <div class="doc-img">
                            @if(count($data['vertical_shaft_present_img']['img']) < $data['vertical_shaft_present_img']['number_of_pages']*$data['image_count_per_page'])
                                @for($ctr_vertical_shaft; $ctr_vertical_shaft < ($data['image_count_per_page']*$pageNumber); $ctr_vertical_shaft++)
                                    <div class="items">
                                        <img src="@if(isset($data['vertical_shaft_present_img']['img'][$ctr_vertical_shaft])){!! $data['vertical_shaft_present_img']['img'][$ctr_vertical_shaft] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['vertical_shaft_present_img']['img_remarks'][$ctr_vertical_shaft]))
                                            <div class="remarks">
                                                {!! $data['vertical_shaft_present_img']['img_remarks'][$ctr_vertical_shaft] !!}</div> @endif
                                    </div>
                                @endfor
                            @endif
                        </div>

                    </div>
                    <div class="footer index"></div>
                </page>
            <?php $pageNumber++ ?>
        @endwhile

        {{--Schematic Overview--}}
        @if(isset($data['floor_plan']['img']))
            <page size="A4" class="page" id="floor_plan">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">
                    <h3>@if(isset($aData['horizontal_shaft_present']) || isset($data['vertical_shaft_present_img']))
                            12. @else 11. @endif <?=$t['buildingOverview']?></h3>
                    <h4><?=$t['floorPlan']?></h4>

                    <div class="doc-img">
                        @if(isset($data['floor_plan']['img']))
                            @if(count($data['floor_plan']['img']) > $data['image_count_per_page'])
                                @for($ctr=0; $ctr < $data['image_count_per_page']; ++$ctr)
                                    <div class="items">
                                        <img src="@if(isset($data['floor_plan']['img'][$ctr])){!! $data['floor_plan']['img'][$ctr] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['floor_plan']['img_remarks'][$ctr])))
                                        <div class="remarks">
                                            {!! $data['floor_plan']['img_remarks'][$ctr] !!}</div> @endif
                                    </div>
                                @endfor
                                <?php $ctr=$data['image_count_per_page']?>
                            @else
                                @foreach($data['floor_plan']['img'] as $imgUrl)
                                    <div class="items">
                                        <img src="{!! $imgUrl !!}" alt=""/>
                                        <div class="remarks"></div>
                                    </div>
                                @endforeach
                            @endif

                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
        @endif

        <?php $pageNumber = 2?>
        @while($data['intro_on_facade_cabling_proposal']['number_of_pages'] >= $pageNumber)
            <page size="A4" class="page">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">
                    <h4><?=$t['floorPlan']?><?=$t['continued']?></h4>

                    <div class="doc-img">
                        @if(count($data['intro_on_facade_cabling_proposal']['img']) < $data['intro_on_facade_cabling_proposal']['number_of_pages']*$data['image_count_per_page'])
                            @for($ctr; $ctr < ($data['image_count_per_page']*$pageNumber); $ctr++)
                                <div class="items">
                                    <img src="@if(isset($data['intro_on_facade_cabling_proposal']['img'][$ctr])){!! $data['intro_on_facade_cabling_proposal']['img'][$ctr] !!} @endif"
                                         alt=""/>
                                    @if(isset($data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr]))
                                        <div class="remarks">
                                            {!! $data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr] !!}</div> @endif
                                </div>
                            @endfor
                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
            <?php $pageNumber++ ?>
        @endwhile

        @if(isset($data['building_layout']['img']))
            <page size="A4" class="page" id="building_plan">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">

                    <h4><?=$t['buildingPlan']?></h4>

                    <div class="doc-img">
                        @if(isset($data['building_layout']['img']))
                            @if(count($data['building_layout']['img']) >$data['image_count_per_page'])
                                @for($ctr=0; $ctr < $data['image_count_per_page']; ++$ctr)
                                    <div class="items">
                                        <img src="@if(isset($data['building_layout']['img'][$ctr])){!! $data['building_layout']['img'][$ctr] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['building_layout']['img_remarks'][$ctr]))
                                            <div class="remarks">
                                                {!! $data['building_layout']['img_remarks'][$ctr] !!}</div> @endif
                                    </div>
                                @endfor
                                <?php $ctr=6?>
                            @else
                                @foreach($data['building_layout']['img'] as $imgUrl)
                                    <div class="items">
                                        <img src="{!! $imgUrl !!}" alt=""/>
                                        <div class="remarks"></div>
                                    </div>
                                @endforeach
                            @endif

                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
        @endif

        <?php $pageNumber = 2?>
        @while($data['building_layout']['number_of_pages'] >= $pageNumber)
            <page size="A4" class="page">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">
                    <h4><?=$t['buildingPlan']?><?=$t['continued']?></h4>

                    <div class="doc-img">
                        @if(count($data['building_layout']['img']) < $data['building_layout']['number_of_pages']*$data['image_count_per_page'])
                            @for($ctr; $ctr < ($data['image_count_per_page']*$pageNumber); $ctr++)
                                <div class="items">
                                    <img src="@if(isset($data['building_layout']['img'][$ctr])){!! $data['building_layout']['img'][$ctr] !!} @endif"
                                         alt=""/>
                                    @if(isset($data['building_layout']['img_remarks'][$ctr])))
                                    <div class="remarks">
                                        {!! $data['building_layout']['img_remarks'][$ctr] !!}</div> @endif
                                </div>
                            @endfor
                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
            <?php $pageNumber++ ?>
        @endwhile

        {{--Cabling Solution--}}
        {{--Facade--}}
        @if(isset($data['intro_on_facade_cabling_proposal']['img']))
            <page size="A4" class="page" id="cabling_solution">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">
                    <h3><?=$t['facadeCabling']?></h3>

                    <div class="doc-img">
                        @if(isset($data['intro_on_facade_cabling_proposal']['img']))
                            @if(count($data['intro_on_facade_cabling_proposal']['img']) > $data['image_count_per_page'])
                                @for($ctr=0; $ctr < $data['image_count_per_page']; ++$ctr)
                                    <div class="items">
                                        <img src="@if(isset($data['intro_on_facade_cabling_proposal']['img'][$ctr])){!! $data['intro_on_facade_cabling_proposal']['img'][$ctr] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr]))
                                            <div class="remarks">
                                                {!! $data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr] !!}</div> @endif
                                    </div>
                                @endfor
                                <?php $ctr=$data['image_count_per_page']?>
                            @else
                                @foreach($data['intro_on_facade_cabling_proposal']['img'] as $imgUrl)
                                    <div class="items">
                                        <img src="{!! $imgUrl !!}" alt=""/>
                                        <div class="remarks"></div>
                                    </div>
                                @endforeach
                            @endif

                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
        @endif

        <?php $pageNumber = 2?>
        @while($data['intro_on_facade_cabling_proposal']['number_of_pages'] >= $pageNumber)
            <page size="A4" class="page">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">

                    <h4>Façade cabling proposal info<?=$t['continued']?></h4>
                    <div class="doc-img">
                        @if(count($data['intro_on_facade_cabling_proposal']['img']) < $data['intro_on_facade_cabling_proposal']['number_of_pages']*$data['image_count_per_page'])
                            @for($ctr; $ctr < ($data['image_count_per_page']*$pageNumber); $ctr++)
                                <div class="items">
                                    <img src="@if(isset($data['intro_on_facade_cabling_proposal']['img'][$ctr])){!! $data['intro_on_facade_cabling_proposal']['img'][$ctr] !!} @endif"
                                         alt=""/>
                                    @if(isset($data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr]))
                                        <div class="remarks">
                                            {!! $data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr] !!}</div> @endif
                                </div>
                            @endfor
                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
            <?php $pageNumber++ ?>
        @endwhile

        <?php $ctr = 0; ?>
        {{--Underground--}}
        @if(isset($data['intro_underground_proposal']['img']))
            <page size="A4" class="page" id="schemes_underground">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">
                    <h3><?=$t['undergroundCabling']?></h3>

                    <div class="doc-img">
                        @if(isset($data['intro_underground_proposal']['img']))
                            @if(count($data['intro_underground_proposal']['img']) > $data['image_count_per_page'])
                                @for($ctr_underground_cabling=0; $ctr_underground_cabling < $data['image_count_per_page']; ++$ctr_underground_cabling)
                                    <div class="items">
                                        <img src="@if(isset($data['intro_underground_proposal']['img'][$ctr_underground_cabling])){!! $data['intro_underground_proposal']['img'][$ctr_underground_cabling] !!} @endif"
                                             alt=""/>
                                        @if(isset($data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling]))
                                            <div class="remarks">
                                                {!! $data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling] !!}</div> @endif
                                    </div>
                                @endfor
                                <?php $ctr_underground_cabling=$data['image_count_per_page']?>
                            @else
                                @foreach($data['intro_underground_proposal']['img'] as $imgUrl)
                                    <div class="items">
                                        <img src="{!! $imgUrl !!}" alt=""/>
                                        <div class="remarks"></div>
                                    </div>
                                @endforeach
                            @endif

                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
        @endif

        <?php $pageNumber = 2?>
        @while($data['intro_underground_proposal']['number_of_pages'] >= $pageNumber)
            <page size="A4" class="page">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">
                    <h3>Underground proposal info<?= $t['continued']?></h3>

                    <div class="doc-img">
                        @if(count($data['intro_underground_proposal']['img']) < $data['intro_underground_proposal']['number_of_pages']*$data['image_count_per_page'])
                            @for($ctr_underground_cabling; $ctr_underground_cabling < ($data['image_count_per_page']*$pageNumber) ; $ctr_underground_cabling++)
                                <div class="items">
                                    <img src="@if(isset($data['intro_underground_proposal']['img'][$ctr_underground_cabling])){!! $data['intro_underground_proposal']['img'][$ctr_underground_cabling] !!} @endif"
                                         alt=""/>
                                    @if(isset($data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling]))
                                        <div class="remarks">
                                            {!! $data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling] !!}</div> @endif
                                </div>
                            @endfor
                        @endif
                    </div>

                </div>
                <div class="footer index"></div>
            </page>
            <?php $pageNumber++ ?>
        @endwhile

        <page size="A4" class="page" id="unit_details">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage ">

                <div class="landscape">
                    <h4><?=$t['page11.h4.unitDetails']?></h4>

                    <table>
                        <tbody>
                        <tr>
                            <th><?=$t['page11.th.utac']?></th>
                            <th>LU Key</th>
                            <th><?=$t['page11.th.type']?></th>
                            <th>LU Address</th>
                            <th>Intro Address</th>
                            <th><?=$t['page11.th.floor']?>/<?=$t['page11.th.unitsCount']?></th>
                            <th><?=$t['page11.th.zipcode']?></th>
                        </tr>
                        @if(isset($data['unit_details']['LU']))
                            @foreach($data['unit_details']['LU'] as $lu)
                                <tr>
                                    <td></td>
                                    <td>{!! $lu['LU Key'] !!}</td>
                                    <td>LU</td>
                                    <td>{!! $lu['LU Address'] !!}</td>
                                    <td>{!! $lu['Intro and Address'] !!}</td>
                                    <td>{!! $lu['Enumeration'] !!}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endif
                        @if(isset($data['unit_details']['BU-S']))
                            @foreach($data['unit_details']['BU-S'] as $bu_s)
                                <tr>
                                    <td></td>
                                    <td>{!! $bu_s['LU Key'] !!}</td>
                                    <td>BU-S</td>
                                    <td>{!! $bu_s['LU Address'] !!}</td>
                                    <td>{!! $bu_s['Intro and Address'] !!}</td>
                                    <td>{!! $bu_s['Enumeration'] !!}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endif
                        @if(isset($data['unit_details']['BU-L']))
                            @foreach($data['unit_details']['BU-L'] as $bu_l)
                                <tr>
                                    <td></td>
                                    <td>{!! $bu_l['LU Key'] !!}</td>
                                    <td>BU-S</td>
                                    <td>{!! $bu_l['LU Address'] !!}</td>
                                    <td>{!! $bu_l['Intro and Address'] !!}</td>
                                    <td>{!! $bu_l['Enumeration'] !!}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endif
                        @if(isset($data['unit_details']['SU']))
                            @foreach($data['unit_details']['SU'] as $su)
                                <tr>
                                    <td></td>
                                    <td>{!! $su['LU Key'] !!}</td>
                                    <td>BU-S</td>
                                    <td>{!! $su['LU Address'] !!}</td>
                                    <td>{!! $su['Intro and Address'] !!}</td>
                                    <td>{!! $su['Enumeration'] !!}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endif
                        <?php $ctr= 36?>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="footer index"></div>
        </page>

        @if(isset($data['total_units_number_of_pages']) && $data['total_units_number_of_pages'] > 1)
            @for($ctr2 = 1; $ctr2<$data['total_units_number_of_pages']; $ctr2++)
                <page size="A4" class="page">
                    <div class="header">
                        <div class="headerTitle"></div>
                    </div>
                    <div class="subpage">
                        @if($data['total_units'] < $data['total_units_number_of_pages']*37)
                            <div class="landscape">
                                <h4><?=$t['page11.h4.unitDetails']?></h4>

                                <table>
                                    <tbody>
                                    <tr>
                                        <th><?=$t['page11.th.utac']?></th>
                                        <th>LU Key</th>
                                        <th><?=$t['page11.th.type']?></th>
                                        <th>LU Address</th>
                                        <th>Intro Address</th>
                                        <th><?=$t['page11.th.floor']?>/<?=$t['page11.th.unitsCount']?></th>
                                        <th><?=$t['page11.th.zipcode']?></th>
                                    </tr>
                                    @if(isset($data['unit_details']['LU']))
                                        @for($ctr; $ctr < count($data['total_units']); $ctr++)
                                            <tr>
                                                <td></td>
                                                <td>{!! $lu['LU Key'][$ctr] !!}</td>
                                                <td>LU</td>
                                                <td>{!! $lu['LU Address'][$ctr] !!}</td>
                                                <td>{!! $lu['Intro and Address'][$ctr] !!}</td>
                                                <td>{!! $lu['Enumeration'][$ctr] !!}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>{!! $bu_s['LU Key'] !!}</td>
                                                <td>BU-S</td>
                                                <td>{!! $bu_s['LU Address'] !!}</td>
                                                <td>{!! $bu_s['Intro and Address'] !!}</td>
                                                <td>{!! $bu_s['Enumeration'] !!}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>{!! $bu_l['LU Key'] !!}</td>
                                                <td>BU-S</td>
                                                <td>{!! $bu_l['LU Address'] !!}</td>
                                                <td>{!! $bu_l['Intro and Address'] !!}</td>
                                                <td>{!! $bu_l['Enumeration'] !!}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>{!! $su['LU Key'] !!}</td>
                                                <td>BU-S</td>
                                                <td>{!! $su['LU Address'] !!}</td>
                                                <td>{!! $su['Intro and Address'] !!}</td>
                                                <td>{!! $su['Enumeration'] !!}</td>
                                                <td></td>
                                            </tr>
                                        @endfor
                                    @endif
                                    </tbody>
                                </table>

                            </div>


                        @endif
                    </div>
                    <div class="footer index"></div>
                </page>
            @endfor
        @endif

        @push('scripts')

        <script type="text/javascript">
            var data = <?php echo json_encode($data) ?>;
            var map;
            function initMap() {

                var myLatLng = {lat: data.latitude, lng: data.longitude};

                map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 20,
                    mapTypeControlOptions: {
                        mapTypeIds: ['roadmap', 'styled_map']
                    },
                    scrollwheel: false,
                    navigationControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    draggable: false,
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: ''
                });

                $('#marker').on('click', function () {
                    marker.setMap(null);
                    $('#marker').addClass('hide');
                    $('#marker-show').removeClass('hide');
                });

                $('#marker-show').on('click', function () {
                    marker.setMap(map);
                    $('#marker-show').addClass('hide');
                    $('#marker').removeClass('hide');
                });
            }

            $(document).ready(function () {

                $('img').error(function () {
                    $(this).attr('src', '{!! asset('assets/img/image_not_available.png') !!}');
                });

                var headerTxt = '<div class="headerTitle"><table><tr>' + data.street + ' ' + data.house_number + '<td></td></tr><tr><td>' + data.postal_code + ' ' + data.city + '</td><td>&nbsp;</td></tr></table></div>';
                $.each($('.header'), function () {
                    if (!$(this).hasClass('index')) {
                        $(this).html(headerTxt);
                    }
                });

                var footerTxt = '<div class="footerTitle"></div><div class="footerPagenumber">Pagina <span class="pagenumberThis">?</span> van <span class="pagenumberTotal">?</span></div>';
                $.each($('.footer'), function () {
                    //if (!$(this).hasClass('index')) {
                    $(this).html(footerTxt);
                    //}
                });

                var pagenumberTotal = $('.page').size();
                $.each($('.pagenumberTotal'), function () {
                    $(this).html(pagenumberTotal);
                });

                var pagenumberThis = 1;
                $.each($('.page'), function () {
                    $(this).find('.pagenumberThis').html(pagenumberThis);
                    pagenumberThis++;
                });
            });

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-5nbgHOw8SPU2_guouxGhryuD4F81nrs&callback=initMap"
                async defer></script>
    @endpush
@endsection

