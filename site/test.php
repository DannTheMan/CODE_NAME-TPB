<?php
require 'database.php';
require dirname(__FILE__) . '/../tracker/functions.reopentracker.php';

$sql = "SELECT DISTINCT info_hash FROM peers";

$stmt = $pdo -> query($sql);
$files = array();

while($row = $stmt ->fetch(PDO::FETCH_ASSOC)) {
	echo $row['info_hash'];
	echo bdecode($row['info_hash']);
	echo "<br />";
}

$url = 'localhost/CODE_NAME-TPB/tracker/scrape.php';
$data = array();


$options = array(
	'http' => array(
		'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		'method'  => 'POST',
		'content' => http_build_query($data),
		),
);


$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;



?>