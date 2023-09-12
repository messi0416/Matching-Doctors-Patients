<?php

define('TITLE', "CONSULTATION");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "../layouts/navbar.php";
mysqli_close($conn);
include "../php/functions.php";

?>
<script src="https://cdn.tiny.cloud/1/twu1q50vokw3bsl0tdqxta9xx0d7waoedqwa50qcg1cwi6v4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen powerpaste advtable advcode editimage tableofcontents mergetags inlinecss',
        toolbar: 'print undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight indent | table addcomment showcomments | spellcheckdialog a11ycheck typography | link image media mergetags | checklist numlist bullist outdent | emoticons charmap | removeformat ',
        height: 500,
        skin: 'material-outline',
        statusbar: false,
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        indentation: '10pt',
        content_css: '../css/textarea.css'
    });
</script>

<div class="container-fluid">
    <div class="col py-3">
        <h4>Consultation</h4>
        <ul class="list-unstyled">
            <a class="btn btn-success ml-1" id="togg8" data-toggle="tab" role="tab" aria-controls="List" aria-selected="false"><i class="fa fa-table"></i> Patient Information</a>
            <a class="btn btn-success ml-1 tiny-togg" id="togg53" data-toggle="tab" role="tab" aria-controls="List" aria-selected="false"><i class="fa fa-table"></i> Avis médical</a>
            <a class="btn btn-success ml-1 tiny-togg" id="togg4" data-toggle="tab" role="tab" aria-controls="instruction" aria-selected="false"><i class="fa fa-table"></i> Retentissements</a>
            <a class="btn btn-success ml-1 tiny-togg" id="togg20" data-toggle="tab" role="tab" aria-controls="autonomie" aria-selected="false"><i class="fa fa-table"></i> Autonomie</a>
            <a class="btn btn-success ml-1 tiny-togg" id="togg3" data-toggle="tab" role="tab" aria-controls="Physical_condition" aria-selected="false"><i class="fa fa-table"></i> Condition physique</a>
            <a class="btn btn-success ml-1 " id="togg5" data-toggle="tab" role="tab" aria-controls="Presciption" aria-selected="false"><i class="fa fa-table"></i> Documents</a>
        </ul>
        <div id="d8" style="display: block; border: 1px solid;">
            <h5 id="patient_email" style="display: none;"><?php echo $_SESSION['pemail']; ?></h5>
            <h5 id="consult_id" style="display: none;"><?php echo $_SESSION['lastid']; ?></h5>
            <h5>Assigned Consultation ID: <?php echo $_SESSION['lastid']; ?></h5>
            <h5>Patient Name: <?php echo $_SESSION['pname']; ?></h5>
            <h5>Patient Email: <?php echo $_SESSION['pemail']; ?></h5>
            <h5>Accident Type: <?php echo $_SESSION['acc_type']; ?></h5>
            <h5 id="last_date"></h5>
            <h5 style="display: none;" id="active_page"></h5>
            <h5 style='text-align: center;'>If you are going to quit the consultation, <a href="patient.php">click here</a>
                <h5>
        </div>
    </div>
    <div id="tiny_parent" style="display: none;">
        <textarea class="textarea" id="tiny_main">
        </textarea>
        <div style="height: 100px">
            <button style="float: right; margin: 2rem;" type='button' class='btn btn-primary' id="data_submit">Submit</button>
        </div>
        <br>
    </div>

    <div id="d53" style="display: none;">
        <h1>Avis medical</h1>
        <p class="p_intro"><strong><span class="span_intro">Docteur Julien COHEN</span></strong></p>
        <p class="p_intro"><strong><span class="span_intro">Sp&eacute;cialiste en M&eacute;decine G&eacute;n&eacute;rale</span></strong></p>
        <p class="p_intro"><strong><span class="span_intro">D.U. R&eacute;paration Juridique du Dommage Corporel</span></strong></p>
        <p class="p_intro"><strong><span class="span_intro">D.I.U. Expertises en Accidents M&eacute;dicaux</span></strong></p>
        <p class="p_intro"><strong><span class="span_intro">D.I.U. Evaluation des traumatis&eacute;s cr&acirc;niens</span></strong></p>
        <p class="p_intro"><span class="span_intro">1 Place de l&rsquo;Abbaye</span></p>
        <p class="p_intro"><span class="span_intro">94000 Cr&eacute;teil</span></p>
        <p class="p_intro"><span class="span_intro">T&eacute;l.&nbsp;: 01 43 77 56 27 </span></p>
        <p class="p_intro"><span class="span_intro">&nbsp;</span></p>
        <p class="p_intro">NOM PRENOM: </p>
        <p class="p_intro">DATE DE NAISSANCE :</p>
        <p class="p_intro">ADRESSE : </p>
        <p class="p_intro">DATE D&rsquo;EXPERTISE UNILATERALE : </p>
        <p class="p_intro">DATE REDACTION DU RAPPORT : </p>
        <p class="p_intro">DATE DE L&rsquo;ACCIDENT : </p>
        <p class="p_intro">ACCIDENT DE TRAVAIL : </p>
        <p class="p_intro"></p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">SITUATION PERSONNELLE ET SOCIOPROFESSIONNELLE</span></strong></p>
        </div>
        <p></p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">RAPPEL DES FAITS</span></strong></p>
        </div>
        <p></p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">EXAMEN CLINIQUE</span></strong></p>
        </div>
        <p></p>

    </div>



    <div id="d3" style="display: none; border: 1px solid; padding: 0.5rem;">
        <h1 style="text-align: center;">Condition Physique</h1>
        <form action="../php/consultation_store.php" method="POST" id="Condition" class="needs-validation">
            <input type="hidden" name="action" value="con" id="submit_action">
            <div class="form-row">
                <input type="hidden" class="form-control">
                <label style="display: none;"></label>
                <div class="form-group col-md-4">
                    <label for="Taille">Taille(cm)</label>
                    <input type="text" class="form-control" id="Taille" name="Physical_condition1" placeholder="En Cm">
                </div>

                <div class="form-group col-md-4">
                    <label for="Poids">Poids(kg)</label>
                    <input type="text" class="form-control" id="Poids" name="Physical_condition2" placeholder="En Kg">
                </div>

                <div class="form-group col-md-4">
                    <label for="Groupesanguin">Groupe sanguin</label>
                    <select id="Groupesanguin" name="Physical_condition3" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="typed'accident">Type d'accident</label>
                    <select id="typed'accident" name="Physical_condition4" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="Accident de la route">Accident de la route</option>
                        <option value="Accident pieton">Accident pieton</option>
                        <option value="Accident medical">Accident medical</option>
                        <option value="Accident du travail">Accident du travail</option>
                        <option value="Accident du sport">Accident du sport</option>
                        <option value="Accident de la vie">Accident de la vie</option>
                        <option value="Agression">Agression</option>
                        <option value="Maltraitance">Maltraitance</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="accidentTravail">Accident du travail</label>
                    <select id="accidentTravail" name="Physical_condition5" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Dateaccident">Date de l'accident</label>
                    <input type="date" class="form-control" name="Physical_condition6" id="Dateaccident" placeholder="Date">
                </div>

                <div class="form-group col-md-4">
                    <label for="Profession">Proffession</label>
                    <input type="text" class="form-control" name="Physical_condition7" id="Profession" placeholder="">
                </div>

                <div class="form-group col-md-4">
                    <label for="Salarié">Salarié</label>
                    <select id="Salarié" name="Physical_condition8" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Transport">Moyen de transpport</label>
                    <select id="Transport" name="Physical_condition9" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="Voiture">Voiture</option>
                        <option value="Moto">Moto</option>
                        <option value="Scooter">Scooter</option>
                        <option value="Transport en commun">Transport en commun</option>
                        <option value="Velo">Velo</option>
                        <option value="Trottinette électrique">Trottinette électrique</option>
                        <option value="autre">autre</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Sportif">Sportif</label>
                    <select id="Sportif" name="Physical_condition10" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Résidence">Résidence</label>
                    <select id="Résidence" name="Physical_condition11" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="Maison">Maison</option>
                        <option value="Apartement">Apartement</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="jardin">jardin</label>
                    <select id="jardin" name="Physical_condition12" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Hospitalisation">Nombre d'hospitalisations</label>
                    <input id="Hospitalisation" name="Physical_condition13" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-4">
                    <label for="DateHospitalisation">Date début d'Hospitalisation</label>
                    <input type="date" class="form-control" name="Physical_condition14" id="DateHospitalisation">
                </div>

                <div class="form-group col-md-4">
                    <label for="Dismisshospital">Date fin d'Hospitalisation</label>
                    <input type="date" class="form-control" name="Physical_condition15" id="Dismisshospital">
                </div>

                <div class="form-group col-md-4">
                    <label for="Chirurgie">Nombre de chirurgies</label>
                    <input type="text" id="Chirurgie" name="Physical_condition16" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-4">
                    <label for="Immobilisation">Immobilisation</label>
                    <select id="Immobilisation" name="Physical_condition17" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="ImmobilisationType">Type</label>
                    <select id="ImmobilisationType" name="Physical_condition18" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="Platres">Platres</option>
                        <option value="Atteles">Atteles</option>
                        <option value="Fauteuil">Fauteuil</option>
                        <option value="Alitement">Alitement</option>
                        <option value="Autres">Autres</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Aidetechnique">Aide téchnique</label>
                    <select id="Aidetechnique" name="Physical_condition19" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="Canne">Canne</option>
                        <option value="Béquille">Béquille</option>
                        <option value="fauteuil">fauteuil </option>
                        <option value="Déambulateur">Déambulateur</option>
                        <option value="Rien">Rien</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Réeducation">Réeducation</label>
                    <select id="Réeducation" name="Physical_condition20" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="ReeducationType">Type</label>
                    <select id="ReeducationType" name="Physical_condition21" class="form-control">
                        <option selected value="">Choisir...</option>
                        <option value="Centre de réeducation">Centre de réeducation</option>
                        <option value="kinésithérapie">kinésithérapie</option>
                        <option value="Ostéopathie">Ostéopathie</option>
                        <option value="Cure">Cure</option>
                        <option value="Autres">Autres</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputDuree">Durée</label>
                    <input type="text" class="form-control" name="Physical_condition22" id="inputDuree" placeholder="1an, 1 mois, 2jours,">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" id="con_submit" style="float:right; margin-left: 2rem !important;">Soumettre</button>
            <button type="button" class="btn btn-primary btn-sm export-pdf" style="float:right;">Export PDF</button>
            <div style="clear:both"></div>
        </form>
    </div>


    <div id="d4" style="display: none;">
        <h1>Retentissements</h1>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Decrire les circonstances de l'accident</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Decrire votre poste de travail, vos codition de reprise</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Decrire les changements apr&egrave;s l'accident</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Apr&egrave;s l'accident votre aspect esth&eacute;tique a-t-il &eacute;t&eacute; modifi&eacute; ? (attelle, canne, cicatrice)</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Apr&egrave;s l'accident avez vous changer de v&eacute;hicule ou l'avez vous amenag&eacute; ?</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Apr&egrave;s l'accident avez vous fait des modifications dans votre logement ?</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Apr&egrave;s l'accident avez vous eu des modifications dans votre scolarit&eacute; ?</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <div class="avis">
            <p class="subtitle"><strong><span class="span_subtitle">Depuis l'accident avez-vous eu un pr&eacute;judice sexuel ? (g&egrave;ne positionnel, baisse de libido, atteinte g&eacute;nitale)</span></strong></p>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <hr>
        <p>&nbsp;</p>
        <p><strong><span class="span_subtitle">Avez-vous repris vos activit&eacute;s sportives?:&nbsp;</span></strong></p>
        <p><strong><span class="span_subtitle">Avez-vous eu un arr&ecirc;t de travail?:</span></strong></p>
        <p><strong><span class="span_subtitle">Quel date?:</span></strong></p>
        <p><strong><span class="span_subtitle">Avez-vous repris au m&ecirc;me poste et au m&ecirc;me salaire?:</span></strong></p>
        <p><strong><span class="span_subtitle">Avez-vous des douleurs pendant le travail?:</span></strong></p>
        <p><strong><span class="span_subtitle">Avez-vous perdu une promotion &agrave; cause de l'accident?:</span></strong></p>
        <p><strong><span class="span_subtitle">Avez-vous vu le m&eacute;decin du travail?:</span></strong></p>
        <p><strong><span class="span_subtitle">De quoi vous plaignez vous aujourd'hui ? (&agrave; cause de l'accident seulement):</span></strong></p>
        <p><strong><span class="span_subtitle">Dans les suites imm&eacute;diate de l'accident, avez-vous eu besoin d'aides humaines pour la toilette,l'habillage, la pr&eacute;paration des repas, les d&eacute;placements?:</span></strong></p>
        <p><strong><span class="span_subtitle">Aujourd'hui, avez-vous besoin d'aides humaines pour la toilette,l'habillage, la pr&eacute;paration des repas, les d&eacute;placements?:</span></strong></p>
        <p><strong><span class="span_subtitle">Avez-vous eu un suivis psychologique?:</span></strong></p>
        <p><strong><span class="span_subtitle">Si oui avez-vous pris des m&eacute;dicaments pour cela?:</span></strong></p>
        <p>&nbsp;</p>
    </div>

    <!-- <div id="d20" style="display: none ;">
            <h1>Autonomie</h1>
            <p>&nbsp;</p>
            <table style="border-collapse: collapse; width: 96.7393%; height: 114.545px; border-width: 1px; margin-left: auto; margin-right: auto;" border="1"><colgroup><col style="width: 29.8288%;"><col style="width: 7.73768%;"><col style="width: 29.3587%;"><col style="width: 33.1469%;"></colgroup>
            <tbody>
            <tr style="height: 19.0909px;">
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;"><span style="font-size: 14pt;"><strong>Symptom</strong></span></td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;"><span style="font-size: 14pt;"><strong>Si oui Par qui ? </strong></span></td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;"><span style="font-size: 14pt;"><strong>Combien de temps ? </strong></span></td>
            </tr>
            <tr style="height: 19.0909px;">
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">Aide pour la toilette</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">❌⭕</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            </tr>
            <tr style="height: 19.0909px;">
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">Aide pour l'habillage</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">❌⭕</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            </tr>
            <tr style="height: 19.0909px;">
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">Aide pour les repas</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">❌⭕</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            </tr>
            <tr style="height: 19.0909px;">
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">Aide pour les courses</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">❌⭕</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            </tr>
            <tr style="height: 19.0909px;">
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">Aide pour le m&eacute;nage</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">❌⭕</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            <td style="text-align: center; height: 19.0909px; border-width: 1px; padding: 10px;">&nbsp;</td>
            </tr>
            </tbody>
            </table>    
    </div> -->

    <div id="d20" style="display: none; border: 1px solid; padding: 0.5rem;">
        <h1 style="text-align: center;">Autonomie</h1>
        <form action="../php/consultation_store.php" method="post" id="Autonomie" class="needs-validation grey-border" novalidate>
            <input type="hidden" name="action" value="aut" id="submit_action">
            <input type="hidden" class="form-control">
            <label style="display: none;"></label>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="toiletteAide"><br />Aide pour la toilette</label>
                    <select id="toiletteAide" name="Autonomy1" class="form-control">
                        <option selected>Choisir...</option>git
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="toiletteQui"><br /> Si oui Par qui ?</label>
                    <input type="text" name="Autonomy2" class="form-control" id="toiletteQui">
                </div>

                <div class="form-group col-md-4">
                    <label for="toiletteDuree"><br /> Combien de temps ?</label>
                    <input type="text" name="Autonomy3" class="form-control" id="toiletteDuree">
                </div>

                <div class="form-group col-md-4">
                    <label for="habillageAide"><br />Aide pour l'habillage</label>
                    <select id="habillageAide" name="Autonomy4" class="form-control">
                        <option selected>Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="habillageQui"><br /> Si oui Par qui ?</label>
                    <input type="text" name="Autonomy5" class="form-control" id="habillageQui">
                </div>

                <div class="form-group col-md-4">
                    <label for="habillageDuree"><br /> Combien de temps ?</label>
                    <input type="text" name="Autonomy6" class="form-control" id="habillageDuree">
                </div>

                <div class="form-group col-md-4">
                    <label for="repasAide"><br />Aide pour les repas</label>
                    <select id="repasAide" name="Autonomy7" class="form-control">
                        <option selected>Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="repasQui"><br /> Si oui Par qui ?</label>
                    <input type="text" name="Autonomy8" class="form-control" id="repasQui">
                </div>

                <div class="form-group col-md-4">
                    <label for="repasDuree"><br /> Combien de temps ?</label>
                    <input type="text" name="Autonomy9" class="form-control" id="repasDuree">
                </div>

                <div class="form-group col-md-4">
                    <label for="coursesAide"><br /> Aide pour les courses</label>
                    <select id="coursesAide" name="Autonomy10" class="form-control">
                        <option selected>Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="coursesQui"><br /> Si oui Par qui ?</label>
                    <input type="text" name="Autonomy11" class="form-control" id="coursesQui">
                </div>

                <div class="form-group col-md-4">
                    <label for="coursesDuree"><br /> Combien de temps ?</label>
                    <input type="text" name="Autonomy12" class="form-control" id="coursesDuree">
                </div>

                <div class="form-group col-md-4">
                    <label for="menageAide"><br />Aide pour le ménage</label>
                    <select id="menageAide" name="Autonomy13" class="form-control">
                        <option selected>Choisir...</option>
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="menageQui"><br /> Si oui Par qui ?</label>
                    <input type="text" name="Autonomy14" class="form-control" id="menageQui">
                </div>

                <div class="form-group col-md-4">
                    <label for="menageDuree"><br /> Combien de temps ?</label>
                    <input type="text" name="Autonomy15" class="form-control" id="menageDuree">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" id="aut_submit" style="float:right; margin-left: 2rem !important;">Soumettre</button>
            <button type="button" class="btn btn-primary btn-sm export-pdf" style="float:right;">Export PDF</button>
            <div style="clear:both"></div>
        </form>
    </div>

   

    <div id="d5" style="display: none;">

        <div class="col-md-12 col-sm-12 text-center">
            <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                <h2>Documents Drive</h2>

            </div>
            <button class="btn btn-primary btn-lg mb-4" id="doc_add">
                <i class="fa fa-plus"></i> Ajouter
            </button>


            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="patient_table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Doc Name</th>
                            <th>File Name</th>
                            <th>Doc Date</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $conn = connectDB();
                        $result = $conn->query("SELECT * FROM patient_docs WHERE emailUsers='" . $_SESSION['pemail'] . "'");
                        $url = "../documents/" . $_SESSION['pemail'] . "/";
                        if ($result->rowCount() > 0) {
                            $rows = $result->fetchAll();
                            foreach ($rows as $row) {
                                $i++;
                                echo "<tr>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td>" . $row['doc_name'] . "</td>";
                                echo "<td><a href='" . $url . $row['file_name'] . "' target='_blank'>" . $row['file_name'] . "</a></td>";
                                echo "<td>" . $row['doc_date'] . "</td>";
                                echo "<td><button id='" . $row['id'] . "' class='btn btn-sm btn-danger doc-delete'>Delete</button>
                                        <button class='btn btn-sm btn-success'><a href='" . $url . $row['file_name'] . "' target='_blank'>Preview</a></button></td>";
                                echo "<td>Uploaded</td>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include "../layouts/delete_modal.php";
?>
<?php
include "../layouts/doc_upload_modal.php";
?>

<script>
document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("div#wrapper").style.opacity = "0";
        document.getElementById("loader").style.display = "block";
    } else {
        document.querySelector("div#wrapper").style.opacity = "1";
        document.getElementById('loader').style.display = "none";
    }
};

