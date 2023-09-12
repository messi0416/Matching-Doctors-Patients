<?php
session_start();
require '../php/auth_functions.php';
require '../php/security_functions.php';
include "../php/functions.php";
$conn = connectDB();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>RecoureoPro</title>
    <!--
Template 2098 Health
http://www.tooplate.com/view/2098-health
-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Include jQuery and bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <style>
        .btn-gris {
            background-color: #808080;
            /* Cette couleur est un ton de gris, modifiez-la pour convenir à votre palette de couleurs */
            color: #fff;
            /* Couleur du texte */
            border: none;
            /* Supprimer la bordure */
            padding: 5px 10px;
            /* Un peu de padding pour rendre le bouton plus grand */
            text-align: center;
            /* Aligner le texte au centre */
            text-decoration: none;
            /* Supprimer le soulignement */
            display: inline-block;
            /* Afficher en ligne */
            font-size: 14px;
            /* Taille de la police */
            margin: 4px 2px;
            /* Un peu de marge autour du bouton */
            cursor: pointer;
            /* Changer le curseur lorsque vous survolez le bouton */
            transition: background-color 0.3s;
            /* Transition en douceur lorsque la couleur d'arrière-plan change */
        }

        .btn-gris:hover {
            background-color: #666666;
            /* Changer la couleur de fond lorsque vous survolez */
            color: #ffffff;
            /* Couleur du texte sur le survol */
        }

        .navbar .dropdown-menu {
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .navbar .dropdown-menu li a {
            color: #333;
        }

        @media (max-width: 991px) {
            .dropdown-toggle {
                cursor: pointer;
            }

            .dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }
    </style>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <!-- PRE LOADER -->
    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-5">
                    <p>Bienvenue dans le centre de Consultation RecoureoPro </p>
                </div>
                <div class="col-md-8 col-sm-7 text-align-right">
                    <span class="phone-icon"><i class="fa fa-phone"></i> 01 83 75 24 56</span>
                    <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> Lundi – Vendredi, de 9 à 17h</span>
                    <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">pro@recoureo.com</a></span>
                </div>
            </div>
        </div>
    </header>
    <!-- MENU -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <!-- lOGO TEXT HERE -->
                <a href="index.php" class="navbar-brand">RecoureoPro Center</a>
            </div>
            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php#home" class="smoothScroll">Home</a></li>
                    <li><a href="index.php#about" class="smoothScroll">Mon profile</a></li>
                    <li><a href="index.php#team" class="smoothScroll">Mes partenaires</a></li>
                    <li><a href="index.php#news" class="smoothScroll">Ressources</a></li>
                    <!-- <li><a href="#google-map" class="smoothScroll">Contact</a></li> -->
                    <li><a href="index.php#appointment">Mes rendez-vous</a></li>
                    <li><a href="monprofile.php">Ma consultation</a></li>
                    <li><a href="drive.php">Mon drive</a></li>
                    <li><a href="../auth/logout.php">Log out</a></li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col py-3">
            <h4>Consultation</h4>
            <ul class="list-unstyled">
                <a class="btn btn-gris  ml-1" id="togg1" data-toggle="tab" role="tab" aria-controls="List" aria-selected="false"><i class="fa fa-book"></i> Mes informations &nbsp; </a>
                <a class="btn btn-gris  ml-1" id="togg2" data-toggle="tab" role="tab" aria-controls="Presciption" aria-selected="false"><i class="fa fa-heart"></i> Condition physique</a>
                <a class="btn btn-gris  ml-1" id="togg3" data-toggle="tab" role="tab" aria-controls="Presciption" aria-selected="false"><i class="fa fa-wheelchair"></i> &nbsp;&nbsp;&nbsp;&nbsp; Autonomie &nbsp;&nbsp;&nbsp;&nbsp; </a>
            </ul>
            <div id="d1" style="display: block;">
                <form action="#" method="post" id="formPatient" class="needs-validation grey-border" novalidate>
                    <input type="hidden" name="action" value="" id="submit_action">
                    <input type="hidden" name="id" value="" id="submit_id">
                    <input type="hidden" type="text" class="form-control">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lastname"><br/>Nom</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Fill out this field" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="firstname"><br/>Prénom</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Fill out this field" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputGender"><br/>Genre</label>
                            <select name="registerPatient2" id="inputGender" class="form-control">
                                <!-- <option selected>Choisir...</option> -->
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAge"><br/>Date de naissance</label>
                            <input type="date" class="form-control" id="inputAge" name="registerPatient4" placeholder="Date">
                        </div>
                        <div class="form-group col-md-4" style="display: none;">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="emailUsers" value="<?php echo $_SESSION['email'] ?>" placeholder="Fill out this field">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputInsurance"><br/>NIR</label>
                            <input type="text" class="form-control" id="inputInsurance" name="registerPatient1" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputeinsurance"><br/>Regime d'assurance</label>
                            <select name="registerPatient3" id="inputeinsurance" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="Regime general">Regime general</option>
                                <option value="Regime agricole">Regime agricole</option>
                                <option value="Ampi">Ampi</option>
                                <option value="Sncf">Sncf</option>
                                <option value="Mgen">Mgen</option>
                                <option value="Cmmns">Cmmns</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputAccidenType"><br/>Type d'accident</label>
                            <select name="typeAccident" class="form-control" id="inputAccidenType" required>
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
                        <div class="form-group col-md-6">
                            <label for="Phone1"><br/>Téléphone</label>
                            <input type="text" class="form-control" id="Phone1" name="registerPatient7" placeholder="Fill out this field" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Phone2"><br/>Téléphone 2</label>
                            <input type="text" class="form-control" id="Phone2" name="registerPatient8" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress"><br/>Adresse</label>
                            <input type="text" class="form-control" id="inputAddress" name="registerPatient9" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2"><br/>Adresse 2</label>
                            <input type="text" class="form-control" id="inputAddress2" name="registerPatient10" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity"><br/>Ville</label>
                            <input type="text" class="form-control" id="inputCity" name="registerPatient11">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip"><br/>Code postal</label>
                            <input type="text" class="form-control" id="inputZip" name="registerPatient12">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputLanguage"><br/>Langue parlée</label>
                            <input type="text" class="form-control" id="inputLanguage" name="registerPatient13">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" id="info_submit" style="float:right; margin-right: 2rem !important;">Soumettre</button>
                </form>
            </div>
            <div id="d3" style="display: none;">
                <form action="#" method="post" id="Autonomie" class="needs-validation grey-border" novalidate>
                    <input type="hidden" name="action" value="aut" id="submit_action">
                    <input type="hidden" class="form-control">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="toiletteAide"><br/>Aide pour la toilette</label>
                            <select id="toiletteAide" name="Autonomy1" class="form-control">
                                <option selected>Choisir...</option>git
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="toiletteQui"><br/> Si oui Par qui ?</label>
                            <input type="text" name="Autonomy2" class="form-control" id="toiletteQui">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="toiletteDuree"><br/> Combien de temps ?</label>
                            <input type="text" name="Autonomy3" class="form-control" id="toiletteDuree">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="habillageAide"><br/>Aide pour l'habillage</label>
                            <select id="habillageAide" name="Autonomy4" class="form-control">
                                <option selected>Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="habillageQui"><br/> Si oui Par qui ?</label>
                            <input type="text" name="Autonomy5" class="form-control" id="habillageQui">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="habillageDuree"><br/> Combien de temps ?</label>
                            <input type="text" name="Autonomy6" class="form-control" id="habillageDuree">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="repasAide"><br/>Aide pour les repas</label>
                            <select id="repasAide" name="Autonomy7" class="form-control">
                                <option selected>Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="repasQui"><br/> Si oui Par qui ?</label>
                            <input type="text" name="Autonomy8" class="form-control" id="repasQui">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="repasDuree"><br/> Combien de temps ?</label>
                            <input type="text" name="Autonomy9" class="form-control" id="repasDuree">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="coursesAide"><br/>>Aide pour les courses</label>
                            <select id="coursesAide" name="Autonomy10" class="form-control">
                                <option selected>Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="coursesQui"><br/> Si oui Par qui ?</label>
                            <input type="text" name="Autonomy11" class="form-control" id="coursesQui">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="coursesDuree"><br/> Combien de temps ?</label>
                            <input type="text" name="Autonomy12" class="form-control" id="coursesDuree">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="menageAide"><br/>Aide pour le ménage</label>
                            <select id="menageAide" name="Autonomy13" class="form-control">
                                <option selected>Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="menageQui"><br/> Si oui Par qui ?</label>
                            <input type="text" name="Autonomy14" class="form-control" id="menageQui">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="menageDuree"><br/> Combien de temps ?</label>
                            <input type="text" name="Autonomy15" class="form-control" id="menageDuree">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" id="aut_submit" style="float:right; margin-right: 2rem !important;">Soumettre</button>

                </form>
            </div>
            <div id="d2" style="display: none;">
                <form action="#" method="POST" id="Condition" class="needs-validation">
                    <input type="hidden" name="action" value="con" id="submit_action">
                    <p style="display: none;" id="email_address"><?php echo $_SESSION['email'] ?></p>
                    <input type="hidden" class="form-control">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Taille"><br/>Taille(cm)</label>
                            <input type="text" class="form-control" id="Taille" name="Physical_condition1" placeholder="En Cm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Poids"><br/>Poids(kg)</label>
                            <input type="text" class="form-control" id="Poids" name="Physical_condition2" placeholder="En Kg">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Groupesanguin"><br/>Groupe sanguin</label>
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
                            <label for="typed'accident"><br/>Type d'accident</label>
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
                            <label for="accidentTravail"><br/>Accident du travail</label>
                            <select id="accidentTravail" name="Physical_condition5" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Dateaccident"><br/>Date de l'accident</label>
                            <input type="date" class="form-control" name="Physical_condition6" id="Dateaccident" placeholder="Date">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Profession"><br/>Proffession</label>
                            <input type="text" class="form-control" name="Physical_condition7" id="Profession" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Salarié"><br/>Salarié</label>
                            <select id="Salarié" name="Physical_condition8" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Transport"><br/>Moyen de transpport</label>
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
                            <label for="Sportif"><br/>Sportif</label>
                            <select id="Sportif" name="Physical_condition10" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Résidence"><br/>Résidence</label>
                            <select id="Résidence" name="Physical_condition11" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="Maison">Maison</option>
                                <option value="Apartement">Apartement</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jardin"><br/>jardin</label>
                            <select id="jardin" name="Physical_condition12" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Hospitalisation"><br/>Nombre d'hospitalisations</label>
                            <input id="Hospitalisation" name="Physical_condition13" class="form-control" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="DateHospitalisation"><br/>Date début d'Hospitalisation</label>
                            <input type="date" class="form-control" name="Physical_condition14" id="DateHospitalisation">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Dismisshospital"><br/>Date fin d'Hospitalisation</label>
                            <input type="date" class="form-control" name="Physical_condition15" id="Dismisshospital">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Chirurgie"><br/>Nombre de chirurgies</label>
                            <input type="text" id="Chirurgie" name="Physical_condition16" class="form-control" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Immobilisation"><br/>Immobilisation</label>
                            <select id="Immobilisation" name="Physical_condition17" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ImmobilisationType"><br/>Type</label>
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
                            <label for="Aidetechnique"><br/>Aide téchnique</label>
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
                            <label for="Réeducation"><br/>Réeducation</label>
                            <select id="Réeducation" name="Physical_condition20" class="form-control">
                                <option selected value="">Choisir...</option>
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ReeducationType"><br/>Type</label>
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
                            <label for="inputDuree"><br/>Durée</label>
                            <input type="text" class="form-control" name="Physical_condition22" id="inputDuree" placeholder="1an, 1 mois, 2jours,">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" id="con_submit" style="float:right; margin-right: 2rem !important;">Soumettre</button>
                    <div style="clear:both"></div>
                </form>
            </div>
            <!-- FOOTER -->
            <footer data-stellar-background-ratio="5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-thumb">
                                <h4 class="wow fadeInUp" data-wow-delay="0.4s">Informations de contact</h4>
                                <p>Vous pouvez nous contacter par téléphone ou par email au :</p>
                                <div class="contact-info">
                                    <p><i class="fa fa-phone"></i> 01 83 75 24 56</p>
                                    <p><i class="fa fa-envelope-o"></i> <a href="#">pro@recoureo.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-thumb">
                                <div class="opening-hours">
                                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Heures d'ouverture</h4>
                                    <p>Lundi – Vendredi,<span>de 9 à 17h</span></p>
                                </div>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 border-top">
                            <div class="col-md-4 col-sm-6">
                                <div class="copyright-text">
                                    <p>Copyright &copy; 2023 RecoureoPro
                                        | Design: Tooplate</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="footer-link">
                                    <a href="#">Laboratory Tests</a>
                                    <a href="#">Departments</a>
                                    <a href="#">Insurance Policy</a>
                                    <a href="#">Careers</a>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 text-align-center">
                                <div class="angle-up-btn">
                                    <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- SCRIPTS -->
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.sticky.js"></script>
            <script src="js/jquery.stellar.min.js"></script>
            <script src="js/wow.min.js"></script>
            <script src="js/smoothscroll.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/custom.js"></script>


</body>

</html>
<script>
    $(document).ready(function() {
        // document.getElementById("togglePatientsTwo").addEventListener("click", function() {
        //     var patientsTwo = document.getElementById("patientsTwo");
        //     patientsTwo.classList.toggle("show");
        // });
        function display_info(tbname, formid) {
            const email = $("#inputEmail4").val();
            $.post('read_id.php', {
                email: email,
                tbname: tbname
            }, function(data, status) {
                const record = JSON.parse(data);
                let id = record.id;
                if (id != undefined) {
                    record_update(record, formid);
                }

            });
        }

        display_info("register_patient", "formPatient");

        // Submit the data of Condition physique
        $("#Condition").submit(function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            const email = $("#email_address").text();
            $.post('read_id.php', {
                email: email,
                tbname: "reports"
            }, function(data, status) {
                const acc_type = "";
                const name = "";
                const record = JSON.parse(data);
                let con_id = record.id;
                if (con_id == undefined) {
                    con_id = "";
                }
                $.ajax({
                    url: '../admin/store_session.php',
                    type: 'POST',
                    data: {
                        acc_type: acc_type,
                        email: email,
                        name: name,
                        con_id: con_id
                    },
                    success: function(response) {
                        console.log(response);
                        $.ajax({
                            url: '../php/consultation_store.php',
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                console.log(response);
                                location.reload();
                            }
                        });
                    }
                });
            });
        });

        // Submit the data of Mes informations
        $("#formPatient").submit(function(e) {
            e.preventDefault();
            const email = $("#inputEmail4").val();
            $.post('read_id.php', {
                email: email,
                tbname: "register_patient"
            }, function(data, status) {
                const record = JSON.parse(data);
                let id = record.id;
                if (id == undefined) {
                    $("#submit_action").val("add");
                    $("#submit_id").val("");
                } else {
                    $("#submit_action").val("update");
                    $("#submit_id").val(id);
                }
                let formData = $("#formPatient").serialize();

                $.ajax({
                    url: '../php/patientAjout.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            });
        });

        // Submit the data of Autonomie
        $("#Autonomie").submit(function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            const email = $("#email_address").text();
            $.post('read_id.php', {
                email: email,
                tbname: "reports"
            }, function(data, status) {
                const acc_type = "";
                const name = "";
                const record = JSON.parse(data);
                let con_id = record.id;
                if (con_id == undefined) {
                    con_id = "";
                }
                $.ajax({
                    url: '../admin/store_session.php',
                    type: 'POST',
                    data: {
                        acc_type: acc_type,
                        email: email,
                        name: name,
                        con_id: con_id
                    },
                    success: function(response) {
                        console.log(response);
                        $.ajax({
                            url: '../php/consultation_store.php',
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                console.log(response);
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
        $("#togg1").click(function() {
            display_info("register_patient", "formPatient");
        });

        $("#togg2").click(function() {
            display_info("reports", "Condition");
        });

        $("#togg3").click(function() {
            display_info("reports", "Autonomie");
        });




    });
</script>
<script src="../js/form_functions.js"></script>
<script src="js/jsbutton.js"></script>