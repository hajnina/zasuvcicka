<div id="map" style="height: 300px"></div>
<script>
  var latlng = new google.maps.LatLng(51.4975941, -0.0803232);
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 50, lng: 15},
      zoom: 7
    });
  }
  var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: 'Set lat/lon values for this property',
      draggable: true
  });

  google.maps.event.addListener(marker, 'dragend', function (event) {
      document.getElementById("latbox").value = this.getPosition().lat();
      document.getElementById("lngbox").value = this.getPosition().lng();
  });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_E-gi8uTim3VpWcx8V7whPlK-ZhyaD98&callback=initMap"
async defer></script>
