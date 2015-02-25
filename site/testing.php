<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="landing.js"></script>
	</head>

	<body>

		<?php
require 'database.php';
require dirname(__FILE__).'/../tracker/functions.reopentracker.php'
		?>
		<?php

        //$name = htmlspecialchars($_POST["n"]);
        ///$desc = htmlspecialchars($_POST["d"]);

        //$ff = new SplFileObject($_POST["f"]);
        $name = "megatest";
        $desc = "a new test";
        $f = "tester.txt";

        $file = $ff;

        $file_string = file_get_contents($file);
        $hash_info = sha1(bencode(bdecode($file_string)['info']));

        $sql = "INSERT INTO torrents (name,description,file) VALUES ('$name','$desc','$file')";
        //put real SQL stuff here
        $sid = $pdo -> prepare($sql);
        $sid -> execute();

        echo('hash_info: ' . $hash_info . "\n");
        echo('file: ' . $file . "\n");
        echo('file_string: ' . $file_string . "\n");

        //echo("true");
		?>
	</body>
</html>