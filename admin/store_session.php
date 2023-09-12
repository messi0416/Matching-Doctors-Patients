<?php
session_start();
include("../php/functions.php");
$conn = connectDB();

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $stmt = $conn->prepare("SELECT AUTO_INCREMENT FROM information_schema.`TABLES` WHERE TABLE_SCHEMA = 'recourgadmin' and TABLE_NAME = 'reports'");
    $stmt->execute();
    $lastid = $stmt->fetch();
    
    $_SESSION['pemail'] = $_POST['email'];
    $_SESSION['acc_type'] = $_POST['acc_type'];
    $_SESSION['pname'] = $_POST['name'];
    if ($_POST['con_id'] != "") {
        $_SESSION['lastid'] = $_POST['con_id'];
    } else {
        $_SESSION['lastid'] = $lastid[0];
    }
    print($_SESSION['lastid']);
    exit();
    
}

?>