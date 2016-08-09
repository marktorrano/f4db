@extends('layouts.app')


@section('content')

    @if($data['lang'] == 'nl')
        <?php require_once(app_path(). '/includes/ssr_nl.php') ?>
        @push('styles')
        <link rel="stylesheet" href="{{asset('assets/css/ssr-nl.css')}}"/>
        @endpush
    @else
        <?php require_once(app_path(). '/includes/ssr_fr.php') ?>
        @push('styles')
        <link rel="stylesheet" href="{{asset('assets/css/ssr-fr.css')}}"/>
        @endpush
    @endif

    <style>
        @media print {
            .header {
                position: absolute;
                margin-top: -1cm;
                height: 2cm;
                width: 170mm;
                background-image: url('../assets/img/header_logo_proximus.png') !important;
                background-repeat: no-repeat !important;
            }
            h1,h3,h4,h5,h6 {
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
        <div class="page index">
            <div class="header index">
                <div class="headerTitle">
                    <?=$t['page01.headerTitle']?>
                </div>
            </div>
            <div class="subpage index">

                <img src="http://placehold.it/650x700?text=Foto+façade+principale">
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

                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="footer index"></div>
        </div>

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">

                <h3><?=$t['page02.h3.generalInformation']?></h3>

                <table>
                    <tr>
                        <td>
                            <li><?=$t['page02.li.dateSurvey']?><?php ?>: @if(isset($data['survey_outside_started'])){!! $data['survey_outside_started'] !!} @endif</li>
                            <li><?=$t['page02.li.version']?></li>
                            <li><?=$t['page02.li.dateFile']?></li>
                            <li><?=$t['page02.li.refSyndic']?>:</li>
                        </td>
                        <td>
                            <li><?=$t['page02.li.numberUnits']?> LU: @if(isset($data['nr_lu'])){!! $data['nr_lu'] !!} @endif</li>
                            <li><?=$t['page02.li.numberUnits']?> BU-S: @if(isset($data['nr_bu_s'])){!! $data['nr_bu_s'] !!} @endif</li>
                            <li><?=$t['page02.li.numberUnits']?> BU-L: @if(isset($data['nr_bu_l'])){!! $data['nr_bu_l'] !!} @endif</li>
                            <li><?=$t['page02.li.numberUnits']?> NR-SU: @if(isset($data['nr_su'])){!! $data['nr_su'] !!} @endif</li>
                            <li><?=$t['page02.li.numberFloors']?></li>
                        </td>
                    </tr>
                </table>
                <ul>


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
                    <tr>
                        <td>Syndic</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>ACP</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>Propriétaire</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>Syndic</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>ACP</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>Propriétaire</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    </tbody>
                </table>


                <h3><?=$t['page02.h3.presentDuringVisit']?></h3>

                <table>
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Société</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Nom</td>
                        <td>Société</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>Société</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>Société</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>Société</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                    </tr>
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
                        <td>$FIBERHOOD</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.cadaster']?></td>
                        <td>$CADASTER</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.mduLamKeyIfm']?></td>
                        <td>$MDU-LAM-KEY</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.plannedDistribution']?></td>
                        <td>$FACADE-OR-UNDERGROUND</td>
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
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.electricalCablesPresent']?></td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.coaxCablesPresent']?></td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.multiTapCoaxPresent']?></td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.publicLightningPresent']?></td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    </tbody>
                </table>
                <ul class="list">
                    <li><?=$t['page02.li.remarks']?> ...</li>
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
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td><?=$t['page02.td.facadeObstruction']?></td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                    </tbody>
                </table>
                <ul class="list">
                    <li><?=$t['page02.li.remarks']?> ...</li>
                </ul>


            </div>
            <div class="footer"></div>
        </page>

        <page size="A4" class="page">
            <div class="header"></div>
            <div class="subpage">

                <h3><?=$t['page03.h3.existingTelcoInstall']?></h3>

                <div class="existing-telco">
                    <table>
                        <tbody>
                        <tr>
                            <th colspan="2" width="212">
                                <strong><?=$t['page03.th.repariteurType']?></strong>
                            </th>
                            <th colspan="4" width="434">
                                <strong><?=$t['page03.th.oldNew']?></strong>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">&nbsp;</td>
                            <td colspan="4" width="434">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table>
                        <tbody>
                        <tr>
                            <th width="157">
                                <strong><?=$t['page03.th.tools']?></strong>
                            </th>
                            <th width="55">
                                <strong><?=$t['page03.th.hdpe']?></strong>
                            </th>
                            <th width="75">
                                <strong><?=$t['page03.th.lasbox']?></strong>
                            </th>
                            <th width="63">
                                <strong><?=$t['page03.th.fiber']?></strong>
                            </th>
                            <th width="116">
                                <strong><?=$t['page03.th.rack']?></strong>
                            </th>
                            <th width="180">
                                <strong><?=$t['page03.th.subduct']?></strong>
                            </th>
                        </tr>
                        <tr>
                            <td width="157">&nbsp;</td>
                            <td width="55">&nbsp;</td>
                            <td width="75">&nbsp;</td>
                            <td width="63">&nbsp;</td>
                            <td width="116">&nbsp;</td>
                            <td width="180">&nbsp;</td>
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
                            <td colspan="2" width="138">&nbsp;</td>
                            <td colspan="2" width="296">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;<?=$t['page03.td.horizontal']?>
                            </td>
                            <td colspan="2" width="138">&nbsp;</td>
                            <td colspan="2" width="296">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                <?=$t['page03.td.electricity']?>&eacute;
                            </td>
                            <td colspan="4" width="434">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                <?=$t['page03.td.detailsHt']?>&nbsp;
                            </td>
                            <td colspan="4" width="434">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                <?=$t['page03.td.roomForTools']?>
                            </td>
                            <td colspan="4" width="434">
                                <strong><?=$t['page03.td.yesNo']?></strong>
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
                                <strong><?=$t['page03.th.x']?></strong>
                            </th>
                            <th width="151">&nbsp;</th>
                            <th width="66">
                                <strong><?=$t['page03.th.x']?></strong>
                            </th>
                            <th width="170">&nbsp;</th>
                            <th width="47">
                                <strong><?=$t['page03.th.x']?></strong>
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
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                <?=$t['page03.td.fiber']?>
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                <?=$t['page03.td.multitapsTelcoRoom']?>
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.siemensBlocks']?>
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                <?=$t['page03.td.cat5orCat6']?>
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                <?=$t['page03.td.coaxAmount']?>
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.adcModules']?>
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                <?=$t['page03.td.cat3orVvt']?>
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                <?=$t['page03.td.multitapsPaliers']?>
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.screwed']?>
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                <?=$t['page03.td.redWhiteJumper']?>
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                <?=$t['page03.td.directCoax']?>
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.soldered']?>
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                <?=$t['page03.td.flatCable']?>
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                <?=$t['page03.td.coaxUnknown']?>
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                <?=$t['page03.td.connectionUnknown']?>
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                <?=$t['page03.td.existingVerticalCablingUnknown']?>
                            </td>
                            <td width="66">&nbsp;</td>
                            <td colspan="2" width="217">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <h3><?=$t['page03.h3.remarks']?></h3>

                <div style="border: 1px solid black; padding: 6px; font-size: 10px; height:8.5cm">
                    Remarques pertinentes aux rubriques 1 à 6 ci-haut
                </div>


            </div>
            <div class="footer"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3><?=$t['page04.h3.existingIntro']?></h3>

                <img src="http://placehold.it/650x800?text=Intro+existante+–+extérieur+/+intérieur">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-800px;">Documentez l’introduction existante en maquant clairement la localisation à l’alignement externe du bâtiment ainsi qu’à l’intérieur (cave/salle technique).Si possible, indiquez où une nouvelle intro pourrait être effectuée.</div>


            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3><?=$t['page05.h3.acceessToProximusTools']?></h3>

                <div style="border: 1px solid black; padding: 6px; font-size: 10px; height:2.5cm">
                    Description accès au MDU (clés, concierge, etc)
                </div>

                <br>

                <img src="http://placehold.it/650x700?text=Accès+au+MDU+et+aux+équipements+Proximus">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-680px;">Insérez photos/schémas relatifs à l’accès vers les équipements Proximus (entrée, sous-sol, etc)</div>


            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3><?=$t['page06.h3.existingSituation']?></h3>

                <h4><?=$t['page06.h4.cadasterPlan']?></h4>

                <img src="http://placehold.it/650x500?text=Plan+cadastral+-+CADGIS">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-450px;">http://ccff02.minfin.fgov.be/cadgisweb/?local=fr_BE</div>

                <h4><?=$t['page06.h4.googleView']?></h4>


                <img src="http://placehold.it/650x300?text=Vue+aérienne+(Google)">


            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">


                <h4><?=$t['page07.h4.schemaFacade']?></h4>

                <img src="http://placehold.it/650x850?text=Photos+et+schémas+-+Facade">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-840px;">
