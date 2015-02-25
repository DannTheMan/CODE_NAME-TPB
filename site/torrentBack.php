<?php require 'database.php'; ?>
<?php
	if (!isset($_COOKIE['asqCDhGVsulSU'])) {
		echo('false');
	} else {
		$ucomment = $_POST['comment'];
		$s = $_POST['torrent'];
		$tempCookie = $_COOKIE['asqCDhGVsulSU'];
		$usrnm = $tempCookie;
		$uid = 1;
		foreach ($pdo->query("SELECT id FROM users WHERE username = '$usrnm'") as $row) {
			$uid = $row[0];
			break;
		}
		$pdo->query("INSERT INTO comments (user_id, torrent_id, comment)
					VALUES ('$uid', '$s', '$ucomment')");
		echo('true');
	}
?>