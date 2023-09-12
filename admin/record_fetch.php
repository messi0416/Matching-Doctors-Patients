<?php
session_start();
require "../php/functions.php";
$conn = connectDB();

$tbname = "";
$id = "";
$term = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = test_input($_POST["id"]);
    $tbname = test_input($_POST["tbname"]);

    
    if ($id != 'search') {
        $jsonData = Read_record($conn, $tbname, $id);
    } elseif ($id == 'search') {
        $term = test_input($_POST['term']);
        $term_lower = strtolower($term);
        $sql = "SELECT * FROM " . $tbname;
        $result = $conn->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        $jsonData = [];
        foreach ($rows as $row) {
            $name = $row['firstname'] . " " . $row['lastname'];
            $name_lower = strtolower($name);
            $pos = strpos($name_lower, $term_lower);
            if ( $pos !== false) {
                array_push($jsonData, $row['id']);
            }
        }
    }
    
    echo json_encode($jsonData);
}
$conn = null;
