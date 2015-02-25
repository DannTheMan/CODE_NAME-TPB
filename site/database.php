<?php $servername = "localhost";
$username = "root";
$password = "ChangeMe!";
$dbname = "cntpb";
try{$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", "$username", "$password");}
catch(PDOException $e){
    die("An erroe has occured when connecting to the database: <br><br>".$e);
}
?>