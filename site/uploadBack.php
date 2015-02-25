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

$info_hash = sha1(bencode(bdecode($file_string)['info']));
echo "info_hash: ".$info_hash;
echo "<br />";
echo "serialized bdecoded torrent file: " serialize(bdecode($file_string));

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

    </body>
</html>