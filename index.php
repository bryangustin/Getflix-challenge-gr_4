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
				    	<iframe src="https://www.youtube.com/watch?v=IlFRPkT-hVc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=aETNYyrqNYE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=JWI1eCbksdE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=vPF2Jd4VczE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		   		<a href="#section2" class="arrow__btn" id="arrow1">›</a>
		  	</section>
		  	<section id="section2">
		    	<a href="#section1" class="arrow__btn">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=z6u8KWyfrNU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=kAphgHhlteM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=79c7gqHYo9E" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=c8aFcHFu8QM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		    	<a href="#section3" class="arrow__btn" id="arrow1">›</a>
		  	</section>
		  	<section id="section3">
		    	<a href="#section2" class="arrow__btn" id="arrow1">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=IDkbkvOFxng" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=33-3UCTRZWM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=6TpLF5FXQ8w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=1UHtF1fnJMs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
				    	<iframe src="https://www.youtube.com/watch?v=mRwSC5eHQzA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=P0pHrltKF0U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=Lc9QqSa6W7w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=y9s9bOyVyEk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			   		<a href="#sectionTwo2" class="arrow__btn" id="arrow2">›</a>
			  	</section>
			  	<section id="sectionTwo2">
			    	<a href="#sectionTwo1" class="arrow__btn" id="arrow2">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=jtOamrNv58M" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=F37SaAT_7kA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=GrjGmZvhKE4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=7kklWC-KAJY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			    	<a href="#sectionTwo3" class="arrow__btn" id="arrow2">›</a>
			  	</section>
			  	<section id="sectionTwo3">
			    	<a href="#sectionTwo2" class="arrow__btn" id="arrow2">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=pDUkoIo1wvY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=EBrY8tjHrs4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=QfAzYIp_ny4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=kDmcxisClX4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
				    	<iframe src="https://www.youtube.com/watch?v=Cq1oFhTINXE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=HK47Pnx46rM&t=1s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=BOkXOFy7ubA&list=PL50KW6aT4UgyQejijfgDBDzbHL25NVjNw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=ahby8VoMG-o&list=PLB1F251E81DE15E9B" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		   		<a href="#sectionThree2" class="arrow__btn" id="arrow3">›</a>
		  	</section>
		  	<section id="sectionThree2">
		    	<a href="#sectionThree1" class="arrow__btn" id="arrow3">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=-fBg8XcCcc8&list=PL50KW6aT4Ugx9IQrG-Z0r--2W46TP1q0g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=Y1Qir3NuOcw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=czgc56Vfz4w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=IlFRPkT-hVc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
		    	<a href="#sectionThree3" class="arrow__btn" id="arrow3">›</a>
		  	</section>
		  	<section id="sectionThree3">
		    	<a href="#sectionThree2" class="arrow__btn" id="arrow3">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=aETNYyrqNYE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=JWI1eCbksdE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=vPF2Jd4VczE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=z6u8KWyfrNU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
				    	<iframe src="https://www.youtube.com/watch?v=kAphgHhlteM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=79c7gqHYo9E" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=mRwSC5eHQzA&list=PLJ2bAFAEG-mMMQIcNiY6w9Bge1ZZ-MviS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=NC3IOpr0CuQ&list=PLyXZndcjAsKnQz9PY7db7L1T5hCDpJcO_" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			   		<a href="#sectionFour2" class="arrow__btn" id="arrow4">›</a>
			  	</section>
			  	<section id="sectionFour2">
			    	<a href="#section1" class="arrow__btn" id="arrow4">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=c8aFcHFu8QM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=IDkbkvOFxng" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=33-3UCTRZWM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=6TpLF5FXQ8w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
			    	<a href="#sectionFour3" class="arrow__btn" id="arrow4">›</a>
			  	</section>
			  	<section id="sectionFour3">
			    	<a href="#sectionFour2" class="arrow__btn"id="arrow4">‹</a>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=1UHtF1fnJMs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=mRwSC5eHQzA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=P0pHrltKF0U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  	</div>
				    <div class="item">
				    	<iframe src="https://www.youtube.com/watch?v=Lc9QqSa6W7w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
	    <form name="myForm" action="#ancre_Contact" onsubmit="return validateForm()" method="post">
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
	                    <input type="email" name="email" class="long" required/>
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
	                    <input type="submit" value="Submit">      
	                    <input type="reset" value="Reset">
	                    <!-- PHP -->
	                    <?php
	                        if (isset($_POST['message'])) {
	                            $position_arobase = strpos($_POST['email'], '@');
	                            if ($position_arobase === false)
	                                echo '<p>Votre email doit comporter un @.</p>';
	                            else {
	                                $retour = mail('tahari.ines@gmail.com', $_POST['name'] . ' ' . 'vous a envoyé un message depuis la page www.ines-tahari.com' , $_POST['message'], 'From: ' . $_POST['email']);
	                                if($retour)
	                                    echo '<p class="send">Votre message a été envoyé.</p>';
	                                else
	                                    echo '<p>Erreur.</p>';
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
