
<html>
<head> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>About FreeSpeech</title>
	<link rel="stylesheet" type="text/css" href="style.css"> <!-- rel means relation with the current document this other document has -->
	<link rel="shortcut icon" href="img/favicon.png">
</head>
<body style="background:#303030">
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
<div align="center" style="margin-top:-10px;margin-bottom:30px;padding:0px;">
	<h1 id="logintitle" style="line-height:20px;position:relative;display:inline;padding:0px;">FreeSpeech</h1>
	<img src="img/whiteLogo.png" style="width:50px;height:50px;margin-bottom:-15px;margin-top:10px;" />
</div>
<h6 id="loginsubtitle" align="center">A secure instant messaging system with double encryption</h6>
<br>
<h6 id="loginsubtitle" align="center">Only the sender and the recipient have the power to decrypt a message</h6>
<br>
<h6 id="loginsubtitle" align="center">Even we don't have the power to decrypt your messages or ever know your password</h6>
<br><br>
<h3 style="font-weight:normal; margin:7px;">How is it done?</h3>
<h6 id="loginsubtitle" style="margin-left:7px;">The password associated with different accounts are never saved in our databases, only a hash value which is generated with a salt consisting of pseudo-random string of bytes (to prevent rainbow table attacks) is sent to us and subsequently written in our databases. A hash function (with salt) is irreversible, so reversing the function to find your password is impossible. We are the ones who wrote the code for this website and even we do not have the power to ever know your password.</h6>
<br>
<h6 id="loginsubtitle" style="margin-left:7px;">Another hash value of your password (with salt), which is the <b>HASH ENCRYPTION KEY</b> is temporarily saved on your local machine (until you log out or close the browser) through the session storage feature (available in all browsers) which is used to encrypt and decrypt your sent and received messages. Session storage variables can't be accessed by our servers (unlike COOKIES or SESSION VARIABLES). Hence, this key is only accessible to you through your browser and it is immediately erased from the browser when you close it or when you log out. It is very much discouraged to use this website on public computers for obvious reasons: In case you somehow forget to log out or close the browser.</h6>
<br>
<h6 id="loginsubtitle" style="margin-left:7px;">We first encrypt the sent message in our servers to muddle attacks that could happen before the message has been received. After the message is received, it is encrypted a second time using the <b>HASH ENCRYPTION KEY</b>.</h6>
<br>
<h6 id="loginsubtitle" align="center" style="margin-left:7px;"><i><b>Once a message is received, without your password, nobody CAN decrypt any messages in which you are sender or a receiver. Be careful on how you store your password and make sure no one else except you can access it.</b></i></h6>
<br>
<h6 id="loginsubtitle" align="center" style="margin-left:7px;"><b>Created by Mathusan Chandramohan</b></h6>


</body>
</html>