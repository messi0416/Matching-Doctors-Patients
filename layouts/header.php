<?php

session_start();

require '../env/env.php';
require '../env/db.inc.php';
require '../php/auth_functions.php';
require '../php/security_functions.php';

// if(isset($_SESSION['auth']))
//     $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo APP_DESCRIPTION;  ?>">
    <meta name="author" content="<?php echo APP_OWNER;  ?>">

    <title><?php echo TITLE . ' | ' . APP_NAME; ?></title>
    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">    
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    
    <!-- Sweetalert -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-3.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/loader.css" rel="stylesheet">
    <link href="../css/alert.css" rel="stylesheet">

    <!-- TinyMCE Editor -->
    <!-- <script src="https://cdn.tiny.cloud/1/twu1q50vokw3bsl0tdqxta9xx0d7waoedqwa50qcg1cwi6v4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->

</head>


