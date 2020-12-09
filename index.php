<?php session_start();
	if (isset($_GET['disconnect'])){
		unset($_GET);
		session_destroy();
		header('location: index.php');
	}
	if (isset($_GET['id']) && isset($_GET['token'])){
		$_SESSION['id_mail']=$_GET['id'];
		$_SESSION['token_mail']=$_GET['token'];
		header('location: back.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Life report, David Attenborough</title>
	<!--Lien vers boostrap 
		(Je ne l'ai finalement pas utilisé, mais les liens sont là si jamais on en a besoin. À supprimer à la fin, si on ne l'utilise pas.)-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!--Font-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com"> 
	<link href="https://fonts.googleapis.com/css2?family=Mallanna&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com"> 
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/style.css">
</head>

<body>
	
	 <!-- Login form -->
	 <div class="login-popup">
        <div class="box">
            <div class="img-area">
                <div class="img"></div>
                <h1><div id="your-logo"></div></h1>
            </div>
            <div class="form">
                <div class="close">&times;</div>
                <h1>Log In</h1>
                <form action="back.php" method="post">
                    <div class="form-group">
                        <input type="text" name="email-login" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password-login" placeholder="Password" class="form-control">
                        <button type="button" id="btnpass">Forgot Password?</button>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn">Log In</button>
                    <hr>
                    <button type="button" class="btn_create">Create an account</button>
                </form>
            </div>
        </div>
    </div> 
    
    <!-- SignUp form -->
	<div class="signup-popup">
        <div class="box">
            <div class="img-area">
                <div class="img"></div>
                <h1><div id="your-logo"></div></h1>
            </div>
            <div class="form">
                <div class="closesignup">&times;</div>
                <h1>Sign Up</h1>
                <form action="back.php" method="post">
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password-1" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password-2" placeholder="Password confirmation" class="form-control" required>
                        <!-- Affichage des erreurs en dessous du password2 -->
                        <?php if(isset($_SESSION['errors_signup'])) : ?>
                        	<?php foreach ($_SESSION['errors_signup'] as $value): ?> 
                        		<p style="color: red;"> <?php echo $value; ?> </p>
                        	<?php endforeach ?> 
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn-create-signup" >Sign Up</button>
                    	
                </form>
            </div>
        </div>
    </div> 
    <!-- FORGOT PASSWORD FORM -->
	<div class="password-popup">
        <div class="box">
            <div class="img-area">
                <div class="img"></div>
                <h1><div id="your-logo"></div></h1>
            </div>
            <div class="form">
                <div class="close-password">&times;</div>
                <h1>Forgot your password?</h1>
                <p>Enter your email below to receive your password reset instructions</p>
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <button type="button" id="btn-reset">Reset password</button>
                </form>
            </div>
        </div>
    </div> 
	<!--Partie header-->
	<header id="container">
			<div id="logo"><a class="a_header" href=""></a></div>
			<nav id="navbar">
				<ul id="ul_header_nav">
					<li class="li_header first"><a class="a_header" href="">Home</a></li>
					<li class="li_header"><a class="a_header" href="about.php">About</a></li>
					<li class="li_header"><a class="a_header" href="">Comment</a></li>
					<li class="li_header"><a class="a_header" href="">Contact</a></li>
				</ul>
				<ul id="ul_header">
						<li class="li_header"><button class="srchbtn" type="submit"><i class="fa fa-search"></i></button> <input class="search" type="text" placeholder=" Search.."></li>
						<!-- Affichage login ou logout -->
						<?php if(!isset($_SESSION['connected'])) :?>
							<li class="li_header"><a class="a_header" id="btn" href="">
							Log in
						<?php else : ?>
							<li class="li_header"><a class="a_header" href="index.php?disconnect=true">
							Log out
						<?php endif ?>
					</a></li>		
				</ul>
			</nav>
		<div id="signature"></div>
	</header>
	<!--Caroussel 1: catégorie documentaries-->
	<!-- Affichage si logger -->
	<?php
		if(isset($_SESSION['connected'])):
	?>
	<section id="documentaries">
		<h3>Documentaries</h3>
		<div class="wrapper">
			<section id="section1">
		    	<a href="#section3" class="arrow__btn" id="arrow1">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		   		<a href="#section2" class="arrow__btn" id="arrow1">›</a>
		  	</section>
		  	<section id="section2">
		    	<a href="#section1" class="arrow__btn">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		    	<a href="#section3" class="arrow__btn" id="arrow1">›</a>
		  	</section>
		  	<section id="section3">
		    	<a href="#section2" class="arrow__btn" id="arrow1">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		   		<a href="#section1" class="arrow__btn" id="arrow1">›</a>
		  	</section>
		</div>
	</section>	

	<!--Caroussel 2: catégorie movies-->
	<section id="movies">
			<h3>Movies</h3>
			<div class="wrapper">
				<section id="sectionTwo1">
			    	<a href="#sectionTwo3" class="arrow__btn" id="arrow2">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			   		<a href="#sectionTwo2" class="arrow__btn" id="arrow2">›</a>
			  	</section>
			  	<section id="sectionTwo2">
			    	<a href="#sectionTwo1" class="arrow__btn" id="arrow2">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			    	<a href="#sectionTwo3" class="arrow__btn" id="arrow2">›</a>
			  	</section>
			  	<section id="sectionTwo3">
			    	<a href="#sectionTwo2" class="arrow__btn" id="arrow2">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			   		<a href="#sectionTwo1" class="arrow__btn" id="arrow2">›</a>
			  	</section>
			</div>
		</section>	

	<!--Caroussel 3: catégorie Interviews-->
	<section id="interviews">
		<h3>Interviews</h3>
		<div class="wrapper">
			<section id="sectionThree1">
		    	<a href="#sectionThree3" class="arrow__btn" id="arrow3">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		   		<a href="#sectionThree2" class="arrow__btn" id="arrow3">›</a>
		  	</section>
		  	<section id="sectionThree2">
		    	<a href="#sectionThree1" class="arrow__btn" id="arrow3">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		    	<a href="#sectionThree3" class="arrow__btn" id="arrow3">›</a>
		  	</section>
		  	<section id="sectionThree3">
		    	<a href="#sectionThree2" class="arrow__btn" id="arrow3">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		   		<a href="#sectionThree1" class="arrow__btn" id="arrow3">›</a>
		  	</section>
		</div>
	</section>	

	<!--Caroussel 4: catégorie Planet Earth series-->
	<section id="planet">
			<h3>Planet Earth Series</h3>
			<div class="wrapper">
				<section id="sectionFour1">
			    	<a href="#sectionFour3" class="arrow__btn" id="arrow4">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			   		<a href="#sectionFour2" class="arrow__btn" id="arrow4">›</a>
			  	</section>
			  	<section id="sectionFour2">
			    	<a href="#section1" class="arrow__btn" id="arrow4">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			    	<a href="#sectionFour3" class="arrow__btn" id="arrow4">›</a>
			  	</section>
			  	<section id="sectionFour3">
			    	<a href="#sectionFour2" class="arrow__btn"id="arrow4">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/64R2MYUt394" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/-70o8fv-Mts" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/jIxOn3yr-1A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/embed/3enM7iGfIsc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			   		<a href="#sectionFour1" class="arrow__btn" id="arrow4">›</a>
			  	</section>
			</div>
		</section>
	<?php
    	endif;
    ?>

	<!--Partie Footer-->
	<div class="line"></div>
	<footer class="desk">
	    <div id="ancre_Contact" class="contacth1"><h1><span class="orange"><i class="fas fa-envelope"></i></span> Contact</h1></div>
	    <!-- FORMULAIRE --> 
	    <form name="myForm" action="#ancre_Contact" method="post">
	        <table class="form-style">
	            <tr>
	                <td>
	                    <label>Name</label>
	                </td>
	                <td>
	                    <input type="text" name="name" class="long"/>
	                    <span class="error" id="errorname"></span>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <label>Email</label>
	                </td>
	                <td>
	                    <input type="email" name="mail" class="long" required/>
	                    <span class="error" id="erroremail"></span>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <label>Message</label>
	                </td>
	                <td>
	                    <textarea name="message" class="long field-textarea" required></textarea>
	                    <span class="error" id="errormsg"></span>
	                </td>
	            </tr>
	            <tr>
	                <td></td>
	                <td>
	                    <input type="submit" name="submit" value="Submit">      
	                    <input type="reset" value="Reset">
	                    <?php
	                    // FORMULAIRE DE CONTACT
	                    $VotreAdresseMail="celine.arnould33@gmail.com";

	                    if(isset($_POST['submit'])) { // si le bouton "Envoyer" est appuyé
	                        //on vérifie que le champ mail est correctement rempli
	                        if(empty($_POST['mail'])) {
	                            echo "Please enter your email";
	                        } else {
	                            //on vérifie que l'adresse est correcte
	                            if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
	                                echo "Your email is incorrect";
	                            }else{
	                                //on vérifie que le champ sujet est correctement rempli
	                                if(empty($_POST['name'])) {
	                                    echo "Please enter your name";
	                                }else{
	                                    //on vérifie que le champ message n'est pas vide
	                                    if(empty($_POST['message'])) {
	                                        echo "Please enter a message";
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
	                                            echo "<br>The email has been sent!";
	                                        } else {
	                                            echo "<br>An error occurred, the email hasn't been sent";
	                                        }
	                                    }
	                                }
	                            }
	                        }
	                    }

	                    ?>
	                    
	                </td>
	            </tr>
	        </table>
	    </form>
	    <p id="copy">&copy; 2020 by us.</p>
	</footer>


	<!--Les scripts bootstrap, toujours à cette place 
		(à supprimer si jamais on ne l'utilse pas finalement)-->	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="app.js"></script>
		<!-- Génère js popup() -->
		<?php 
	        if(isset($_SESSION["registered"]) || isset($_SESSION["errors_login"])){
		    	echo "<script type='text/javascript'>showPopup();</script>";
		    	unset($_SESSION);
		   		session_destroy();
		    }elseif(isset($_SESSION['errors_signup'])){
		    	echo "<script type='text/javascript'>showPopupSignup();</script>";
		    	unset($_SESSION);
		   		session_destroy();
		    }
		?>
</body>
</html>	
