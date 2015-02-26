<?php
	require dirname(__FILE__) . '/../tracker/functions.reopentracker.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Codename: TPB</title>
		<link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="search.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script language="JavaScript" src="killYourself.js"></script>
	</head>

	<body><?php require 'database.php'; ?>
		<div id = "topBar">
			<h1 id="pageTitle">Codename: TPB</h1>
			<a id="home" href="landing.php">home</a>
			<?php
            if (!isset($_COOKIE['asqCDhGVsulSU'])) {
                echo "<a id='login' href='login.php'>login</a>";
            } else {
                $tempCookie = $_COOKIE['asqCDhGVsulSU'];
                $usrnm = $tempCookie;
                echo "<a id='profile' href='profile.php?uname=$usrnm'>$usrnm</a>";
                echo "<div id='logout' href='.'>logout</div>";
            }
            ?>
		</div>

		<div id = "mainSection">
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
                        <span class=\"divider\"></span>");
                        //echo("<li><div class=\"result\" onclick=todownload(\"$row[0]\")><span class=\"resn\">$row[1]</span>");
                        $file = $row[2];

                        //set uo stuff for sources
	                    $info = strtolower(sha1(bencode(bdecode($file)['info'])));
	                    $torrent_data = bdecode($file);
	                    $scrape = str_replace('announce', 'scrape', $torrent_data['announce']);
	                    //create sources
	                    $sources =  bdecode(@file_get_contents($scrape . '?info_hash=' . urlencode(hex2bin($info))));
	                    //get variables
	                    $seeders = $sources['files'][hex2bin($info)]['complete'];
	                    $leechers = $sources['files'][hex2bin($info)]['incomplete'];
	                    $downloads = $sources['files'][hex2bin($info)]['downloaded'];


	                    /*
                    	foreach ($pdo->query("SELECT COUNT(p.id) FROM peers p, torrents t
                    					WHERE p.info_hash = t.info_hash AND t.id = \"$row[0]\"
                    					AND p.remaining = 0 AND p.uploaded > p.downloaded") as $rowi) {
                    		$seeders = $rowi[0];
                    		break;
                    	}
                    	//Calculate Leechers
                    	$leechers = 0;
                    	foreach ($pdo->query("SELECT COUNT(p.id) FROM peers p, torrents t
                    					WHERE p.info_hash = t.info_hash AND t.id = \"$row[0]\"") as $rowi) {
                    		$leechers = $rowi[0];
                    		$leechers = $leechers - $seeders;
                    		break;
                    	}*/
                        //echo("<br>");
                        echo("<span class=\"ress\">Seeders: $seeders</span><span class=\"divider\"></span><span class=\"resl\">Leechers: $leechers</span></span></div></li><br>");
                    }
                    if(!$bl)echo("No results found<br><br>");
					?>
				</ul>
				<br><br>
			</div>
		</div>

	</body>
</html>