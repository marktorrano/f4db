@extends('layouts.app')
@push('style')


@endpush
@section('content')

    @if($data['lang'] == 'nl')
        <?php require_once(app_path() . '/includes/tsa_nl.php') ?>
        @push('styles')
        <link rel="stylesheet" href="{{asset('assets/css/tsa-nl.css')}}"/>
        @endpush
    @else
        <?php require_once(app_path() . '/includes/tsa_fr.php') ?>
        @push('styles')
        <link rel="stylesheet" href="{{asset('assets/css/tsa-fr.css')}}"/>
        @endpush
    @endif
    <style>
        @media print {
            .footer.index {
                background-image: url({{asset('assets/img/header_logo_proximus.png')}}) !important;
                background-repeat: no-repeat !important;
                background-position: right !important;
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

    <div class="book">

        <page size="A4" class="page index">
            <div class="header index"></div>
            <div class="subpage index">
                <h2><?=$t['page01.h2.title']?></h2>
                <h1><?=$t['page01.h1.title']?></h1>
                <h3>@if(isset($data['street'])){!! $data['street'] !!} @endif
                    , @if(isset($data['house_number'])){!! $data['house_number'] !!} @endif
                    , @if(isset($data['postal_code'])){!! $data['postal_code'] !!} @endif
                    , @if(isset($data['city'])){!! $data['city'] !!} @endif</h3>

                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td><?=$t['page01.td.date']?>
                                : @if(isset($data['survey_inside_finished'])){!! $data['survey_inside_finished'] !!} @endif</td>
                        </tr>
                        <tr>
                            <td>Main Lam Key: @if(isset($data['lam_mk'])){!! $data['lam_mk'] !!} @endif</td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">
                <div class="facade-img">
                    @if(isset($data['facade']['main_img']))
                        <img src="{!! $data['facade']['main_img'] !!}" alt=" "/>
                    @elseif(isset($data['facade']))
                        <img src="{!! $data['facade']['img'][0] !!}" alt=" "/>
                    @endif
                </div>
                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td><?=$t['page02.td.adresses']?></td>
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
            <div class="footer"></div>
        </page>

        <page size="A4" class="page" id="general_information_tsa">
            <div class="header"></div>
            <div class="subpage">
                <h4><?=$t['page03.h4.generalInformation']?></h4>
                <table>
                    <tr>
                        <td><?=$t['page03.td.visitDate']?> @if(isset($data['survey_outside_started'])){!! $data['survey_outside_started'] !!} @endif</td>
                        <td style="width: 50%;"></td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.responsibleProximus']?></td>
                        <td>
                            <ul class="list">
                                <li>@if(isset($data['survey_state_surveyor'])){!! $data['survey_state_surveyor'] !!} @endif</li>
                                <li>
                                    {{--EMAIL--}}
                                </li>
                                <li>
                                    {{--PHONE--}}
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.sitename']?></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.unitsCount']?></td>
                        <td>
                            @if(isset($data['total_lu'])) {!! $data['total_lu'] !!}@endif
                        </td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.floorsCount']?></td>
                        <td>
                            @if(isset($data['nr_total'])) {!! $data['nr_total'] !!}@endif
                        </td>
                    </tr>
                </table>

                <h4><?=$t['page03.h4.yourDetails']?></h4>

                <h6><?=$t['page03.h6.syndic']?></h6>
                <div class="your_data">
                    <?php $person_count = 1?>
                    @if(isset($data['syndic']))
                        @if(count($data['syndic']) > $data['person_count_per_page'])
                            @for($ctr = 0; $ctr < count($data['syndic']);$ctr++)
                                <div class="person">
                                    <ul>
                                        <li>
                                            <span><?=$t['page03.li.name']?></span> @if(isset($data['syndic'][$ctr]['name'])){!! $data['syndic'][$ctr]['name'] !!}@endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.adres']?></span> @if(isset($data['syndic'][$ctr]['street'])){!! $data['syndic'][$ctr]['street'] !!} @endif @if(isset($data['syndic'][$ctr]['house_number'])){!! $data['syndic'][$ctr]['house_number'] !!}
                                            , @endif @if(isset($data['syndic'][$ctr]['postal_code'])){!! $data['syndic'][$ctr]['postal_code'] !!} @endif @if(isset($data['syndic'][$ctr]['city'])){!! $data['syndic'][$ctr]['city'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.contact']?></span> @if(isset($data['syndic'][$ctr]['name_contact'])){!! $data['syndic'][$ctr]['name_contact'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.email']?></span> @if(isset($data['syndic'][$ctr]['email'])){!! $data['syndic'][$ctr]['email'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.phone']?></span> @if(isset($data['syndic'][$ctr]['primary_phone_contact'])){!! $data['syndic'][$ctr]['primary_phone_contact'] !!} @endif
                                        </li>
                                    </ul>
                                </div>
                                <?php $person_count++ ?>
                            @endfor
                        @else
                            @foreach($data['syndic'] as $syndic)
                                <div class="person">
                                    <ul>
                                        <li>
                                            <span><?=$t['page03.li.name']?></span> @if(isset($syndic['name'])){!! $syndic['name'] !!}@endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.adres']?></span> @if(isset($syndic['street'])){!! $syndic['street'] !!} @endif @if(isset($syndic['house_number'])){!! $syndic['house_number'] !!}
                                            , @endif @if(isset($syndic['postal_code'])){!! $syndic['postal_code'] !!} @endif @if($syndic['city'])
                                                ){!! $syndic['city'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.contact']?></span> @if(isset($syndic['name_contact'])){!!$syndic['name_contact'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.email']?></span> @if(isset($syndic['email'])){!! $syndic['email'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.phone']?></span> @if(isset($syndic['primary_phone_contact'])){!! $syndic['primary_phone_contact'] !!} @endif
                                        </li>
                                    </ul>
                                </div>
                                <?php $person_count++ ?>
                            @endforeach
                        @endif
                    @endif
                </div>

                @if(isset($data['acp']) && $person_count < $data['person_count_per_page'] && ($person_count+count($data['acp'])) < $data['person_count_per_page'])
                    <h6><?=$t['page03.h6.vme']?></h6>
                    @for($ctr=0; $ctr < count($data['acp']); $ctr++)
                        <div class="person">
                            <ul>
                                <li>
                                    <span><?=$t['page03.li.name']?></span> @if(isset($data['acp'][$ctr]['name'])){!! $data['acp'][$ctr]['name'] !!}@endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.adres']?></span> @if(isset($data['acp'][$ctr]['street'])){!! $data['acp'][$ctr]['street'] !!} @endif @if(isset($data['acp'][$ctr]['house_number'])){!! $data['acp'][$ctr]['house_number'] !!}
                                    , @endif @if(isset($data['acp'][$ctr]['postal_code'])){!! $data['acp'][$ctr]['postal_code'] !!} @endif @if(isset($data['acp'][$ctr]['city'])){!! $data['acp'][$ctr]['city'] !!} @endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.contact']?></span> @if(isset($data['acp'][$ctr]['name_contact'])){!! $data['acp'][$ctr]['name_contact'] !!} @endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.email']?></span> @if(isset($data['acp'][$ctr]['email'])){!! $data['acp'][$ctr]['email'] !!} @endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.phone']?></span> @if(isset($data['acp'][$ctr]['primary_phone_contact'])){!! $data['acp'][$ctr]['primary_phone_contact'] !!} @endif
                                </li>
                            </ul>
                        </div>
                        <?php $person_count++ ?>
                    @endfor
                @elseif(isset($data['acp']))
                    <page size="A4" class="page" class="people-extra-page">
                        <div class="header"></div>
                        <div class="subpage">
                            <h6><?=$t['page03.h6.vme']?></h6>
                            @foreach(($data['acp']) as $acp)
                                <div class="person">
                                    <ul>
                                        <li>
                                            <span><?=$t['page03.li.name']?></span> @if(isset($acp['name'])){!! $data['acp'][$ctr]['name'] !!}@endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.adres']?></span> @if(isset($data['acp'][$ctr]['street'])){!! $data['acp'][$ctr]['street'] !!} @endif @if(isset($data['acp'][$ctr]['house_number'])){!! $data['acp'][$ctr]['house_number'] !!}
                                            , @endif @if(isset($data['acp'][$ctr]['postal_code'])){!! $data['acp'][$ctr]['postal_code'] !!} @endif @if(isset($data['acp'][$ctr]['city'])){!! $data['acp'][$ctr]['city'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.contact']?></span> @if(isset($data['acp'][$ctr]['name_contact'])){!! $data['acp'][$ctr]['name_contact'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.email']?></span> @if(isset($data['acp'][$ctr]['email'])){!! $data['acp'][$ctr]['email'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.phone']?></span> @if(isset($data['acp'][$ctr]['primary_phone_contact'])){!! $data['acp'][$ctr]['primary_phone_contact'] !!} @endif
                                        </li>
                                    </ul>
                                </div>
                                <?php $person_count++ ?>
                            @endforeach
                        </div>
                        <div class="footer"></div>
                    </page>
                @endif

                @if(isset($data['owner']) && $person_count < $data['person_count_per_page'] && ($person_count+count($data['owner'])) < $data['person_count_per_page'])
                    <h6><?=$t['page03.h6.owners']?></h6>
                    @for($ctr=0; $ctr < count($data['owner']); $ctr++)
                        <div class="person">
                            <ul>
                                <li>
                                    <span><?=$t['page03.li.name']?></span> @if(isset($data['owner'][$ctr]['name'])){!! $data['owner'][$ctr]['name'] !!}@endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.adres']?></span> @if(isset($data['owner'][$ctr]['street'])){!! $data['owner'][$ctr]['street'] !!} @endif @if(isset($data['owner'][$ctr]['house_number'])){!! $data['owner'][$ctr]['house_number'] !!}
                                    , @endif @if(isset($data['owner'][$ctr]['postal_code'])){!! $data['owner'][$ctr]['postal_code'] !!} @endif @if(isset($data['owner'][$ctr]['city'])){!! $data['owner'][$ctr]['city'] !!} @endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.contact']?></span> @if(isset($data['owner'][$ctr]['name_contact'])){!! $data['owner'][$ctr]['name_contact'] !!} @endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.email']?></span> @if(isset($data['owner'][$ctr]['email'])){!! $data['owner'][$ctr]['email'] !!} @endif
                                </li>
                                <li>
                                    <span><?=$t['page03.li.phone']?></span> @if(isset($data['owner'][$ctr]['primary_phone_contact'])){!! $data['owner'][$ctr]['primary_phone_contact'] !!} @endif
                                </li>
                            </ul>
                        </div>
                        <?php $person_count++ ?>
                    @endfor
                @elseif(isset($data['owner']))
                    <page size="A4" class="page" class="people-extra-page">
                        <div class="header"></div>
                        <div class="subpage">
                            <h6><?=$t['page03.h6.owners']?></h6>
                            @foreach(($data['owner']) as $owner)
                                <div class="person">
                                    <ul>
                                        <li>
                                            <span><?=$t['page03.li.name']?></span> @if(isset($owner['name'])){!! $owner['name'] !!}@endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.adres']?></span> @if(isset($owner['street'])){!! $owner['street'] !!} @endif @if(isset($owner['house_number'])){!! $owner['house_number'] !!}
                                            , @endif @if(isset($owner['postal_code'])){!! $owner['postal_code'] !!} @endif @if(isset($owner['city'])){!! $owner['city'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.contact']?></span> @if(isset($owner['name_contact'])){!! $owner['name_contact'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.email']?></span> @if(isset($owner['email'])){!! $owner['email'] !!} @endif
                                        </li>
                                        <li>
                                            <span><?=$t['page03.li.phone']?></span> @if(isset($owner['primary_phone_contact'])){!! $owner['primary_phone_contact'] !!} @endif
                                        </li>
                                    </ul>
                                </div>
                                <?php $person_count++ ?>
                            @endforeach
                        </div>
                        <div class="footer"></div>
                    </page>
                @endif
            </div>
            <div class="footer"></div>
        </page>

        <?php $pageNumber = 2?>
        @while(isset($data['total_number_of_page']) && $data['total_number_of_page'] >= $pageNumber)
            <page size="A4" class="page extra_page">
                <div class="header"></div>
                <div class="subpage">

                </div>
            </page>
            <?php $pageNumber++ ?>
        @endwhile

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">

                <h4><?=$t['page04.h4.informationFirberhoodCadasterIfh']?></h4>

                <table>
                    <tr>
                        <td><?=$t['page04.td.fiberhood']?></td>
                        <td width='70%'>@if(isset($data['fiberhood'])){!! $data['fiberhood'] !!}@endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page04.td.cadasterRef']?></td>
                        <td>@if(isset($data['cadaster'])){!! $data['cadaster'] !!}@endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page04.td.mainLamKey']?></td>
                        <td>@if(isset($data['lam_mk'])){!! $data['lam_mk'] !!}@endif</td>
                    </tr>
                </table>

                <h4><?=$t['page04.h4.networkChanges']?></h4>
                <p><?=$t['page04.p.networkChangesText']?></p>


            </div>
            <div class="footer"></div>
        </page>

        <page size="A4" class="page" id="facade_or_underground">
            <div class="header"></div>
            <div class="subpage">
                <h4><?=$t['page05.h4.cablingBuilding']?></h4>
                @if(isset($data['planned_distribution']) && $data['planned_distribution'] == 'facade')
                    <h5><?=$t['page05.h5.facadeProposed']?></h5>
                    <div class="doc-img">
                        @if(isset($data['intro_on_facade_cabling_proposal']['img']))
                            @if(count($data['intro_on_facade_cabling_proposal']['img']) > $data['image_count_per_page'])
                                @for($ctr_facade=0; $ctr_facade < $data['image_count_per_page']; $ctr_facade++)
                                    <div class="items">
                                        @if(isset($data['intro_on_facade_cabling_proposal']['img'][$ctr_facade]))<img
                                                src="{!! $data['intro_on_facade_cabling_proposal']['img'][$ctr_facade] !!}"
                                                alt=""/> @endif
                                        @if(isset($data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr_underground]))
                                            <div class="remarks"></div> @endif
                                    </div>
                                @endfor
                                <?php $ctr_facade = $data['image_count_per_page']?>
                            @else
                                @for($ctr=0; $ctr<$data['image_count_per_page']; $ctr++)
                                    <div class="items">
                                        @if(isset($data['intro_on_facade_cabling_proposal']['img']))<img
                                                src="{!! $data['intro_on_facade_cabling_proposal']['img'][$ctr] !!}"
                                                alt=""/> @endif
                                        @if(isset($data['intro_on_facade_cabling_proposal']['img_remarks']))
                                            <div class="remarks">{!! $data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr] !!}</div> @endif
                                    </div>
                                @endfor
                            @endif

                        @endif
                    </div>
                @endif

                @if(isset($data['planned_distribution']) && $data['planned_distribution'] == 'underground')
                    <h5><?=$t['page05.h5.undergroundProposed']?></h5>
                    <div class="doc-img">
                        @if(isset($data['intro_underground_proposal']['img']))
                            @if(count($data['intro_underground_proposal']['img']) > $data['image_count_per_page'])
                                @for($ctr_underground_cabling=0; $ctr_underground_cabling < $data['image_count_per_page']; ++$ctr_underground_cabling)
                                    <div class="items">
                                        @if(isset($data['intro_underground_proposal']['img'][$ctr_underground_cabling]))
                                            <img src="{!! $data['intro_underground_proposal']['img'][$ctr_underground_cabling] !!}"
                                                 alt=""/> @endif
                                        @if(isset($data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling]))
                                            <div class="remarks">
                                                {!! $data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling] !!}</div> @endif
                                    </div>
                                @endfor
                                <?php $ctr_underground_cabling = $data['image_count_per_page']?>
                            @else
                                @for($ctr=0; $ctr < count($data['intro_underground_proposal']['img']); $ctr++)
                                    <div class="items">
                                        @if(isset($data['intro_underground_proposal']['img'][$ctr])) <img
                                                src="{!! $data['intro_underground_proposal']['img'][$ctr] !!}"
                                                alt=""/> @endif
                                        @if(isset($data['intro_underground_proposal']['img_remarks'][$ctr]))
                                            <div class="remarks"> {!! $data['intro_underground_proposal']['img_remarks'][$ctr] !!}
                                            </div> @endif
                                    </div>
                                @endfor
                            @endif

                        @endif
                    </div>
                @endif

            </div>
            <div class="footer"></div>
        </page>
        <?php $pageNumber = 2?>
        @while(isset($data['intro_on_facade_cabling_proposal']['number_of_pages']) && ($data['planned_distribution'] == 'facade') && $data['intro_on_facade_cabling_proposal']['number_of_pages'] >= $pageNumber)
            <page size="A4" class="page" class="facade_proposal extra_page">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">

                    <div class="doc-img">
                        @if(count($data['intro_on_facade_cabling_proposal']['img']) < $data['intro_on_facade_cabling_proposal']['number_of_pages']*$data['image_count_per_page'])
                            @for($ctr_facade; $ctr_facade < count($data['intro_on_facade_cabling_proposal']['img']); $ctr_facade++)
                                <div class="items">
                                    @if(isset($data['intro_on_facade_cabling_proposal']['img'][$ctr_facade]))<img
                                            src="{!! $data['intro_on_facade_cabling_proposal']['img'][$ctr_facade] !!}"
                                            alt=""/> @endif
                                    @if(isset($data['intro_on_facade_cabling_proposal']['img_remarks'][$ctr_facade]))
                                        <div class="remarks"></div> @endif
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </page>
            <?php $pageNumber++ ?>
        @endwhile

        <?php $pageNumber = 2?>
        @while(isset($data['intro_underground_proposal']['number_of_pages']) && ($data['planned_distribution'] == 'underground') && $data['intro_underground_proposal']['number_of_pages'] >= $pageNumber)
            <page size="A4" class="page" class="underground_proposal extra_page">
                <div class="header">
                    <div class="headerTitle"></div>
                </div>
                <div class="subpage">

                    <div class="doc-img">
                        @if(count($data['intro_underground_proposal']['img']) < $data['intro_underground_proposal']['number_of_pages']*$data['image_count_per_page'])
                            @for($ctr_underground_cabling; $ctr_underground_cabling < ($data['image_count_per_page']*$pageNumber) ; $ctr_underground_cabling++)
                                <div class="items">
                                    @if(isset($data['intro_underground_proposal']['img'][$ctr_underground_cabling]))
                                        <img src="{!! $data['intro_underground_proposal']['img'][$ctr_underground_cabling] !!} "
                                             alt=""/> @endif
                                    @if(isset($data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling]))
                                        <div class="remarks">
                                            {!! $data['intro_underground_proposal']['img_remarks'][$ctr_underground_cabling] !!}</div> @endif
                                </div>
                            @endfor
                        @endif
                    </div>

                </div>
            </page>
            <?php $pageNumber++ ?>
        @endwhile

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">
                <?=$t['page05.agreementContent']?>
            </div>
            <div class="footer"></div>
        </page>

    </div>

@endsection

@push('scripts')
<script type="text/javascript">

</script>
@endpush
