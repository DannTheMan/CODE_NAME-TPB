<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="landing.js"></script>
	</head>

	<body>
<?php require 'database.php'; ?>
<!--?php $sql = "INSERT INTO torrents (name) VALUES ('johnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemi')";
    $sid = $pdo -> prepare($sql);
    $sid -> execute(); ?-->
		<div id = "topBar">
			<h1 id="pageTitle">Codename: TPB</h1>
			<a id="login" href="login.php">login</a>
		</div>

		<div id = "mainSection">
			<div id = "sideBar">
				<h3>links:</h3>
				<ul>
					<li>
						<a href="www.google.com">Google</a>
					</li>
					<li>
						<a href="www.google.com">Google</a>
					</li>
					<li>
						<a href="www.google.com">Google</a>
					</li>
					<li>
						<a href="www.google.com">Google</a>
					</li>
					<li>
						<a href="www.google.com">Google</a>
					</li>
					<li>
						<a href="www.google.com">Google</a>
					</li>
				</ul>
			</div>

			<div id="torrentbox">
				<?php
					$s = $_GET["torrent"];
                    foreach ($pdo->query("SELECT name FROM torrents WHERE id = $s") as $row) {
                    	$name = $row[0];
                    	break;
                	}
                    foreach ($pdo->query("SELECT description FROM torrents WHERE id = $s") as $row) {
                    	$description = $row[0];
                    	break;
                    }
                    foreach ($pdo->query("SELECT file FROM torrents WHERE id = $s") as $row) {
                    	$file = $row[0];
                    	break;
                    }
				?>
				<h2><?php echo $name ?></h2>
				<br />
				<h4>&#09;Seeders: 32 &#09;&#09;Leechers: 1,209&#09;</h4>
				<p>
					<?php echo $description ?>
				</p>
				<br />
				<br />
				<a href="<?php echo $file ?>" download="<?php echo $name ?>">Click here to download!</a>
				<br />
			</div>

		</div>

	</body>
</html>