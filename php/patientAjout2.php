<?php
session_start();
require "functions.php";
$connection = connectDB();

	$id = "";
    $typeAccident = "";
    $lastname = "";
    $firstname = "";
	$typeStatut = "";
	$Adversetype = "";
    $registerPatient1 = "";
    $registerPatient2 = "";
    $registerPatient3 = "";
    $registerPatient4 = "";
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    
	$patient_id = test_input($_POST['patient_id']);
    $typeAccident = test_input($_POST['typeAccident']);
    $lastname = test_input($_POST['lastname']);
    $firstname = test_input($_POST['firstname']);
	$typeStatut = test_input($_POST['typeStatut']);
	$Adversetype = test_input($_POST['Adversetype']);
    $registerPatient1 = test_input($_POST['registerPatient1']);
    $registerPatient2 = test_input($_POST['registerPatient2']);
    $registerPatient3 = test_input($_POST['registerPatient3']);
    $registerPatient4 = test_input($_POST['registerPatient4']);
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
	
    if ($action == 'add') {
		$queryPrepared = $connection->prepare("INSERT INTO register_patient
		(typeAccident, lastname, typeStatut, Adversetype, firstname, registerPatient1, registerPatient2, registerPatient3, registerPatient4, emailUsers, registerPatient7, registerPatient8, registerPatient9, registerPatient10, registerPatient11, registerPatient12, registerPatient13, registerPatient14, registerPatient15, registerPatient18, registerPatient19)
		VALUES 
		(:typeAccident, :lastname, :typeStatut, :firstname , :Adversetype, :registerPatient1, :registerPatient2, :registerPatient3, :registerPatient4, :emailUsers,:registerPatient7,:registerPatient8,:registerPatient9,:registerPatient10,:registerPatient11,:registerPatient12,:registerPatient13, :registerPatient14, :registerPatient15, :registerPatient18, :registerPatient19)");

		$queryPrepared->execute([
			// "user_id" => $user_id,
			"typeAccident" => $typeAccident,
			"lastname" => $lastname,
			"firstname" => $firstname,
			"typeStatut" => $typeStatut,
			"Adversetype" => $Adversetype,
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


		//Redirection sur la page de formulaire
		// header('Location: ../patient/monprofile.php');
	} elseif ($action == 'update') {
		$queryPrepared = $connection->prepare("UPDATE register_patient SET
		user_id=:user_id,
		typeAccident=:typeAccident, 
		lastname=:lastname, 
		firstname=:firstname, 
		typeStatut=:typeStatut,
		Adversetype=:Adversetype,
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
			"id" => $patient_id,
			"user_id" => $user_id,
			"typeAccident" => $typeAccident,
			"lastname" => $lastname,
			"firstname" => $firstname,
			"typeStatut" => $typeStatut,
			"Adversetype" => $Adversetype,
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
	} 	
	
}
$connection = null;
header("Location: ../patient/monprofile.php");
?>