<?php
session_start();
require "functions.php";
$conn = connectDB();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['value'];
    $row_id = $_POST['row_id'];
    $col_name = $_POST['col_name'];
    
    $query = $conn->prepare("UPDATE user_right SET ". $col_name ." =:value WHERE id =:id");
    $query->execute(["id" => $row_id, "value" => $value]);
}

$conn == null;

?>