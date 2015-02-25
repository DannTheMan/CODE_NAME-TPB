<?php 
    require 'database.php'; 
    require dirname(__FILE__).'/../tracker/functions.reopentracker.php';
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
echo $info_hash;



$sql = "INSERT INTO torrents (name, description, file, info_hash) VALUES (:name , :descr , :file , :info_hash )";//put real SQL stuff here
$sid = $pdo->prepare($sql);

$sid->bindParam(':name', $name);
$sid->bindParam(':descr', $desc);
$sid->bindParam(':file', $file_string);
$sid->bindParam(':info_hash', $info_hash);

$sid->execute();

//echo('hash_info: '.$hash_info.'\n');
//echo('file: '.$file.'\n');
//echo('file_string: '.$file_string.'\n');
//echo('hash_info: '.$hash_info.'\n');
//echo("<script type=\"text/javascript\">gohome($hash_info);</script>");
//echo('file_string: '.$file_string.'\n');

//echo("true");

?>