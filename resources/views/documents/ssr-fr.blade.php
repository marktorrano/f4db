@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="{{asset('css/ssr-fr.css')}}"/>
@endpush

@section('content')
<div id="survinator">
    <div class="book">

        <div class="page index">
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
                                    <li>@{{ $data.street }} @{{ $data.house_number }}, @{{ $data.postal_code }} @{{ $data.city }}</li>
                                    <li>Streetname housenumber, zipcode city</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="footer index"></div>
        </div>

        <div class="page">
            <div class="header"></div>
            <div class="subpage">

                <h3>1. Informations générales</h3>

                    <table>
                        <tr>
                            <td>
                                <li>Date de la visite: $VISIT-DATE</li>
                                <li>Version: $VERSION</li>
                                <li>Date dossier: $DATE</li>
                                <li>Now de bâtiment (ref syndic): $REF-SYNDIC</li>
                            </td>
                            <td>
                                <li>Nbre d'unités LU: $NR-LU</li>
                                <li>Nbre d'unités BU-S: $NR-BU-S</li>
                                <li>Nbre d'unités BU-L: $NR-BU-L</li>
                                <li>Nbre d'unités SU: $NR-SU</li>
                                <li>Nbre d'étages (RDC + x): $FLOOR-COUNT</li>
                            </td>
                        </tr>
                    </table>
                    <ul>


                    </ul>

                    <h3>2. Informations syndic – ACP - Propriétaire</h3>

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




                        <h3>3. Présent lors de la visite d’étude</h3>

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
                                <td>$FIBERHOOD</td>
                            </tr>
                            <tr>
                                <td>Cadastre</td>
                                <td>$CADASTER</td>
                            </tr>
                            <tr>
                                <td>MDU LAMKey - IFH</td>
                                <td>$MDU-LAM-KEY</td>
                            </tr>
                            <tr>
                                <td>Distribution planifiée</td>
                                <td>$FACADE-OR-UNDERGROUND</td>
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
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Présence de câbles d’électricité</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Présence de câbles coaxiaux</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Présence de multi-taps coax</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Présence éclairage publique</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            </tbody>
                        </table>
                        <ul class="list"><li>Remarks: ...</li></ul>

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
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Obstructions façade</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            </tbody>
                        </table>
                        <ul class="list"><li>Remarks: ...</li></ul>





            <div class="footer"></div>

        <div class="page">
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
        </div>





        <div class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3>8. Intro existante – extérieur / intérieur</h3>
                <img src="http://placehold.it/650x800?text=Intro+existante+–+extérieur+/+intérieur">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-800px;">Documentez l’introduction existante en maquant clairement la localisation à l’alignement externe du bâtiment ainsi qu’à l’intérieur (cave/salle technique).Si possible, indiquez où une nouvelle intro pourrait être effectuée.</div>


            </div>
            <div class="footer index"></div>
        </div>





        <div class="page">
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

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-680px;">Insérez photos/schémas relatifs à l’accès vers les équipements Proximus (entrée, sous-sol, etc)</div>


            </div>
            <div class="footer index"></div>
        </div>





        <div class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage">

                <h3>10. Situation existante - photos & schémas</h3>

                <h4>Plan cadastral - CADGIS</h4>

                <img src="http://placehold.it/650x500?text=Plan+cadastral+-+CADGIS">

                <div style="position:absolute; width: 640px;margin-left:5px;margin-top:-450px;">http://ccff02.minfin.fgov.be/cadgisweb/?local=fr_BE</div>

                <h4>Vue aérienne (Google)</h4>

                <img src="http://placehold.it/650x300?text=Vue+aérienne+(Google)">


            </div>
            <div class="footer index"></div>
        </div>






        <div class="page">
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
        </div>







        <div class="page">
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
        </div>










        <div class="page">
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
        </div>


















        <div class="page">
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
        </div>













        <div class="page">
            <div class="header">
                <div class="headerTitle"></div>
            </div>
            <div class="subpage ">

                <div class="landscape">
                    <h4>Détails des unités  - LU / BU / SU</h4>

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
        </div>











    </div>

</div>

@endsection

@push('scripts')

