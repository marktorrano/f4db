@extends('layouts.app')
@push('style')
<link rel="stylesheet" href="{{asset('css/tsa-nl.css')}}"/>
@endpush
@section('content')
    <div class="book">

        <div class="page index">
            <div class="header index"></div>
            <div class="subpage index">
                <h2>Uitrol van het Glasvezelnetwerk</h2>
                <h1>MDU Technische Oplossing</h1>
                <h3>$SITENAAM, $STRAAT, $NR, $POSTCODE, $GEMEENTE</h3>

                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td>Datum</td>
                            <td>$DATUM</td>
                        </tr>
                        <tr>
                            <td>Onze referentie</td>
                            <td>$MAIN-LAM-KEY/$KADASTER-REF</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>$CONTACT</td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>$EMAIL</td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="footer index"></div>
        </div>

        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <img src="http://placehold.it/650x500?text=Foto+–+voorgevel+van+het+gebouw">
                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td>Sitenaam:</td>
                            <td>$SITENAME</td>
                        </tr>
                        <tr>
                            <td>Adres(sen):</td>
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
        </div>

        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <h4>1. Algemene informatie</h4>
                <table>
                    <tr>
                        <td>Datum van het bezoek:<br>$DATE-VISIT</td>
                        <td width='70%'>Datum van het dossier: $DATE-FILE</td>
                    </tr>
                    <tr>
                        <td>Verantwoordelijke Proximus</td>
                        <td>
                            <ul class="list">
                                <li>$RESPONSIBLE-PROXIMUS-NAME</li>
                                <li>$RESPONSIBLE-PROXIMUS-EMAIL</li>
                                <li>$RESPONSIBLE-PROXIMUS-PHONE</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Sitenaam</td>
                        <td>
                            $SITE-NAME
                        </td>
                    </tr>
                    <tr>
                        <td>Aantal eenheden (totaal)</td>
                        <td>
                            $NUMBER-LUS
                        </td>
                    </tr>
                    <tr>
                        <td>Aantal verdiepingen (RDC + x)</td>
                        <td>
                            $NUMBER-FLOORS
                        </td>
                    </tr>
                </table>

                <h4>2. Uw gegevens</h4>

                <table>
                    <tr>
                        <td>
                            <h6>Syndic</h6>
                            <ul>
                                <li>Naam: $SYNDIC-NAME</li>
                                <li>Adres: $SYNDIC-NAMEsdf dg dfg sdfgsdf gdsfgsdfgsdfg sdfg sdfg sdfg</li>
                                <li>Contact: $SYNDIC-NAME</li>
                                <li>Email: $SYNDIC-NAME</li>
                                <li>Telefoon: $SYNDIC-NAME</li>
                            </ul>
                        </td>
                        <td>
                            <h6>VME</h6>
                            <ul>
                                <li>Naam: $VME-NAME</li>
                                <li>Adres: $VME-NAMEg fsdg sdfg sdfgdfsg sdfgdgh sdghsdf gsdfg sdfg sdfgd fd</li>
                                <li>Contact: $VME-NAME</li>
                                <li>Email: $VME-NAME</li>
                                <li>Telefoon: $VME-NAME</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h6>Eigenaars (of mede-eigenaars)</h6>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME gdsfgsdfg sdfg dfg dfgsdf gdfg fg</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb hbd</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb hbd</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>

                            <!-- START :: IF MORE THAN 4 ADDRESSES -->
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer"></div>
        </div>
        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <table>
                    <tr>
                        <td>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb hbd</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb hbd</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb hbd</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Naam: $OWNER-NAME</li>
                                <li>Adres: $OWNER-NAME fsdf dsfg sdfg sdrg sdrgsdr tgtdegh dtshb hbd</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Telefoon: $OWNER-NAME</li>
                            </ul>
                            <!-- END :: IF MORE THAN 4 ADDRESSES -->
                        </td>
                    </tr>
                </table>

                <h4>3. Informatie van het Fiberhood / kadaster / IFH <br>
                    <small>(voor intern gebruik Proximus)</small>
                </h4>

                <table>
                    <tr>
                        <td>Fiberhood</td>
                        <td width='70%'>$FIBERHOOD</td>
                    </tr>
                    <tr>
                        <td>Kadaster ref</td>
                        <td>$KADASTER-REF</td>
                    </tr>
                    <tr>
                        <td>Main LAMKey IFH</td>
                        <td>$MAIN-LAM-KEY</td>
                    </tr>
                </table>

                <h4>4. Informatie van het Fiberhood / kadaster / IFH <br>
                    <small>(voor intern gebruik Proximus)</small>
                </h4>
                <p>In het kader van de vernieuwing van het netwerk zal Proximus het ultrasnelle glasvezelnetwerk tot in
                    de technische ruimte van uw gebouw brengen.</p>


            </div>
            <div class="footer"></div>
        </div>


        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <h4>5. Bekabeling van het gebouw</h4>
                <h5>5.1 Technische oplossing - Verticale bekabeling</h5>

                <img src="http://placehold.it/650x700?text=Technische+oplossing+-+Verticale+bekabeling">

            </div>
            <div class="footer"></div>
        </div>


        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <h5>5.2 Technische oplossing – Horizontale bekabeling</h5>

                <img src="http://placehold.it/650x700?text=Technische+oplossing+-+Horizontale+bekabeling">

            </div>
            <div class="footer"></div>
        </div>


        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <h4>6. Overeenkomst</h4>

                <p>Ondergetekende accepteert de installatie van de technische oplossing beschreven in dit document. De
                    algemene richtlijnen van maart 2016 zijn van toepassing.</p>
                <p>Voor akkoord,</p>
                <br>
                <p>Datum:</p>
                <p>Verantwoordelijke van het syndicus / VME / Eigenaar</p>
                <p>Naam (in hoofdletters):</p>
                <p>Handtekening:</p>

            </div>
            <div class="footer"></div>
        </div>


    </div>
@push('script')

    <script type="text/javascript">

        $(document).ready(function () {

            var headerTxt = '<div class="headerTitle">Dossier: $MAIN-LAM-KEY/$KADASTER-REF</div>';
            $.each($('.header'), function () {
                if (!$(this).hasClass('index')) {
                    $(this).html(headerTxt);
                }
            });

            var footerTxt = '<div class="footerTitle">Proximus NV van publiek recht</div><div class="footerText">Koning Albert II-laan 27, B-1030 Brussel, BTW BE 0202.239.951 RPR Brussel, BE50 0001 7100 3118 BPOTBEB1</div><div class="footerPagenumber">Pagina <span class="pagenumberThis">?</span> van <span class="pagenumberTotal">?</span></div>';
            $.each($('.footer'), function () {
                if (!$(this).hasClass('index')) {
                    $(this).html(footerTxt);
                }
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
@endpush