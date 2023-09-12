<?php
    include("../php/functions.php");
    $conn = connectDB();
    $email = $_POST['email'];
    $tbname = $_POST['tbname'];
    $query = $conn->prepare("SELECT emailUsers FROM ".$tbname." WHERE emailUsers=:emailUsers");
    $query->execute(["emailUsers" => $email]);
    $result = $query->fetch();
    if(!empty($result)) {
        echo "1";
    } else {
        echo "0";
    }
    $conn = null;
?>