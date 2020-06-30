/**/
function drawMap(Latlng)
{
  var options= {zoom: 14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP};

  var map = new google.maps.Map(parent.document.getElementById("map-canvas"), options);

  var marker = new google.maps.marker
  (
    {
      position: latlng,
      map: map,
      title: "Usted se encuentra aqui",
      position: map.getCenter(),
      draggable: true,

      icon:
      {
        path: google.maps.SymbolPath.CIRCLE,
        scale: 5
      },
    })

    google.maps.event.addListener(marker, "draged", function()
    {
      getCoords(marker);
       })
      marker-setMap(map);
      getCoords(marker);
    }
    function getCoords(marker){
      parent.document.getElementById("lant").value=''+marker.getPosition().lat();
      parent.document.getElementById("lng").value=''+marker.getPosition().lng();
    }

    var defaultLatLng = new google.maps.LatLng(10.474992, -66.815356);

    function init_map(){

      if (navigator.geolocation){
        function success(pas){
          var pos_lat = pos.coords.latitude;
          var pos_lng = pos.coords.longitude;

          drawMap(new google.maps.LatLng(pos_lat, pos_lng));
        }
        function fail(error){
          drawMap(defaultLatLng);
        }

        navigator.geolocation.getCurrentPosition(succes, fail);
      }

      else{
        drawMap(defaultLatLng);
      }
    }
    window.onload = function (){
      init_map();
    }
}
