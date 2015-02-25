<?php 
    require 'database.php'; 
    require dirname(__FILE__).'/../tracker/functions.reopentracker.php'
?>
<?php

$name = htmlspecialchars($_POST["n"]);
$desc = htmlspecialchars($_POST["d"]);
$file = $_POST["f"];

$file_string = file_get_contents($file);
$hash_info = sha1(bencode(bdecode($file_string)['info']));

$sql = "INSERT INTO torrents (name,description,file) VALUES ('$name','$desc','$file')";//put real SQL stuff here
$sid = $pdo->prepare($sql);
$sid->execute();

echo($hash_info);
//echo("true");

?>