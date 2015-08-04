var customIcons = {
  museum: {
    icon: 'blue.png',
    shadow: 'shadow.png'
  },
  university: {
    icon: 'red.png',
    shadow: 'shadow.png'
  }
};

function initialize() {
        var mapOptions = {
	        center: new google.maps.LatLng(47.4732826, 19.0636569),
	        zoom: 13,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
        
        var infoWindow = new google.maps.InfoWindow;
        downloadUrl("genxml.php", function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName("point");
          for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("name");
            var address = markers[i].getAttribute("address");
            var type = markers[i].getAttribute("type");
            var point = new google.maps.LatLng(
                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lng")));
            var html = "<b>" + name + "</b> <br/>" + address;
            var icon = customIcons[type] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              icon: icon.icon,
              shadow: icon.shadow
            });

            bindInfoWindow(marker, map, infoWindow, html);
          }
        });
  	  geocoder = new google.maps.Geocoder();
  	  google.maps.event.addListener(map, 'click',function(me){
  		  codeLatLng(me.latLng);
  	  }); 

      }

  	function codeLatLng(latlng) {
  		if (geocoder) {
  			geocoder.geocode({'latLng': latlng}, function(results, status) {
  				if (status == google.maps.GeocoderStatus.OK) {
  					if (results[1]) {

  						document.getElementById("lat").value=results[1].geometry.location.lat();
  						document.getElementById("lng").value=results[1].geometry.location.lng();						
  						document.getElementById("address").value=results[0].formatted_address;
  					}
  				}
  			});
  		}	
  	}

  	
      function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };
        
        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
      //]]>
