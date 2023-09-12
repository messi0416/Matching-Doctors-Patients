<?php
session_start();
require "functions.php";
$connection = connectDB();

$action = "";
$Metier = "";
$lastname = "";
$firstname = "";
$registerPartenaire1 = "";
$emailUsers = "";
$registerPartenaire3 = "";
$registerPartenaire4 = "";
$registerPartenaire6 = "";
$registerPartenaire7 = "";
$registerPartenaire8 = "";
$registerPartenaire9 = "";
$path = "/images/partner_avatar/";
$field_name = "registerPartenaire1";
$type = "avatar";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $id = test_input($_POST['id']);
    $lastname = test_input($_POST['lastname']);
    $Metier = test_input($_POST['Metier']);
    $firstname = test_input($_POST['firstname']);
    $registerPartenaire1 = test_input($_FILES['registerPartenaire1']['name']);
    $emailUsers = test_input($_POST['emailUsers']);
    $registerPartenaire3 = test_input($_POST['registerPartenaire3']);
    $registerPartenaire4 = test_input($_POST['registerPartenaire4']);
    $registerPartenaire5 = test_input($_POST['registerPartenaire5']);
    $registerPartenaire6 = test_input($_POST['registerPartenaire6']);
    $registerPartenaire7 = test_input($_POST['registerPartenaire7']);
    $registerPartenaire8 = test_input($_POST['registerPartenaire8']);
    $registerPartenaire9 = test_input($_POST['registerPartenaire9']);
    
    if ($action == 'add') {
        $result_statement = upload_file($path, $field_name, $type);
        if ($registerPartenaire1 === "" || $result_statement[0] === "T") {
            $queryPrepared = $connection->prepare("INSERT INTO register_partenaire
                                                        (Metier, lastname, firstname, registerPartenaire1, emailUsers, registerPartenaire3, registerPartenaire4, registerPartenaire5, registerPartenaire6,registerPartenaire7,registerPartenaire8,registerPartenaire9)
                                                        VALUES 
                                                        (:Metier, :lastname, :firstname, :registerPartenaire1, :emailUsers, :registerPartenaire3, :registerPartenaire4, :registerPartenaire5, :registerPartenaire6,:registerPartenaire7,:registerPartenaire8,:registerPartenaire9)");
            
            $queryPrepared->execute([
                "Metier" => $Metier,
                "lastname" => $lastname,
                "firstname" => $firstname,
                "registerPartenaire1" => $registerPartenaire1,
                "emailUsers" => $emailUsers,
                "registerPartenaire3" => $registerPartenaire3,
                "registerPartenaire4" => $registerPartenaire4,
                "registerPartenaire5" => $registerPartenaire5,
                "registerPartenaire6" => $registerPartenaire6,
                "registerPartenaire7" => $registerPartenaire7,
                "registerPartenaire8" => $registerPartenaire8,
                "registerPartenaire9" => $registerPartenaire9,
            ]);
            print("Registration Succeeded!");
        } else {
                $return_statement = $result_statement . "Registration Failed.";
                print($return_statement);
        }

    } elseif ($action == 'update') {
        $queryPrepared = $connection->prepare(
            "UPDATE register_partenaire SET
            Metier =:Metier,
            lastname =:lastname,
            firstname =:firstname,
            emailUsers =:emailUsers,
            registerPartenaire3 =:registerPartenaire3,
            registerPartenaire4 =:registerPartenaire4,
            registerPartenaire5 =:registerPartenaire5,
            registerPartenaire6 =:registerPartenaire6,
            registerPartenaire7 =:registerPartenaire7,
            registerPartenaire8 =:registerPartenaire8,
            registerPartenaire9 =:registerPartenaire9
            WHERE id =:id"
        );
        $queryPrepared->execute([
            "id" => $id,
            "Metier" => $Metier,
            "lastname" => $lastname,
            "firstname" => $firstname,
            "emailUsers" => $emailUsers,
            "registerPartenaire3" => $registerPartenaire3,
            "registerPartenaire4" => $registerPartenaire4,
            "registerPartenaire5" => $registerPartenaire5,
            "registerPartenaire6" => $registerPartenaire6,
            "registerPartenaire7" => $registerPartenaire7,
            "registerPartenaire8" => $registerPartenaire8,
            "registerPartenaire9" => $registerPartenaire9
        ]);
        print("Update Succeeded!");
        if ($registerPartenaire1 != "") {
			$stmt = $connection->query("SELECT registerPartenaire1 FROM register_partenaire WHERE id = ". $id);
			$res = $stmt->fetch();
			$avatar_name = $res['registerPartenaire1'];
			
			if ($avatar_name != "") {
				unlink($_SERVER['DOCUMENT_ROOT'] . $path . $avatar_name);
			}
			
			$res_statement = upload_file($path, $field_name, $type);
			
			if ($res_statement[0] === "S") {
				$return_statement = $res_statement . "Update Failed.";
				print($return_statement);
			} else {
				
				$query = $connection->prepare(
					"UPDATE register_partenaire SET
					registerPartenaire1 =:registerPartenaire1
					WHERE id =:id"
				);

				$query->execute(["id" => $id, "registerPartenaire1" => $registerPartenaire1]);
				print("Update Succeeded!");
			}
		}
    }
    
    
}
//Redirection sur la page de formulaire

$connection == null;
// header('location: ../admin/partenaire.php');
?>
