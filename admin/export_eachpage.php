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
    <link href="css/textarea.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style>
        body {
            font-family: Arial,sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        h4 {
            outline: solid;
        }
        h2 {
            font-size: 18px;
            color: blue;
            text-align: center;
            margin-bottom: 5px;
        }
        div {
            margin: 1rem;
            border: solid windowtext 1.0pt;
            
        }
        p {
            font-size: 1rem;
            font-family: Arial;
            padding: 10px;
            
        }
        label {
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <!-- <h1>Cosultation Report</h1> -->
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['param'];
    $pagename = $_POST['pagename'];
    // echo "<h5>Consultation ID: ".$_SESSION['lastid']."</h5>";
    // echo "<h5>Patient Name: ".$_SESSION['pname']."</h5>";
    // echo "<h5>Patient Email: ".$_SESSION['pemail']."</h5>";
    // echo "<h5>Type of Accident: ".$_SESSION['acc_type']."</h5>";
    foreach ($data as $key => $value) {
        $parts = explode("/", $value);
        if ($key == "0") {
            echo "<h1>Condition Physique</h1><br>";
        } else {
            echo "<div>";
            echo "<label>- ".$parts[0].":  </lable>";
            echo $parts[1]."</div>";
        }
    }
    
}
?>
</body>
</html>