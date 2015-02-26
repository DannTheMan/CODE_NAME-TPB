<?php require 'database.php'; ?>
<?php
	$uid = $_POST['uid'];
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$pdo->query("UPDATE user_profiles SET name = \"$name\" WHERE uid = \"$uid\"");
	} elseif (isset($_POST['email'])) {
		$email = $_POST['email'];
		$pdo->query("UPDATE user_profiles SET email = \"$email\" WHERE uid = \"$uid\"");
	} elseif (isset($_POST['age'])) {
		$age = $_POST['age'];
		$pdo->query("UPDATE user_profiles SET age = \"$age\" WHERE uid = \"$uid\"");
	} elseif (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
		$pdo->query("UPDATE user_profiles SET gender = \"$gender\" WHERE uid = \"$uid\"");
	}
	echo "true";
?>