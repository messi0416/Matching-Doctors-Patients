<?php

define('TITLE', "CONSULTATION");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "../layouts/navbar.php";
mysqli_close($conn);
include "../php/functions.php";

?>
<div class="container">
    <div class="col py-3">
        <h2 style="text-align: center;">Consultation</h2>
        <div id="d8" style="display: block;">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Consultation ID</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                    <th>Print</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $connection = connectDB();
                                $query = $connection->query("SELECT id, emailUsers, lastdate FROM reports");
                                $results = $query->fetchAll();
                                $i = 0;

                                foreach ($results as $user) {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $user['id'] . "</td>";
                                    echo "<td>" . $user["emailUsers"] . "</td>";
                                    echo "<td>" . $user["lastdate"] . "</td>";
                                    echo "<td><button type='button' id='" . $user['id'] . "' aria-hidden='true' class='btn btn-danger report-delete'><i class='fas fa-trash-alt'></i></button></td>";
                                    // echo "<td><button type='button' class='btn btn-primary report-edit'><i class='fas fa-pen'></i></button></td>";
                                    echo "<td><button type='button' id='" . $user['id'] . "' class='btn btn-warning export-whole-pdf'><i class='far fa-file-pdf'></i></button></td>";
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
<!-- Delete Confirm Modal -->
<?php
include "../layouts/delete_modal.php";
?>

<script>
    function readForm(id) {
        var form = document.getElementById(id);
        var inputs = form.getElementsByClassName('form-control');
        var labels = form.getElementsByTagName('label');
        var data = {};
        for (var i = 0; i < labels.length; i++) {
            var label = labels[i];
            var input = inputs[i];
            data[input.name] = label.textContent;
        }
        return data;
    }

    $(document).ready(function() {
        $("button.report-delete").click(function(e) {
            e.preventDefault();
            const deleteBtn = $(this);
            const id = this.id;
            $('#delete-modal').modal('show');
            $('#confirm-delete-btn').click(function() {
                $.post("record_delete.php", {
                    id: id,
                    tbname: "reports"
                }, function(data, status) {
                    //console.log(data);
                });
                $('#delete-modal').modal('hide');
                deleteBtn.closest("tr").hide();
            });
        });

        $("button.export-whole-pdf").click(function(e) {
            e.preventDefault();
            var data = readForm("form");
            var jsonData = JSON.stringify(data);
            var report_id = this.id;
            $.ajax({
                url: "export_wholepdf.php",
                type: "POST",
                data: {
                    data: jsonData,
                    report_id: report_id
                }, // Send the JSON string as a request parameter
                success: function(response) {
                    // Handle the response
                    console.log(response);
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
                    doc_name.value = "Consultation Report";
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
        });
    });
</script>
<script src="../js/form_functions.js"></script>

<!-- <script src="js/sb-5.js"></script> -->
<?php require "../layouts/footer.php";  ?>