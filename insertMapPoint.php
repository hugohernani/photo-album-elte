<?php 

$sent = isset($_GET['create']) ? True : False;
$title = isset($_GET['name']) ? $_GET['name'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$lat = isset($_GET['lat']) ? $_GET['lat'] : '';
$lng = isset($_GET['lng']) ? $_GET['lng'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';

$message = "";

if($sent){
	// MySQL connection
	$mysqli = new mysqli("localhost", "ci015x", "db2014", "wp_ci015x");
	
	$sql = "INSERT INTO googlemaps (name, address, lat, lng, type) VALUES (?,?,?,?,?)";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ssdds", $title, $address, $lat, $lng, $type);
	$stmt->execute();
	$stmt->close();
	
	header("Location: imagelocation.php");
}
?>