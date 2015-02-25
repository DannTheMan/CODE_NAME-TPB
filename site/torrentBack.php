<?php require 'database.php'; ?>
<?php
	if (!isset($_COOKIE['asqCDhGVsulSU'])) {
		echo('false');
	} else {
		$ucomment = $_POST['userComment'];
		$tempCookie = $_COOKIE['asqCDhGVsulSU'];
		$usrnm = $tempCookie;
		foreach ($pdo->query("SELECT id FROM users WHERE username = $usrnm") as $row) {
			$uid = $row[0];
			break;
		}
		$pdo->query("INSERT INTO comments ('id', 'user_id', 'torrent_id', 'comment')
					VALUES (NULL, $uid, $s, $ucomment)");
		echo('true');
	}
?>