<pre>
Documentez ici les points suivants à l’aide de photos et/ou schémas
-   Alignement du bâtiment
-   Mobilier de rue et obstructions
-   Position approximative de l’intro telecom existante du bâtiment (trottoir/facade)
-   Photo claire  du bâtiment dans son ensemble
-   Présence de câbles (telco ou autre) sur la façade
    o   Présence de cables d’éléctricité
    o   Présence de câbles coaxiaux
-   Autres détails pertinents à la façade
</pre>
                </div>



            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h4><?=$t['page08.h4.schemaIntro']?></h4>

                <img src="http://placehold.it/650x850?text=Photos+et+schémas+–+Intro+et+Espace+Technique">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-840px;">
<pre>
Documentez ici les points suivants à l’aide de photos et/ou schémas
-   Information relatif à la sécurité (porte sous clé, accès libre, etc)
-   Installations existantes; elec, gas, eau
    (compteurs, panneaux, tuyaux, distribution, etc)
-   Installations existantes Proximus :
    o   Câble d’intro  venant de l’extérieur
        (type de câble ou marquage/ numérotation sur l’isolation)
    o   Copper distribution frame (CDF)
    o   Câblage vertical sortie  CDF
        (type de câble ou  marquage/ numérotation sur l’isolation)
-   Installation coax :
    o   Intro & multi-taps si présent
        (notez le nombre de multi-taps)
