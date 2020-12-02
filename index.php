<?php session_start();
	if (isset($_GET['disconnect'])){
		unset($_GET);
		session_destroy();
		header('location: index.php');
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
                        <?php if(isset($_SESSION['errors'])) : ?>
                        	<?php foreach ($_SESSION['errors'] as $value): ?> 
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
		<div id="opacity">
			<div id="logo"><a class="a_header" href=""></a></div>
			<nav id="navbar">
				<ul id="ul_header_nav">
					<li class="li_header first"><a class="a_header" href="">Home</a></li>
					<li class="li_header"><a class="a_header" href="">About</a></li>
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
		<!-- BIOGRAPHY -->
		
		<!-- <section id="biography">
			<h1>Biography</h1>
			<h2>Who is David Attenborough?</h2>
			<p>David Attenborough was born in London, England in 1926. After studying natural sciences at the University of Cambridge, he began his career as a producer at the BBC, where he successfully launched the Zoo Quest series. Attenborough was appointed BBC Two controller in 1965, then director of programming. During his tenure, the station switched to color television and Attenborough played a decisive role in expanding its natural history content. Attenborough left the BBC to start writing and producing various series, including the hit Life on Earth, which set the standards for documentary on modern nature. Since then, Attenborough has written, produced, hosted and narrated countless award-winning nature-oriented programs and has devoted its life to celebrating and preserving wildlife.</p>
			<h2>Beginning of life</h2>
			<p>David Frederick Attenborough, a famous naturalist and television personality, was born on May 8, 1926 in a suburb of London, England. The second of three boys born to a university director and a writer, he and his brothers were all going to be very successful in the career they had chosen, which would take them away from the city of Leicester, where they had grown up.</p>
			<h2>Is David related to Richard Attenborough?</h2>
			<p>Indeed. David's older brother, Richard Attenborough, will become an Academy Award-winning actor and director, and his younger brother, John, will become a senior executive of the Italian automotive company Alfa Romeo. But despite their remarkable achievements, no brother will lead a life as full of adventures and travels, nor will become as loved on the international scene as David.</p>
			<h2>Attenborough's education</h2>
			<p>Despite the relative urban environment in which he lived, David Attenborough's fascination with the natural world developed very early and, by the age of seven, he had assembled a large collection of bird eggs and fossils. A lecture given by the famous naturalist Grey Owl, which he attended in 1936, was only used to deepen his interest, and after graduating from high school, he received a scholarship to study natural sciences at the University of Cambridge. After completing his studies in 1947, Attenborough was called upon to serve for two years in the Royal Navy. However, all his hopes that it would be his chance to see the world were dashed when he was posted on a ship in Wales.<br><br>

			In 1949, Attenborough returned to London and found work as editor-in-chief for an educational publishing house. The following year, he began a training program at the BBC. In 1952, Attenborough completed his training and began working for the television station as a producer, marking the beginning of a career that would mark a turning point, both at the BBC and beyond.<br><br>
			
			Attenborough married Jane Oriel in 1950 until her death in 1997 following a brain haemorrhage. The couple had two children together: a son and a daughter.</p>
			<h2>Television programs and documentaries at the BBC</h2>
			<p>At the BBC, Attenborough faces two obstacles. First, the station had little or no programming devoted to the natural sciences and, second, its boss thought that Atttenborough's teeth were too big for him to be an on-air personality. Despite these obstacles, however, Attenborough persevered, taking small steps forward on the path to his ultimate destiny. He started by producing the Animal, Vegetable, Mineral? quiz and then co-hosted a program entitled The Pattern of Animals with naturalist Sir Julian Huxley.<br><br>

			But Attenborough was not satisfied with the format of such programs, which often took animals out of their natural habitat and the harsh environment of a television studio. Seeking to break with this unfortunate tradition, Attenborough launched a series in 1954 entitled Zoo Quest. The show filmed animals not only in captivity, but also in the wild, with film crews moving across the country to capture images of the animals. With its approach both on-site and respectfully distant to wildlife filming, Zoo Quest has established what is now the general standard for nature documentaries. The show was so successful with viewers that in 1957, the BBC created its natural history unit.<br><br>

			Despite its growing success, Attenborough left the BBC in the early 1960s to study social anthropology at the London School of Economics. When BBC Two was established in 1965, however, Attenborough was asked to return to the station as a controller. In this capacity and as programming director for both the BBC and BBC Two, Attenborough continued to collect important milestones, launching educational series like The Ascent of Man and Civilization, overseeing the BBC's transition to color television and having the wisdom to sign a bizarre comedy series called Monty Python's Flying Circus, with John Cleese and Terry Gilliam in particular. In recognition of his contribution, the British Academy awarded him the Desmond Davis Prize in 1970. However, Attenborough could not get rid of the passion that had inhabited him since his youth and, in 1972, he resigned from his position at the BBC to realize his dreams in nature.</p>
			<h2>Life on Earth</h2>
			<p>After leaving the BBC, Attenborough began writing and producing television series as a freelancer and quickly established himself with a series of successful programs, including Eastwards with Attenborough (1973), which presented an anthropological study of Indonesia, and The Tribal Eye (1975), which examined tribal art in the world. But Atttenborough's greatest success came in 1976, when his show Life on Earth was first broadcast. After 96 episodes devoted to the role of evolution in nature, the show toured Attenborough and its teams around the world using state-of-the-art filming techniques to bring wildlife into homes around the world, attracting an estimated audience of more than 500 million spectators.<br><br>

			The success of Life on Earth made David Attenborough a well-known name and, in the decades that followed, allowed him to write, produce and host countless other series, including The Trials of Life (1990), devoted to animal development and behavior; The Private Life of Plants (1995), which used time photographs to explore the botanical world; Attenborough in Paradise (1996), on his favorite animals, birds of paradise; the ten-part series Life of Birds (1998), which won a peabody Award. He also narrated many other shows, including BBC's Wildlife on One, which aired 250 episodes from 1977 to 2005, and the 2006 series Planet Earth, the largest wildlife documentary ever made and the first HD show broadcast on the BBC.</p>
			<h2>Preserving our ecology</h2>
			<p>The advancement of his age did not slow down the intrepid Attenborough, who, at 80, continued to travel around the world and produce prolific works. To complete his Life trilogy, 2008 saw the broadcast of his Life in Cold Blood series, an examination of reptiles, and in 2012, he began a series of 3D-shot shows for the Sky television network. Atttenborough's lifelong commitment to the natural world has also led him to ecological activism, both on and off the air. He wrote and produced The State of the Planet on the theme of the environment (2000) and Saving Planet Earth (2007). He is a patron of the Population Matters organizations, which examines the impact of human population growth on the natural world, and of the World Land Trust, which buys tropical forests around the world in order to preserve their wildlife.<br><br>

			During his career, David Attenborough has received many honours. He was knighted in 1985, received the Queen Elizabeth Order of Merit in 2002 and holds at least 31 honorary doctorates from British universities, including Oxford and Cambridge. He published his biography, Life on Air, in 2002, and in 2012 was the subject of the BBC documentary Attenborough: 60 Years in the Wild. In 2014, a poll revealed that he was considered the most trustworthy public figure in Great Britain. Attenborough is also the most visited person in human history and the oldest to have ever visited the North Pole. But in the most appropriate tribute of all, several species of plants, insects and birds have been honoured by the name of Attenborough, ensuring that he will live alongside the many creatures he has spent his life celebrating and protecting.</p>
			
		</section>
		</div>  -->
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
	<footer>
		<!--Un site créé par nous-->
		<h4><center>Contact us</center></h4>
		<br>
		<form class="formito" action="back.php" method="post">
			<div class="form-group row">
			  <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
			  <div class="col-sm-10">
			    <input type="name" class="form-control" id="inputName3" name="name" placeholder="Name">
			  </div>
			</div>
		  <div class="form-group row">
		    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="mail" class="form-control" id="inputEmail3" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group">
		      <label for="exampleFormControlTextarea3" class="col-sm-2 col-form-label">Message</label>
		      <textarea class="form-control" name="message" id="exampleFormControlTextarea3" rows="3"></textarea>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-2">Newsletter</div>
		    <div class="col-sm-10">
		      <div class="form-check">
		        <input class="form-check-input" type="checkbox" id="gridCheck1">
		        <label class="form-check-label" for="gridCheck1">
		          Sign-up
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		    </div>
		  </div>
		</form>
		<br>
		<p><center>© Valerian, Bryan, Ibrahim et Celine</center></p>
	</footer>


	<!--Les scripts bootstrap, toujours à cette place 
		(à supprimer si jamais on ne l'utilse pas finalement)-->	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="app.js"></script>
		<!-- Génère js popup() -->
		<?php 
	        if(isset($_SESSION["registered"])){
		    	echo "<script type='text/javascript'>showPopup();</script>";
		    	unset($_SESSION);
		   		session_destroy();
		    }elseif(isset($_SESSION['errors'])){
		    	echo "<script type='text/javascript'>showPopupSignup();</script>";
		    	unset($_SESSION);
		   		session_destroy();
		    }
		?>
</body>
</html>	
