<?php
unset($_COOKIE[crypt("username","askdalkweasdaaowej312sa9")]);
$ss = crypt(htmlspecialchars($_POST["secure"]), "1241asda0");
$uname = htmlspecialchars($_POST["username"]);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cntpb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}
$sql = "SELECT username FROM users WHERE id='$ss' AND username='$uname'";
$sid = mysqli_query($conn, $sql);
$name = "";
$ans = false;
if (!mysqli_num_rows($sid) == 0) {
    echo('false');
} else {
    while ($found = mysqli_fetch_array($sid)) {
        $ans = true;
        $name = $found[0];
    }

    if (ans) {$cookie_name = crypt("username","askdalkweasdaaowej312sa9");
        $cookie_value = $name;
        $days = 1;
        setcookie($cookie_name, $cookie_value, time() + (86400 * $days), "/");
        // 86400 = 1 day
    }

    if (ans) {
        echo('true');
    } else
        echo('false');
}
?>