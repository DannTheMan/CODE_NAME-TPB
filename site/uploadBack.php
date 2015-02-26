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
    require 'torrent_Parse.php';
    //require dirname(__FILE__) . '/../tracker/functions.reopentracker.php';
    
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

$tFile = new torrent_file($file);

//set info_hash and file
$file_string = $tFile->file_string;
$info_hash = $tFile->info_hash;

$tFile->basic_output();

$sql = "INSERT INTO torrents (name, file, info_hash, description) VALUES ( :name , :file , :info_hash , :description )";
//put real SQL stuff here
$sid = $pdo -> prepare($sql);

$sid -> bindParam(':name', $name);
$sid -> bindParam(':file', $file_string);
$sid -> bindParam(':info_hash', $info_hash);
$sid -> bindParam(':description', $desc);

$sid -> execute();

?>
<!--
    </body>
</html>-->