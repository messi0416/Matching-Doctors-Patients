<?php

define('TITLE', "EMPLOYEE");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "../layouts/navbar.php";
mysqli_close($conn);
include "../php/functions.php";

?>


<div class="container-fluid">
    
        <div class="col py-3">
            <h3 style="text-align: center; ">Employés</h3>
            <ul class="list-unstyled">
                <a class="btn btn-success ml-1" id="togg9" data-toggle="tab" role="tab" aria-controls="list" aria-selected="false"><i class="fas fa-list"></i> Liste</a>
                <a class="btn btn-info ml-1" id="togg10" data-toggle="tab" role="tab" aria-controls="registration" aria-selected="false"><i class="fas fa-address-card"></i> Inscription</a>
            </ul>
        </div>

        <div id="d9" style="display: block;">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" id="search_term" class="form-control bg-light border-0 small" placeholder="Search for names ..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="search_button" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>    
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Tel</th>
                                    <th>Email</th>
                                    <th>Niveau</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $connection = connectDB();
                                $results = $connection->query("SELECT * FROM register_employee");
                                $rows = $results->fetchAll();
                                $i = 0;
                                foreach ($rows as $user) {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $user["id"] . "</td>";
                                    echo "<td>" . $user["firstname"] . "</td>";
                                    echo "<td>" . $user["lastname"] . "</td>";
                                    echo "<td>" . $user["registerEmployee3"] . "</td>";
                                    echo "<td>" . $user["emailUsers"] . "</td>";
                                    echo "<td>" . $user["Niveau"] . "</td>";
                                    // echo "<td><button id='" . $user['id'] . "' type='button' class='btn btn-danger employee-delete'>Supprimer l'employé</button></td>";
                                    // echo "<td><button id='" . $user['id'] . "' type='button' data-patient-id='" . $user['id'] . "' class='btn btn-primary employee-edit'>Modifier l'employé</button></td>";
                                    echo "<td><button id='" . $user['id'] . "' style='margin: 2px;' type='button' class='btn btn-danger employee-delete'><i class='fas fa-trash-alt'></i></button>";
                                    echo "<button id='" . $user['id'] . "' type='button' data-patient-id='" . $user['id'] . "' class='btn btn-primary employee-edit'><i class='fas fa-pen'></i></button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="d10" style="display: none;">
            <form action="../php/employeeAjout.php" id="formEmployee" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <input type="hidden" name="action" value="add" id="submit_action">
                <input type="hidden" name="id" value="" id="submit_id">
                <div class="row">
                    <div class="col-md-3">
                        <div class="image-preview" id="image">
                            <img src="../img/_defaultUser.png" id="employee_avatar">
                        </div>
                        <div class="form-group">
                            <!-- <label for="file_uploadEmp" class="form-label">Mettre une photo</label> -->
                            <input class="form-control" type="file" name="registerEmployee1" id="file_uploadEmp" style="display: none;">
                        </div>
                        <button type="button" class="btn btn-success" id="photo_select" >Select Photo</button>
                        
                    </div>
                    <div class="col-md-9">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstNameEmp">Prénom</label>
                                <input type="FirstName" class="form-control" name="firstname" id="inputFirstNameEmp" placeholder="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastNameEmp">Nom</label>
                                <input type="LastName" class="form-control" name="lastname" id="inputLastNameEmp" placeholder="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputRoleEmp">Role</label>
                                <select id="inputRoleEmp" name="Statu" class="form-control" >
                                    <!-- <option selected value="">Choisir...</option> -->
                                    <option value="non Admin">Non Admin</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNiveauEmp">Niveau</label>
                                <select id="inputNiveauEmp" name="Niveau" class="form-control" >
                                    <option selected value="">Choisir...</option>
                                    <option value="Acquisition">Acquisition</option>
                                    <option value="Conversion">Conversion</option>
                                    <option value="Rétention">Rétention</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="inputEmailPar">Email</label>
                                <input type="email" name="emailUsers" class="form-control" id="inputEmailEmp" placeholder="" required>
                                <p id="check_result"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddressPar">Adresse</label>
                                <input type="text" class="form-control" id="inputAddressEmp" name="registerEmployee5" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhonePar">Téléphone</label>
                                <input type="text" class="form-control" name="registerEmployee3" id="PhoneEmp" placeholder="" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone2Par">Téléphone portable</label>
                                <input type="text" class="form-control" name="registerEmployee4" id="Phone2Emp" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCityPar">Ville</label>
                                <input type="text" class="form-control" name="registerEmployee6" id="inputCityEmp">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZipPar">Code postal</label>
                                <input type="text" class="form-control" name="registerEmployee7" id="inputZipEmp">
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary" id="submit">Soumettre</button>
                            <button type="button" class="btn btn-primary" style="margin-left: 2px; display: none;" id="back_to_list">Back</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
                             

    <!-- Delete Confirm Modal -->
    <?php 
    include "../layouts/delete_modal.php";
    ?>

    <script>
        $(document).ready(function() {

            //Search for the Name of an employee
            $('#search_term').on('input', () => {
                search_names("register_employee");
            });

            $('#photo_select').click(function() {
                // Open file browser
                document.getElementById('file_uploadEmp').click();
            });

            $('#file_uploadEmp').change(function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').html('<img src="' + e.target.result + '">');
                }
                reader.readAsDataURL(file);
            });

            //Delete the employee
            $("button.employee-delete").click(function(e) {
                deleteBtn = $(this);
                delete_item("register_employee", deleteBtn, e);
            });

            $("#back_to_list").click(function() {
                location.reload();
            });

            //Update the record of an employee
            $("button.employee-edit").click(function() {
                $(".list-unstyled").hide();
                $("#back_to_list").show();
                $.post("record_fetch.php", {
                    id: this.id,
                    tbname: "register_employee"
                }, function(data, status) {
                    let src = "../images/employee_avatar/";
                    const record = JSON.parse(data);
                    if (record[0].registerEmployee1 != "") {
                        src = src + record[0].registerEmployee1;
                    } else {
                        src = "../img/_defaultUser.png";
                    }
                    $("#employee_avatar").attr("src",src);
                    record_update(record[0], "formEmployee");
                    $("#submit").text("Update");
                    $("#submit_action").val("update");
                    $("#submit_id").val(record[0].id);

                });

                if (getComputedStyle(d10).display != "none") {
                    d10.style.display = "block";
                } else {
                    d10.style.display = "block";
                    d9.style.display = "none";
                }

            });

            // Register new employee
            $("#formEmployee").submit(function(e) {
                e.preventDefault();
                let formData = new FormData(e.target);
                $.ajax({
                    url: '../php/employeeAjout.php',
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

            $("#inputEmailEmp").change(function() {
                var email = $("#inputEmailEmp").val();
                $.post("email_check.php", {
                    email: email,
                    tbname: "register_employee"
                }, function(data, status) {
                    if (data == "0") {
                        $("#check_result").css("color", "green");
                        $("#check_result").text("Validated Email");
                    } else {
                        // $('#inputEmailEmp').val("");
                        $("#check_result").css("color", "red");
                        $("#check_result").text("Email already exists. Try again.");
                    }
                });
            });
        });
    </script>

    <script src="../js/form_functions.js"></script>
    <script src="../js/sb-4.js"></script>
    <?php include "../layouts/footer.php"; ?>