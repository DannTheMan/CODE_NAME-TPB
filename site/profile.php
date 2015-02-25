<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/rabbit.js"></script>
        <script language="JavaScript" src="torrent.js"></script>
		<script language="JavaScript" src="killYourself.js"></script>
	</head>

	<body>
<?php require 'database.php'; ?>
<!--?php $sql = "INSERT INTO torrents (name) VALUES ('johnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemijohnywasachemi')";
    $sid = $pdo -> prepare($sql);
    $sid -> execute(); ?-->
		<div id = "topBar">
			<h1 id="pageTitle">Codename: TPB</h1>
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

			<div id="personalInfoBox">
				<h2>User Profile: <?php echo $_GET['uname']?></h2>

				<?php
					$uname = $_GET['uname'];
					foreach ($dbo->query("SELECT id FROM users WHERE username = \"$uname\"") as $row) {
						$uid = $row[0];
						break;
					}
					foreach ($dbo->query("SELECT name, email, age, gender FROM user_profiles WHERE uid = $uid")) {
						$name = $row[0];
						if ($name === null) {
							$name = "";
						}
						$email = $row[1];
						if ($email === null) {
							$email = "";
						}
						$age = $row[2];
						if ($age === null) {
							$age = "";
						}
						$gender = $row[3];
						if ($gender === null) {
							$gender = "";
						}
						break;
					}
				?>
				<div><strong>Name:</strong> <?php echo $name?></div>
				<div><strong>Email:</strong> <?php echo $email?></div>
				<div><strong>Age:</strong> <?php echo $age?></div>
				<div><strong>Gender:</strong> <?php echo $gender?></div>				

			</div>

		</div>

	</body>
</html>