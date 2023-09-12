<?php

define('TITLE', "CONSULTATION");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "../layouts/navbar.php";
mysqli_close($conn);
include "../php/functions.php";

?>
    <style>
        select {
            min-width: 30px;
        }
        /* .form-control {
            font-size: 8px !important;
            min-width: 60px !important;
        } */
        /* body {
            font-size: 8px;
        } */
        
    </style>
</head>

<?php

$conn = connectDB();
$stmt = $conn->query("SELECT * FROM user_right");
$result = $stmt->fetchAll();
?>
<div class="container-fluid">
    <div class="col py-3">
        <h4>Role Management</h4>
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive-xl">
                    <thead>
                        <tr>
                            <td>Partenaire</td>
                            <th>Avis medical</th>
                            <th>Retentissement</th>
                            <th>Condition Physique</th>
                            <th>Autonomie</th>
                            <th>Documents</th>
                            <th>Accès à la liste Patients</th>
                            <th>Accès à la liste employées</th>
                            <th>Accès à la liste Partenaires</th>
                            <th>Gestion de droits</th>
                            <th>Facturation</th>
                            <th>Agenda</th>
                            <th>Outils</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Medecin DM</td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Avocat</td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Medecin ASS</td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Employé</td>
                        </tr>
                        <tr>
                            <td>Aquisition</td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Conversion</td>

                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Retension</td>

                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Patient</td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Admin</td>

                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control">
                                    <option value=0>VOIR</option>
                                    <option value=1>MODIFIER</option>
                                    <option value=2>CACHER</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        
        //When the page is loaded, display the data of "user_right"
        $.post("record_fetch.php", {id: "", tbname: "user_right"}, function(data, status) {
            console.log(data);
            const record = JSON.parse(data);
            const selectInputs = document.querySelectorAll('select');
            for (let i = 0; i < 96 ; i++ ) {
                
                row_id = Math.trunc(i / 12);
                col_id = i % 12 + 2;
                selectInputs[i].value = record[row_id][col_id];
                
                switch (selectInputs[i].value) {
                    case "0":
                        selectInputs[i].style.backgroundColor = 'green';
                        selectInputs[i].style.color = 'white';
                        break;
                    case "1":
                        selectInputs[i].style.backgroundColor = 'orange';
                        selectInputs[i].style.color = 'white';
                        break;
                    case "2":
                        selectInputs[i].style.backgroundColor = 'grey';
                        selectInputs[i].style.color = 'white';
                        break;
                    default:    
                }

                
            }
        });

        // Select all the select inputs on the page
        const selectInputs = document.querySelectorAll('select');
        selectInputs.forEach((selectInput, index) => {
            selectInput.addEventListener('change', () => {
                const selectedValue = selectInput.value;
                const row_id = Math.trunc(index / 12) + 1;
                const col_name = `right_${index % 12 + 1}`;
                
                switch (selectedValue) {
                    case "0":
                        selectInput.style.backgroundColor = 'green';
                        selectInput.style.color = 'white';
                        break;
                    case "1":
                        selectInput.style.backgroundColor = 'orange';
                        selectInput.style.color = 'white';
                        break;
                    case "2":
                        selectInput.style.backgroundColor = 'grey';
                        selectInput.style.color = 'white';
                        break;
                    default:    
                }
                
                $.ajax({
                    url: '../php/right_update.php',
                    method: 'POST',
                    data: {
                        value: selectedValue,
                        row_id: row_id,
                        col_name: col_name
                    },
                    success: (response) => {
                        console.log(response);
                    },
                    error: (error) => {
                        console.error(error);
                    }
                });
            });
        });

    });
</script>

<?php require "../layouts/footer.php";  ?>