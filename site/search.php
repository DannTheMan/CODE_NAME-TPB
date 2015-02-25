<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="search.js"></script>
	</head>

	<body><?php require 'database.php'; ?>
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
			
			<br>
			<br>
			<br>
			<div id="searchBox">
				<h2>Find files from your friends:</h2>
				<form action="search.php">
					<!--DO SOME STUFF!!!-->
					Search files by name:
					<br>
					<input type="text" name="searchtext" id="textfield" required>
					<br>
					<br>
					<input type="submit">
				</form>
				<br>
			</div>
			<div id="resultsBox">
				<h2>Results:</h2>
				<br>
				<!--p id="resultsMessage">
				No results found with your current search.
				</p-->
				<ul id="results">
					<?php
                    $s = htmlspecialchars($_GET["searchtext"]);
                    echo("<br>");
                    $bl = false;
                    foreach ($pdo->query("SELECT * FROM torrents WHERE name LIKE '%" . $s . "%'") as $row) {
                        $bl = true;
                        echo("<li><div class=\"result\" onclick=todownload(\"$row[0]\")><span class=\"resn\">$row[1]</span><span class=\"ressl\">
                        <span class=\"divider\"></span>
                        <span class=\"ress\">Seeders: 17</span><span class=\"divider\"></span><span class=\"resl\">Leechers: 5</span></span></div></li><br>");
                    }
                    if(!$bl)echo("No results found<br><br>");
					?>
				</ul>
			</div>
		</div>

	</body>
</html>