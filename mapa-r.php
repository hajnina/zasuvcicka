<div id="map" style="height: 80%; width: 100%;"></div>
<script>
  function initMap() {
    var myLatLng = {lat: -25.363, lng: 131.044};
    console.log(myLatLng);

    var map = new google.maps.Map(document.getElementById('map'), {
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
