<table>
<?php
$mysqli = new mysqli('localhost', 'ade', 'db2014', 'ade');
$mysqli->query('set names utf8'); 

$q = 'SELECT image, name, type FROM image';

$stmt = $mysqli->prepare($q);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($image, $filename, $type);

while ($sor = $stmt->fetch()) {
		$content = $row['image'];
		header('Content-type: image/jpg');
        echo "
            <tr>
                <td>{$filename}</td>
                <td>{$type}</td>
				<td>{$content}</td>
            </tr>";
    }

	
//header('Content-Type: ' . $type);
//echo $image;
	
$stmt->close();
$mysqli->close();

?>
</table>