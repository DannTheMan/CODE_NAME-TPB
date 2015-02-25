<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="upload.js"></script>
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
				if(!isset($_COOKIE['asqCDhGVsulSU'])) {
					echo "<a id='login' href='login.php'>login</a>";
				} else {
					echo "<div id='logout' href='.'>logout</div>";
				}
			?>
		</div>

		<div id = "mainSection">
			<br>
			<br>
			<br>
			<div id="searchBox">
				<h2>Upload a file:</h2>
				<form enctype="multipart/form-data" action="uploadBack.php" method="POST">
					Name:
					<br>
					<input type="text" name="n" id="un" required>
					<br>
					<br>
					Description:
					<br>
					<textarea rows="8" cols="100" name="d" id="desc"></textarea>
					<br>
					<br>
					Torrent File:
					<br>
					<input type="file" name="f" id="fl">
					<br>
					<br>
					Please use this tracker to create your torrent file: 
					<input type="text" name="TrackerUrl" id="trackerUrl" 
						value="cntpb.csse.rose-hulman.edu/CODE_NAME-TPB/tracker/announce.php" readonly>
					<br>
					<br>
					<input type="submit" value="Send File">
				</form>
				<br>
			</div>

		</div>

	</body>
</html>