<?php
require 'database.php';
?>
<?php
unset($_COOKIE[crypt("username", "askdalkweasdaaowej312sa9")]);
$uname = htmlspecialchars($_POST["username"]);
$ss = crypt(htmlspecialchars($_POST["secure"]), "1241asda0");

$sql = "SELECT username FROM users WHERE username='$uname'";
$sid = $pdo -> prepare($sql);
$sid -> execute();
$name = "";
$ans = false;

if ($sid->rowCount() == 0) {
    $ans = true;
    $sql = "INSERT INTO users (username,hash) VALUES ('$uname','$ss')";
    $sid = $pdo -> prepare($sql);
    $sid -> execute();
    //$sql = "UPDATE users SET hash='$ss' WHERE username='$uname'";
    //$sid = mysqli_query($conn, $sql);

    /*$cookie_name = crypt("username","askdalkweasdaaowej312sa9");
     $cookie_value = $name;
     $days = 1;
     setcookie($cookie_name, $cookie_value, time() + (86400 * $days), "/");*/
}

if ($ans) {
    echo('true');
} else
    echo('false');
?>
