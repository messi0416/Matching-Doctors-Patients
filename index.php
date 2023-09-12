<?php 
session_start();
session_unset();
session_destroy();

if (isset($_SESSION['auth'])) {
    
    header("Location: auth/login.php");
   
    exit();
    
} else {

    header("Location: auth/login.php");
    
    exit();
}
