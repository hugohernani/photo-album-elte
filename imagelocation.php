<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <style type="text/css">
		    html { height: 100% }
		    body { height: 100%; margin: 0; padding: 0 }
		    #map_canvas { height:"60%"; width:60%;}
	    </style>
	    <script type="text/javascript"
	      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB6vIwURZJOuPiQoC1y5mpMdLQwZHbPgCQ&sensor=TRUE">
	    </script>
        <script type="text/javascript" src="my_scripts/mapsApi.js"></script>
        <title>Image location</title>
    </head>
	<body onload="initialize()">
	    <div id="map_canvas" style="width:100%; height:80%"></div>
       	<form action="insertMapPoint.php" method="get">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" size="50">
			<label for="type">Type</label>
			<select size="1" name="type">
			  <option value="museum">Museum</option>
			  <option value="univesity">University</option>
			</select>
			<br>
			<label for="address">Address</label>
			<input type="text" name="address" id="address" size="50" readonly>
			<label for="lat">Latitude</label>
			<input type="text" name="lat" id="lat" readonly>
			<label for="lng">Longitude</label>
			<input type="text" name="lng" id="lng" value="">
			<input type="submit" name="create" id="create" value="Create">
    	</form>
	    
	</body>
</html>