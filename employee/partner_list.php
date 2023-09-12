<?php

define('TITLE', "PARTENAIRE");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "employee_navbar.php";
mysqli_close($conn);
include "../php/functions.php";

?>

<div class="container-fluid">
  <div class="col py-3">
    <h4>Partenaires</h4>
    <ul class="list-unstyled">
      <a class="btn btn-success ml-1" id="togg6" data-target="tab" role="tab" aria-controls="list" aria-selected="false"><i class="fas fa-list"></i> Liste</a>
      <a class="btn btn-info ml-1" id="togg7" data-toggle="tab" role="tab" aria-controls="registration" aria-selected="false"><i class="fas fa-address-card"></i> Inscription</a>
    </ul>
  </div>
  <div id="d6" style="display: block;">
    <div class="row">
      <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>

        <div class="col-md-12">
          <div class="table-wrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Tel</th>
                  <th>Métier</th>
                  <th>email</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $connection = connectDB();
                $results = $connection->query("SELECT * FROM register_partenaire");
                $results = $results->fetchAll();
                foreach ($results as $user) {
                  echo "<tr>";
                  echo "<td>" . $user["id"] . "</td>";
                  echo "<td>" . $user["lastname"] . "</td>";
                  echo "<td>" . $user["firstname"] . "</td>";
                  echo "<td>" . $user["registerPartenaire3"] . "</td>";
                  echo "<td>" . $user["Metier"] . "</td>";
                  echo "<td>" . $user["emailUsers"] . "</td>";
                  // echo "<td><button id='" . $user['id'] . "' type='button' class='btn btn-danger partner-delete'>Supprimer le partenaire</button></td>";
                  // echo "<td><button id='" . $user['id'] . "' type='button' data-patient-id='" . $user['id'] . "' class='btn btn-primary partner-edit'>Modifier le partenaire</button></td>";
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
      
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputFirstNamePar">Prénom</label>
          <input type="FirstName" class="form-control" name="firstname" id="inputFirstNamePar" placeholder="" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputLastNamePar">Nom</label>
          <input type="LastName" class="form-control" name="lastname" id="inputLastNamePar" placeholder="" required>
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
      <div class="form-row">
        <div class=" marginn custom-file form-group col-md-6">
          <label class="custom-file-label" for="file-uploadPar ">Choisir une Photo</label>
          <input type="file" name="registerPartenaire1" class="custom-file-input file-upload-input " id="file-uploadPar">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmailPar">Email</label>
          <input type="email" class="form-control" id="emailUsers" name="emailUsers" placeholder="" required>
          <p id="check_result"></p>
        </div>
      </div>
      <div class="form-row">  
        <div class="form-group col-md-6">
          <label for="inputPhonePar">Téléphone</label>
          <input type="text" class="form-control" id="PhonePar" name="registerPartenaire3" placeholder="" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPhone2Par">Téléphone portable</label>
          <input type="text" class="form-control" id="Phone2Par" name="registerPartenaire4" placeholder="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputAddressPar">Adresse</label>
          <input type="text" class="form-control" id="inputAddressPar" name="registerPartenaire5" placeholder="">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCityPar">Ville</label>
          <input type="text" class="form-control" name="registerPartenaire6" id="inputCityPar">
        </div>

        <div class="form-group col-md-6">
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

    </form>

  </div>
</div>

<!-- Delete Confirm Modal -->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
        <button id="confirm-delete-btn" type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    //Delete a partner
    $("button.partner-delete").click(function(e) {
      e.preventDefault();
      const deleteBtn = $(this);
      const id = this.id;
      $('#delete-modal').modal('show');
      $('#confirm-delete-btn').click(function(){
        $.post("record_delete.php", { id: id, tbname: "register_partenaire" }, function(data, status) {
          //console.log(data);
        });
        $('#delete-modal').modal('hide');
        deleteBtn.closest("tr").hide();
      });
    });

    //Update the record of partner
    $("button.partner-edit").click(function(event) {
      event.preventDefault();
      $.post("record_fetch.php", {
        id: this.id, tbname: "register_partenaire"
      }, function(data, status) {
        const record = JSON.parse(data);
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

    $("#emailUsers").change(function(){
      var email = $("#emailUsers").val();
      $.post("email_check.php", {email: email, tbname: "register_partenaire"}, function(data, status) {
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