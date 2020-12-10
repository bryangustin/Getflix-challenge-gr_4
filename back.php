<?php
session_start();

function str_random($length){
	$char="0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN";
	return substr(str_shuffle(str_repeat($char,$length)),0,$length);
}


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
		$errors[]="This email already registered";
	}
	// password contient + de 8 caractères
	if (strlen($_POST['password-1']) <= 8){
		$errors[]="The password is too short";
	}
	// Password avec une majuscule
	if (!preg_match("~[A-Z]~", $_POST['password-1'])){
		$errors[]="The password must contain at least one uppercase letter";
	}
	// PASSWORD1 identique à PASSWORD2
	if ($_POST['password-1'] != $_POST['password-2']){
		$errors[]="The passwords don't match";
	}
	// verifie les caracteres intrusif de l email correct
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if (!$email){
		$errors[]="Please enter a valid email";
	}else{ // Vérifie que la structure de l email est correct
		$email=filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email){
			$errors[]="Please enter a valid email";
		}
	}
	// si pas d'erreurs execute DB
	if (empty($errors)){
		$email=$_POST['email'];
		$password= password_hash($_POST['password-1'], PASSWORD_DEFAULT);
		$token = str_random(60);
		$id=$pdo->lastInsertID();
		$sth=$pdo->prepare("INSERT INTO A_users (A_U_email, A_U_password_1, A_U_conf_token) VALUES(?,?,?)");
		$sth->execute([$email,$password,$token]);

		mail($email,"Registration confirmation Life report", "clique sur le lien suivant pour confirmer ton inscription: \n\n http://localhost:8888/index.php?id=$id&token=$token");

		$_SESSION['registered']=$email;
	}
	// array erreurs accessible via la $_SESSION[''] dans l'index.php
	$_SESSION['errors_signup']=$errors;
	header('location: index.php');
}

//login connection
if(isset($_POST['email-login'])&& isset($_POST['password-login'])){
	$email_login=$_POST['email-login'];
	$password_login=$_POST['password-login'];
	try{
	    $query = "SELECT A_U_password_1 FROM A_users WHERE A_U_email='$email_login'";
	    $data = $pdo->query($query);
	    $data = $data->fetch();
	    
	    foreach ($data as $value) {
	        $cryptpassword= $value;
	        break;
	    }
	}
	catch(PDOException $error){
	    $error->getMessage();
	}
	if(password_verify($password_login,$cryptpassword)){
	        $_SESSION['connected'] = $email_login;
	        $_SESSION['success'] = "You are now logged in";
	        
	}else{
		$_SESSION['errors_login']="la combinaison n'est pas bonne!";
	}
	header('location: index.php');
}
//CONFIRMATION mail

	// if (isset($_SESSION['id']) && isset($_SESSION['token']){
	// 	try{
	// 	    $query = "SELECT A_U_id FROM A_users";
	// 	    $data = $pdo->query($query);
	// 	    foreach ($data as $value) {
	// 	        $cryptpassword= $value[0];
	// 	        break;
	// 	    }
	// 	}
	// 	catch(PDOException $error){
	// 	    $error->getMessage();
	// 	}

	// }
?>



<?php
// FORMULAIRE DE CONTACT
$VotreAdresseMail="celine.arnould33@gmail.com";

if(isset($_POST['submit'])) { // si le bouton "Envoyer" est appuyé
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide";
    } else {
        //on vérifie que l'adresse est correcte
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
            echo "L'adresse mail entrée est incorrecte";
        }else{
            //on vérifie que le champ sujet est correctement rempli
            if(empty($_POST['name'])) {
                echo "Le champ name est vide";
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['message'])) {
                    echo "Le champ message est vide";
                }else{ 
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Mail=$_POST['mail']; 
                    $Entetes .= "From: Life Report <".$Mail.">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: Life Report <".$Mail.">\r\n";
                    //on prépare les champs:
            
                    $Name='=?UTF-8?B?'.base64_encode($_POST['name']).'?=';//Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML

                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,$Name,nl2br($Message),$Entetes)){//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
                        echo "Le mail a été envoyé avec succès!";
                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}
?>
