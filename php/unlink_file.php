<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    // $path = "/recoureo/documents/". $email . "/";
    $path = "/documents/". $email . "/";//cpanel
    $file_name = $_POST['file_name'];
    unlink($_SERVER['DOCUMENT_ROOT'] . $path . $file_name);
}
?>