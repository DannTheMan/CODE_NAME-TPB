<!DOCTYPE HTML>
<html>
    <head>
        <title>Codename: TPB</title>
        <link rel="icon" href="resources/boatIcon.jpg" type="image/x-icon">
        <link href="landing.css" type="text/css" rel="stylesheet" />
        <script language="JavaScript" src="search.js"></script>
    </head>

    <body><?php require 'database.php'; ?>
        <div id = "topBar">
            <h1 id="pageTitle">Codename: TPB</h1>
            <a id="login" href="login.php">login</a>
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
            
            <br>
            <br>
            <br>
            <div id="searchBox">
                <h2>Upload a file:</h2>
                <form action="search.php">
                    Search files by name:
                    <br>
                    <input type="text" name="searchtext" id="textfield" required>
                    <br>
                    <br>
                    <input type="submit">
                </form>
                <br>
            </div>
            
        </div>

    </body>
</html>