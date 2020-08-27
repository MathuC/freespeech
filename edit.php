
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Edit</title>
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

$result= mysqli_query($conn, "SELECT gender, location, job, description FROM profile WHERE username LIKE '$name'");
//storing in array
$data =array();
if($result->num_rows == 1){
	while ($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
}

$male="";
$female="";
$other="";

if (strtolower($data[0]["gender"])=="male") {
	$male="selected";
} else if (strtolower($data[0]["gender"])=="female") {
	$female="selected";
} else if (strtolower($data[0]["gender"])=="other") {
	$other="selected";
}
	

//write data in profile
echo '<center><span class="profileTitle">'.strtoupper($name)."</span></center>"; //without display:flex for some uknown reason, the link is not centered vertically

?>
<br>
<form id="form" action="editPost.php" autocomplete="off"> <!-- default method for form is GET so don't need to write it -->
	<center>
	<h4>Gender: </h4>
	<select name="gender" style="color:black;border-width:2px;border-color:grey;" id="edit"> <!-- To select something in advance in select tag you have to write selected in the option as an attribute -->
		<option <?php echo $male; ?> value="Male" style="background-color:gainsboro;">Male</option>
		<option <?php echo $female; ?> value="Female" style="background-color:gainsboro;">Female</option>
		<option <?php echo $other; ?> value="Other" style="background-color:gainsboro;">Other</option>
	</select> 
	<h4>Location: </h4>
	<input value= <?php echo "\"".ucfirst($data[0]["location"])."\""; ?> maxlength="50" name="location" style="color:black;border-width:2px;border-color:grey;" id="edit"></input>
	<h4>Occupation: </h4>
	<input value= <?php echo "\"".ucfirst($data[0]["job"])."\""; ?> maxlength="50" name="job" style="color:black;border-width:2px;border-color:grey;width:300px;" id="edit"></input>
	<br>
	<h4>About Me:</h4>
	<textarea maxlength="300" name="description" style="color:black;border-width:2px;border-color:grey;" id="bigEdit"><?php echo ucfirst($data[0]["description"]); ?></textarea>  <!--For textarea instead of value you have to put text in the middle of the two textarea tags -->
	<br><br>
	<button type="submit" class="submitbtn">Submit Edits</button>
	</center>
	
</form>

</body>
</html>