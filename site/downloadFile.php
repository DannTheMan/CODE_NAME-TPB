<?php
require 'torrent_Parse.php';
require 'database.php';

$id = $_GET["id"];

$sql = "SELECT file, name FROM torrents WHERE id = '$id'";

$stmnt = $pdo->prepare($sql);
$stmnt->execute();
$row = $stmnt->fetch();

$before = memory_get_usage();
$file = $row["file"];
$after = memory_get_usage();

$size = abs($after - $before);
$name = $row["name"].".torrent";
$type = "application/x-bittorrent";

//header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");

echo $file;
exit;
