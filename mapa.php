<html>
  <body>
    <div id="map" style="height: 100%; width: 100%;"></div>
    <?php
    include "utilities.php";
    echo "
    <script>
      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 50.0805215, lng: 14.4240316}
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
  </body>
</html>
