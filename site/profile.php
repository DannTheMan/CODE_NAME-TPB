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

			<div id="searchBox">
				<h2>User Profile: <?php echo $_GET['uname']?></h2>

				<script type="text/javascript">var uid = 1;</script>

				<?php
					$uname = $_GET['uname'];
					foreach ($pdo->query("SELECT id FROM users WHERE username = \"$uname\"") as $row) {
						$uid = $row[0];
                        echo("<div id=\"uidt\" disabled=\"true\">$uid</div>");
                        break;
                    }
				?>		<!--script type="text/javascript">var uid = <?php echo $uid; ?>;</script-->
				<?php
						
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
					<input type="text" display="none" id="nametext" class = "pfield"></div><br>
				<div><strong>Email:</strong> <?php echo $email?>
					<input type="text" display="none" id="emailtext" class = "pfield"></div><br>
				<div><strong>Age:</strong> <?php echo $age?>
					<input type="text" display="none" id="agetext" class = "pfield"></div><br>
				<div><strong>Gender:</strong> <?php echo $gender?>
					<input type="text" display="none" id="gendertext" class = "pfield"></div>		<br>		

				<?php
					if (isset($_COOKIE['asqCDhGVsulSU']) && $_COOKIE['asqCDhGVsulSU'] == $uname) {
						echo "<button type='button' onclick='modifyProfile();' id='mod'>Click here to modify your profile!</button>";
					}
				?>
				<button type='button' onclick='submitToDb();' display='none' id='submit'>Submit Changes</button><br><br><br>

			</div>

			<!--div id="statsbox">
				<h2>Personal Stats</h2>
				<?php
                echo("<br><br>Number of files uploaded: ");
                $files = 0;
                foreach ($pdo->query("SELECT COUNT(id) FROM user_torents ut, users u
                		WHERE u.id = ut.user_id AND u.name = \"$uname\"") as $rowi) {
                    $files = $rowi[0];
                    break;
                }
                echo($files);
                echo("<br><br>Number of comments written: ");
                $comments = 0;
                foreach ($pdo->query("SELECT COUNT(id) FROM comments c, users u WHERE c.user_id = u.id
                		AND u.name = \"$uname\"") as $rowi) {
                	$comments = $rowi[0];
                break;
                }
                echo($comments);
				?>
				<br>
				<br>
			</div-->

		</div>

	</body>
</html>