<?php

define('TITLE', "PATIENT");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "../layouts/navbar.php";
mysqli_close($conn);
include "../php/functions.php";


?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col py-3">
        <h3 style="text-align: center;">Patients</h3>
        <ul class="list-unstyled">
            <a class="btn btn-success ml-1" id="togg1" data-target="tab" role="tab" aria-controls="list" aria-selected="false"><i class="fas fa-list"></i> Liste</a>
            <a class="btn btn-info ml-1" id="togg2" data-toggle="tab" role="tab" aria-controls="registration" aria-selected="false"><i class="fas fa-address-card"></i> Inscription</a>
        </ul>
        <div id="d1" style="display: block;">
            <div class="row">
                <!-- <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" id="search_term" class="form-control bg-light border-1 small" name="search_patient" id="search_patient" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="search_button" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="patient_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Patient ID</th>
                                    <th>Name</th>
                                    <th>Tel</th>
                                    <th>Email</th>
                                    <th>Type d'accident</th>
                                    <th>Statut</th>
                                    <th>Consultation ID</th>
                                    <th>Action</th>
                                    <th>Consultation</th>
                                    <th>Event</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conn = connectDB();
                                $query = $conn->query("SELECT * FROM register_patient");
                                $result = $query->fetchAll();

                                $i = 0;
                                foreach ($result as $patient) {
                                    $i++;
                                    $email = $patient['emailUsers'];
                                    $stmt = $conn->prepare('SELECT id FROM reports WHERE emailUsers = :email');
                                    $stmt->bindParam(':email', $email);
                                    $stmt->execute();

                                    if ($stmt->rowCount() > 0) {
                                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                        $con_id = $result['id'];
                                    } else {
                                        $con_id = "";
                                    }
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $patient["id"] . "</td>";
                                    echo "<td>" . $patient["lastname"] . "  " . $patient["firstname"] . "</td>";
                                    echo "<td>" . $patient["registerPatient7"] . "</td>";
                                    echo "<td>" . $email . "</td>";
                                    echo "<td>" . $patient["typeAccident"] . "</td>";
                                    echo "<td>" . $patient["typeStatut"] . "</td>";
                                    echo "<td>" . $con_id . "</td>";
                                    echo "<td><button id='" . $patient['id'] . "' type='button' style='margin-right: 4px;' class='btn btn-danger patient-delete' ><i class='fas fa-trash-alt'></i></button>";
                                    echo "<button id='" . $patient['id'] . "' type='button' class='btn btn-primary patient-edit'><i class='fas fa-edit'></i></button></td>";
                                    if ($con_id != "") {
                                        $button_content = "Modify";
                                    } else {
                                        $button_content = "Create";
                                    }
                                    echo "<td><button id='" . $email . "' type='button' class='btn btn-sm btn-info patient-consultation'>" . $button_content . "</button></td>";
                                    echo "<td><button type='button' class='btn btn-sm btn-info' style='margin-right: 4px;'>Quote</button>";
                                    echo "<button type='button' class='btn btn-sm btn-info'>Meeting</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="d2" style="display: none;">
        <form action="../php/patientAjout.php" method="post" id="formPatient" class="needs-validation" novalidate>
            <input type="hidden" name="action" value="add" id="submit_action">
            <input type="hidden" name="id" value="" id="submit_id">
            <div class="row">
                <div class="col-md-3">
                    <div class="image-preview" id="image">
                        <img src="../img/_defaultUser.png" id="patient_avatar">
                    </div>
                    <div class="form-group">
                        <!-- <label for="file_uploadPat" class="form-label">Mettre une photo</label> -->
                        <input class="form-control" type="file" name="registerPatient5" id="file_uploadPat" style="display: none;">
                    </div>
                    <button type="button" class="btn btn-success" id="photo_select">Select Photo</button>
                </div>
                <div class="col-md-9">

                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="lastname">Nom</label>
                            <input type="text" value="" name="lastname" class="form-control" id="lastname" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" value="" class="form-control" id="firstname" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="emailUsers" placeholder="">
                            <p id="check_result"></p>
                        </div>

                        <div class="col-md-4">
                            <label for="inputInsurance">NIR</label>
                            <input type="text" class="form-control" id="inputInsurance" name="registerPatient1" placeholder="">
                        </div>
                        <!-- <div class="col-md-3">
                            <label for="inputInsurance">Mot de passe</label>
                            <input type="text" class="form-control" id="inputInsurance" name="registerPatient1" placeholder="">
                        </div> -->
                        <div class="form-group col-md-4">
                            <label for="inputGender">Genre</label>
                            <select name="registerPatient2" id="inputGender" class="form-control">
                                <option selected>Choisir...</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAge">Date de naissance</label>
                            <input type="date" class="form-control" id="inputAge" name="registerPatient4" placeholder="Date">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputeinsurance">Regime d'assurance</label>
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

                        <div class="form-group col-md-3">
                            <label for="inputAccidenType">Type d'accident</label>
                            <select name="typeAccident" class="form-control" id="inputAccidenType">
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
                        <div class="form-group col-md-3">
                            <label for="inputstatutType">Statut</label>
                            <select name="typeStatut" class="form-control" id="inputstatutType">
                                <option selected value="">Choisir...</option>
                                <option value="New">New</option>
                                <option value="A contacter">A contacter</option>
                                <option value="Attente de Reglement">Attente de Reglement </option>
                                <option value="Attente de rdv">Attente de rdv</option>
                                <option value="Rendez vous bilan">Rendez vous bilan</option>
                                <option value="Rendez vous ECA">Rendez vous ECA</option>
                                <option value="Dossier sans suite">Dossier sans suite</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAdverseType">Partie adverse</label>
                            <select name="AdverseType" class="form-control" id="inputAdverseType">
                                <option selected value="">Choisir...</option>
                                <option value="Assurance">Assurance</option>
                                <option value="Cpam">Cpam</option>
                                <option value="Tribunal">Tribunal</option>
                                <option value="Autre caisse">Autre caisse</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Phone1">Téléphone</label>
                            <input type="text" class="form-control" id="Phone1" name="registerPatient7" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Phone2">Téléphone 2</label>
                            <input type="text" class="form-control" id="Phone2" name="registerPatient8" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Adresse</label>
                            <input type="text" class="form-control" id="inputAddress" name="registerPatient9" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Adresse 2</label>
                            <input type="text" class="form-control" id="inputAddress2" name="registerPatient10" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Ville</label>
                            <input type="text" class="form-control" id="inputCity" name="registerPatient11">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Code postal</label>
                            <input type="text" class="form-control" id="inputZip" name="registerPatient12">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputLanguage">Langue parlée</label>
                            <input type="text" class="form-control" id="inputLanguage" name="registerPatient13">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPartner1">Partenaire</label>
                            <select class="form-control" id="inputPartner1" name="registerPatient14">
                                <option value=''></option>
                                <?php
                                $stmt = $conn->query("SELECT id, lastname, firstname FROM register_partenaire");
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                    print "<option value='" . $row['id'] . "'>" . $row['lastname'] . " " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPartner2">Partenaire2</label>
                            <select class="form-control" id="inputPartner2" name="registerPatient18">
                                <option value=''></option>
                                <?php
                                $stmt = $conn->query("SELECT id, lastname, firstname FROM register_partenaire");
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                    print "<option value='" . $row['id'] . "'>" . $row['lastname'] . " " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmployee1">Employé</label>
                            <select class="form-control" id="inputEmployee1" name="registerPatient15">
                                <option value=''></option>
                                <?php
                                $stmt = $conn->query("SELECT id, lastname, firstname FROM register_employee");
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                    print "<option value='" . $row['id'] . "'>" . $row['lastname'] . " " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmployee2">Employé2</label>
                            <select class="form-control" id="inputEmployee2" name="registerPatient19">
                                <option value=''></option>
                                <?php
                                $stmt = $conn->query("SELECT id, lastname, firstname FROM register_employee");
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                    print "<option value='" . $row['id'] . "'>" . $row['lastname'] . " " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary" id="submit">Soumettre</button>
                        <button type="button" class="btn btn-primary" id="back_to_list" style="margin-left: 2px; display: none; ">Back</button>

                    </div>
                </div>
            </div>

        </form>
    </div>
    
</div>

<!-- Delete Confirm Modal -->
<?php
include "../layouts/delete_modal.php";
?>


<script>
    $(document).ready(function() {

        $(function() {
            // $('#example2').DataTable();
            $('#patient_table').DataTable();
            // $('#patient_table').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //    "info": true,
            //     "autoWidth": false
            // });
        });

        //Search patients
        $('#search_term').on('input', () => {
            search_names("register_patient");
        });

        $('#photo_select').click(function() {
            // Open file browser
            document.getElementById('file_uploadPat').click();
        });

        $('#file_uploadPat').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').html('<img src="' + e.target.result + '">');
            }
            reader.readAsDataURL(file);
        });

        //Register new patient
        $("#formPatient").submit(function(e) {
            e.preventDefault();
            let formData = new FormData(e.target);
            $.ajax({
                url: '../php/patientAjout.php',
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response);
                    location.reload();
                }
            });
        });

        //Delete the patient
        $("button.patient-delete").click(function(e) {
            deleteBtn = $(this);
            delete_item("register_patient", deleteBtn, e);
            // delete_item("reports", deleteBtn, e);
        });

        $("#back_to_list").click(function() {
            location.reload();
        });


        //Update the data of patient
        $("button.patient-edit").click(function() {
            $(".list-unstyled").hide();
            $("#back_to_list").show();
            $.post("record_fetch.php", {
                id: this.id,
                tbname: "register_patient"
            }, function(data, status) {
                const record = JSON.parse(data);
                let src = "../images/patient_avatar/";
                if (record[0].registerPatient5 != "") {
                    src = src + record[0].registerPatient5;
                } else {
                    src = "../img/_defaultUser.png";
                }
                $("#patient_avatar").attr("src", src);
                record_update(record[0], "formPatient");
                $("#submit").text("Update");
                $("#submit_action").val("update");
                $("#submit_id").val(record[0].id);

            });

            if (getComputedStyle(d2).display != "none") {
                d2.style.display = "block";
            } else {
                d2.style.display = "block";
                d1.style.display = "none";
            }
        });

        //Transmit to the consultation page
        $("button.patient-consultation").click(function(event) {
            event.preventDefault();
            var email = this.id;
            var acc_type = $(this).closest('tr').find('td:eq(5)').text();
            var name = $(this).closest('tr').find('td:eq(2)').text();
            var con_id = $(this).closest('tr').find('td:eq(7)').text();
            $.ajax({
                url: 'store_session.php',
                type: 'POST',
                data: {
                    acc_type: acc_type,
                    email: email,
                    name: name,
                    con_id: con_id
                },
                success: function(response) {
                    // console.log(response);
                    window.location.href = 'consultation.php';
                }
            });
        });

        //Check whether the inputed email address already exists or not
        $("#inputEmail4").change(function() {
            var email = $("#inputEmail4").val();
            $.post("email_check.php", {
                email: email,
                tbname: "register_patient"
            }, function(data, status) {
                //email is new and available
                if (data == "0") {
                    $("#check_result").css("color", "green");
                    $("#check_result").text("Validated Email");
                } else { // email address already exists
                    $("#check_result").css("color", "red");
                    $("#check_result").text("Email already exists. Try again.");
                }
            });
        });
    });
</script>

<script src="../js/form_functions.js"></script>
<script src="../js/sb-2.js"></script>
<?php include "../layouts/footer.php"; ?>