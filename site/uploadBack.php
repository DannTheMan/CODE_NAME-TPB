<!--

<!DOCTYPE HTML>
<html>
    <head>
        <title>Codename: TPB</title>
        <link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <link href="landing.css" type="text/css" rel="stylesheet" />
        <script language="JavaScript" src="uploadBack.js"></script>
    </head>

    <body>
-->
<?php
    require 'database.php';
    require dirname(__FILE__) . '/../tracker/functions.reopentracker.php';
?>
<?php
/*
 $json = file_get_contents("php://input");
 $data = json_decode($json, true);

 $dd = ($data["file"]);

 $name = htmlspecialchars($data["name"]);
 $desc = htmlspecialchars($data["desc"]);

 file_put_contents("temp.torrent", $data["file"]);
 */

//$file = $data["file"];

$name = $_POST["n"];
$desc = $_POST["d"];
$file = $_FILES["f"]['tmp_name'];

$file_string = file_get_contents($file);

//$file = $data["file"];

//$ff = new SplFileObject($f);
//$fileo = $_FILES["tester.txt"][0];

//$file = file_get_contents("tester.txt");//$ff;

//echo("  K $name K  ");
//$file_string = file_get_contents($file);

$torrent_data = bdecode($file_string)
$info_hash = sha1(bencode(bdecode($file_string)['info']));

//variables to get the # of user sharing the torrent
$info = strtolower($info_hash);
$scrape = str_replace('announce', 'scrape', $torrent_data['announce']);
$sources = bdecode(@file_get_contents($scrape . '?info_hash=' . urlencode(hex2bin($info))));

//display the files in the torrent
$c = count($torrent_data['info']['files']);
echo '<h2>Files</h2>';
// if it has more then one file do a loop and display all the files; else display the name of the file
if ($c > 1) {
    for ($i = 0; $i < $c; $i++) {
        echo $torrent_data['info']['files'][$i]['path']['0'] . '<br/>';
    }
} else {
    echo $torrent_data['info']['name'] . '<br/>';
}

// let's display the sources
$seeds = $sources['files'][hex2bin($info)]['complete'];
$leechs = $sources['files'][hex2bin($info)]['incomplete'];
$downloads = $sources['files'][hex2bin($info)]['downloaded'];

echo '<h2>Sources</h2>' .
    '<b>Seeds:</b> ' . $seeds . '<br/>' .
    '<b>Leechs:</b> ' . $leechs . '<br/>' .
    '<b>Downloads:</b> ' . $downloads . '<br/>';


$sql = "INSERT INTO torrents (name, description, file, info_hash) VALUES (:name , :descr , :file , UNHEX( ':info_hash' ))";
//put real SQL stuff here
$sid = $pdo -> prepare($sql);

$sid -> bindParam(':name', $name);
$sid -> bindParam(':descr', $desc);
$sid -> bindParam(':file', $file_string);
$sid -> bindParam(':info_hash', $info_hash);

$sid -> execute();

//echo('hash_info: '.$hash_info.'\n');
//echo('file: '.$file.'\n');
//echo('file_string: '.$file_string.'\n');
//echo('hash_info: '.$hash_info.'\n');
//echo("<script type=\"text/javascript\">gohome();</script>");
//echo('file_string: '.$file_string.'\n');

//echo("true");
?>
<!--
    </body>
</html>-->