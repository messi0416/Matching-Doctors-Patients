<?php
function cleanFirstname($firstName){
	return ucwords(strtolower(trim($firstName)));
}

function cleanLastname($lastName){
	return strtoupper(trim($lastName));
}
function cleanEmail($email){
	return strtolower(trim($email));
}

function connectDB(){
    try{
        $connection = new PDO("mysql:host=recourgadmin.mysql.db;port=3306;dbname=recourgadmin", "recourgadmin", "Agathe55");
        // $connection = new PDO("mysql:host=localhost;port=3306;dbname=recourgadmin", "root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die("Erreur SQL ".$e->getMessage());
    }
    return $connection;
}

function isConnected(){
    if(!empty($_SESSION['email']) && !empty($_SESSION['login'])){
        return true;
    }
    return false;
}
function redirectIfNotConnected(){
    if(!isConnected()){
        header("Location: index.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function Delete_record($conn, $table_name, $id) {
    if ($table_name === "reports") {
        $sql = "DELETE FROM ".$table_name." WHERE emailUsers=:id";
    } else {
        $sql = "DELETE FROM ".$table_name." WHERE id=:id";
    }
    $query = $conn->prepare($sql);
    $query->execute([':id' => $id]);
    return true;
}

function Read_record($conn, $table_name, $id) {
    if($id == "") {
        $sql = "SELECT * FROM " .$table_name;
    } else {
        $sql = "SELECT * FROM ".$table_name." WHERE id='".$id."'";
    }
    $result = $conn->query($sql);
    // $row = $result->fetchALL(PDO::FETCH_ASSOC);
    $row = $result->fetchALL();
    return $row;
}

function upload_file($path, $field_name, $type) {

    $uploadsDir = $_SERVER['DOCUMENT_ROOT'] . $path;
    $target_dir = rtrim($uploadsDir, '/') . '/';

    $uploadPath = $target_dir;

    if (!is_dir($uploadPath)) {
        if (!mkdir($uploadPath, 0777, true)) {
            die('Failed to create directory');
        };
    }

    $target_file = $uploadPath . basename($_FILES[$field_name]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
        return "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    // if ($_FILES["registerEmployee1"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }

    // Check if file is a PDF or DOC file
    // if ($type === "document") {
    //     if ($fileType != "docx" && $fileType != "doc" && $fileType != "pdf") {
    //         return "Sorry, only document files are allowed.";
    //         $uploadOk = 0;
    //     }
    // }
    // // Check if file is a PDF or DOC file
    // if ($type === "avatar") {
    //     if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
    //         return "Sorry, only JPG and PNG files are allowed.";
    //         $uploadOk = 0;
    //     }

    // }

    // if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
    //     //         return "Sorry, only JPG and PNG files are allowed.";
    //     //         $uploadOk = 0;
    //     //     }
    

    // Check if file was uploaded successfully
    if ($uploadOk == 0) {
        return "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES[$field_name]["tmp_name"], $target_file)) {
            return "The file " . basename($_FILES[$field_name]["name"]) . " has been uploaded.";
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }
}