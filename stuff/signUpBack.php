<?php
unset($_COOKIE[crypt("username","askdalkweasdaaowej312sa9")]);
$uname = htmlspecialchars($_POST["username"]);
$ss = crypt(htmlspecialchars($_POST["secure"]), "1241asda0");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cntpb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}
$sql = "SELECT username FROM users WHERE username='$uname'";
$sid = mysqli_query($conn, $sql);
$name = "";
$ans = false;

if (mysqli_num_rows($sid) == 0) {
    $ans = true;
    $sql = "INSERT INTO users (username,hash) VALUES ('$uname','$ss')";
    $sid = mysqli_query($conn, $sql);
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
