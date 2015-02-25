<!DOCTYPE HTML>
<html>
    <head>
        <title>Codename: TPB</title>
        <link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
        <link href="landing.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/rabbit.js"></script>
        <script language="JavaScript" src="login.js"></script>
    </head>

    <body>
<?php require 'database.php'; ?>
        <div id = "topBar">
            <h1 id="pageTitle">Codename: TPB</h1>
            <a id="home" href="landing.php">home</a>
        </div>

        <div id = "mainSection">
            <div id = "sideBar">
                <h3>links:</h3>
                <ul>
                    <li>
                        <a href="www.google.com">Google</a>
                    </li>
                    <li>
                        <a href="www.google.com">Google</a>
                    </li>
                    <li>
                        <a href="www.google.com">Google</a>
                    </li>
                    <li>
                        <a href="www.google.com">Google</a>
                    </li>
                    <li>
                        <a href="www.google.com">Google</a>
                    </li>
                    <li>
                        <a href="www.google.com">Google</a>
                    </li>
                </ul>
            </div>

            <div id="searchBox">
                <h2>Create a username and password:</h2>
                <form method="post" action="communist revolution" id="loadingHere">
                    <!--DO SOME STUFF!!!-->
                    Username:
                    <br>
                    <input id="un" type="text" name="username" class="namefield" required>
                    <br>
                    <br>
                    Password:
                    <br>
                    <input id="pw" type="password" name="password" class="passfield" required>
                    <br>
                    <br>
                    <input type="button" onclick="login()" value="Submit">
                    <br>
                    <br>
                    <hr>
                    <p>Don't have an account yet? Click <a href="signup.php">here</a> to create your free account now!</p>
                </form>

    </body>
</html>