
      var map, marker, defImage, modImage, newImage;
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(50.45102, 30.59639),
          zoom: 5
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      
        defImage = new google.maps.MarkerImage("/static/map/spotlight-poi.png",
            new google.maps.Size(22, 40),
            new google.maps.Point(0,0),
            new google.maps.Point(11, 40));
        
        modImage = new google.maps.MarkerImage("/static/map/spotlight-poi-mod.png",
            new google.maps.Size(22, 40),
            new google.maps.Point(0,0),
            new google.maps.Point(11, 40));
        
        newImage = new google.maps.MarkerImage("/static/map/spotlight-poi-new.png",
            new google.maps.Size(22, 40),
            new google.maps.Point(0,0),
            new google.maps.Point(11, 40));
        
        var flightPlanCoordinates = [
            new google.maps.LatLng(37.772323, -122.214897),
            new google.maps.LatLng(21.291982, -157.821856),
            new google.maps.LatLng(-18.142599, 178.431),
            new google.maps.LatLng(-27.46758, 153.027892)
          ];
          var flightPath = new google.maps.Polyline({
            path: flightPlanCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 2
          });
        
          flightPath.setMap(map);
    }
      
      var markers=[];
      
      function addMarker(id, lat, lng, title, m_icon)
      {
        m_icon = typeof m_icon !== 'undefined' ? m_icon : defImage;
        
	var curLatLng = new google.maps.LatLng(lat, lng);
	var curMarker = new google.maps.Marker({
	  map:map,
	  draggable:true,
	  raiseOnDrag: true,
	  position: curLatLng,
          icon: m_icon
	  //animation: google.maps.Animation.DROP,
	});
	google.maps.event.addListener(curMarker, 'click', function (e) { toggleBounce(this); });
	
	var iw = new google.maps.InfoWindow({
	  content: title
	});
	iw.open(map, curMarker);
	
	google.maps.event.addListener(curMarker, "click", function (e) { iw.open(map, this); });
	google.maps.event.addListener(curMarker, "dragend", function (e) { moveMarker(map, this); });
        
        curMarker.isNew = (m_icon == newImage)
        curMarker.id = id;
	markers[id] = curMarker;
      }
      
      function toggleBounce(curMarker) {
      
	if (curMarker.getAnimation() != null) {
	  curMarker.setAnimation(null);
	} else {
	  curMarker.setAnimation(google.maps.Animation.BOUNCE);
	}
      }
      google.maps.event.addDomListener(window, 'load', initialize);