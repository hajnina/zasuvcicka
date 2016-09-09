<!DOCTYPE html>
<html lang='cs'>
 <head>
   <title></title>
   <meta charset='utf-8'>
   <meta name='description' content=''>
   <meta name='keywords' content=''>
   <meta name='author' content=''>
   <meta name='robots' content='all'>
   <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
   <link href='/favicon.png' rel='shortcut icon' type='image/png'>
   <link rel="stylesheet" href="assets/css/main.css" />
   <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
 </head>
 <?php
   include "utilities.php";
   if(isset($_REQUEST["pridat"])){
     addSpot($_REQUEST["name"],$_REQUEST["latlon"],isset($_REQUEST["maZasuvku"]),isset($_REQUEST["maWifi"]),$_REQUEST["obrazek"]);
   }
 ?>
 <body>
   <article class="container box style3">
   <form method="post">
      <div class="row 50%">
        <p><input type="text" class="text" name="name" placeholder="Název" /><br />
        <input type="text" class="text" name="latlon" placeholder="latlon" /><br />
        <input type="file" class="text" name="obrazek" placeholder=Obrázek /><br />

      </div>
      </div>

      <p><div class="6u 12u$(mobile)"><img style="vertical-align:middle; margin-right: 20px; margin-bottom: 5px;" src="images/zasuvka_m.png"></a>Zásuvka<input type="checkbox" class="text" name="maZasuvku" placeholder="Zásuvka" /></div><div class="6u 12u$(mobile)"><img style="vertical-align:middle; margin-right: 20px;" src="images/wifi_m.png"></a>Wi-Fi<input type="checkbox" class="text" name="maWifi" placeholder="Wi-Fi" /></div>
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
        <div id="map" style="height: 100%"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_E-gi8uTim3VpWcx8V7whPlK-ZhyaD98&callback=initMap"
    async defer></script>
  </article>
 </body>

</html>
