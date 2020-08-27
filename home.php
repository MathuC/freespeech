
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Home</title>
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
		<div id="welcome">
		<h1 style="font-size:30px; font-weight:normal">Welcome,<div style="font-size:35px; text-transform: uppercase"><?php echo $_SESSION['username'];?></div></h1>
		</div>
		<div align="center">
		<p id="worldchat" align="center">WorldChat</p>
		<img src="img/whiteLogo.png" style="width:40px;height:40px;margin-top:0px;margin-bottom:-5px;padding:0x" />
		</div>
		<div id="scrollable" class="speech">

<?php
$name=$_SESSION['username'];

$result = mysqli_query($conn, "SELECT * FROM worldchat ORDER BY date ASC");

//storing in array
$data =array();

if($result->num_rows != 0){
	while ($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
}

for($x= 0; $x < $result->num_rows; $x++) {	
	if ($name == $data[$x]["username"]) {
		if ($x != $result->num_rows-1){
			echo '<p><b><span style="text-transform:capitalize;font-size:14px;color:blue;">'.$data[$x]["username"].'</span></b><span style="font-size:12px;color:grey;">,&nbsp'.date('M j Y g:i A', strtotime($data[$x]["date"])).'</span></p>';
			echo '<p id="message" >'.$data[$x]["text"]."</p>";
			echo '<br>';
		} else {
			echo '<p><b><span style="text-transform: capitalize;font-size:14px;color:blue;">'.$data[$x]["username"].'</span></b><span style="font-size:12px;color:grey;">,&nbsp'.date('M j Y g:i A', strtotime($data[$x]["date"])).'</span></p>';
			echo '<p id="message" >'.$data[$x]["text"]."</p>"; //<p> solves problem of scroll
		}
	} else {
		if ($x != $result->num_rows-1){
			echo '<p><b><span style="text-transform: capitalize;font-size:14px;color:black;">'.$data[$x]["username"].'</span></b><span style="font-size:12px;color:grey;">,&nbsp'.date('M j Y g:i A', strtotime($data[$x]["date"])).'</span></p>';
			echo '<p id="message">'.$data[$x]["text"]."</p>";
			echo '<br>';
		} else {
			echo '<p><b><span style="text-transform: capitalize;font-size:14px;color:black;">'.$data[$x]["username"].'</span></b><span style="font-size:12px;color:grey;">,&nbsp'.date('M j Y g:i A', strtotime($data[$x]["date"])).'</span></p>';
			echo '<p id="message">'.$data[$x]["text"]."</p>";
		}
	}
}
?>
		</div>
		<form id="form" action="javascript:myPost()" autocomplete="off"> 
			<center>
				<b><label><span id= "writeHere" style="color: #505050">Write Here</span></label></b>
			</center>
			
			<input name="text" maxlength="500" placeholder="Maximum Characters: 500" style="color:#606060;border-width:2px;border-color:grey;" id="input" required></input> 
			
			<center>
				<button type="submit" class="postbtn">Post</button>
			</center>
		</form>
	</body>
	<script>
		
		<?php echo 'var username= "'.$name.'";' ; ?>
		var div = document.getElementById("scrollable");
		var form = document.getElementById("form");
		var inputfield = document.getElementById("input");
		var noMess=0; 
		var firstLoop=true; 
		
		
		inputfield.select(); 

		var lastID; 
		var prevID; 

		var height =  form.offsetHeight;
		div.style.height=window.innerHeight-div.offsetTop-height-70;
		scrollDown();

		function scrollDown(){ 
			div.scrollTop = div.scrollHeight;
		}

		function writeText(username,date,rawtext) {
			if (!noMess) {
				return '<br><p><b><span style="text-transform:capitalize;font-size:14px;color:'+'black'+';">'+username+'</span></b><span style="font-size:12px;color:grey;">,&nbsp'+date+'</span></p><p id="message" >'+rawtext+"</p>";
			} else {
				noMess=0;
				return '<p><b><span style="text-transform:capitalize;font-size:14px;color:'+'black'+';">'+username+'</span></b><span style="font-size:12px;color:grey;">,&nbsp'+date+'</span></p><p id="message" >'+rawtext+"</p>";
			}
		}
		
		
		
		function writeMyText(rawtext, date) {
			rawtext=rawtext.replace(/</g, ""); 
			rawtext=rawtext.replace(/>/g, "");
			rawtext=rawtext.replace(/\\/g, "");
			if (rawtext!="") {
				if (!noMess) {
					return '<br><p><b><span style="text-transform:capitalize;font-size:14px;color:'+'blue'+';">'+username+'</span></b><span style="font-size:12px;color:grey;">,&nbsp'+date+'</span></p><p id="message" >'+rawtext+"</p>";
				} else {
					noMess=0;
					return '<p><b><span style="text-transform:capitalize;font-size:14px;color:'+'blue'+';">'+username+'</span></b><span style="font-size:12px;color:grey;">,&nbsp'+date+'</span></p><p id="message" >'+rawtext+"</p>";
				}
			} else {
				return "";
			}
		}
		
		
		function reload() { 
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "reload.php", true);
			ajax.onload= function(){
				if (this.responseText) { 
					if (lastID!=null) {
						prevID=lastID;
					}
					jsonData= JSON.parse(this.responseText);
					lastID= jsonData[0]["id"];
					textUsername= jsonData[0]["username"];
					if (lastID!=prevID && textUsername!=username && firstLoop==false) {
						otherPost();
					}
				} else if(noMess==0) {
					noMess=1;
				}
				if (firstLoop == true) {
					firstLoop=false;
				}
			}
			ajax.send();
		}

		function otherPost() {
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "getText.php", true);
			ajax.onload= function(){
				var jsonData= JSON.parse(this.responseText);
				var otherUsername= jsonData[0]["username"];
				var date=jsonData[0]["date"];
				var rawtext=jsonData[0]["text"];
				var text = writeText(otherUsername,date,rawtext);
				document.getElementById("scrollable").innerHTML=document.getElementById("scrollable").innerHTML + text;
				scrollDown();
			}
			ajax.send();
		}

		function myPost() {
			var form= document.getElementById("form");
			var rawtext= document.getElementById("input").value; 
			var ajax = new XMLHttpRequest();
			ajax.open("POST", "post.php", true); 
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("text="+rawtext);
			var text = writeMyText(rawtext,getFormattedDate());
			if (text) { 
				document.getElementById("scrollable").innerHTML=document.getElementById("scrollable").innerHTML + text;
				scrollDown();
			}
			form.reset(); 
			inputfield.select(); 
		}
		
		
		//formats date like on teh server
		function getFormattedDate() {
			var dayOrNight="AM";
			var raw = new Date();
			var dateL=(raw.toString()).split(/[\s:]+/); 
			if (parseInt(dateL[4])>12) {
				dateL[4]= String(parseInt(dateL[4])-12);
				dayOrNight="PM";
			} else if(parseInt(dateL[4])==0) { 
				dateL[4]= String(12);
			}
			return dateL[1]+" "+dateL[2]+" "+dateL[3]+" "+dateL[4]+":"+dateL[5]+" "+dayOrNight;
		}
		
		setInterval(function(){
			reload();
		},250);
	</script>
</html>
