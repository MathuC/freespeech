<?php

$name= $_SESSION['username'];


if (!isset($_GET['username']) || strtolower($_GET['username'])==$name) {
	$username=$name;
	$result= mysqli_query($conn, "SELECT username, gender, location, job, description, date FROM profile WHERE username LIKE '$name'");
	//storing in array
	$data =array();
	if($result->num_rows == 1){
		while ($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
	}
} else {
	$username= strtolower($_GET['username']);
	$result= mysqli_query($conn, "SELECT username, gender, location, job, description, date FROM profile WHERE username LIKE '$username'");
	//storing in array
	$data =array();
	if($result->num_rows == 1){
		while ($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
	} else {
		header('location: error.php');
		die();
	}
}

?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title><?php echo ucfirst($username);?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
	<input name="search" type="text" id="searchinput" placeholder="Enter Username"  style="margin-bottom:20px;" required> 
	</form>
	</div>
	<br><br><br><br>
<?php

//write data in profile
echo '<center><p style="display:inline-box;"><span class="profileTitle">'.strtoupper($username)."</span>";
if ($username==$name) {
	echo '<b><a class="message" href="edit.php"> Edit&#9998<br></a></p></center><br>';
} else {
	echo '<b><a class="message" href="message.php?username='.$username.'"> Chat &#128488<br></a></p></center><br>';
}

echo '<h4>Gender: <span style="font-weight: normal";>'.ucfirst(strtolower($data[0]["gender"])).'</span></h4>';
echo '<h4>Location: <span style="font-weight: normal";>'.ucfirst(strtolower($data[0]["location"])).'</span></h4>';
echo '<h4>Occupation: <span style="font-weight: normal";>'.ucfirst($data[0]["job"]).'</span></h4>';
echo '<h4>Date Joined: <span style="font-weight: normal";>'.date('M j Y', strtotime($data[0]["date"])).'</span></h4><br>';
echo '<h4>About Me:<br> <span style="font-weight: normal";>'.ucfirst($data[0]["description"]).'</span></h4>';


?>

</body>
</html>