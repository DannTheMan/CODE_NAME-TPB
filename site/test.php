<?php
require 'database.php';
require './tracker/functions.reopentracker.php';

$sql = "SELECT DISTINCT info_hash FROM peers";

$stmt = $pdo -> query($sql);
$files = array();

while($row = $stmt ->fetch(PDO::FETCH_ASSOC)) {
	$values[0][] = array('key' => ':hash', 'value' => $hash, 'type' => PDO::PARAM_STR);
	echo bdecode($row['info_hash']);
	echo "<br />";
}




?>