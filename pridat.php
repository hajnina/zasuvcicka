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
     <div id="mapa" style="height: 50%; width: 50%;position:absolute;margin-left:22vw;"></div>
      <script>
        function initMap() {
          var myLatLng = {lat: -25.363, lng: 131.044};
          console.log(myLatLng);

          var map = new google.maps.Map(document.getElementById('mapa'), {
            zoom: 4,
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
          });
      }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_E-gi8uTim3VpWcx8V7whPlK-ZhyaD98&callback=initMap" async defer></script>
   <form method="post">
      <div class="row 100%">
        <p>
          <input style="width:85%;" type="text" class="text responzivni" name="name" placeholder="Název" /><br />
          <input style="width:85%;" type="text" class="text responzivni" name="latlon" placeholder="latlon" /><br />
          <input type="file" class="text" name="obrazek" placeholder=Obrázek /><br />
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
 </body>

</html>
