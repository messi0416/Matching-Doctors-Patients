<?php
session_start();
include "../php/functions.php";
$conn = connectDB();
$email ="";
$tbname = "";

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $tbname = $_POST['tbname'];
    $result = $conn->query("SELECT * FROM ".$tbname." WHERE emailUsers='".$email."'");
    $row = $result->fetch();
    print(json_encode($row));
   
}
?>