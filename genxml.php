<?php
ob_start();
//error_reporting(E_ALL);

// Create XML node file
$dom = new DOMDocument("1.0", 'utf-8');
$node = $dom->createElement("map");
$parnode = $dom->appendChild($node);

// MySQL connection
$mysqli = new mysqli("localhost", "ci015x", "db2014", "wp_ci015x");

// Reading POI-s (address,coordinates, types) from database
$query = sprintf("SELECT name, address, lat, lng, type FROM googlemaps");
$result = $mysqli->query($query);
if ($result) {
	header("Content-type: text/xml");
	while ($row = $result->fetch_assoc()) {
	// Create XML
	$node = $dom->createElement("point");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("name", $row['name']);
	$newnode->setAttribute("address", $row['address']);
	$newnode->setAttribute("lat", $row['lat']);
	$newnode->setAttribute("lng", $row['lng']);
	$newnode->setAttribute("type", $row['type']);
}
  $result->free();
  }
$mysqli->close();
echo $dom->saveXML();
?>
