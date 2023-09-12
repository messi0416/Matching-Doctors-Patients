<?php
session_start();
include "../php/functions.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $path = "/recoureo/images/employee_avatar";
    $field_name = "registerEmployee1";
    $type = "jpg";
    print(upload_file($path, $field_name, $type)[0]);
}
