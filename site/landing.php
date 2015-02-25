<!DOCTYPE HTML>
<html>
	<head>
		<title>tpb</title>
		<!--link rel="icon" href="shipIcon.jpg" type="image/x-icon"/-->
		<link href="landing.css" type="text/css" rel="stylesheet" />
		<script language="JavaScript" src="landing.js"></script>
	</head>

	<body>

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

			<div id="dlBox">
                <h2>Share files with your friends:</h2>
                <form action="action_page.php">
                    <!--DO SOME STUFF!!!-->
                    Search files by name:
                    <br>
                    <input type="text" name="searchtext" id="textfield" required>
                    <br>
                    <br>
                    <input type="submit">
                </form>
                <br>
            </div>
			<br><br><br>
			<div id="searchBox">
				<h2>Find files from your friends:</h2>
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
			<!--div id="resultsBox">
				<h2>Results:</h2>
				<br>
				<p id="resultsMessage">
					No results found with your current search.
				</p><ul id="results"></ul>
			</div-->
		</div>

	</body>
</html>