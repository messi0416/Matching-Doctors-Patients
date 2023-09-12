<?php

session_start();

require '../php/auth_functions.php';

require '../php/security_functions.php';

check_logged_in();



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





     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

     <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

     <link rel="stylesheet" href="css/bootstrap.min.css">

     <link rel="stylesheet" href="css/font-awesome.min.css">

     <link rel="stylesheet" href="css/animate.css">

     <link rel="stylesheet" href="css/owl.carousel.css">

     <link rel="stylesheet" href="css/owl.theme.default.min.css">



     <!-- MAIN CSS -->

     <link rel="stylesheet" href="css/tooplate-style.css">

     <style>

          .clickable-image {

               display: block;

               margin-left: auto;

               margin-right: auto;

               width: 350px;

               /* Changer la largeur comme souhaité */

               height: auto;

               /* Garder auto pour maintenir les proportions de l'image */

          }

     </style>





</head>



<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">



     <!-- PRE LOADER -->

     <section class="preloader">

          <div class="spinner">



               <span class="spinner-rotate"></span>



          </div>

     </section>





     <!-- HEADER -->

     <header>

          <div class="container">

               <div class="row">



                    <div class="col-md-4 col-sm-5">



                         <p>Bienvenue dans le centre de Consultation RecoureoPro </p>



                    </div>



                    <div class="col-md-8 col-sm-7 text-align-right">



                         <span class="phone-icon"><i class="fa fa-phone"></i> 01 83 75 24 56</span>



                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> Lundi à Vendredi, de 9 à 17h</span>



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



                    <a href="index.php" class="navbar-brand">RecoureoPro</a>



               </div>



               <!-- MENU LINKS -->

               <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

                         <li><a href="#top" class="smoothScroll">Home</a></li>

                         <li><a href="#about" class="smoothScroll">Mon profile</a></li>

                         <li><a href="#team" class="smoothScroll">Mes partenaires</a></li>

                         <li><a href="#news" class="smoothScroll">Ressources</a></li>

                         <!-- <li><a href="#google-map" class="smoothScroll">Contact</a></li> -->

                         <li><a href="#appointment">Mes rendez-vous</a></li>

                         <li><a href="monprofile.php">Ma consultation</a></li>

                         <li><a href="drive.php">Mon drive</a></li>

                         <li><a href="../auth/logout.php">Log out</a></li>

                    </ul>

               </div>



          </div>

     </section>





     <!-- HOME -->

     <section id="home" class="slider" data-stellar-background-ratio="0.5">

          <div class="container">

               <div class="row">







                    <div class="owl-carousel owl-theme">



                         <div class="item item-first">



                              <div class="caption">



                                   <div class="col-md-offset-1 col-md-10">



                                        <h3>Commencez votre questionnaire</h3>



                                        <h1>Bilan ici</h1>



                                        <a href="monprofile.php" class="section-btn btn btn-default smoothScroll">Rencontrez nos docteurs</a>



                                   </div>



                              </div>



                         </div>







                         <div class="item item-second">



                              <div class="caption">



                                   <div class="col-md-offset-1 col-md-10">



                                        <h3></h3>



                                        <h1>Télécharger vos documents</h1>



                                        <a href="drive.php" class="section-btn btn btn-default btn-gray smoothScroll">Mon drive</a>



                                   </div>



                              </div>



                         </div>







                         <div class="item item-third">



                              <div class="caption">



                                   <div class="col-md-offset-1 col-md-10">



                                        <h3></h3>



                                        <h1>Solution de recours</h1>



                                        <a href="monprofile.php" class="section-btn btn btn-default btn-blue smoothScroll">Votre questionnaire</a>



                                   </div>



                              </div>



                         </div>



                    </div>



               </div>

          </div>

     </section>





     <!-- ABOUT -->

     <section id="about">

          <div class="container">

               <div class="row">



                    <div class="col-md-6 col-sm-6">

                         <div class="about-info">



                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Mon profile</h2>



                         </div>

                         <div class="col">

                              <img src="images/w1.png" class="img-responsive rounded-circle" alt="">

                              <br>

                              <div class="card mb-3">



                                   <div class="card-body">



                                        <div class="row">



                                             <div class="col-sm-3">



                                                  <h6 class="mb-0">Nom complet</h6>



                                             </div>



                                             <div class="col-sm-9 text-secondary">





                                             </div>



                                        </div>



                                        <hr>



                                        <div class="row">



                                             <div class="col-sm-3">



                                                  <h6 class="mb-0">Email</h6>



                                             </div>



                                             <div class="col-sm-9 text-secondary">





                                             </div>



                                        </div>



                                        <hr>



                                        <div class="row">



                                             <div class="col-sm-3">



                                                  <h6 class="mb-0">Téléphone</h6>



                                             </div>



                                             <div class="col-sm-9 text-secondary">





                                             </div>



                                        </div>



                                        <hr>



                                        <div class="row">



                                             <div class="col-sm-3">



                                                  <h6 class="mb-0">Téléphone portable</h6>



                                             </div>



                                             <div class="col-sm-9 text-secondary">





                                             </div>



                                        </div>



                                        <hr>



                                        <div class="row">



                                             <div class="col-sm-3">



                                                  <h6 class="mb-0">Addresse</h6>



                                             </div>



                                             <div class="col-sm-9 text-secondary">







                                             </div>



                                        </div>



                                   </div>



                              </div>

                         </div>

                    </div>

                    <div class="col-md-6 col-sm-6">

                         <div class="about-info">



                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Bienvenue dans votre centre de santé</h2>



                              <div class="wow fadeInUp" data-wow-delay="0.8s">



                                   <p>Recoureo et son équipe vous accompagnent depuis 10 ans dans la défense de vos intéréts et l'obtention des justes indemnisations lors d'accident de voiture et erreur médicale.</p>



                                   <p>La prise en compte et l'appréciation de vos préjudices à leur juste mesure. Un rapport médical complet et détaillé est systématiquement rédigé.</p>



                              </div>



                         </div>



                    </div>



               </div>

          </div>

     </section>





     <!-- TEAM -->

     <section id="team" data-stellar-background-ratio="1">

          <div class="container">

               <div class="row">



                    <div class="col-md-6 col-sm-6">

                         <div class="about-info">



                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Vos partenaires</h2>



                         </div>

                    </div>



                    <div class="clearfix"></div>



                    <div class="col-md-4 col-sm-6">

                         <h3>Medecin</h3>

                         <div class="owl-carousel owl-theme">

                              <?php

                                   $result = $conn->query("SELECT * FROM register_partenaire");

                                   $rows = $result->fetchAll();

                                   foreach ($rows as $user) {

                                        if ($user['Metier'] === "Médecin") {

                                             echo "<div class='item'>";

                                             echo "<img src='../images/partner_avatar/".$user['registerPartenaire1']."' alt='Medecin' class='d-block img-responsive' style='width:100%'>";

                                             echo "<div class='caption'>";

                                             echo "<h4>Mr.".$user['lastname']."</h4>";

                                             echo "</div>";

                                             echo "</div>";

                                        }



                                   }

                              ?>

                         </div>

                    </div>



                    <div class="col-md-4 col-sm-6">

                         <h3>Avocat</h3>

                         <div class="owl-carousel owl-theme">

                              <?php

                                   foreach ($rows as $user) {

                                        if ($user['Metier'] === "Avocat") {

                                             echo "<div class='item'>";

                                             echo "<img src='../images/partner_avatar/".$user['registerPartenaire1']."' alt='Avocat' class='d-block img-responsive' style='width:100%'>";

                                             echo "<div class='caption'>";

                                             echo "<h4>Mr.".$user['lastname']."</h4>";

                                             echo "</div>";

                                             echo "</div>";

                                        }

                                   }

                              ?>



                         </div>

                    </div>



                    <div class="col-md-4 col-sm-6">

                         <h3>Médecin Assurance</h3>

                         <div class="owl-carousel owl-theme">

                              <?php

                                   foreach ($rows as $user) {

                                        if ($user['Metier'] === "Médecin Assurance") {

                                             echo "<div class='item'>";

                                             echo "<img src='../images/partner_avatar/".$user['registerPartenaire1']."' alt='Médecin Assurance' class='d-block img-responsive' style='width:100%'>";

                                             echo "<div class='caption'>";

                                             echo "<h4>Mr.".$user['lastname']."</h4>";

                                             echo "</div>";

                                             echo "</div>";

                                        }

                                   }

                              ?>

                         </div>

                    </div>



               </div>

          </div>

     </section>





     <!-- NEWS -->

     <section id="news" data-stellar-background-ratio="2.5">

          <div class="container">

               <div class="row">



                    <div class="col-md-12 col-sm-12">

                         <!-- SECTION TITLE -->

                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">



                              <h2>Derniéres nouvelles</h2>



                         </div>

                    </div>



                    <div class="col-md-4 col-sm-6">

                         <!-- NEWS THUMB -->

                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">



                              <a href="https://recoureo.com/service/bilan-situationnel-indemnisation/">



                                   <img src="images/news-image1.jpg" class="img-responsive" alt="">

                              </a>

                              <div class="news-info">



                                   <span> 8 mars 2023 </span>



                                   <h3><a href="#">Besoin d'un bilan siturationnel ?</a></h3>



                                   <p>établissez un bilan situationnel précis de votre préjudice.</p>



                                   <div class="author">

                                        <img src="images/author-image.jpg" class="img-responsive" alt="">

                                        <div class="author-info">



                                             <h5>Benjamin COHEN</h5>



                                             <p>CEO / Fondateur</p>



                                        </div>

                                   </div>

                              </div>

                         </div>

                    </div>



                    <div class="col-md-4 col-sm-6">

                         <!-- NEWS THUMB -->

                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">

                              <a href="#">

                                   <img src="images/news-image2.jpg" class="img-responsive" alt="">

                              </a>

                              <div class="news-info">



                                   <span> 8 Fevrier 2023 </span>



                                   <h3><a href="https://recoureo.com/modele-de-lettre-de-demande-de-protection-juridique/">Aide juridique</a></h3>



                                   <p>Recoureo est la dans toutes vos démarches juridiques.</p>



                                   <div class="author">

                                        <img src="images/author-image.jpg" class="img-responsive" alt="">

                                        <div class="author-info">



                                             <h5>Shirley ATTIA</h5>



                                             <p>Buisness development</p>



                                        </div>

                                   </div>

                              </div>

                         </div>

                    </div>



                    <div class="col-md-4 col-sm-6">

                         <!-- NEWS THUMB -->

                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">



                              <a href="https://recoureo.com/service/expertise-contradictoire-ou-unilaterale/">



                                   <img src="images/news-image3.jpg" class="img-responsive" alt="">

                              </a>

                              <div class="news-info">



                                   <span>27 janvier 2023</span>



                                   <h3><a href="#">Expertise contradictoire</a></h3>



                                   <p>Recoureo vous aide à monter le dossier, revoir tous les points principaux pour optimiser vos indemnisations.</p>



                                   <div class="author">

                                        <img src="images/author-image.jpg" class="img-responsive" alt="">

                                        <div class="author-info">



                                             <h5>Ishane BENZAKRI</h5>



                                             <p>Buisnees development</p>



                                        </div>

                                   </div>

                              </div>

                         </div>

                    </div>



               </div>

          </div>

     </section>





     <!-- MAKE AN APPOINTMENT -->

     <section id="appointment" data-stellar-background-ratio="3">

          <div class="container">

               <div class="row">



                    <div class="col-md-6 col-sm-6">

                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">

                    </div>



                    <div class="col-md-6 col-sm-6">

                         <!-- CONTACT FORM HERE -->

                         <form id="appointment-form" role="form" method="post" action="#">



                              <!-- SECTION TITLE -->

                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">



                                   <h2>Vos rendez-vous</h2>



                              </div>

                              <p>Pour consulter ou prendre un Rendez-vous cliquez ici:</p>

                              <a href="https://www.doctolib.fr/cabinet-medical/creteil/expertmed/booking/motives?profile_skipped=true&specialityId=2&telehealth=false&placeId=practice-190621&profileSkipped=true">

                                   <img src="images/logo_doctolib.svg" class="clickable-image" alt="Logo Doctolib">

                              </a>











                    </div>







               </div>



          </div>



     </section>





     <!-- GOOGLE MAP -->

     <!-- <section id="google-map"> -->

     <!-- How to change your own map point

            1. Go to Google Maps

            2. Click on your location point

            3. Click "Share" and choose "Embed map" tab

            4. Copy only URL and paste it within the src="" field below

	-->

     <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> -->

     <!-- </section>            -->





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



                                   <p>Lundi à Vendredi,<span>de 9 à 17h</span></p>



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