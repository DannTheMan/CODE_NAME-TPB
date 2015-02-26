<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/rabbit.js"></script>
        <script language="JavaScript" src="profile.js"></script>
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
			<a id="home" href="landing.php">home</a>
			<?php
                if (!isset($_COOKIE['asqCDhGVsulSU'])) {
                    echo "<a id='login' href='login.php'>login</a>";
                } else {
                    echo "<div id='logout' href='.'>logout</div>";
                }
			?>
		</div>

		<div id = "mainSection">

			<div id="personalInfoBox">
				<h2>User Profile: <?php echo $_GET['uname']?></h2>

				<script type="text/javascript">var uid = 1;</script>

				<?php
					$uname = $_GET['uname'];
					foreach ($pdo->query("SELECT id FROM users WHERE username = \"$uname\"") as $row) {
						$uid = $row[0];
				?>		<script type="text/javascript">var uid = <?php echo $uid; ?>;</script>
				<?php
						break;
					}
					foreach ($pdo->query("SELECT name, email, age, gender FROM user_profiles WHERE uid = $uid") as $row) {
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
				<div><strong>Name:</strong> <?php echo $name?>
					<input type="text" display="none" id="nametext" class = "pfield"></div>
				<div><strong>Email:</strong> <?php echo $email?>
					<input type="text" display="none" id="emailtext" class = "pfield"></div>
				<div><strong>Age:</strong> <?php echo $age?>
					<input type="text" display="none" id="agetext" class = "pfield"></div>
				<div><strong>Gender:</strong> <?php echo $gender?>
					<input type="text" display="none" id="gendertext" class = "pfield"></div>				

				<?php
					if (isset($_COOKIE['asqCDhGVsulSU']) && $_COOKIE['asqCDhGVsulSU'] == $uname) {
						echo "<button type='button' onclick='modifyProfile();' id='mod'>Click here to modify your profile!</button>";
					}
				?>
				<button type='button' onclick='submitToDb();' display='none' id='sumbit'>Submit Changes</button>

			</div>

		</div>

	</body>
</html>