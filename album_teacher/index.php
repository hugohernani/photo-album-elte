<html>
<body>
<?php
error_reporting(1);
$mysqli = new mysqli('localhost', 'ade', 'db2014', 'ade');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$title = isset($_GET['title']) ? $_GET['title'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';
$user = isset($_GET['user']) ? $_GET['user'] : '';

?>
  <form method="get" action="index.php">
	<input type="text" name="id" value="<?=$id?>">
	<input type="text" name="title" value="<?=$title ?>">
	<input type="text" name="description" value="<?=$description?>">
	<input type="text" name="user" value="<?=$user?>">
	<input type="submit" name="send" value="query">
  </form>
  <table>

<?php
  $query = ("select * from album 
		where id like '".$id."%' and 
		title like '".$title."%' and
		description like '".$description."%' and
		user like '".$user."%' 
		"
		);
  $result = $mysqli->query($query);
  if ($result) {
	while ($row = $result->fetch_assoc()) {
?>
		<tr>
			<td><?=$row['id']?></td>
			<td><?=$row["title"]?></td>
			<td><?=$row["description"]?></td>
			<td><?=$row["user"]?></td>
			<td><a href="update.php?id=<?=row["id"]?>&title=<?=row['title']?>&description=<?=row['description']?>&user=<?=row['user']?>"?>Modify</a></td>
			<td>Delete</td>
		</tr>
<?php
		}
  $result->free();
  }
  $mysqli->close();
?>
  </table>
  <p>New album</p>
</body>
</html>