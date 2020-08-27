
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Messages</title>
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
	<input name="search" type="text" id="searchinput" placeholder="Enter Username" required>
	</form>
	</div>
	<br><br><br><br>
	<center><h3 id="searchTitle">MESSAGES</h3></center>
	<span id="recMessages"><span>
<?php

$name= $_SESSION['username'];


$result= mysqli_query($conn, "SELECT sender, seen FROM messages WHERE recipient='$name' ORDER BY date DESC");
//storing in array
$data =array();
if($result->num_rows != 0){
	while ($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	for($x= 0; $x < $result->num_rows; $x++) {
		$data[$x]["sender"]= ucfirst($data[$x]["sender"]);
	}
}

?>
<script>
<?php echo "var data=".strval(json_encode($data)).";"; ?>
var senders=[];
var unseens=[];

for (x=0; x<data.length; x++) {
	if (!senders.includes(data[x]["sender"])){
		senders.push(data[x]["sender"]);
		unseens.push(0);
		if (data[x]["seen"]=="0") {
			unseens[senders.indexOf(data[x]["sender"])]=unseens[senders.indexOf(data[x]["sender"])]+1;
		}
	} else {
		if (data[x]["seen"]=="0") {
			unseens[senders.indexOf(data[x]["sender"])]=unseens[senders.indexOf(data[x]["sender"])]+1;
		}
	}
}


for (x=0; x<senders.length; x++) {
	text= '<a href= message.php?username='+senders[x].toLowerCase()+' class="searchedData"><span style="font-size:30px">'+senders[x]+'</span>';
	if (unseens[x]>0) {
		text= '<span style="font-size:22px">'+ text+ '  ('+unseens[x]+')'+'</span></a><br>';
	} else {
		text= '<span style="font-size:22px">'+text+'</span></a><br>';
	}
	document.getElementById("recMessages").innerHTML=document.getElementById("recMessages").innerHTML+text;
}




</script>

</body>
</html>