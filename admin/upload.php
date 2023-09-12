<?php
session_start();
$uploadsDir = $_SERVER['DOCUMENT_ROOT'] . '/recoureo/documents/';
$target_dir = rtrim($uploadsDir, '/') . '/';
$uploadSubDir = $_SESSION['pemail'] . "/";
$uploadPath = $target_dir . $uploadSubDir;

if (!is_dir($uploadPath)) {
    if (!mkdir($uploadPath, 0777, true)) {
        die('Failed to create directory');
    };
}


$target_file = $uploadPath . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is a PDF or DOC file
if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
    echo "Sorry, only PDF and DOC files are allowed.";
    $uploadOk = 0;
}
//Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if file was uploaded successfully
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
