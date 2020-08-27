
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Search</title>
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
<?php

$name= $_SESSION['username'];


if (isset($_GET['search'])){
	$all=false;
} else {
	$all=true;
}
if (!$all) {
	$raw=$_GET['search'];
	$raw = str_replace("'", "''", $raw); 
	$raw = str_replace("<", "", $raw);
	$raw = str_replace(">", "", $raw);
	$raw = str_replace("\\", "", $raw);
	$raw = explode(" ", $raw);
	$text = trim($raw[0]);
}

//no is followed by a plural noun normally
$noUsers = '<center><h3 style="display:inline-block;margin:15px;padding:5px;text-transform:capitalize;font-weight:normal;">NO USERS FOUND</h3></center>';

if (!$all){
	echo '<center><h3 id="searchTitle">Search: '.strtoupper($text)."</h3></center>";
	$result= mysqli_query($conn, "SELECT username, gender, location FROM profile WHERE username LIKE '%{$text}%' ORDER BY username ASC");
	//storing in array
	$data =array();
	if($result->num_rows != 0){
		while ($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
	}
} else {
	echo '<center><h3 id="searchTitle">ALL USERS</h3></center>';
	$result= mysqli_query($conn, "SELECT username, gender, location FROM profile ORDER BY username ASC");
	//storing in array
	$data =array();
	if($result->num_rows != 0){
		while ($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
	}
}


//Writes users that have been found
if ($result->num_rows == 0) {
	echo $noUsers;
} else {
	for($x= 0; $x < $result->num_rows; $x++) {
		if ( $data[$x]["username"]==$name ) {
			if ($result->num_rows == 1) {
				echo $noUsers;
			}
		} else {
			$displayText='<a href="profile.php?username='.strtolower($data[$x]["username"]).'" class="searchedData"><span style="font-size:30px">'.$data[$x]["username"]."</span>";
			if ( $data[$x]["gender"] != null) {
				$displayText = $displayText.", ".strtolower($data[$x]["gender"]);
			}
			if ( $data[$x]["location"] != null) {
				$displayText = $displayText.", ".strtolower($data[$x]["location"]);
			}
			$displayText=$displayText."</a><br>";
			echo $displayText;
		}
	}
}


?>
		<script>
			var searchbar= document.getElementById("searchinput");
			searchbar.select();
		</script>
	</body>
</html>