<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$errors=array();
$pdo = new PDO('mysql:host=localhost;dbname=Attenborough', 'root', 'Papa1964');
//SIGNUP

if (isset($_POST['email']) && isset($_POST['password-1']) && isset($_POST['password-2'])){
	$req = $pdo->prepare("SELECT A_U_email from A_users WHERE A_U_email=?");
	$req->execute([$_POST['email']]);
	$user = $req->fetch();
	// email deja existant?
	if ($user){
		$errors[]="Email already exists!";
	}
	// password contient + de 8 caractères
	if (strlen($_POST['password-1']) <= 8){
		$errors[]="too short bitch!";
	}
	// Password avec une majuscule
	if (!preg_match("~[A-Z]~", $_POST['password-1'])){
		$errors[]=" add a CAPITAL please!";
	}
	// PASSWORD1 identique à PASSWORD2
	if ($_POST['password-1'] != $_POST['password-2']){
		$errors[]="not the same password";
	}
	// verifie les caracteres intrusif de l email correct
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if (!$email){
		$errors[]="Your email is not valid";
	}else{ // Vérifie que la structure de l email est correct
		$email=filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email){
			$errors[]="Your email is not valid";
		}
	}
	// si pas d'erreurs execute DB
	if (empty($errors)){
		$email=$_POST['email'];
		$password= password_hash($_POST['password-1'], PASSWORD_DEFAULT);
		$sth=$pdo->prepare("INSERT INTO A_users (A_U_email, A_U_password_1) VALUES(?,?)");
		$sth->execute([$email,$password]);
		$_SESSION['registered']=$email;
	}
	// array erreurs accessible via la $_SESSION[''] dans l'index.php
	$_SESSION['errors']=$errors;
	header('location: index.php');
}

//login connection
if(isset($_POST['email-login'])&& isset($_POST['password-login'])){
	$email_login=$_POST['email-login'];
	$password_login=$_POST['password-login'];
	// récupère le password_hash pour le comparer plus tard avec une fonction 
	// bug sql hash password a revoir !!!
	$req_login = $pdo->prepare("SELECT A_U_password_1 FROM A_users WHERE A_U_email=?");
	$req_login->execute(['$email_login']);
	$password_verified = $req_login->fetch();

	      if(password_verify($password_login,$password_verified)){
	        $_SESSION['connected'] = $email_login;
	        $_SESSION['success'] = "You are now logged in";
	        header('location: index.php');
	}
		var_dump($password_verified);
}
?>
