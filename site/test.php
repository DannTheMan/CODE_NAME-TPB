<?php
require 'database.php';


$sql = "SELECT DISTINCT info_hash FROM peers";

$stmt = $pdo -> query($sql);
$files = array();

while($row = $stmt ->fetch(PDO::FETCH_ASSOC)) {
	echo $row['info_hash'];
	echo "<br />";
}




?>