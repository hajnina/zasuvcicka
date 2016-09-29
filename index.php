<!DOCTYPE HTML>
<html>
	<head>
		<title>Zásuvčička.cz</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<section id="header">
				<header>
					<h1 style="text-shadow: 2px 2px 3px #808080;">zásuvčička.cz</h1>
					<p></p>
					<h6 style="font-size:60%;text-shadow: 1px 2px 3px #000000;">(protože zasuvka.cz nebyla volná)</h6>
				</header>
				<footer>
					<a href="#najit" class="button style2 scrolly-middle">Najít zásuvku</a>
				</footer>
			</section>

		<!-- Banner -->
			<section id="banner">
				<header>
					<h2>Zásuvka</h2>
				</header>
				<p>Už se vám někdy stalo, že jste byli někde na cestách, nutně jste potřebovali notebook nebo mobil, ale baterka byla úplně prázdná?<br />
				Nám se to stává pořád.<br />Takže jsme pro tyhle případy vytvořili databázi míst, kde si můžete své nenažrance dobít.</p>
				<footer>
					<a href="#pridat" class="button style2 scrolly">Přidat zásuvku</a>
				</footer>
			</section>

		<!-- Feature 1 -->
		<section id="najit">
			<?php
				//$link=mysqli_connect();
				include "utilities.php";
				$wifiny=findNearest("50.0805215,14.4240316");
				$radku=sizeof($wifiny);
				for($i=0; $i<$radku; $i++){
					echo "
						<article id='$i' class='container box style1 right'>
							<a href='#' class='image fit'><img src='images/background1.jpg' alt='' /></a>
							<div class='inner'>
								<header>
									<h2>".$wifiny[$i][1]."</h2><br />
								</header>
								<p>".$wifiny[$i][4]."</p>
							</div>
						</article>
					";
				}
			 ?>
			 </section>
			<article class="container box style2">
				<header>
					<h2>Magnis parturient</h2>
					<p>Justo phasellus et aenean dignissim<br />
					placerat cubilia purus lectus.</p>
				</header>
				<div class="inner gallery">
					<div class="row 0%">
						<div class="3u 12u(mobile)"><a href="images/fulls/01.jpg" class="image fit"><img src="images/thumbs/01.jpg" alt="" title="Ad infinitum" /></a></div>
						<div class="3u 12u(mobile)"><a href="images/fulls/02.jpg" class="image fit"><img src="images/thumbs/02.jpg" alt="" title="Dressed in Clarity" /></a></div>
						<div class="3u 12u(mobile)"><a href="images/fulls/03.jpg" class="image fit"><img src="images/thumbs/03.jpg" alt="" title="Raven" /></a></div>
						<div class="3u 12u(mobile)"><a href="images/fulls/04.jpg" class="image fit"><img src="images/thumbs/04.jpg" alt="" title="I'll have a cup of Disneyland, please" /></a></div>
					</div>
					<div class="row 0%">
						<div class="3u 12u(mobile)"><a href="images/fulls/05.jpg" class="image fit"><img src="images/thumbs/05.jpg" alt="" title="Cherish" /></a></div>
						<div class="3u 12u(mobile)"><a href="images/fulls/06.jpg" class="image fit"><img src="images/thumbs/06.jpg" alt="" title="Different." /></a></div>
						<div class="3u 12u(mobile)"><a href="images/fulls/07.jpg" class="image fit"><img src="images/thumbs/07.jpg" alt="" title="History was made here" /></a></div>
						<div class="3u 12u(mobile)"><a href="images/fulls/08.jpg" class="image fit"><img src="images/thumbs/08.jpg" alt="" title="People come and go and walk away" /></a></div>
					</div>
				</div>
			</article>


				<iframe src="pridat.php" id="pridat" style="height: 100vh; width: 100%;"></iframe>

		<section id="footer">
			<ul class="icons">
				<li><a href="http://twitter.com" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="http://facebook.com" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="http://google.com" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
				<li><a href="http://pintrest.com" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
				<li><a href="http://dribble.com" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
				<li><a href="http://linkedin.com" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; Martin Hajny</li><li>Design: <a href="http://robinsitar.cz">Robin Sitar</a></li>
				</ul>
			</div>
		</section>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
