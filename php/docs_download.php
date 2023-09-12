<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_POST['file_name'];
    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/recoureo/documents/' . $_SESSION['pemail'] . '/' . $file;
    

    if (file_exists($file_path)) {
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        
        header('Content-Disposition: attachment; filename=Autonomie.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: no-cache, must-revalidate');
        header('Access-Control-Allow-Origin: *');
        header('Accept-Ranges: bytes');
	       
	    header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        flush();
        readfile($file_path);
        die();
        
    } else {
        echo "File not found.";
    }
}
