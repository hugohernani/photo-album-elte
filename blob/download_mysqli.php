<?php

$id = (int)$_GET['id'];

$mysqli = new mysqli('localhost', 'ade', 'db2014', 'ade');
$mysqli->query('set names utf8'); 

$q = 'SELECT image, name, type FROM image WHERE id = ?';

$stmt = $mysqli->prepare($q);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($image, $filename, $type);
$stmt->fetch();
	
header('Content-Type: ' . $type);
header('Content-Disposition: attachement; filename=' . $filename);
echo $image;
	
$stmt->close();
$mysqli->close();