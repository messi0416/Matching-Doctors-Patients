<?php
session_start();
require "functions.php";
$connection = connectDB();

$action = "";
$lastname = "";
$Niveau = "";
$Statu = "";
$firstname = "";
$registerEmployee1 = "";
$emailUsers = "";
$registerEmployee3 = "";
$registerEmployee4 = "";
$registerEmployee6 = "";
$registerEmployee7 = "";
$path = "/images/employee_avatar/";
$field_name = "registerEmployee1";
$type = "avatar";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	$action = $_POST['action'];
	$id = test_input($_POST['id']);
	$lastname = test_input($_POST['lastname']);
	$Niveau = test_input($_POST['Niveau']);
	$Statu = test_input($_POST['Statu']);
	$firstname = test_input($_POST['firstname']);
	$registerEmployee1 = test_input($_FILES['registerEmployee1']['name']);
	$emailUsers = test_input($_POST['emailUsers']);
	$registerEmployee3 = test_input($_POST['registerEmployee3']);
	$registerEmployee4 = test_input($_POST['registerEmployee4']);
	$registerEmployee5 = test_input($_POST['registerEmployee5']);
	$registerEmployee6 = test_input($_POST['registerEmployee6']);
	$registerEmployee7 = test_input($_POST['registerEmployee7']);

	

	if ($action === 'add') {
			
			$result_statement = upload_file($path, $field_name, $type);
			if ($registerEmployee1 === "" || $result_statement[0] === "T") {// In the case avatar file is not sent to the sever
				
				$queryPrepared = $connection->prepare("INSERT INTO register_employee
													(Niveau, Statu, lastname, firstname, registerEmployee1, emailUsers, registerEmployee3, registerEmployee4, registerEmployee5, registerEmployee6,registerEmployee7)
													VALUES 
													(:Niveau, :Statu ,:lastname, :firstname, :registerEmployee1, :emailUsers, :registerEmployee3, :registerEmployee4, :registerEmployee5, :registerEmployee6,:registerEmployee7)");
			
				$queryPrepared->execute([
					"Niveau" => $Niveau,
					"Statu" => $Statu,
					"lastname" => $lastname,
					"firstname" => $firstname,
					"registerEmployee1" => $registerEmployee1,
					"emailUsers" => $emailUsers,
					"registerEmployee3" => $registerEmployee3,
					"registerEmployee4" => $registerEmployee4,
					"registerEmployee5" => $registerEmployee5,
					"registerEmployee6" => $registerEmployee6,
					"registerEmployee7" => $registerEmployee7
				]);

				print("Registration Succeeded!");

			} else {
				$return_statement = $result_statement . "Registration Failed.";
				print($return_statement);
			}
	} elseif ($action === 'update') {
		
		$queryPrepared = $connection->prepare(
			"UPDATE register_employee SET
			Niveau =:Niveau,
			Statu =:Statu,
			lastname =:lastname,
			firstname =:firstname,
			emailUsers =:emailUsers,
			registerEmployee3 =:registerEmployee3,
			registerEmployee4 =:registerEmployee4,
			registerEmployee5 =:registerEmployee5,
			registerEmployee6 =:registerEmployee6,
			registerEmployee7 =:registerEmployee7
			WHERE id =:id"
		);

		$queryPrepared->execute([
			"id" => $id,
			"Niveau" => $Niveau,
			"Statu" => $Statu,
			"lastname" => $lastname,
			"firstname" => $firstname,
			"emailUsers" => $emailUsers,
			"registerEmployee3" => $registerEmployee3,
			"registerEmployee4" => $registerEmployee4,
			"registerEmployee5" => $registerEmployee5,
			"registerEmployee6" => $registerEmployee6,
			"registerEmployee7" => $registerEmployee7,
		]);
		print("Update Succeeded!");
		if ($registerEmployee1 != "") {
			$stmt = $connection->query("SELECT registerEmployee1 FROM register_employee WHERE id = ". $id);
			$res = $stmt->fetch();
			$avatar_name = $res['registerEmployee1'];
			
			if ($avatar_name != "") {
				unlink($_SERVER['DOCUMENT_ROOT'] . $path . $avatar_name);
			}
			
			$res_statement = upload_file($path, $field_name, $type);
			
			if ($res_statement[0] === "S") {
				$return_statement = $res_statement . "Update Failed.";
				print($return_statement);
			} else {
				
				$query = $connection->prepare(
					"UPDATE register_employee SET
					registerEmployee1 =:registerEmployee1
					WHERE id =:id"
				);

				$query->execute(["id" => $id, "registerEmployee1" => $registerEmployee1]);
				print("Update Succeeded!");
			}
		}
	}

}
//Redirection sur la page de formulaire
// header('location: ../admin/employee.php');

$connection = null;
?>
