<?php
session_start();
require "functions.php";
$connection = connectDB();

$id = "";
$typeAccident = "";
$lastname = "";
$firstname = "";
$typeStatut = "";
$AdverseType = "";
$registerPatient1 = "";
$registerPatient2 = "";
$registerPatient3 = "";
$registerPatient4 = "";
$registerPatient5 = "";
$emailUsers = "";
$registerPatient7 = "";
$registerPatient8 = "";
$registerPatient9 = "";
$registerPatient10 = "";
$registerPatient11 = "";
$registerPatient12 = "";
$registerPatient13 = "";
$registerPatient14 = "";
$registerPatient15 = "";
$registerPatient18 = "";
$registerPatient19 = "";
$path = "/images/patient_avatar/";
$field_name = "registerPatient5";
$type = "avatar";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$action = $_POST['action'];

	$id = test_input($_POST['id']);
	$typeAccident = test_input($_POST['typeAccident']);
	$lastname = test_input($_POST['lastname']);
	$firstname = test_input($_POST['firstname']);
	$typeStatut = test_input($_POST['typeStatut']);
	$AdverseType = test_input($_POST['AdverseType']);
	$registerPatient1 = test_input($_POST['registerPatient1']);
	$registerPatient2 = test_input($_POST['registerPatient2']);
	$registerPatient3 = test_input($_POST['registerPatient3']);
	$registerPatient4 = test_input($_POST['registerPatient4']);
	$registerPatient5 = test_input($_FILES['registerPatient5']['name']);
	$emailUsers = test_input($_POST['emailUsers']);
	$registerPatient7 = test_input($_POST['registerPatient7']);
	$registerPatient8 = test_input($_POST['registerPatient8']);
	$registerPatient9 = test_input($_POST['registerPatient9']);
	$registerPatient10 = test_input($_POST['registerPatient10']);
	$registerPatient11 = test_input($_POST['registerPatient11']);
	$registerPatient12 = test_input($_POST['registerPatient12']);
	$registerPatient13 = test_input($_POST['registerPatient13']);
	$registerPatient14 = test_input($_POST['registerPatient14']);
	$registerPatient15 = test_input($_POST['registerPatient15']);
	$registerPatient18 = test_input($_POST['registerPatient18']);
	$registerPatient19 = test_input($_POST['registerPatient19']);

	if ($action === 'add') {

		$result_statement = upload_file($path, $field_name, $type);

		if ($registerPatient5 === "" || $result_statement[0] === "T") {

			$queryPrepared = $connection->prepare("INSERT INTO register_patient (typeAccident, lastname, typeStatut, AdverseType, firstname, registerPatient1, registerPatient2, registerPatient3, registerPatient4, registerPatient5, emailUsers, registerPatient7, registerPatient8, registerPatient9, registerPatient10, registerPatient11, registerPatient12, registerPatient13, registerPatient14, registerPatient15, registerPatient18, registerPatient19)
																			VALUES (:typeAccident, :lastname, :typeStatut, :AdverseType, :firstname, :registerPatient1, :registerPatient2, :registerPatient3, :registerPatient4, :registerPatient5, :emailUsers,:registerPatient7,:registerPatient8,:registerPatient9,:registerPatient10,:registerPatient11,:registerPatient12,:registerPatient13, :registerPatient14, :registerPatient15, :registerPatient18, :registerPatient19)");

			$queryPrepared->execute([
				// "user_id" => $user_id,
				"typeAccident" => $typeAccident,
				"lastname" => $lastname,
				"firstname" => $firstname,
				"typeStatut" => $typeStatut,
				"AdverseType" => $AdverseType,
				"registerPatient1" => $registerPatient1,
				"registerPatient2" => $registerPatient2,
				"registerPatient3" => $registerPatient3,
				"registerPatient4" => $registerPatient4,
				"registerPatient5" => $registerPatient5,
				"emailUsers" => $emailUsers,
				"registerPatient7" => $registerPatient7,
				"registerPatient8" => $registerPatient8,
				"registerPatient9" => $registerPatient9,
				"registerPatient10" => $registerPatient10,
				"registerPatient11" => $registerPatient11,
				"registerPatient12" => $registerPatient12,
				"registerPatient13" => $registerPatient13,
				"registerPatient14" => $registerPatient14,
				"registerPatient15" => $registerPatient15,
				"registerPatient18" => $registerPatient18,
				"registerPatient19" => $registerPatient19
			]);
			print("Registration Succeeded!");
		} else {
			$return_statement = $result_statement . "Registration Failed.";
			print($return_statement);
		}
	} elseif ($action === 'update') {

		$queryPrepared = $connection->prepare("UPDATE register_patient SET
		-- user_id=:user_id,
		typeAccident=:typeAccident, 
		lastname=:lastname, 
		firstname=:firstname, 
		typeStatut=:typeStatut,
		AdverseType=:AdverseType,
		registerPatient1=:registerPatient1, 
		registerPatient2=:registerPatient2, 
		registerPatient3=:registerPatient3, 
		registerPatient4=:registerPatient4, 
		emailUsers=:emailUsers,
		registerPatient7=:registerPatient7,
		registerPatient8=:registerPatient8,
		registerPatient9=:registerPatient9,
		registerPatient10=:registerPatient10,
		registerPatient11=:registerPatient11,
		registerPatient12=:registerPatient12,
		registerPatient13=:registerPatient13,
		registerPatient14=:registerPatient14,
		registerPatient15=:registerPatient15,
		registerPatient18=:registerPatient18,
		registerPatient19=:registerPatient19
		WHERE id=:id");

		$queryPrepared->execute([
			"id" => $id,
			// "user_id" => $user_id,
			"typeAccident" => $typeAccident,
			"lastname" => $lastname,
			"firstname" => $firstname,
			"typeStatut" => $typeStatut,
			"AdverseType" => $AdverseType,
			"registerPatient1" => $registerPatient1,
			"registerPatient2" => $registerPatient2,
			"registerPatient3" => $registerPatient3,
			"registerPatient4" => $registerPatient4,
			"emailUsers" => $emailUsers,
			"registerPatient7" => $registerPatient7,
			"registerPatient8" => $registerPatient8,
			"registerPatient9" => $registerPatient9,
			"registerPatient10" => $registerPatient10,
			"registerPatient11" => $registerPatient11,
			"registerPatient12" => $registerPatient12,
			"registerPatient13" => $registerPatient13,
			"registerPatient14" => $registerPatient14,
			"registerPatient15" => $registerPatient15,
			"registerPatient18" => $registerPatient18,
			"registerPatient19" => $registerPatient19
		]);
		print("Update Succeded!");
		if ($registerPatient5 != "") {
			$stmt = $connection->query("SELECT registerPatient5 FROM register_patient WHERE id = " . $id);
			$res = $stmt->fetch();
			$avatar_name = $res['registerPatient5'];

			if ($avatar_name != "") {
				unlink($_SERVER['DOCUMENT_ROOT'] . $path . $avatar_name);
			}

			$res_statement = upload_file($path, $field_name, $type);

			if ($res_statement[0] === "S") {
				$return_statement = $res_statement . "Update Failed.";
				print($return_statement);
			} else {

				$query = $connection->prepare(
					"UPDATE register_patient SET
					registerPatient5 =:registerPatient5
					WHERE id =:id"
				);

				$query->execute(["id" => $id, "registerPatient5" => $registerPatient5]);
				print("Update Succeeded!");
			}
		}
	}
}
$connection = null;
// header("Location: ../admin/patient.php");
?>