function readForm(id) {
    let form = document.getElementById(id);
    let inputs = form.getElementsByClassName('form-control');
    let labels = form.getElementsByTagName('label');
    let data = {};
    data[0] = id + "/";
    for (var i = 1; i < inputs.length; i++) {
        var input = inputs[i];
        var label = labels[i];
        data[i + 1] = label.textContent + "/" + input.value;
    }
    return data;
}

$(document).ready(function() {
    //Load consultation data after document load
    const hidden_id = $("#consult_id").text();
    let record;
    $.post("record_fetch.php", {
        id: hidden_id,
        tbname: "reports"
    }, function(data, status) {
        record = JSON.parse(data);
        let date = "";
        if (record.length != 0) {
            date = record[0].lastdate;
        }
        const text = "Last Consultation Date: " + date;
        $("#last_date").text(text);
        // record_update(record[0], "main-content");
    });

    // Condition Physique data submit
    $("#Condition").submit(function(e) {
        e.preventDefault();

        let formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url: "../php/consultation_store.php",
            type: "POST",
            data: formData,
            success: function(response) {
                // location.reload();
            }
        });
    });

    //Autonomie data submit
    $("#Autonomie").submit(function(e) {
        e.preventDefault();

        let formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url: "../php/consultation_store.php",
            type: "POST",
            data: formData,
            success: function(response) {
                // location.reload();
            }
        });
    });

    // Upload documents
    $('#Documents').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        // console.log(formData);
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
            }
        });
    });

    //Submit consultation data except "condition physique"
    $("#data_submit").click(function() {
        const page_id = document.getElementById("active_page").innerText;
        if (page_id == "togg53") {
            action = "tiny_avi";
        } else if (page_id == "togg4") {
            action = "tiny_reti";
        }

        const editor = tinymce.get("tiny_main");
        const content = editor.getContent();
        $.post("../php/consultation_store.php", {
            action: action,
            content: content
        }, function(data, status) {
            Swal.fire('Data Submit Success!');

        });
    });

    //Export pdf in Condition physique page    
    $("button.export-pdf").click(function(e) {
        e.preventDefault();
        let id = $(this).parents("form").attr('id');
        let data = readForm(id);
        console.log(data);
        $.ajax({
            url: "export_eachpage.php",
            type: "POST",
            data: {
                param: data,
                pagename: id
            },
            success: function(response) {
                const form = document.createElement('form');
                form.method = "post";
                form.action = "../mypdf/index.php";
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = "render_data";
                hiddenField.value = response;
                const doc_name = document.createElement('input');
                doc_name.type = 'hidden';
                doc_name.name = "doc_name";
                doc_name.value = id;
                form.appendChild(hiddenField);
                form.appendChild(doc_name);
                document.body.appendChild(form);
                form.submit();

            },
            error: function(xhr, status, error) {
                // Handle the error
                console.log(error);
            }
        });
        $(this).closest("form")[0].submit();
    });

    //Display consultation data when click each page
    $(".tiny-togg").click(function() {
        let tiny_id = "";
        let editor = tinymce.get("tiny_main");
        document.getElementById("active_page").innerText = this.id;
        if (this.id == "togg53") {
            tiny_id = "d53";
        } else if (this.id == "togg3") {
            tiny_id = "d3";
        } else if (this.id == "togg4") {
            tiny_id = "d4";
        } else if (this.id == "togg20") {
            tiny_id = "d20";
        }

        let tiny_div = document.getElementById(tiny_id);
        editor.setContent(tiny_div.innerHTML);
        $.ajax({
            type: "POST",
            url: 'record_fetch.php',
            data: {
                id: hidden_id,
                tbname: "reports"
            }
        }).then(
            function(response) {
                let record = JSON.parse(response);
                if (record.length != 0) {

                    if (tiny_id == "d53" && record[0].Avis != null && record[0].Avis != "") {
                        editor.setContent(record[0].Avis);
                    } else if (tiny_id == "d3") {
                        record_update(record[0], "Condition");
                    } else if (tiny_id == "d4" && record[0].Reti != null && record[0].Reti != "") {
                        editor.setContent(record[0].Reti);
                    } else if (tiny_id == "d20") {
                        record_update(record[0], "Autonomie");
                    }

                } else {
                    // alert('Error');
                }
            },
            function() {
                alert('There was some error!');
            }
        );
    });

    $(document).on('click', '.doc-delete', function(e) {
        deleteBtn = $(this);
        const file_name = deleteBtn.parent().siblings().eq(2).text();
        delete_item("patient_docs", deleteBtn, e);
        $.post("../php/unlink_file.php", {
            file_name: file_name,
            email: $("#patient_email").text()
        }, function(data, status) {

        });
    });

    $("#doc_add").click(function() {
        $("#custom-text").text("");
        $("#real-file").val("");
        $('#addDocumentModal').modal('show');
    });

    $("#form_document").submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('email', $("#patient_email").text());
        console.log(formData);
        const file_name = $("#custom-text").text();
        const url = `../documents/${$("#patient_email").text()}/`;
        if (file_name == "") {
            $("#addition_alert").show();
        } else {
            $.ajax({
                url: "../php/docs_store.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    id = response.split("!")[1];
                    alert_message = response.split("!")[0];
                    alert(alert_message);
                    if (alert_message == 'Upload succeded') {
                        record = `<tr>
                                <td>${$("#doc_type").val()}</td> 
                                <td>${$("#doc_name").val()}</td> 
                                <td>${$("#custom-text").text()}</td> 
                                <td>${$("#doc_date").val()}</td> 
                                <td><button id=${id} class='btn btn-sm btn-danger doc-delete'>Delete</button>
                                    <button class='btn btn-sm btn-success'>
                                        <a href=${url}${file_name} target='_blank'>Preview</a>
                                    </button>
                                </td> 
                                <td>Uploaded</td> 
                            </tr>`;
                        $("#patient_table").append(record);
                    }
                    $("#addition_alert").hide();
                    $('#addDocumentModal').modal('hide');
                    
                }
            });
        }
    });
    // $(".doc-download").click(function() {
    //     const file_name = $(this).parent().siblings().eq(3).text();
    //     $.post("../php/docs_download.php", {
    //         file_name: file_name
    //     }, function(data, status) {
    //         console.log(data);
    //     });
    // })
});
</script>
<script>
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");
    // Quand le bouton personnalisé est cliqué, déclenchez le vrai bouton de fichier
    customBtn.addEventListener("click", function() {
        realFileBtn.click();

    });
    // Quand un fichier est choisi, mettez à jour le texte du span
    realFileBtn.addEventListener("change", function() {
        if (realFileBtn.value) {
            customTxt.innerHTML = realFileBtn.value.match(
                /[\/\\]([\w\d\s\.\-\(\)]+)$/
            )[1];
        } else {
            customTxt.innerHTML = "Aucun fichier choisi pour le moment";
        }
    });
</script>
<script src="../js/form_functions.js"></script>
<script src="../js/custom_alert.js"></script>
<script src="../js/sb-5.js"></script>
<?php require "../layouts/footer.php";  ?>