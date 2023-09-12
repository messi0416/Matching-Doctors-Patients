<?php
	session_start();
	require "functions.php";
	require_once(__DIR__ . '/../brevomail.php');
	$connection = connectDB();

	$action = "";
	$id ="";
	$firstname = "";
	$lastname = "";
	$email = "";
	$pwd = "";
	$pwdConfirm = "";
	$phone_mobile = "";
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$action = $_POST['action'];
		$firstname = cleanFirstname($_POST['firstname']);
		$lastname = cleanLastname($_POST['lastname']);
		$email = cleanEmail($_POST['emailUsers']);
		$phone_mobile = $_POST['phone_mobile'];

		if ($action == "update") {
			$user_type = $_POST['user_type'];
			$id = $_POST['id'];
			
		} else {
			$user_type = 7;
			$pwd = $_POST['pwd'];
			$pwdConfirm = $_POST['pwdConfirm'];
		}
		
		$listOfErrors = [];
	
		// --> Est-ce que le genre est cohérent
	
		// --> Nom plus de 2 caractères
		if(strlen($lastname) < 2){
			$listOfErrors[] = "Le nom doit faire plus de 2 caractères";
		}
		
		// --> Prénom plus de 2 caractères
		// --> Nom plus de 2 caractères
		if(strlen($firstname) < 2){
			$listOfErrors[] = "Le prénom doit faire plus de 2 caractères";
		}
	
		if ($action == "add") {
			// --> Format de l'email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$listOfErrors[] = "L'email est incorrect";
			}else{
				// --> Unicité de l'email (plus tard)
				
				$queryPrepared = $connection->prepare("SELECT * FROM users WHERE emailUsers=:emailUsers");
				$queryPrepared->execute([ "emailUsers" => $email ]);
		
				$results = $queryPrepared->fetch();
				
				if(!empty($results)){
					$listOfErrors[] = "L'email est déjà utilisé";
				}
			}
		
			// --> Complexité du pwd
			
				if(strlen($pwd) < 8
				|| !preg_match("#[a-z]#", $pwd)
				|| !preg_match("#[A-Z]#", $pwd)
				|| !preg_match("#[0-9]#", $pwd)){
					$listOfErrors[] = "Le mot de passe doit faire au min 8 caractères avec des minuscules, des majuscules et des chiffres";
				}
			
				// --> Meme mot de passe de confirmation
				if( $pwd != $pwdConfirm){
					$listOfErrors[] = "La confirmation du mot de passe ne correspond pas";
				}
		}
	
	//Si OK
		if(empty($listOfErrors)){
			if ($action == "add") {
				$brevoMailSender = new Emailsend;
				$brevoMailSender->afterRegister($email, $firstname . ' ' . $lastname);
				//Insertion en BDD
				$queryPrepared = $connection->prepare("INSERT INTO users
														(firstname, lastname, emailUsers, pwd, phone_mobile, user_type, created_at)
														VALUES 
														(:firstname, :lastname, :emailUsers, :pwd, :phone_mobile, :user_type, NOW())");
		
				$queryPrepared->execute([
											"firstname" => $firstname,
											"lastname" => $lastname,
											"emailUsers" => $email,
											"pwd" => password_hash($pwd, PASSWORD_DEFAULT),
											"phone_mobile" => $phone_mobile,
											"user_type" => $user_type
										]);
				//Redirection sur la page de connexion
				header('Location: ../index.php');
			} elseif ($action == "update") {
				$queryPrepared = $connection->prepare("UPDATE users SET
					firstname=:firstname,
					lastname=:lastname,
					emailUsers=:emailUsers,
					phone_mobile=:phone_mobile,
					user_type=:user_type,
					updated_at=NOW()
					WHERE id=:id"
				);

				$queryPrepared->execute([
					"id" => $id,
					"firstname" => $firstname,
					"lastname" => $lastname,
					"emailUsers" => $email,
					"phone_mobile" => $phone_mobile,
					"user_type" => $user_type
				]);
				header('Location: ../admin/user_management.php');
				
			}
		}else{
	
			//Si NOK
			//On stock les erreurs et la data
			$_SESSION['listOfErrors'] = $listOfErrors;
			unset($_POST["pwd"]);
			unset($_POST["pwdConfirm"]);
			$_SESSION['data'] = $_POST;
			//Redirection sur la page d'inscription
			if ($action == "add") {
				header('Location: ../auth/register.php');
			} elseif ($action == "update") {
				header('Location: ../admin/user_management.php');
			}
		}

	}
	//Nettoyage des données
	$connection = null;

	?>