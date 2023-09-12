<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style>
        h1 {
            color: red;
            text-align: center;
        }
        h4 {
            outline: solid;
        }
        h2 {
            color: blue;
            text-align: center;
        }
        div {
            margin: 20px;
            padding: 10px 15px;
        }
        p {
            font-size: 15px;
            font-family: Arial;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h1>Consultation Report</h1>

    <?php

    require "php/functions.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $connection = connectDB();
        $jsonData = $_POST['data'];
        $report_id = $_POST['report_id'];
        $labels = json_decode($jsonData);
        $stmt = $connection->prepare("SELECT * FROM reports WHERE id='" . $report_id . "'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        echo "<div>";
        foreach($labels as $key=>$value) {
            if ($key == "Avismedical" || $key == "Retentissements" || $key == "Autonomie" || $key == "Condition Physique") {
                echo "<h2>".$value."</h2><br>";
            }
            foreach($result[0] as $k=>$v) {
                if($key == $k) {
                    echo "<h4>".$value."</h4><br>";
                    echo "<p>".$v."</p>";
                } 
            }
        }
        echo "</div>";
        
    }
    $connection = null;

    ?>
</body>

</html>