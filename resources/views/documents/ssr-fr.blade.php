@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/ssr-fr.css')}}"/>
@endpush

@section('content')
    <div class="book" id="survinator">
        <page size='A4' class="page index">
            <div class="header index">
                <div class="headerTitle">
                    MDU Site Survey Report – Procès-verbal étude de site
                </div>
            </div>
            <div class="subpage index">

                <img src="http://placehold.it/650x700?text=Foto+façade+principale">
                <br>
                <br>
                <br>
                <h3>Adresse(s) MDU</h3>
                <div>
                    <table>
                        <tr>
                            <td>Adres(sen):</td>
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
        </page>

        <page class="page" size="A4">
            <div class="header"></div>
            <div class="subpage">

                <h3>1. Informations générales</h3>

                <table>
                    <tr>
                        <td>
                            <li>Date de la visite: @if(isset($data['survey_outside_started']))<span
                                        class="is-a-date">{!! $data['survey_outside_started'] !!} @endif </span></li>
                            <li>Version:</li>
                            <li>Date dossier: $DATE</li>
                            <li>Now de bâtiment (ref syndic): $REF-SYNDIC</li>
                        </td>
                        <td>
                            <li>Nbre d'unités LU: @if(isset($data['nr_lu'])){!! $data['nr_lu'] !!} @endif</li>
                            <li>Nbre d'unités BU-S: @if(isset($data['nr_bu_s'])){!! $data['nr_bu_s'] !!} @endif</li>
                            <li>Nbre d'unités BU-L: @if(isset($data['nr_bu_l'])){!! $data['nr_bu_l'] !!} @endif</li>
                            <li>Nbre d'unités SU: @if(isset($data['nr_su'])){!! $data['nr_su'] !!} @endif</li>
                            <li>Nbre d'étages (RDC + x):</li>
                        </td>
                    </tr>
                </table>
                <ul>


                </ul>

                <h3>2. Informations syndic – ACP - Propriétaire</h4>

                    <table>
                        <thead>
                        <tr>
                            <th>Syndic/ACP/Propriétaire</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Syndic</td>
                            <td> syndic.name_contact</td>
                            <td> syndic.email</td>
                            <td> syndic.primary_phone_contact</td>
                        </tr>
                        <tr>
                            <td>ACP</td>
                            <td>acp.name_contact</td>
                            <td>acp.email</td>
                            <td>acp.primary_phone_contact</td>
                        </tr>
                        <tr>
                            <td>Propriétaire</td>
                            <td>owner.name_contact</td>
                            <td>owner.email</td>
                            <td>owner.primary_phone_contact</td>
                        </tr>

                        </tbody>
                    </table>


                    <h3>3. Présent lors de la visite d’étude</h3>

                    <table>
                        <thead>
                        <tr v-for="present_during_visit in docs.doc.present_during_visit">
                            <th>present_during_visit.name</th>
                            <th>Société</th>
                            <th>present_during_visit.email</th>
                            <th>present_during_visit.primary_phone_contact</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="supervisor in docs.doc.present_during_visit">
                            <td>supervisor.name</td>
                            <td>Société</td>
                            <td>supervisor.email</td>
                            <td>supervisor.primary_phone_contact</td>
                        </tr>

                        </tbody>
                    </table>


                    <h3>4. Info Fiberhood - cadastre - IFH</h3>

                    <table>
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Reference</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Fiberhood</td>
                            <td> docs.doc.fiberhood</td>
                        </tr>
                        <tr>
                            <td>Cadastre</td>
                            <td>docs.doc.cadaster</td>
                        </tr>
                        <tr>
                            <td>MDU LAMKey - IFH</td>
                            <td>$MDU-LAM-KEY</td>
                        </tr>
                        <tr>
                            <td>Distribution planifiée</td>
                            <td>docs.doc.planned_distribution</td>
                        </tr>
                        </tbody>
                    </table>


                    <h3>5. Visuel – Façade & Rue</h3>

                    <table>
                        <thead>
                        <tr>
                            <th>Façade</th>
                            <th>Details</th>
                            <th>Oui/Non</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Façade de caractère</td>
                            <td>patrimony_remarks</td>
                            <td>patrimony</td>
                        </tr>
                        <tr>
                            <td>Présence de câbles d’électricité</td>
                            <td>existing_infrastructure_electricity_remarks</td>
                            <td>existing_infrastructure_electricity</td>
                        </tr>
                        <tr>
                            <td>Présence de câbles coaxiaux</td>
                            <td>existing_infrastructure_coax_remarks</td>
                            <td>existing_infrastructure_coax</td>
                        </tr>
                        <tr>
                            <td>Présence de multi-taps coax</td>
                            <td>existing_infrastructure_multitaps_remarks</td>
                            <td>existing_infrastructure_multitaps</td>
                        </tr>
                        <tr>
                            <td>Présence éclairage publique</td>
                            <td></td>
                            <td>existing_infrastructure_public_lighting</td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="list">
                        <li>publicity_remarks</li>
                    </ul>

                    <br>
                    <table>
                        <thead>
                        <tr>
                            <th>Rue</th>
                            <th>Details</th>
                            <th>Oui/Non</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mobilier de rue (ex abribus)</td>
                            <td>street_objects_remarks</td>
                            <td>street_objects</td>
                        </tr>
                        <tr>
                            <td>Obstructions façade</td>
                            <td>street_obstructions_remarks</td>
                            <td>street_obstructions</td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="list">
                        <li>general_situation_remarks</li>
                    </ul>


            </div>
            <div class="footer"></div>
        </page>

        <page class="page" size="A4">
            <div class="header"></div>
            <div class="subpage">

                <h3>6. Installations telco existantes</h3>

                <div class="existing-telco">
                    <table>
                        <tbody>
                        <tr>
                            <th colspan="2" width="212">
                                <strong>Type de r&eacute;partiteur :</strong>
                            </th>
                            <th colspan="4" width="434">
                                <strong>Ancien // Nouveau</strong>
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
                                <strong>Equipements :</strong>
                            </th>
                            <th width="55">
                                <strong>HDPE</strong>
                            </th>
                            <th width="75">
                                <strong>LASBOX</strong>
                            </th>
                            <th width="63">
                                <strong>FIBRE</strong>
                            </th>
                            <th width="116">
                                <strong>RACK</strong>
                            </th>
                            <th width="180">
                                <strong>SUBDUCT</strong>
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
                                <strong>Gaine technique existante :</strong>
                            </th>
                            <th colspan="2" width="138">
                                <strong>OUI / NON</strong>
                            </th>
                            <th colspan="2" width="296">
                                <strong>Accessible OUI / NON </strong>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;Verticale
                            </td>
                            <td colspan="2" width="138">&nbsp;</td>
                            <td colspan="2" width="296">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                &nbsp;Horizontale
                            </td>
                            <td colspan="2" width="138">&nbsp;</td>
                            <td colspan="2" width="296">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                Electricit&eacute;
                            </td>
                            <td colspan="4" width="434">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                Details (cabine HT, etc)&nbsp;
                            </td>
                            <td colspan="4" width="434">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">
                                Espace disponible pour &eacute;quipment
                            </td>
                            <td colspan="4" width="434">
                                <strong>OUI / NON</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table>
                        <tbody>
                        <tr>
                            <th colspan="2" width="212">
                                <strong>CDF</strong>
                            </th>
                            <th colspan="2" width="217">
                                <strong>CABLAGE VERTICAL EXISTANT</strong>
                            </th>
                            <th colspan="2" width="217">
                                <strong>COAX</strong>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" width="212">&nbsp;</td>
                            <td colspan="2" width="217">&nbsp;</td>
                            <td colspan="2" width="217">&nbsp;</td>
                        </tr>
                        <tr>
                            <th width="154">
                                <strong>Connections</strong>
                            </th>
                            <th width="57">
                                <strong>X</strong>
                            </th>
                            <th width="151">&nbsp;</th>
                            <th width="66">
                                <strong>X</strong>
                            </th>
                            <th width="170">&nbsp;</th>
                            <th width="47">
                                <strong>X</strong>
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
                                &nbsp;Krone blocks
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                &nbsp;Fiber
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                &nbsp;Multitaps salle technique
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                &nbsp;Siemens blocks
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                &nbsp;CAT5e or Cat6
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                &nbsp;Quantit&eacute; (salle tech seulement)
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                &nbsp;ADC modules
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                &nbsp;CAT3 or VVT
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                &nbsp;Multitaps paliers
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                &nbsp;Viss&eacute;s / Screwed
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                &nbsp;Red-white jumper
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                &nbsp;Coax direct
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                &nbsp;Soud&eacute;s / soldered
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                &nbsp;Cable plat / Flat cable
                            </td>
                            <td width="66">&nbsp;</td>
                            <td width="170">
                                &nbsp;Autre/ inconnu
                            </td>
                            <td width="47">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="154">
                                &nbsp;Autre/inconnu
                            </td>
                            <td width="57">&nbsp;</td>
                            <td width="151">
                                &nbsp;Autre/inconnu
                            </td>
                            <td width="66">&nbsp;</td>
                            <td colspan="2" width="217">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <h3>7. Remarks</h3>

                <div style="border: 1px solid black; padding: 6px; font-size: 10px; height:8.5cm">
                    Remarques pertinentes aux rubriques 1 à 6 ci-haut
                </div>


            </div>
            <div class="footer"></div>
        </page>

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3>8. Intro existante – extérieur / intérieur</h3>
                <img src="http://placehold.it/650x800?text=Intro+existante+–+extérieur+/+intérieur">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-800px;">Documentez
                    l’introduction existante en maquant clairement la localisation à l’alignement externe du bâtiment
                    ainsi qu’à l’intérieur (cave/salle technique).Si possible, indiquez où une nouvelle intro pourrait
                    être effectuée.
                </div>


            </div>
            <div class="footer index"></div>
        </page>

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3>9. Accès au MDU & aux équipements Proximus</h3>

                <div style="border: 1px solid black; padding: 6px; font-size: 10px; height:2.5cm">
                    Description accès au MDU (clés, concierge, etc)
                </div>

                <br>

                <img src="http://placehold.it/650x700?text=Accès+au+MDU+et+aux+équipements+Proximus">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-680px;">Insérez photos/schémas
                    relatifs à l’accès vers les équipements Proximus (entrée, sous-sol, etc)
                </div>


            </div>
            <div class="footer index"></div>
        </page>

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3>10. Situation existante - photos & schémas</h3>

                <h4>Plan cadastral - CADGIS</h4>

                <img src="http://placehold.it/650x500?text=Plan+cadastral+-+CADGIS">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-450px;">
                    http://ccff02.minfin.fgov.be/cadgisweb/?local=fr_BE
                </div>

                <h4>Vue aérienne (Google)</h4>

                <img src="http://placehold.it/650x300?text=Vue+aérienne+(Google)">


            </div>
            <div class="footer index"></div>
        </page>

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">


                <h4>Photos & schémas - Facade</h4>

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

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h4>Photos & schémas – Intro & Espace Technique</h4>

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

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h4>Photos & schémas - Gaine technique / cage d’escalier / colonne verticale</h4>

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

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h4>Photos & schémas - paliers / accès horizontal</h4>

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

        <page class="page" size="A4">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage ">

                <div class="landscape">
                    <h4>Détails des unités - LU / BU / SU</h4>

                    <table>
                        <tbody>
                        <tr>
                            <th>
                                Boite postale
                            </th>
                            <th>
                                Bloc
                            </th>
                            <th>
                                Etage
                            </th>
                            <th>
                                # unit&eacute;
                            </th>
                            <th>
                                Remarques
                            </th>
                            <th>
                                UTAC
                            </th>
                            <th>
                                Type
                                (LU/BU/SU)
                            </th>
                            <th>
                                R&eacute;sident
                            </th>
                            <th>
                                Tel / GSM
                            </th>
                            <th>
                                email
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


    </div>

@endsection

@push('scripts')

@endpush