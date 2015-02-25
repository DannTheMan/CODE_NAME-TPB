<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/rabbit.js"></script>
		<script language="JavaScript" src="signup.js"></script>
		<script language="JavaScript" src="killYourself.js"></script>		
	</head>

	<body>
<?php require 'database.php'; ?>
		<div id = "topBar">
			<h1 id="pageTitle">Codename: TPB
			</h1>
			<a id="home" href="landing.php">home</a>
			<?php 
				if(!isset($_COOKIE['asqCDhGVsulSU'])) {
					echo "<a id='login' href='login.php'>login</a>";
				} else {
					echo "<div id='logout' href='.'>logout</div>";
				}
			?>
		</div>

		<div id = "mainSection">
			<div id="searchBox">
				<h2>Create a username and password:</h2>
				<form method="post" action="communist revolution" id="loadingHere">
					<!--DO SOME STUFF!!!-->
					Username:
					<br>
					<input id="un" type="text" name="username" class="namefield" required>
					<br>
					<br>
					Password:
					<br>
					<input id="pw" type="password" name="password" class="passfield" required>
					<br>
					<br>
					Confirm Password:
					<br>
					<input id="cpw" type="password" name="confirm" class="passfield" required>
					<br>
					<br>
					<input type="button" onclick="signup()" value="Submit">
					<br>
				</form>
				<br>
			</div>

	</body>
</html>