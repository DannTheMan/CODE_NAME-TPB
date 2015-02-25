<!DOCTYPE HTML>
<html>
	<head>
		<title>tpb</title>
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="landing.js"></script>
	</head>

	<body>
		<?php $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cntpb";
        $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", "$username", "$password");
		?>
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

			<div id="dlBox">
				<h2>Share files with your friends:</h2>
				<form action="action_page.php">
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
                    $s = $_POST["searchtext"];

                    foreach ($db->query("SELECT * FROM torrents WHERE name LIKE '$s'") as $row) {
                        echo("<div class=\"result\"><span class=\"resn\">$row[1]</span><span class=\"ress\">17</span><span class=\"resl\">5</span></div>");
                    }
					?>
				</ul>
			</div>
		</div>

	</body>
</html>