-   Percement d’introduction existante
    (conduit, matériaux (mur), etc)
-   Trajet du câblage existant entre l’intro du bâtiment et la gaine technique verticale
-   Situation et dimension d’espace mural  libre pour l’installation FttH
    (voir spécifications minimum sur proximus.be/construire)
-   Autres détails pertinents à l’espace technique
</pre>
                </div>

            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h4><?=$t['page09.h4.schemaVertical']?></h4>

                <img src="http://placehold.it/650x850?text=Photos+et+schémas+-+Gaine+technique+/+cage+d’escalier+/+colonne+verticale">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-840px;">
<pre>
Documentez ici les points suivants à l’aide de photos et/ou schémas
-   Emplacement de la  gaine technique / colonne verticale
-   Conduit(s)  disponible(s) pour installation fibre optique verticale
-   Accès à la gaine technique (au  sous-sol et à chaque étage)
-   Installations existantes Proximus :
    o   Câblage vertical (type de câble ou  marquage/ numérotation sur l’isolation)
-   Câbles coaxiaux verticaux  & multi-taps
-   Espace protégé disponible pour installation de floor box (répartiteur de palier pour FO)
-   Cage d’escalier - matériaux utilisés (plâtrage sur lattes, feuilles de Placoplatre, etc)
-   Cage d’escalier - finition (moulures, décoration, état général)
-   Autres détails pertinents à la cage d’escalier et la colonne technique
</pre>
                </div>

            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h4><?=$t['page10.h4.schemaHorizontal']?></h4>

                <img src="http://placehold.it/650x850?text=Photos+et+schémas+-+paliers+/+accès+horizontal">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-840px;">