<script>

    var vm = new Vue({

        el: "#survinator",

        data: {
            "_id": "bda8d3dc905f2549b6b9f506cf240c78",
            "type": "building",
            "lam_mk": 1573940,
            "lam_street_code": 4511,
            "street": "Gootstraat - Rue de la Gouttière",
            "house_number": 25,
            "postal_code": 1000,
            "city": "Brussel - Bruxelles",
            "wall_mount": "NA",
            "survey_reason": "NA",
            "vertical_cabling_type_orig": "Unknown",
            "vertical_cabling_type_new": "Unknown",
            "intro_tube": "None",
            "survey_flag": true,
            "fiberhood": "FH2",
            "loop": "211",
            "loop_bloc": "14",
            "state": "inside_done",
            "survey_type": "inside",
            "survey_state_surveyor": "Admin IT 11 (JT)",
            "survey_state_surveyor_jfs_id": 2382,
            "facade": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-facade-image-20160729T094805883Z17590584000000003"
                ]
            },
            "bu_type": "mdu",
            "secondary_address": [
                {
                    "street": "Secondary Address",
                    "house_number": 25,
                    "mailbox": "Suffix",
                    "postal_code": 1000,
                    "city": "Brussel - Bruxelles"
                },
                {
                    "street": "Secondary Address second",
                    "house_number": 25,
                    "mailbox": "Suffix",
                    "postal_code": 1000,
                    "city": "Brussel - Bruxelles"
                }
            ],
            "firstname": "Name of Syndic",
            "syndic": [
                {
                    "name": "Second Syndic",
                    "address": "Second Street Second Street Second Street ",
                    "name_contact": "Second Contact Name",
                    "primary_phone_contact": "213123",
                    "secondary_phone_contact": "123123"
                },
                {
                    "name": "Third Syndic",
                    "address": "Third Street Third Street Third Street Third Street Third Street Third Street Third Street Third Street Third Street Third Street ",
                    "name_contact": "Third Syndic",
                    "primary_phone_contact": "43895349857",
                    "secondary_phone_contact": "43985709345"
                }
            ],
            "cadaster": "Cadaster",
            "acp": [
                {
                    "name": "ACP",
                    "address": "ACP street ACP street ACP street ACP street ACP street ACP street ",
                    "name_contact": "ACP",
                    "primary_phone_contact": "435345",
                    "secondary_phone_contact": "436545"
                }
            ],
            "owner": [
                {
                    "name": "Owner",
                    "address": "Owner Street Owner Street Owner Street Owner Street Owner Street Owner Street Owner Street ",
                    "name_contact": "Owner Name",
                    "primary_phone_contact": "345435345",
                    "secondary_phone_contact": "346346435"
                },
                {
                    "name": "Second Owner",
                    "address": "Second Owner Street Second Owner Street Second Owner Street ",
                    "name_contact": "Second Owner",
                    "primary_phone_contact": "43534542",
                    "secondary_phone_contact": "435345"
                }
            ],
            "present_during_visit": [
                {
                    "name": "Present During Visit",
                    "address": "Present During Visit Present During Visit Present During Visit Present During Visit Present During Visit ",
                    "name_contact": "Present During Visit",
                    "primary_phone_contact": "785687678",
                    "secondary_phone_contact": "87687678"
                },
                {
                    "name": "Second Present During Visit",
                    "address": "Second Street Second Street Second Street Second Street Second Street Second Street ",
                    "name_contact": "Second Present During Visit",
                    "primary_phone_contact": "345435",
                    "secondary_phone_contact": "435345435"
                }
            ],
            "planned_distribution": "faced",
            "quadrant": "a",
            "patrimony": "yes",
            "patrimony_remarks": "Patrimony",
            "existing_infrastructure_electricity": "yes",
            "existing_infrastructure_electricity_remarks": "Electricity Cables",
            "existing_infrastructure_coax": "yes",
            "existing_infrastructure_coax_remarks": "Coax Cables",
            "existing_infrastructure_multitaps": "yes",
            "existing_infrastructure_multitaps_remarks": "Multitap ",
            "existing_infrastructure_public_lighting": "yes",
            "publicity": "yes",
            "publicity_remarks": "Publicity Info",
            "street_objects": "yes",
            "street_objects_remarks": "Street Furniture",
            "street_obstructions": "yes",
            "street_obstructions_remarks": "Other Obstruction",
            "general_situation_remarks": "General Building",
            "nr_lu": "2",
            "nr_bu_s": "2",
            "nr_bu_l": "2",
            "nr_su": "2",
            "nr_total": "2",
            "access_to_telco_room": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-access_to_telco_room-image-20160729T095811930Z7819523400000001",
                    "bda8d3dc905f2549b6b9f506cf240c78-access_to_telco_room-image-20160729T095820417Z7904397000000001"
                ]
            },
            "requirements_to_enter_telco_room": "Access to telco room",
            "coper_intro_type": "old",
            "equipment_present": "fiber",
            "horizontal_shaft_present": "yes-accessible",
            "horizontal_shaft_present_img": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-horizontal_shaft_present_img-image-20160729T095829870Z7998932100000001"
                ]
            },
            "vertical_shaft_present": "yes-accessible",
            "vertical_shaft_present_img": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-vertical_shaft_present_img-image-20160729T095837262Z8072851350000001"
                ]
            },
            "electricity_in_telco": "yes",
            "installation_space": "yes",
            "installation_remarks": "Other Telco Room",
            "insde_cdf_connection_type": "krone",
            "existing_vertical_cabling": "cat5",
            "coax_installations": "multitab-in-technical-room",
            "individual_coax": "yes",
            "copper_intro": {
                "number_of_photos": "2",
                "copper_intro_photos": [
                    {
                        "outside": {
                            "doc_type_image": [
                                "bda8d3dc905f2549b6b9f506cf240c78-outside-image-20160729T095903296Z8333190350000001"
                            ]
                        },
                        "inside": {
                            "doc_type_image": [
                                "bda8d3dc905f2549b6b9f506cf240c78-inside-image-20160729T095905799Z83582154"
                            ]
                        }
                    },
                    {
                        "outside": {
                            "doc_type_image": [
                                "bda8d3dc905f2549b6b9f506cf240c78-outside-image-20160729T095956500Z8865223600000001",
                                "bda8d3dc905f2549b6b9f506cf240c78-outside-image-20160729T095958978Z889001045"
                            ]
                        },
                        "inside": {
                            "doc_type_image": [
                                "bda8d3dc905f2549b6b9f506cf240c78-inside-image-20160729T095956509Z8865320650000001",
                                "bda8d3dc905f2549b6b9f506cf240c78-inside-image-20160729T095958985Z889007235"
                            ]
                        }
                    }
                ]
            },
            "customer_interested_in_fiber": {
                "number_of_photos": "2",
                "desired_fiber_photos": [
                    {
                        "desired_fiber_address": "Gootstraat - Rue de la Gouttière 25 1000 Brussel - Bruxelles",
                        "outside": {
                            "doc_type_image": []
                        },
                        "inside": {
                            "doc_type_image": []
                        }
                    },
                    {
                        "desired_fiber_address": "Secondary Address 25 Suffix 1000 Brussel - Bruxelles",
                        "outside": {
                            "doc_type_image": []
                        },
                        "inside": {
                            "doc_type_image": []
                        }
                    }
                ]
            },
            "floor_plan": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-floor_plan-image-20160729T095935611Z865634225",
                    "bda8d3dc905f2549b6b9f506cf240c78-floor_plan-image-20160729T095940127Z8701500800000001"
                ]
            },
            "building_layout": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-building_layout-image-20160729T095938096Z8681192000000001",
                    "bda8d3dc905f2549b6b9f506cf240c78-building_layout-image-20160729T095942411Z8724334450000001"
                ]
            },
            "intro_on_facade_cabling_proposal": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-intro_on_facade_cabling_proposal-image-20160729T095945713Z8757357000000001",
                    "bda8d3dc905f2549b6b9f506cf240c78-intro_on_facade_cabling_proposal-image-20160729T095948058Z878080405"
                ]
            },
            "intro_underground_proposal": {
                "doc_type_image": [
                    "bda8d3dc905f2549b6b9f506cf240c78-intro_underground_proposal-image-20160729T095949755Z879777675",
                    "bda8d3dc905f2549b6b9f506cf240c78-intro_underground_proposal-image-20160729T095953185Z883208185"
                ]
            },
            "_rev": "135-43e98c19200b3f0082779ae68dbdc175"
        },

        ready: function(){
        },

        methods: {

            onSubmitForm: function (e){

//                e.preventDefault();

                data = JSON.stringify(vm.$data);

                this.$http.post(url + '/signatures', data).then(function(res){
                    console.log(res);
                });

            }

        }

    });

</script>
@endpush