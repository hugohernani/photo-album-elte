<html>
<body>
<?php
include "DAO/AlbumDAO.php";

$sent = isset($_GET['send']) ? True : False;
$id = isset($_GET['id']) ? $_GET['id'] : '';
$title = isset($_GET['title']) ? $_GET['title'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';

$message = "";

if($sent){
	$album = new Album($id, $title, $description, null);
	$daoAlbum = new AlbumDao();
	if($daoAlbum->update($album) > 0){
		$message = "Updated";
		$sent = False;
	}else{
		$message = "";
		$sent = False;
	}
}


?>
<a href="index.php">Back</a>

<?php echo $message; ?>

  <form method="get" action="<?php $_SERVER["REQUEST_URI"] ?>">
  	<input type="text" name="title" value="<?=$title?>">
	<input type="text" name="description" value="<?=$description?>">
	<input type="submit" name="send" value="modify">
  </form>
  
</body>
</html>