<pre>
Documentez ici les points suivants à l’aide de photos et/ou schémas$
(attention : il faut vérifier CHAQUE palier et documenter en conséquence)
-   Agencement des LU/BU en relation avec la gaine technique et escalier / ascenseur (schéma)
-   Autres détails pertinents  aux paliers et à l’accès horizontal

</pre>
                </div>

            </div>
            <div class="footer index"></div>
        </page>

        <page size="A4" class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage ">

                <div class="landscape">
                    <h4><?=$t['page11.h4.unitDetails']?></h4>

                    <table>
                        <tbody>
                        <tr>
                            <th>
                                <?=$t['page11.th.zipcode']?>
                            </th>
                            <th>
                                <?=$t['page11.th.bloc']?>
                            </th>
                            <th>
                                <?=$t['page11.th.floor']?>
                            </th>
                            <th>
                                <?=$t['page11.th.unitsCount']?>
                            </th>
                            <th>
                                <?=$t['page11.th.remarks']?>
                            </th>
                            <th>
                                <?=$t['page11.th.utac']?>
                            </th>
                            <th>
                                <?=$t['page11.th.type']?>
                            </th>
                            <th>
                                <?=$t['page11.th.resident']?>
                            </th>
                            <th>
                                <?=$t['page11.th.phone']?>
                            </th>
                            <th>
                                <?=$t['page11.th.email']?>
                            </th>
                        </tr>
                        <tr>
                            <td>a
                            </td>
                            <td>b
                            </td>
                            <td>c
                            </td>
                            <td>d
                            </td>
                            <td>e
                            </td>
                            <td>f
                            </td>
                            <td>g
                            </td>
                            <td>h
                            </td>
                            <td>i
                            </td>
                            <td>j
                            </td>
                        </tr>
                        <tr>
                            <td>a
                            </td>
                            <td>b
                            </td>
                            <td>c
                            </td>
                            <td>d
                            </td>
                            <td>e
                            </td>
                            <td>f
                            </td>
                            <td>g
                            </td>
                            <td>h
                            </td>
                            <td>i
                            </td>
                            <td>j
                            </td>
                        </tr>
                        <tr>
                            <td>a
                            </td>
                            <td>b
                            </td>
                            <td>c
                            </td>
                            <td>d
                            </td>
                            <td>e
                            </td>
                            <td>f
                            </td>
                            <td>g
                            </td>
                            <td>h
                            </td>
                            <td>i
                            </td>
                            <td>j
                            </td>
                        </tr>
                        <tr>
                            <td>a
                            </td>
                            <td>b
                            </td>
                            <td>c
                            </td>
                            <td>d
                            </td>
                            <td>e
                            </td>
                            <td>f
                            </td>
                            <td>g
                            </td>
                            <td>h
                            </td>
                            <td>i
                            </td>
                            <td>j
                            </td>
                        </tr>
                        <tr>
                            <td>a
                            </td>
                            <td>b
                            </td>
                            <td>c
                            </td>
                            <td>d
                            </td>
                            <td>e
                            </td>
                            <td>f
                            </td>
                            <td>g
                            </td>
                            <td>h
                            </td>
                            <td>i
                            </td>
                            <td>j
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="footer index"></div>
        </page>


@endsection

@push('scripts')

<script type="text/javascript">


    $(document).ready(function () {

        var data = <?php echo json_encode($data) ?>;

        var headerTxt = '<div class="headerTitle"><table><tr>'+data.street+'<td>'+ data.house_number+'</td></tr><tr><td>'+ data.postal_code+' '+ data.city +'</td><td>&nbsp;</td></tr></table></div>';
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
@endpush