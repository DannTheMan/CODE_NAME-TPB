<?php 
    require 'database.php'; 
    require dirname(__FILE__).'/../tracker/functions.reopentracker.php'
?>
<?php

$name = htmlspecialchars($_POST["n"]);
$desc = htmlspecialchars($_POST["d"]);

$file = $_POST["f"];

echo $file;

//$ff = new SplFileObject($f);
//$fileo = $_FILES["tester.txt"][0];

//$file = file_get_contents("tester.txt");//$ff;

//echo("  K $name K  ");
$file_string = file_get_contents($file);
$hash_info = sha1(bencode(bdecode($file_string)['info']));

$sql = "INSERT INTO torrents (name,description,file) VALUES ('$name','$desc','$file')";//put real SQL stuff here
$sid = $pdo->prepare($sql);
$sid->execute();

//echo('hash_info: '.$hash_info.'\n');
//echo('file: '.$file.'\n');
//echo('file_string: '.$file_string.'\n');
//echo('hash_info: '.$hash_info.'\n');
//echo("<script type=\"text/javascript\">gohome($hash_info);</script>");
//echo('file_string: '.$file_string.'\n');

//echo("true");

?>