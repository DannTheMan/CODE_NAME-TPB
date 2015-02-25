<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script language="JavaScript" src="landing.js"></script>
		<script language="JavaScript" src="killYourself.js"></script>
	</head>

	<body>
		<?php
        require 'database.php';
		?>
		<!--?php $sql = "INSERT INTO torrents (name) VALUES ('johnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemi')";
		$sid = $pdo -> prepare($sql);
		$sid -> execute(); ?-->
		<div id = "topBar">
			<h1 id="pageTitle">Codename: TPB</h1>
			<a disabled="true" id="home" href="landing.php">home</a>
			<?php
            if (!isset($_COOKIE['asqCDhGVsulSU'])) {
                echo "<a id='login' href='login.php'>login</a>";
            } else {
                $tempCookie = $_COOKIE['asqCDhGVsulSU'];
                $usrnm = $tempCookie;
                echo "<a id='profile' href='prifile.php?uname=$usrnm'>profile</div>";
                echo "<div id='logout' href='.'>$usrnm</div>";
            }
			?>
		</div>

		<div id = "mainSection">

			<?php //unset($_COOKIE[crypt("username","askdalkweasdaaowej312sa9")]);
    if (isset($_COOKIE['asqCDhGVsulSU'])) {
        echo("<div id=\"dlBox\">
<h2>Share files with your friends:</h2>
<form action=\"upload.php\">
<p>Click <a href=\"upload.php\">here</a> to upload a file share with your friends.</p>
</form>
<br>
</div>");
    }
			?>
			<br>
			<br>
			<br>
			<div id="searchBox">
			<h2>Find files from your friends:</h2>
			<form action="search.php">
			Search files by name:
			<br>
			<input type="text" name="searchtext" id="textfield" required>
			<br>
			<br>
			<input type="submit">
			</form>
			<br>
			</div>
			<!--div id="resultsBox">
			<h2>Results:</h2>
			<br>
			<p id="resultsMessage">
			No results found with your current search.
			</p><ul id="results"></ul>
			</div-->
			</div>
			<br>
			<br>
			<br>
			<div id="statsBox">
				<h2>Website Statistics:</h2>
				<!--form action="search.php">
				Search files by name:
				<br>
				<input type="text" name="searchtext" id="textfield" required>
				<br>
				<br>
				<input type="submit">
				</form-->
				<?php
                echo("Number of registered users: ");
                $users = 0;
                foreach ($pdo->query("SELECT COUNT(id) FROM users") as $rowi) {
                    $users = $rowi[0];
                    break;
                }
                echo($users);
                echo("<br><br>Number of files uploaded: ");
                $files = 0;
                foreach ($pdo->query("SELECT COUNT(id) FROM torrents") as $rowi) {
                    $files = $rowi[0];
                    break;
                }
                echo($files);
                echo("<br><br>Total number of seeders: ");
                $seeders = 0;
                foreach ($pdo->query("SELECT COUNT(p.id) FROM peers p, WHERE p.remaining = 0 AND p.uploaded > p.downloaded") as $rowi) {
                    $seeders = $rowi[0];
                    break;
                }
                echo($seeders);
                echo("<br><br>Total number of leechers: ");
                $leechers = 0;
                foreach ($pdo->query("SELECT COUNT(p.id) FROM peers as p") as $rowi) {
                    $leechers = $rowi[0];
                    $leechers = $leechers - $seeders;
                    break;
                }
                echo($leechers);
                echo("<br><br>Seeder/Leecher ratio: " . ((($seeders / $leechers) * 100) . "%"));
                echo("<br><br>Total amount of data uploaded: ");
                $bytes = 0;
                foreach ($pdo->query("SELECT SUM(p.downloaded) FROM peers as p") as $rowi) {
                    $bytes = $rowi[0];
                    break;
                }
                echo($bytes . " bytes<br>");
				?>
				<br>
			</div>
			<!--div id="resultsBox">
			<h2>Results:</h2>
			<br>
			<p id="resultsMessage">
			No results found with your current search.
			</p><ul id="results"></ul>
			</div-->
		</div>

	</body>
</html>