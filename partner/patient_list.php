
<?php

define('TITLE', "CONSULTATION");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "partner_navbar.php";
mysqli_close($conn);
include "../php/functions.php";




$conn = connectDB();
$query = $conn->query("SELECT * FROM register_patient");
$result = $query->fetchAll();

//update the patient

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col py-3">
        <h4>Patients</h4>

        <div id="d1" style="display: block;">
            <div class="row">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" name="search_patient" id="search_patient" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Patient ID</th>
                                        <th>Name</th>
                                        <th>Tel</th>
                                        <th>Email</th>
                                        <th>Type d'accident</th>
                                        <th>Consultation ID</th>
                                        <th>Consultation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                        echo "<td>" . $con_id . "</td>";
                                        if ($con_id != "") {
                                            $button_content = "Modify";
                                        } else {
                                            $button_content = "Create";
                                        }
                                        echo "<td><button id='" . $patient['emailUsers'] . "' type='button' class='btn btn-sm btn-info patient-consultation'>" . $button_content . "</button></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="../js/form_functions.js"></script>
<script src="../js/sb-2.js"></script>
<?php include "../layouts/footer.php"; ?>