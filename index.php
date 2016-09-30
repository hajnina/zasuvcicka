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
		<?php
			include "utilities.php";
			if(isset($_REQUEST["pridat"])){
				$kamUlozit="images/img/";
				if(isset($_FILES["obrazek"])){
					$ok=getimagesize($_FILES["obrazek"]["tmp_name"]);
					if($ok!==false){
						$novySoubor=$kamUlozit.nahodnyRetezec().basename($_FILES["obrazek"]["name"]);
					}
					if (move_uploaded_file($_FILES["obrazek"]["tmp_name"], $novySoubor)) {
						$obrazek=$novySoubor;
					} else {
						$obrazek="images/default.jpg";
					}

				}else{
					$obrazek="images/default.jpg";
				}
				addSpot($_REQUEST["name"],$_REQUEST["latlon"],isset($_REQUEST["maZasuvku"]),isset($_REQUEST["maWifi"]),$_REQUEST["popis"],$obrazek);
			}
		?>
		<!-- Header -->
			<section id="header">
				<header>
					<h1 style="text-shadow: 2px 2px 3px #808080;margin-left:10px">zásuvčička.cz</h1>
					<p></p>
					<h6 style="font-size:60%;text-shadow: 1px 2px 3px #000000;">(protože zasuvka.cz nebyla volná)</h6>
				</header>
				<footer>
					<a href="#banner" class="button style2 scrolly-middle">Zjistit více</a>
				</footer>
			</section>

		<!-- Banner -->
			<section id="banner">
				<header>
					<h2>Zásuvka</h2>
				</header>
				<p>Už se vám někdy stalo, že jste byli někde na cestách, nutně jste potřebovali notebook nebo mobil, ale baterka byla úplně prázdná?<br />
				Nám se to stává pořád.<br />Takže jsme pro tyhle případy vytvořili databázi míst, kde si můžete své nenažrance dobít.</p>
				<footer style="margin:centered;">
					<a href="#najit" class="button style2 scrolly-middle">Najít zásuvku</a>
					<a style="margin:20px;" href="#mapa" class="button style2 scrolly-middle">Přidat zásuvku</a>
				</footer>
			</section>
		<!-- Feature 1 -->
		<section id="najit">

			<article class="container box style2">
				<header style="width: 70%;">
					<h2>Zásuvky v okolí</h2>
					<br />
					<form method="post" action="index.php#nejblizsi">
						<input class="text responzivni" name="latlonVyhledavani" /><br /><br />
						<input type="submit" value="Najít!" />
					</form>
				</header>
				<div class="inner gallery" id="nejblizsi" style="height: 75vh; width: 100%;">
			    <?php
					if(isset($_REQUEST["latlonVyhledavani"])){
						$kde=$_REQUEST["latlonVyhledavani"];
						if($kde==""){$kde="50.0593324,14.1854452";}
					}
					else {
						$kde="50.0593324,14.1854452";
					}
					$latituta=latLonZvlast($kde)[0];
					$longituta=latLonZvlast($kde)[1];
			    echo "
			    <script>
			      function initMap() {

			        var map = new google.maps.Map(document.getElementById('nejblizsi'), {
			          zoom: 13,
			          center: {lat: $latituta, lng: $longituta}
			        });";
			        $zasuvky=findNearest("0,0");
			        if(sizeof($zasuvky));
			        for($i=0; $i<sizeof($zasuvky); $i++){
			          $lat=latLonZvlast($zasuvky[$i][4])[0];
			          $lon=latLonZvlast($zasuvky[$i][4])[1];
			          $nazev=$zasuvky[$i][1];
			          echo "
			          var myLatLng = {lat: $lat, lng: $lon};
			          var marker = new google.maps.Marker({
			            position: myLatLng,
			            map: map,
			            title: '$nazev'
			          });";
			        }
			        echo "
			    }
			    </script>";
			    ?>
			      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_E-gi8uTim3VpWcx8V7whPlK-ZhyaD98&callback=initMap" async defer></script>



					<?php
						//$link=mysqli_connect();
						/*
						if(isset($_REQUEST["latlonVyhledavani"])){
							$kde=$_REQUEST["latlonVyhledavani"];
							if($kde==""){$kde="50.0593324,14.1854452";}
						}
						else {
							$kde="50.0593324,14.1854452";
						}
						$wifiny=findNearest($kde,8);
						$radku=sizeof($wifiny);
						echo "<div class='row 0%'>";
						for($i=1; $i<=$radku; $i++){
							echo "<div class='3u 12u(mobile)'><a href='".$wifiny[$i-1][8]."' alt='' title='".$wifiny[$i-1][1]."' class='image fit'><img src='https://maps.googleapis.com/maps/api/staticmap?center=".$wifiny[$i-1][4]."&zoom=15&size=250x250&markers=color:red%7Clabel:%7C".$wifiny[$i-1][4]."&key=AIzaSyDdt_JLFuNtUKPretWOgPulgFnzsqU74Po' alt='' title='".$wifiny[$i-1][1]."' /></a></div>";
							if($i%4==0 && $i<$radku){echo"</div><div class='row 0%'>";}
						}
						echo "</div>";*/
					 ?>
				</div>
				</article>
				</section>
				<article class="container box style2">
				<a href="mapa.php">
					<header style="width: 70%;">
						<h2>Najít další...</h2>
					</header>
				</a>
				</article>
			<article class="container box style3">
	      <div id="mapa" style="height: 50%; width: 50%;position:absolute;right:5%;"></div>
	       <script>
	           var myLatLng = {lat: 50.08169891399731, lng: 14.427061151342741,};
	           console.log(myLatLng);

	           var map = new google.maps.Map(document.getElementById('mapa'), {
	             zoom: 13,
	             center: myLatLng
	           });

	           var marker = new google.maps.Marker({
	           position: myLatLng,
	           map: map,
	           draggable: true,
	           title: 'Hello World!'
	           });

	           google.maps.event.addListener(marker, 'dragend', function () {
	             var lat = (marker.getPosition().lat());
	             var lng = (marker.getPosition().lng());
	             var latlng = lat + "," + lng;
	             console.log(latlng);

							 $('#latlng').val(latlng);
	           });

							 function gps(){
							 if (navigator.geolocation) {

							 	navigator.geolocation.getCurrentPosition(function(position) {
		            var pos = {
		              lat: position.coords.latitude,
		              lng: position.coords.longitude
		            };
		            map.setCenter(pos);
	          }, function() {
	            handleLocationError(true, infoWindow, map.getCenter());
	          });
	        } else {
	          // Browser doesn't support Geolocation
	          handleLocationError(false, infoWindow, map.getCenter());
	        }}
	       </script>
	       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_E-gi8uTim3VpWcx8V7whPlK-ZhyaD98&callback=initMap" async defer></script>
	    <form method="post" enctype="multipart/form-data">
	       <div class="row 100%">
	         <p>
	           <input style="width:85%;" type="text" class="text responzivni" name="name" placeholder="Název" /><br />
						 <input type="button" name="setGPS" onclick="gps" value="GPS🛰" /><br />
						 <input type="hidden" name="latlon" id="latlng" value="123.456,123.456" /><br />
						 <textarea name="popis" style="width:85%;" placeholder="Popis"></textarea><br/>
	           <input type="file" class="text" name="obrazek" placeholder="Obrázek" /><br />
	         </p>
	       </div>
	       <p>
	         <div class="6u 12u$(mobile)">
	           <img style="vertical-align:middle; margin-right: 20px; margin-bottom: 5px;" src="images/zasuvka_m.png" />Zásuvka<input type="checkbox" class="text" name="maZasuvku" placeholder="Zásuvka" />
	         </div>
	         <div class="6u 12u$(mobile)">
	           <img style="vertical-align:middle; margin-right: 20px;" src="images/wifi_m.png"/>Wi-Fi
	           <input type="checkbox" class="text" name="maWifi" placeholder="Wi-Fi" />
	         </div>
	       </p>
	         <div class="12u$">
	           <ul class="actions">
	             <li><input type="submit" value="Přidat" name="pridat" /></li>
	           </ul>
	         </div>
	       </div>


	     </form>



	     </article>
	     <article>


	   </article>


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
					<li>&copy; Martin Hajny</li><li>Design: <a href="http://robinsitar.cz">Robin Sitar</a></li><br />
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
