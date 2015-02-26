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
<?php require 'torrent_Parse.php'; ?>
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

			<div id="torrentbox">
				<?php
					$s = $_GET["torrent"];
					foreach ($pdo->query("SELECT info_hash FROM torrents WHERE id = $s") as $row) {
						$infohash = $row[0];
						break;
					}
                    foreach ($pdo->query("SELECT name FROM torrents WHERE id = $s") as $row) {
                    	$name = $row[0];
                    	break;
                	}
                    foreach ($pdo->query("SELECT description FROM torrents WHERE id = $s") as $row) {
                    	$description = $row[0];
                    	break;
                    }
                    foreach ($pdo->query("SELECT file FROM torrents WHERE id = $s") as $row) {
                    	$file = $row[0];
                    	break;
                    }
                    //set uo stuff for sources
                    $info = strtolower(sha1(bencode(bdecode($file)['info'])));
                    $torrent_data = bdecode($file);
                    $scrape = str_replace('announce', 'scrape', $torrent_data['announce']);
                    //create sources
                    $sources =  bdecode(@file_get_contents($scrape . '?info_hash=' . urlencode(hex2bin($info))));
                    //get variables
                    $seeds = $sources['files'][hex2bin($info)]['complete'];
                    $leechs = $sources['files'][hex2bin($info)]['incomplete'];
                    $downloads = $sources['files'][hex2bin($info)]['downloaded'];

                    var_dump($file);

                    //$scrape = "cntpb.csse.rose-hulman.edu/CODE_NAME-TPB/tracker/scrape.php";
                    //$source = bdecode(@file_get_contents($scrape . "?info_hash=" . urlencode(hex2bin($infohash))));
                    //$seeders = $source['files'][hex2bin($infohash)]['complete'];
                    //$leechers = $source['files'][hex2bin($infohash)]['incomplete'];
					//$downloads = $source['files'][hex2bin($infohash)]['downloaded'];

                    /*//Calculate Seeders
                    $seeders = 0;
                    foreach ($pdo->query("SELECT COUNT(p.id) FROM peers p, torrents t
                    					WHERE p.info_hash = t.info_hash AND t.info_hash = \"$infohash\"
                    					AND p.remaining = 0 AND p.uploaded > p.downloaded") as $row) {
                    	$seeders = $row[0];
                    	break;
                    }
                    //Calculate Leechers
                    $leechers = 0;
                    foreach ($pdo->query("SELECT COUNT(p.id) FROM peers p, torrents t
                    					WHERE p.info_hash = t.info_hash AND t.info_hash = \"$infohash\"") as $row) {
                    	$leechers = $row[0];
                    	$leechers = $leechers - $seeders;
                    	break;
                    }*/
				?>
				<h2><?php echo $name ?></h2>
				<?php echo("<a href=\"downloadFile.php?id=$s\">Click here to download!</a>") ?>
				<h4>Seeders: <?php echo $seeders; ?> 
					Leechers: <?php echo $leechers; ?></h4>
				<br />
				<br>
				</div>
				<div id="torrdesBox">
				<p>
					<?php echo $description ?>
				</p>
				<!--br />
				<br />
				<!--?php echo("<a href=\"downloadFile.php?id=$s\">Click here to download!</a>") ?-->
				<!--a href="<?php echo $file ?>" download="<?php echo $name ?>">Click here to download!</a-->
				<br />
				<br />
			</div>

			<br />
			<br />
			<br />

			<div id="torrentcomments">
				<h2>User Comments</h2>
				<?php
					$s = $_GET["torrent"];
					$rows = $pdo->query("SELECT DISTINCT u.username, c.comment FROM comments c, users u
							WHERE u.id = c.user_id AND c.torrent_id = $s ORDER BY c.id");
					foreach ($rows as $row) {
						echo "<div class=\"comment\"> <strong>$row[0]</strong>: $row[1]</div>";
					}
				?>
				<br />
				<br />

				<script type="text/javascript">
					var torrentID = "<?php echo $s; ?>";
				</script>

				Comment:<br />
				<textarea name='userComment' id='userComment'></textarea><br />
				<input type='submit' value='submit' id='submitComment' />

			</div>

		</div>

	</body>
</html>