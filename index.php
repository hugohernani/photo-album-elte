<?php 
include "DAO/AlbumDAO.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';
$title = isset($_GET['title']) ? $_GET['title'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';
$user = isset($_GET['user']) ? $_GET['user'] : '';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <h1>Search</h1>
    	<form action="index.php" method="get">
			<input type="text" name="id" value="<?=$id?>">
			<input type="text" name="title" value="<?=$title ?>">
			<input type="text" name="description" value="<?=$description?>">
			<input type="text" name="user" value="<?=$user?>">
			<input type="submit" name="send" value="Consult">
    	</form>
    </body>
    
    <?php 
    $markupFields = "<table><tr>";
    $daoAlbum = new AlbumDao();
    $fields = $daoAlbum->getFields();
    
    foreach($fields as $field){
    	$markupFields .= "<th>" . $field . "</th>";
    }
    $markupFields .= "</tr></table>";
    echo $markupFields;
    
    	$albuns = $daoAlbum->getAll();
    
        $markup = "<table>
		<tr>";
                
        $markup .= "</tr>";
        foreach ($albuns as $album) {
        	$r = "<tr>";
        	$r .= "<td>" . $album->getID() . "</td><td>" . $album->getTitle() . "</td><td>" . $album->getDescription() . "</td><td>" . $album->getUserId();
			$r .= "<td><a href='update.php?id=" . $album->getID() . "'>Modify</a>";
        	$r .= "</td></tr>";
        	$markup .= $r;
        }
        
        $markup .= "</table>";
        
        echo $markup;
    ?>
    
</html>
