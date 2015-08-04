<?php

function save_to_mysqli($tmpname, $filename, $type) {
	$mysqli = new mysqli('localhost', 'ade', 'db2014', 'ade');
	$mysqli->query('set names utf8'); 

	$q = 'INSERT INTO image (image, name, album, type) VALUES (?, ?, 1, ?)';

	$stmt = $mysqli->prepare($q);
	$null = NULL;
	$stmt->bind_param('bss', $null, $filename, $type);

	$f = fopen($tmpname, "r");
	while (!feof($f)) {
		$stmt->send_long_data(0, fread($f, 8192));
	}
	fclose($f);

	$result = $stmt->execute();

	$id = $stmt->insert_id;
	
	$stmt->close();
	$mysqli->close();

	return $result ? $id : false;
}

	$messages = array();
	$fieldname = 'newfile';
	$id = NULL;

	if ($_FILES) {
		if (!$_FILES[$fieldname]) {
			$messages[] = 'The field name is not accepted';
		}
		else {
			if ($_FILES[$fieldname]['error'] != 0 || !is_uploaded_file($_FILES[$fieldname]['tmp_name'])) {
				$messages[] = 'Error during uploading.';
			}
		}

		if (empty($messages)) {
			$tmpname = $_FILES[$fieldname]['tmp_name'];
			$filename = basename($_FILES[$fieldname]['name']);
			$type = $_FILES[$fieldname]['type'];

			if ($id = save_to_mysqli($tmpname, $filename, $type)) {
				$messages[] = 'Succes.';
			} 
			else {
				$messages[] = 'Error during saving (Database).';
			}
		}
	}


$src = 'show_mysqli.php?id=' . $id;
$href = 'download_mysqli.php?id=' . $id;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>DYSS</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link type="text/css" href="styles/dyss.css" rel="stylesheet" />
		<link type="text/css" href="styles/imagelista.css" rel="stylesheet" />
	</head>
	<body>
		<header>
			<div>
				<h1><a href="{{ home }}">Home</a></h1>
				<p><a href="#" class="button"><span>xy</span></a></p>
			</div>
		</header>
		<div id="content">
			<aside>
				<nav>
					<ul>
						<li><a href="#">My Albums</a></li>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</nav>
			</aside>
			<div id="main_content">
				<div class="title">
					<h2>Album1</h2>
					<ul>
						<li><a href="#" class="button"><span>Back to My Albums</span></a></li>
					</ul>
					<div class="separator"></div>
				</div>
				<div id="inner_content">
					<?php if (!empty($messages)) : ?>
					Messages:
					<ul>
						<?php foreach($messages as $uzenet) : ?>
						<li><?php echo $uzenet; ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<?php if ($id) : ?>
						Uploaded Image: <br />
						<img src="<?php echo $src; ?>" /> <br />
						<a href="<?php echo $href; ?>">Download</a>
					<?php endif; ?>
					
					
					<h3>Upload new image</h3>
					<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" accept-charset="utf-8" class="big" enctype="multipart/form-data">
						<dl>
							<dt><label for="newfile">File</label></dt>
							<dd><input type="file" name="newfile" value="" id="newfile" class="text"  /></dd>

							<dd><input type="submit" name="feltolt" value="Feltöltés" class="button"  /></dd>
						</dl>
					</form>				
				</div>
				<div class="separator"></div>
			</div>
			<div class="separator"></div>
		</div>
	</body>
</html>