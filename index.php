<!DOCTYPE HTML>
<html>
	<?php include "hlavicka.php" ?>
	<body>

		<!-- Header -->
			<section id="header">
				<header>
					<h1>ZÁSUV.KU</h1>
					<p></p>
				</header>
				<footer>
					<a href="#0" class="button style2 scrolly-middle">Najít zásuvku</a>
				</footer>
			</section>

		<!-- Banner -->
			<section id="banner">
				<header>
					<h2>Zásuvka</h2>
				</header>
				<p>Už se vám někdy stalo, že jste byli někde na cestách, nutně jste potřebovali notebook nebo mobil, ale baterka byla úplně prázdná?<br />
				Nám se to stává pořád.<br />Takže jsme pro tyhle případy vytvořili databázi míst, kde si můžete ty vaše nenažrance dobít.</p>
				<footer>
					<a href="#pridat" class="button style2 scrolly">Přidat zásuvku</a>
				</footer>
			</section>

		<!-- Feature 1 -->
			<?php
				$wifiny=findNearest("10,5");
				if($wifiny){
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
									";
									if($wifiny[$i][2]==1){echo "<img src='images/zasuvka_m.png' /> ";}
									if($wifiny[$i][3]==1){echo "<img src='images/wifi_m.png' />";}
									echo "
								</div>
							</article>
						";
					}
				}else{
						echo "
							<article id='0' class='container box style1 right'>
								<a href='#' class='image fit'><img src='images/background1.jpg' alt='' /></a>
								<div class='inner'>
									<header>
										<h2>Je tu nějak prázdno... :(</h2><br />
									</header>
									<p>Buďte první, kdo <a href='#pridat'>přidá zásuvku!</a></p>
								</div>
							</article>
						";
					}
			 ?>
				<span id="pridat"><iframe src="pridat.php" style="height: 100vh; width: 100%;"></iframe></span>
		<?php include "paticka.php"; ?>
	</body>
</html>
