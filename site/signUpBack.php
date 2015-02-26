<?php
require 'database.php';
?>
<?php
unset($_COOKIE[crypt("username", "askdalkweasdaaowej312sa9")]);
$uname = htmlspecialchars($_POST["username"]);
//$ss = htmlspecialchars($_POST["secure"]);//crypt(htmlspecialchars($_POST["secure"]), "1241asda0");
$key = 'holyhell24601359';
$string = htmlspecialchars($_POST["secure"]);//'string to be encrypted';

$ss = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
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
    $uid = 1;
    foreach ($pdo->query("SELECT id FROM users WHERE username = \"$uname\"") as $row) {
                        $uid = $row[0];
                        break;
                    }
    $sql = "INSERT INTO user_profiles (name,email,age,gender,uid) VALUES ('new_user','','','',$uid)";
    $sid = $pdo -> prepare($sql);
    $sid -> execute();
    $ans = true;
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
