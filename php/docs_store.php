<?php 
    session_start();
    include("functions.php");
    $conn = connectDB();
    $email = "";
    $category = "";
    $doc_name = "";
    $file_name = "";
    $doc_date = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        // $path = "/recoureo/documents/". $email . "/";
        $path = "/documents/". $email . "/";//cpanel
        $field_name = "doc-file-name";
        $type = "document";
        $category = $_POST['doc_type'];
        $doc_name = $_POST['doc_name'];
        $doc_date = $_POST['doc_date'];
        $file_name = $_FILES[$field_name]['name'];

        $result_statement = upload_file($path, $field_name, $type);

        if ($result_statement[0] === "T") {
            // $sql = "INSERT INTO patient_docs (emailUsers, ".$col_name.") VALUES ('".$email."','".$file_name."') ON DUPLICATE KEY UPDATE ".$col_name."='".$file_name."'";
            try {
                $query = $conn->prepare("INSERT INTO patient_docs (emailUsers, category, doc_name, file_name, doc_date)
                                    VALUES (:email, :category, :doc_name, :file_name, :doc_date)");
                $query->execute([
                    "email" => $email,
                    "category" => $category,
                    "doc_name" => $doc_name,
                    "file_name" => $file_name,
                    "doc_date" => $doc_date
                ]);
                $last_id = $conn->lastInsertId();
                print("Upload succeded!". $last_id);
            } catch (Exception $e) {
                print("Upload failed");
            }
        } else {
            print($result_statement);

        }
    }
    $conn = null;
?>
