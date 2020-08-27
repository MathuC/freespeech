
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Error</title>
	<link rel="stylesheet" type="text/css" href="style.css"> <!-- rel means relation with the current document this other document has -->
	<link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
	<div>
	<b><a class="topbtn" href="logout.php">Logout</a></b>
	<b><a  class="topbtn" href="about.php"><img src="img/whiteLogo.png" style="width:19px;height:19px;margin:4px;margin-bottom:0px;margin-top:-3px;padding:0px;" /></a></b>
	<b><a class="topbtn" href="profile.php"><?php echo ucfirst($_SESSION['username']); ?></a></b>
	<b><a  class="topbtn" href="search.php">All Users</a></b>
	<b><a class="topbtn" href="notification.php">Messages</a></b>
	<b><a class="topbtn" href="home.php">Home</a></b>
	</div>
	
	<div>
	<form id="search" action="search.php" method="get" autocomplete="off">
	<b><label href="search.php">Search</label></b>
	<input name="search" type="text" id="searchinput" placeholder="Enter Username" required>
	</form>
	</div>
	<br><br><br><br>
	<h1  align="center" style="font-weight:normal">ERROR: PAGE NOT FOUND</h1>
</body>
</html>