<?php 
    require 'database.php'; 
    require dirname(__FILE__) . '/../tracker/functions.reopentracker.php';
?>
<?php

$json = file_get_contents("php://input");
$data = json_decode($json, true);

$name = htmlspecialchars($data["name"]);
$desc = htmlspecialchars($data["desc"]);

file_put_contents("temp.torrent", $data["file"]);


//$file = $data["file"];


//echo $data["file"];

$file = file_get_contents("temp.torrent");

var_dump(bdecode($file));

//$file = $data["file"];

//$ff = new SplFileObject($f);
//$fileo = $_FILES["tester.txt"][0];

//$file = file_get_contents("tester.txt");//$ff;

//echo("  K $name K  ");
//$file_string = file_get_contents($file);
$hash_info = sha1(bencode(bdecode($file)['info']));



$sql = "INSERT INTO torrents (name, description, file) VALUES (:name , :descr , :file )";//put real SQL stuff here
$sid = $pdo->prepare($sql);

$sid->bindParam(':name', $name);
$sid->bindParam(':descr', $desc);
$sid->bindParam(':file', $file);

$sid->execute();

//echo('hash_info: '.$hash_info.'\n');
//echo('file: '.$file.'\n');
//echo('file_string: '.$file_string.'\n');
//echo('hash_info: '.$hash_info.'\n');
//echo("<script type=\"text/javascript\">gohome($hash_info);</script>");
//echo('file_string: '.$file_string.'\n');

//echo("true");

?>