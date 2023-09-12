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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <!-- jQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Bootstrap JS -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <style>
        #documents {
            padding: 50px 0;
            background: #f5f5f5;
        }

        #documents .section-title {
            margin-bottom: 30px;
        }

        #documents .btn {
            font-size: 1.5em;
            padding: 10px 20px;
        }

        #documents .document-storage-area h3 {
            margin-bottom: 15px;
        }

        #documents .document-storage-area .list-group-item {
            margin-bottom: 10px;
        }

        #documents .list-group-item {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <style>
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

    <!-- Modal -->
    <div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentModalLabel">Ajouter un document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../php/docs_store.php" method="POST" id="form_document" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- <div class="alert alert-success alert-dismissible fade show" id="addition_alert" style="display: block;">
                            
                            <strong>Fail!</strong> The file name does not exist.
                        </div> -->
                        <div class="alert alert-danger" id="addition_alert" style="display: none;">
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
                            <strong>Fail!</strong> Choose the document to be uploaded.
                        </div>
                        <div class="form-group">
                            <label for="doc_type" class="col-form-label">Type de document:</label>
                            <select name="doc_type" id="doc_type" class="form-control">
                                <option value="Document Médicaux">Document Médicaux</option>
                                <option value="Document Légaux">Document Légaux</option>
                                <option value="Document Administratif">Document Administratif</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="doc_name" class="col-form-label">Nom du document:</label>
                            <select name="doc_name" id="doc_name" class="form-control">
                                <option value="Compte rendu de consultation">Compte rendu de consultation</option>
                                <option value="Compte rendu d'hospitalisation">Compte rendu d'hospitalisation</option>
                                <option value="Compte rendu d'imagerie">Compte rendu d'imagerie</option>
                                <option value="Compte rendu rééducation">Compte rendu rééducation</option>
                                <option value="Compte rendu pyschologue">Compte rendu pyschologue</option>
                                <option value="Contrat de travail">Contrat de travail</option>
                                <option value="Arret de travail">Arret de travail</option>
                                <option value="Avis medecine du travail">Avis medecine du travail</option>
                                <option value="Avis mdph">Avis mdph</option>
                                <option value="Fiche de poste">Fiche de poste</option>
                                <option value="Salaire">Salaire</option>
                                <option value="Piece jointe">Piece jointe</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doc_date" class="col-form-label">Date: (Input correct date of a document)</label>
                            <input type="date" class="form-control" id="doc_date" name="doc_date" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group">
                            <input type="file" id="real-file" name="doc-file-name" style="display: none;" />
                            <button type="button" id="custom-button" class="btn btn-primary">Choisir un fichier</button>
                            <!-- <span id="custom-text">Aucun fichier choisi pour le moment</span> -->
                            <span id="custom-text"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" id="doc_upload">Sauvegarder</button>
                        <!-- Sauvegarder -->
                    </div>
                </form>
            </div>
        </div>
    </div>

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

    <!-- Documents -->
    <section id="documents" data-stellar-background-ratio="2.5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                        <h2>Documents Drive</h2>
                        <p style="display: block; " id="user_email"><?php echo $_SESSION['email']; ?></p>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-lg mb-4" id="doc_add">
                            <i class="fa fa-plus"></i> Ajouter
                        </button>
                    </div>
                    <br>
                    <div class="document-storage-area">
                        <table class="table table-striped table-bordered" id="doc_table">
                            <thead>
                                <th>Category</th>
                                <th>Doc Name</th>
                                <th>File Name</th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $conn = connectDB();
                                $result = $conn->query("SELECT * FROM patient_docs WHERE emailUsers='" . $_SESSION['email'] . "' ORDER BY category DESC");
                                $url = "../documents/" . $_SESSION['email'] . "/";
                                if ($result->rowCount() > 0) {
                                    $rows = $result->fetchAll();
                                    foreach ($rows as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['category'] . "</td>";
                                        echo "<td>" . $row['doc_name'] . "</td>";
                                        echo "<td><a href='" . $url . $row['file_name'] . "' target='_blank'>" . $row['file_name'] . "</a></td>";
                                        echo "<td>" . $row['doc_date'] . "</td>";
                                        echo "<td><button id='" . $row['id'] . "' class='doc-delete'>Delete</button>
                                                <button><a href='" . $url . $row['file_name'] . "' target='_blank'>Preview</a></button></td>";
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
    </section>


    <!-- Delete Confirm Modal -->
    <div id="delete-modal" class="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button id="confirm-delete-btn" type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
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
                    <div class="col-md-6 col-sm-6">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2023 RecoureoPro

                                | Design: Tooplate</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="../js/form_functions.js"></script>


</body>
<script>
    $(document).ready(function() {

        $("#doc_add").click(function() {
            $("#custom-text").text("");
            $("#real-file").val("");
            $('#addDocumentModal').modal('show');
        });

        $("#form_document").submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('email', $("#user_email").text());
            const file_name = $("#custom-text").text();
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
                        alert_message = response.split("!")[0];
                        alert(alert_message);
                        location.reload();
                    }
                });
            }
        });

        // $("#doc_add").click(function() {
        //     // const type = $("#doc_type").val();
        //     let type = "";
        //     const selectElement = document.getElementById("doc_name");
        //     const selectedOption = selectElement.options[selectElement.selectedIndex];
        //     const doc_name = selectedOption.textContent;

        //     const selectedOptionValue = $(selectElement).val();

        //     if (selectedOptionValue < 6) {
        //         type = "Document Médicaux";
        //     }
        //     if (selectedOptionValue > 5 && selectedOptionValue < 12) {
        //         type = "Document Légaux";
        //     }
        //     if (selectedOptionValue > 11) {
        //         type = "Document Administratif";
        //     }

        //     const doc_date = $("#doc_date").val();
        //     const file_name = $("#custom-text").text();
        //     if (file_name == "") {
        //         $("#addition_alert").show();
        //     } else {
        //         item = `<tr>
        //                     <td>${type}</td> 
        //                     <td>${doc_name}</td> 
        //                     <td>${file_name}</td> 
        //                     <td>${doc_date}</td> 
        //                     <td><button class='doc-delete'>Cancel</button></td> 
        //                     <td><button class='doc-upload'>Upload</button></td> 
        //                 </tr>`;

        //         $("#doc_table").append(item);
        //         $("#addition_alert").hide();
        //         $('#addDocumentModal').modal('hide');
        //         $("#real-file").val("");

        //     }


        // });

        $(document).on('click', '.doc-delete', function(e) {
            deleteBtn = $(this);
            const file_name = deleteBtn.parent().siblings().eq(2).text();
            delete_item("patient_docs", deleteBtn, e);
            $.post("../php/unlink_file.php", {
                file_name: file_name,
                email: $("#user_email").text()
            }, function(data, status) {

            });
        });

        // $(document).on('click', '.doc-upload', function() {
        //     const this_element = $(this);
        //     const email = $("#user_eamil").text();
        //     const category = $(this).parent().siblings().eq(0).text();
        //     const doc_name = $(this).parent().siblings().eq(1).text();
        //     const file_name = $(this).parent().siblings().eq(2).text();
        //     const doc_date = $(this).parent().siblings().eq(3).text();

        //     $.post('../php/docs_store.php', {
        //         email: email,
        //         category: category,
        //         doc_name: doc_name,
        //         file_name: file_name,
        //         doc_date: doc_date
        //     }, function(data, status) {
        //         this_element.parent().siblings().eq(4).find('button').text('Delete');
        //         this_element.parent().text('Uploaded');
        //         this_element.remove();
        //         console.log(data);
        //         // location.reload();


        //     });
        // });

    });
</script>
<script type="text/javascript">
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

</html>