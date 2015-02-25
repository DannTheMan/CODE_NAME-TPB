<?php require 'database.php'; ?>
<?php
	$uid = $_POST['uid'];
	if (isset($_POST['name']) {
		$name = $_POST['name'];
		$dbo->query("UPDATE user_profiles SET name = \"$name\" WHERE uid = \"$uid\"");
	} else if (isset($_POST['email']) {
		$email = $_POST['email'];
		$dbo->query("UPDATE user_profiles SET email = \"$email\" WHERE uid = \"$uid\"");
	} else if (isset($_POST['age']) {
		$age = $_POST['age'];
		$dbo->query("UPDATE user_profiles SET age = \"$age\" WHERE uid = \"$uid\"");
	} else if (isset($_POST['gender']) {
		$gender = $_POST['gender'];
		$dbo->query("UPDATE user_profiles SET gender = \"$gender\" WHERE uid = \"$uid\"");
	}
	echo "true";
?>