<!DOCTYPE HTML>
<html>
	<head>
        <title>Codename: TPB</title>
        <link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="landing.js"></script>
	</head>

	<body>

		<?php unset($_COOKIE[crypt("username", "askdalkweasdaaowej312sa9")]);
    $ss = "123";
    $uname = "jimmy";
    unset($_COOKIE[crypt("username", "askdalkweasdaaowej312sa9")]);
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
            $f0 = preg_replace('/[^[:print:]]/', '', $found[0]);
            if (strcmp($f0, $ss) == 0) {$ans = true;
                $name = $found[1];
            }
        }

        if ($ans) {
            // 86400 = 1 day
        }

        if ($ans) {
            echo('true');
        } else
            echo('false');
    }
    echo("<br><br>$name <br><br>");
		?>

		<?php
        //unset($_COOKIE[crypt("username","askdalkweasdaaowej312sa9")]);
        //$ss = crypt(htmlspecialchars($_POST["secure"]), "1241asda0");
        //$uname = htmlspecialchars($_POST["username"]);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cntpb";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
        $sql = "SELECT username, id FROM users";
        $sid = mysqli_query($conn, $sql);
        while ($i = mysqli_fetch_array($sid)) {
            echo($i[0] . ", " . $i[1] . ":K" . "<br>");
        }
		?>
	</body>
</html>