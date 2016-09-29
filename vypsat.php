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
  </head>
  <body style="background-color: grey;">
    <?php
      include "utilities.php";
      $wifiny=findNearest("50.0805215,14.4240316");
      for($i=0;$i<sizeof($wifiny); $i++){
        echo "<div style='background-color: white; color: black; display: inline-block; margin: 10px; padding: 10px; box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);'>";
        echo "<h1>".$wifiny[$i][1]."</h1>";
        echo "<p>".$wifiny[$i][4]."</p>";
          ?><div id="map" style="width: 100%; height: 100px; margin: 10px;"></div><script>
          function initMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 13,
              center: {lat: 50.0805215, lng: 14.4240316}
            });
              var myLatLng = {lat: $lat, lng: $lon};
              var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '$nazev'
              });
        }
        </script><?php
        echo "</div>";
      }
    ?>
  </body>
</html>
