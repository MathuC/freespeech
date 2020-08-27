<html>
<head> 
	<title> Login Registration </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="shortcut icon" href="img/favicon.png">
	<?php
	session_start(); 
	if (isset($_SESSION['username'])) { 
		header('location:home.php');
	}
	?>
</head>
<body>
<div align="center" style="margin-top:5px;margin-bottom:0px;padding:0px;">
	<h1 id="logintitle" style="line-height:20px;position:relative;display:inline;padding:0px;">FreeSpeech</h1>
	<img src="img/whiteLogo.png" style="width:50px;height:50px;margin-bottom:20px;margin-top:10px;" />
</div>
<h6 id="loginsubtitle" align="center">A secure instant messaging system with double encryption</h6>

<br>
<center>
<b>
<?php
if (isset($_SESSION['wrong'])) {
	if ($_SESSION['wrong']==1) {
		echo "<p style='color: black; font-family:arial'> Wrong Username/Password! </p><br>";
	}
}
?>
</b>
</center>
<div class="container">
	<div class="login-box">
		<div class="row">
			<div class="col-md-6 login-left" style="float:left"> 
				<h2> Login Here </h2>
				<form action="validation.php" method="post" autocomplete= off> 
					<div class="form-group">
						<label>Username</label>
						<input id="loginUN" type="text" name="user" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary"> Login </button>
				</form>
			</div>
			<div class="col-md-6 login-right" style="float:right"> 
				<h2> Register Here </h2>
				<form action="registration.php" method="post" autocomplete= off> 
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="user" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary"> Register </button>
					<br><br>
					<p style="font-size: 12px;font-family:Arial;color:#999999;line-height:14px;margin:0px;">&#9733; Username: 4-15 characters</p>
					<p style="font-size: 12px;font-family:Arial;color:#999999;line-height:14px;margin:0px;">&#9733; Password: 7-30 characters</p>
					<p style="font-size: 12px;font-family:Arial;color:#999999;line-height:14px;margin:0px;">&#9733; You can't change your pasword or username after you register, so don't lose them.</p>
				</form>
			</div>
		</div>
		<br><br>
		<p align="center" style="font-size: 12px; font-weight:bold; font-family:Courier; color:#606060">Created By Mathusan Chandramohan</p>
	</div>
</div>
<script>
	var loginUN= document.getElementById("loginUN");
	loginUN.select();
</script>
</body>
</html>