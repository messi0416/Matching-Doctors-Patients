<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RecoureoPro</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-3.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>
<?php include "php/header.php"; ?>
<?php

$connection = connectDB();
$results = $connection->query("SELECT lastname, firstname, emailUsers, registerPatient7, registerPatient9 FROM register_patient WHERE emailUsers = '".$_SESSION["email"]."'");
$results = $results->fetchAll();
  ?>
  

<div style="background-color: #eee;">

</div>
</div>


<div class="card mb-12">
  <div class="card-body p-0">


  </div>
  
</div>
  <div>
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Full Name</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $user["lastname"] ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Email</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $user["emailUsers"]; ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Phone</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $user["registerPatient7"]; ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Address</p>
          </div>
          <div class="col-sm-9">
            <!-- You may need to replace 'address' with the actual column name for the user's address -->
            <p class="text-muted mb-0"><?php echo $user["registerPatient9"]; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4 mb-md-0">
        <div class="card-body">
          <p class="mb-4"><span class="text-primary font-italic me-1">Avancement</span>
          </p>
          <p class="mb-1" style="font-size: .77rem;">Dossier</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Expertise médicale</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">transmition Assurance</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mt-4 mb-1" style="font-size: .77rem;">Indemnisation</p>
          <div class="progress rounded" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4 mb-md-0">
        <div class="card-body">
          <p class="mb-4"><span class="text-primary font-italic me-1">Partenaires</span>
          </p>
          <p class="mb-1" style="font-size: .77rem;">Nom médecin : </br> Jean Charles</p>

          <p class="mt-3 mb-1" style="font-size: .77rem;">Nom assurance : </br> Jean Charles </p>

          <p class="mt-3 mb-1" style="font-size: .77rem;">Nom médecin assurance : </br> Jean Charles</p>

          <p class="mt-3 mb-1" style="font-size: .77rem;">Nom avocat : </br> Jean Charles</p>

        </div>

      </div>
    </div>
  </div>

  <div class="card-body">

    <div class="row">
      <div class="mb-6">
        <p><span class="text-primary font-italic me-1">Pièces jointes</span>
        </p>
        <h5>Documents médicaux</h5>
        <p class="mb-1" style="font-size: .77rem;">Nom fichier</br> fichier</p>

        <p class="mt-3 mb-1" style="font-size: .77rem;">Nom fichier</br> fichier</p>

        <h5>Documents juridique</h5>
        <p class="mt-3 mb-1" style="font-size: .77rem;">Nom fichier</br> fichier</p>

        <p class="mt-3 mb-1" style="font-size: .77rem;">Nom fichier</br> fichier</p>

        <h5>Documents autres</h5>
        <p class="mt-3 mb-1" style="font-size: .77rem;">Nom fichier</br> fichier</p>
      </div>


    </div>
  </div>


  <?php include "php/footer.php"; ?>