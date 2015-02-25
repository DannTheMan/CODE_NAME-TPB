<?php
unset($_COOKIE[crypt("username","askdalkweasdaaowej312sa9")]);
$ss = crypt(htmlspecialchars($_POST["secure"]), "1241asda0");
$ss = $string = preg_replace( '/[^[:print:]]/', '',$ss);
$uname = htmlspecialchars($_POST["username"]);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cntpb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}
$sql = "SELECT hash, username FROM users WHERE username='$uname'";
$sid = mysqli_query($conn, $sql);
$name = "";
$ans = false;
if (mysqli_num_rows($sid) == 0) {
    echo('false');
} else {
    while ($found = mysqli_fetch_array($sid)) {
        $f0 = preg_replace( '/[^[:print:]]/', '',$found[0]);
        if(strcmp($f0,$ss)==0){$ans = true;
        $name = $found[1];}
    }

    if ($ans) {$cookie_name = crypt("username","askdalkweasdaaowej312sa9");
        $cookie_value = $name;
        $days = 1;
        setcookie($cookie_name, $cookie_value, time() + (86400 * $days), "/");
        // 86400 = 1 day
    }

    if ($ans) {
        echo('true');
    } else
        echo('false');
}
?>