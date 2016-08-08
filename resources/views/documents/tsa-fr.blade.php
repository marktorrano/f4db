@extends('layouts.app')
@push('style')

@endpush
@section('content')

    <div class="book">

        <div class="page index">
            <div class="header index"></div>
            <div class="subpage index">
                <h2>Déploiement du réseau en fibre optique</h2>
                <h1>MDU Solution Technique</h1>
                <h3>$SITENAAM, $STRAAT, $NR, $POSTCODE, $GEMEENTE</h3>

                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td>Date</td>
                            <td>$DATUM</td>
                        </tr>
                        <tr>
                            <td>Notre référentie</td>
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
                <img src="http://placehold.it/650x500?text=photo+de+la+façade+principale+du+bâtiment">
                <br>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td>Now du site:</td>
                            <td>$SITENAME</td>
                        </tr>
                        <tr>
                            <td>Adresse(s):</td>
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
                <h4>1. Information générale</h4>
                <table>
                    <tr>
                        <td>Date de la visite :<br>$DATE-VISIT</td>
                        <td width='70%'>Date du dossier : $DATE-FILE</td>
                    </tr>
                    <tr>
                        <td>Responsable Proximus</td>
                        <td>
                            <ul class="list">
                                <li>$RESPONSIBLE-PROXIMUS-NAME</li>
                                <li>$RESPONSIBLE-PROXIMUS-EMAIL</li>
                                <li>$RESPONSIBLE-PROXIMUS-PHONE</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Nom du site</td>
                        <td>
                            $SITE-NAME
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre d'unités (total)</td>
                        <td>
                            $NUMBER-LUS
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre d'étages (RDC + x)</td>
                        <td>
                            $NUMBER-FLOORS
                        </td>
                    </tr>
                </table>

                <h4>2. Vos coordonnées</h4>

                <table>
                    <tr>
                        <td>
                            <h6>Syndic</h6>
                            <ul>
                                <li>Nom: $SYNDIC-NAME</li>
                                <li>Adresse: $SYNDIC-NAMEsdf dg dfg sdfgsdf gdsfgsdfgsdfg sdfg sdfg sdfg</li>
                                <li>Contact: $SYNDIC-NAME</li>
                                <li>Email: $SYNDIC-NAME</li>
                                <li>Téléphone: $SYNDIC-NAME</li>
                            </ul>
                        </td>
                        <td>
                            <h6>VME</h6>
                            <ul>
                                <li>Nom: $VME-NAME</li>
                                <li>Adresse: $VME-NAMEsdf dg dfg sdfgsdf gdsfgsdfgsdfg sdfg sdfg sdfg</li>
                                <li>Contact: $VME-NAME</li>
                                <li>Email: $VME-NAME</li>
                                <li>Téléphone: $VME-NAME</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h6>Eigenaars (of mede-eigenaars)</h6>
                            <ul class='address'>
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
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
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
                            </ul>
                            <ul class='address'>
                                <li>Nom: $OWNER-NAME</li>
                                <li>Adresse: $OWNER-NAME gfh fghfgh fhg fg h</li>
                                <li>Contact: $OWNER-NAME</li>
                                <li>Email: $OWNER-NAME</li>
                                <li>Téléphone: $OWNER-NAME</li>
                            </ul>
                            <!-- END :: IF MORE THAN 4 ADDRESSES -->
                        </td>
                    </tr>
                </table>

                <h4>3. Informations sur le fiberhood / cadastre / IFH<br>
                    <small>(pour usage interne Proximus)</small>
                </h4>

                <table>
                    <tr>
                        <td>Fiberhood</td>
                        <td width='70%'>$FIBERHOOD</td>
                    </tr>
                    <tr>
                        <td>Référence cadastrale</td>
                        <td>$KADASTER-REF</td>
                    </tr>
                    <tr>
                        <td>Main LAMKey IFH</td>
                        <td>$MAIN-LAM-KEY</td>
                    </tr>
                </table>

                <h4>4. Renouvellement du réseau – Introduction dans le bâtiment</h4>
                <p>Dans le cadre de la rénovation de l’infrastructure du réseau de Proximus, nous déployons la fibre
                    optique jusqu’à la salle technique de votre bâtiment.</p>


            </div>
            <div class="footer"></div>
        </div>


        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <h4>5. Câblage du bâtiment</h4>
                <h5>5.1 Solution technique – Câblage vertical</h5>

                <img src="http://placehold.it/650x700?text=Technische+oplossing+-+Verticale+bekabeling">

            </div>
            <div class="footer"></div>
        </div>


        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <h5>5.2 Solution technique – Câblage horizontal</h5>

                <img src="http://placehold.it/650x700?text=Technische+oplossing+-+Horizontale+bekabeling">

            </div>
            <div class="footer"></div>
        </div>


        <div class="page">
            <div class="header"></div>
            <div class="subpage">
                <h4>6. Accord</h4>

                <p>Le soussigné accepte l’installation de la solution technique décrite dans ce document. Les directives
                    générales de mars 2016 sont d’application.</p>
                <p>Pour accord,</p>
                <br>
                <p>Date:</p>
                <p>Représentant dy syndic / ACP / Propriétaire</p>
                <p>Nom (en lettres majuscules):</p>
                <p>Signature:</p>

            </div>
            <div class="footer"></div>
        </div>


    </div>

@endsection

@push('scripts')
<script type="text/javascript">

</script>
@endpush
