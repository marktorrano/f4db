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

    <div class="book">

        <page size="A4" class="page index">
            <div class="header index"></div>
            <div class="subpage index">
                <h2><?=$t['page01.h2.title']?></h2>
                <h1><?=$t['page01.h1.title']?></h1>
                <h3>$SITENAAM, $STRAAT, $NR, $POSTCODE, $GEMEENTE</h3>

                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td><?=$t['page01.td.date']?></td>
                            <td>$DATUM</td>
                        </tr>
                        <tr>
                            <td><?=$t['page01.td.ourReference']?></td>
                            <td>$MAIN-LAM-KEY/$KADASTER-REF</td>
                        </tr>
                        <tr>
                            <td><?=$t['page01.td.contact']?></td>
                            <td>$CONTACT</td>
                        </tr>
                        <tr>
                            <td><?=$t['page01.td.email']?></td>
                            <td>$EMAIL</td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">
                <img src="http://placehold.it/650x500?text=Foto+–+voorgevel+van+het+gebouw">
                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td>$SITENAME</td>
                        </tr>
                        <tr>
                            <td><?=$t['page02.td.adresses']?></td>
                            <td>
                                <ul class="list">
                                    <li>Streetname housenumber, zipcode city</li>
                                    <li>Streetname housenumber, zipcode city</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="footer"></div>
        </page>

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">
                <h4><?=$t['page03.h4.generalInformation']?></h4>
                <table>
                    <tr>
                        <td><?=$t['page03.td.visitDate']?>$DATE-VISIT</td>
                        <td width='60%'><?=$t['page03.td.fileDate']?>$DATE-FILE</td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.responsibleProximus']?></td>
                        <td>
                            <ul class="list">
                                <li>$RESPONSIBLE-PROXIMUS-NAME</li>
                                <li>$RESPONSIBLE-PROXIMUS-EMAIL</li>
                                <li>$RESPONSIBLE-PROXIMUS-PHONE</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.sitename']?></td>
                        <td>
                            $SITE-NAME
                        </td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.unitsCount']?></td>
                        <td>
                            $NUMBER-LUS
                        </td>
                    </tr>
                    <tr>
                        <td><?=$t['page03.td.floorsCount']?></td>
                        <td>
                            $NUMBER-FLOORS
                        </td>
                    </tr>
                </table>

                <h4><?=$t['page03.h4.yourDetails']?></h4>

                <table>
                    <tr>
                        <td>
                            <h6><?=$t['page03.h6.syndic']?></h6>
                            <ul>
                                <li><?=$t['page03.li.name']?>$SYNDIC-NAME</li>
                                <li><?=$t['page03.li.adres']?>$SYNDIC-NAMEsdf dg dfg sdfgsdf gdsfgsdfgsdfg sdfg sdfg
                                    sdfg
                                </li>
                                <li><?=$t['page03.li.contact']?>$SYNDIC-NAME</li>
                                <li><?=$t['page03.li.email']?>$SYNDIC-NAME</li>
                                <li><?=$t['page03.li.phone']?>$SYNDIC-NAME</li>
                            </ul>
                        </td>
                        <td>
                            <h6><?=$t['page03.h6.vme']?></h6>
                            <ul>
                                <li><?=$t['page03.li.name']?>$VME-NAME</li>
                                <li><?=$t['page03.li.adres']?>$VME-NAMEg fsdg sdfg sdfgdfsg sdfgdgh sdghsdf gsdfg sdfg
                                    sdfgd fd
                                </li>
                                <li><?=$t['page03.li.contact']?>$VME-NAME</li>
                                <li><?=$t['page03.li.email']?>$VME-NAME</li>
                                <li><?=$t['page03.li.phone']?>$VME-NAME</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h6><?=$t['page03.h6.owners']?></h6>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME gdsfgsdfg sdfg dfg dfgsdf gdfg fg</li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb
                                    hbd
                                </li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb
                                    hbd
                                </li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>

                            <!-- START :: IF MORE THAN 4 ADDRESSES -->
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer"></div>
        </page>

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">
                <table>
                    <tr>
                        <td>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb
                                    hbd
                                </li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb
                                    hbd
                                </li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb
                                    hbd
                                </li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li><?=$t['page03.li.name']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.adres']?>$OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb
                                    hbd
                                </li>
                                <li><?=$t['page03.li.contact']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.email']?>$OWNER-NAME</li>
                                <li><?=$t['page03.li.phone']?>$OWNER-NAME</li>
                            </ul>
                            <!-- END :: IF MORE THAN 4 ADDRESSES -->
                        </td>
                    </tr>
                </table>

                <h4><?=$t['page04.h4.informationFirberhoodCadasterIfh']?></h4>

                <table>
                    <tr>
                        <td><?=$t['page04.td.fiberhood']?></td>
                        <td width='70%'>@if(isset($data['fiberhood'])){!! $data['fiberhood'] !!}@endif</td>
                    </tr>
                    <tr>
                        <td><?=$t['page04.td.cadasterRef']?></td>
                        <td>$KADASTER-REF</td>
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

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">
                <h4><?=$t['page05.h4.cablingBuilding']?></h4>
                <h5><?=$t['page05.h5.technicalSolutionVertical']?></h5>

                <img src="http://placehold.it/650x700?text=Technische+oplossing+-+Verticale+bekabeling">

            </div>
            <div class="footer"></div>
        </page>

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">
                <h5><?=$t['page05.h5.technicalSolutionHorizontal']?></h5>

                <img src="http://placehold.it/650x700?text=Technische+oplossing+-+Horizontale+bekabeling">

            </div>
            <div class="footer"></div>
        </page>

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
