<?php

define('TITLE', "PARTENAIRE");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "../layouts/navbar.php";
mysqli_close($conn);
include "../php/functions.php";

?>

<div class="container-fluid">
    <div class="col py-3">
        <h3 style="text-align: center; ">Partenaires</h3>
        <ul class="list-unstyled">
            <a class="btn btn-success ml-1" id="togg6" data-target="tab" role="tab" aria-controls="list" aria-selected="false"><i class="fas fa-list"></i> Liste</a>
            <a class="btn btn-info ml-1" id="togg7" data-toggle="tab" role="tab" aria-controls="registration" aria-selected="false"><i class="fas fa-address-card"></i> Inscription</a>
        </ul>
    </div>
    <div id="d6" style="display: block;">
        <div class="row">

            <!-- <div class="col-md-12">
                <div class="input-group">
                    <input type="text" id="search_term" class="form-control bg-light border-0 small" placeholder="Search for names ..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="search_button" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div> -->

            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-striped table-bordered" id="partner_table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Tel</th>
                                <th>Métier</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $connection = connectDB();
                            $results = $connection->query("SELECT * FROM register_partenaire");
                            $results = $results->fetchAll();
                            $i = 0;
                            foreach ($results as $user) {
                                $i++;
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $user["id"] . "</td>";
                                echo "<td>" . $user["lastname"] . "</td>";
                                echo "<td>" . $user["firstname"] . "</td>";
                                echo "<td>" . $user["registerPartenaire3"] . "</td>";
                                echo "<td>" . $user["Metier"] . "</td>";
                                echo "<td>" . $user["emailUsers"] . "</td>";
                                echo "<td><button id='" . $user['id'] . "' style='margin: 2px;' type='button' class='btn btn-danger partner-delete'><i class='fas fa-trash-alt'></i></button>";
                                echo "<button id='" . $user['id'] . "' type='button' class='btn btn-primary partner-edit'><i class='fas fa-pen'></i></button></td>";
                                echo "</tr>";
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </form>

    <div id="d7" style="display: none;">
        <form method="post" action="../php/partenaireAjout.php" id="formPartner" class="needs-validation" novalidate>
            <input type="hidden" name="action" value="add" id="submit_action">
            <input type="hidden" name="id" value="" id="submit_id">
            <div class="row">
                <div class="col-md-3">
                    <div class="image-preview" id="image">
                        <img src="../img/_defaultUser.png" id="partner_avatar">
                    </div>
                    <div class="form-group">
                        <!-- <label for="file-uploadEmp" class="form-label">Mettre une photo</label> -->
                        <input class="form-control" type="file" name="registerPartenaire1" id="file_uploadPar" style="display: none;">
                    </div>
                    <button type="button" class="btn btn-success" id="photo_select">Select Photo</button>
                </div>
                <div class="col-md-9">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputFirstNamePar">Prénom</label>
                            <input type="FirstName" class="form-control" name="firstname" id="inputFirstNamePar" placeholder="" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputLastNamePar">Nom</label>
                            <input type="LastName" class="form-control" name="lastname" id="inputLastNamePar" placeholder="" >
                        </div>
        
                        <div class="form-group col-md-4">
                            <label for="inputMetierPar">Métier</label>
                            <select id="inputMetierPar" name="Metier" class="form-control" required>
                                <option selected value="">Choisir...</option>
                                <option>Avocat</option>
                                <option>Médecin</option>
                                <option>Médecin Assurance</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="marginn custom-file form-group col-md-6">
                            <label class="custom-file-label" for="file_uploadPar ">Choisir une Photo</label>
                            <input type="file" name="registerPartenaire1" class="custom-file-input file-upload-input" id="file_uploadPar">
                        </div>
                    </div> -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmailPar">Email</label>
                            <input type="email" class="form-control" id="emailUsers" name="emailUsers" placeholder="" >
                            <p id="check_result"></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPhonePar">Téléphone</label>
                            <input type="text" class="form-control" id="PhonePar" name="registerPartenaire3" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPhone2Par">Téléphone portable</label>
                            <input type="text" class="form-control" id="Phone2Par" name="registerPartenaire4" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddressPar">Adresse</label>
                            <input type="text" class="form-control" id="inputAddressPar" name="registerPartenaire5" placeholder="">
                        </div>
        
                        <div class="form-group col-md-4">
                            <label for="inputCityPar">Ville</label>
                            <input type="text" class="form-control" name="registerPartenaire6" id="inputCityPar">
                        </div>
        
                        <div class="form-group col-md-4">
                            <label for="inputZipPar">Code postal</label>
                            <input type="text" class="form-control" name="registerPartenaire7" id="inputZipPar">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputHonorairePar">Tarif honoraire</label>
                            <input type="text" class="form-control" id="inputHonorairePar" name="registerPartenaire8" placeholder="??€">
                        </div>
        
                        <div class="form-group col-md-6">
                            <label for="inputComPar">Commission</label>
                            <input type="text" class="form-control" id="inputComPar" name="registerPartenaire9" placeholder="En %">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="partner_submit">Soumettre</button>
                    <button type="button" class="btn btn-primary" id="back_to_list" style="display: none;">Back</button>

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
            $('#partner_table').DataTable();
            // $('#patient_table').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //    "info": true,
            //     "autoWidth": false
            // });
        });

        //Search partners
        $('#search_term').on('input', () => {
            search_names("register_partenaire");
        });

        $('#photo_select').click(function() {
            // Open file browser
            document.getElementById('file_uploadPar').click();
        });

        $('#file_uploadPar').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').html('<img src="' + e.target.result + '">');
            }
            reader.readAsDataURL(file);
        });

        //Delete a partner
        $("button.partner-delete").click(function(e) {
            deleteBtn = $(this);
            delete_item("register_partenaire", deleteBtn, e);
        });

        $("#back_to_list").click(function() {
            location.reload();
        });

        //Update the record of partner
        $("button.partner-edit").click(function() {
            $(".list-unstyled").hide();
            $("#back_to_list").show();
            $.post("record_fetch.php", {
                id: this.id,
                tbname: "register_partenaire"
            }, function(data, status) {
                const record = JSON.parse(data);
                let src = "../images/partner_avatar/";
                if (record[0].registerPartenaire1 != "") {
                    src = src + record[0].registerPartenaire1;
                } else {
                    src = "../img/_defaultUser.png";
                }
                $("#partner_avatar").attr("src",src);

                record_update(record[0], "formPartner");
                $("#partner_submit").text("Update");
                $("#submit_action").val("update");
                $("#submit_id").val(record[0].id);

            });

            if (getComputedStyle(d7).display != "none") {
                d7.style.display = "block";
            } else {
                d7.style.display = "block";
                d6.style.display = "none";
            }

        });
        //Register new partner
        $("#formPartner").submit(function(e) {
            e.preventDefault();
            let formData = new FormData(e.target);
            $.ajax({
                url: '../php/partenaireAjout.php',
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

        $("#emailUsers").change(function() {
            var email = $("#emailUsers").val();
            $.post("email_check.php", {
                email: email,
                tbname: "register_partenaire"
            }, function(data, status) {
                if (data == "0") {
                    $("#check_result").css("color", "green");
                    $("#check_result").text("Validated Email");
                } else {
                    $("#check_result").css("color", "red");
                    $("#check_result").text("Email already exists. Try again.");
                }
            });
        });

    });
</script>

<script src="../js/form_functions.js"></script>
<script src="../js/sb-3.js"></script>
<?php require "../layouts/footer.php"; ?>