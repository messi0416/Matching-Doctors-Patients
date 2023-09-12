<?php

define('TITLE', "USER MANAGEMENT");
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
        <h3 style="text-align: center;">User Management</h3>
        <div id="d1" style="display: block;">
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                    <!-- <th>Approval</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $connection = connectDB();
                                $results = $connection->query("SELECT * FROM users WHERE user_type != 0");
                                $results = $results->fetchAll();


                                $i = 0;
                                foreach ($results as $user) {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $user['id'] . "</td>";
                                    echo "<td>" . $user["firstname"] . "</td>";
                                    echo "<td>" . $user["lastname"] . "</td>";
                                    echo "<td>" . $user["emailUsers"] . "</td>";
                                    echo "<td>" . $user["phone_mobile"] . "</td>";
                                    $stmt = $connection->query("SELECT user_role FROM user_right WHERE id = " . $user['user_type'] . "");
                                    $result = $stmt->fetch();
                                    echo "<td>" . $result["user_role"] . "</td>";
                                    echo "<td><button id='" . $user['id'] . "' style='margin: 2px;' type='button' class='btn btn-danger user-delete'><i class='fas fa-trash-alt'></i></button>";
                                    echo "<button id='" . $user['id'] . "' type='button' data-user-id='" . $user['id'] . "' class='btn btn-primary user-edit' data-bs-toggle='modal' data-bs-target='#myModal'><i class='fas fa-pen'></i></button></td>";
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
</div>

<!-- Update User Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" id="addition_alert" style="display: none;">
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
                    <strong>Success!</strong> This user has been added to the patient list.
                </div>
                <form action="../php/userAdd.php" method="POST" class="user" id="user_add">
                    <input type="hidden" name="action" value="update" id="submit_action">
                    <input type="hidden" name="id" value="" id="submit_id">

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="firstname">Prénom</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname">Nom</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="emailUsers" id="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Phone</label>
                        <input type="tel" class="form-control" name="phone_mobile" id="mobile" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="user_type">Role</label>
                        <select class="form-select" name="user_type" id="user_type">
                            <option value=7>Patient</option>
                            <option value=1>Medecin DM</option>
                            <option value=2>Avocat</option>
                            <option value=3>Medecin ASS</option>
                            <option value=4>Aquisition</option>
                            <option value=5>Conversion</option>
                            <option value=6>Retension</option>
                            <option value=8>Admin</option>
                        </select>
                    </div>
                    <div class="form-group row partner_employee" style="display: none;">
                        <div class="col-md-6">
                            <label for="inputPartner">Partenaire</label>
                            <select class="form-select" id="inputPartner" name="registerPatient14">
                                <option value=''></option>
                                <?php
                                $conn = connectDB();
                                $stmt = $conn->query("SELECT id, lastname, firstname FROM register_partenaire");
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                    print "<option value='" . $row['id'] . "'>" . $row['lastname'] . " " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmployee">Employé</label>
                            <select class="form-select" id="inputEmployee" name="registerPatient15">
                                <option value=''></option>
                                <?php
                                $conn = connectDB();
                                $stmt = $conn->query("SELECT id, lastname, firstname FROM register_employee");
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                    print "<option value='" . $row['id'] . "'>" . $row['lastname'] . " " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-success col-md-6 partner_employee" id="send_to_list">To Patient List</button>
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm Modal -->
<?php
include "../layouts/delete_modal.php";
?>

<script>
    $(document).ready(function() {

        $(function() {
            $('#user_table').DataTable();
        });

        //Search users
        $('#search_term').on('input', () => {
            search_names("users");
        });

        //Delete User
        $("button.user-delete").click(function(e) {
            deleteBtn = $(this);
            delete_item("users", deleteBtn, e);
        });

        //Update User
        $("button.user-edit").click(function(e) {
            e.preventDefault();

            $.post("record_fetch.php", {
                id: this.id,
                tbname: "users"
            }, function(data, status) {
                const record = JSON.parse(data);
                $("#firstname").val(record[0].firstname);
                $("#lastname").val(record[0].lastname);
                $("#email").val(record[0].emailUsers);
                $("#mobile").val(record[0].phone_mobile);
                $("#user_type").val(record[0].user_type);
                if (record[0].user_type == 7) {
                    $.post("email_check.php", {
                        email: record[0].emailUsers,
                        tbname: "register_patient"
                    }, function(data, status) {
                        if (data == "0") {
                            $(".partner_employee").show();
                        } else {
                            $(".partner_employee").hide();
                        }
                    });
                } else {
                    $(".partner_employee").hide();
                }
                $("#submit_id").val(record[0].id);
            });
        });

        $("#send_to_list").click(function(e) {
            $("#submit_action").val("add");
            let formData = $("#user_add").serialize();
            console.log(formData);
            $.ajax({
                url: "../php/patientAjout.php",
                type: "POST",
                data: formData,
                success: function(response) {
                    // $("#myModal").hide();
                    $("#addition_alert").show();
                    console.log(response);
                    $("#submit_action").val("update");
                }
            });
        });

    });
</script>
<script src="../js/form_functions.js"></script>
<?php include "../layouts/footer.php"; ?>