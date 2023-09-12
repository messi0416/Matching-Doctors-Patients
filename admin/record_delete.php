<?php
session_start();
require "../php/functions.php";
$conn = connectDB();
$tbname = "";
$id = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = test_input($_POST["id"]);
    $tbname = test_input($_POST["tbname"]);
    Delete_record($conn, $tbname, $id);
}

echo "Deletion Success";
$conn = null;
