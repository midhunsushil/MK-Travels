<?php
	session_start();
	include('admin/conn.php');
?>
<!DOCTYPE html>
<html>
<style>
body {
	font-size:1.5em;
}
input[type=text],input[type=password] {
text-align:center;
padding: 12px 20px;
margin: 10px 0;
display:inline-block;
border: 1px solid #ccc;
border-radius:4px;
box-sizing:border-box;
}

input[type=submit],input[type=reset]{

background-color:#4CAF50;
color:white;
padding:14px 40px;
margin:10px 0;
border:none;
border-radius:4px;
cursor:pointer;
}

input[type=submit]:hover,input[type=reset]:hover{
background-color:#45a049;
}

div{
border-radius:20px;
background-color:#ffcc99;
padding:20px 100px;
}
</style>
<body>
<fieldset >
<legend style="font-size:50px"><center>Login To MK Travels</center></legend>
<div>
<form method="POST" action="admin/login.php">

<label for="username"> Username &nbsp &nbsp &nbsp &nbsp &nbsp </label>
<input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" 
name="username" placeholder="Username or Phone No"><br>
<label for="password">Password &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
<input type="password" id="psword" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" 
name="password" placeholder="Password"><br>
<input type="checkbox" name="remember" style="width: 17px; height: 17px;"> Remember me <br><br>
<span>
	<?php
		if (isset($_SESSION['message'])){
			echo $_SESSION['message']."<br>";
		}
		unset($_SESSION['message']);
	?>
</span>
<input type="submit" value="Login" name="login">
<input type="reset" value="Reset">

</form>
</div>
</fieldset>
</body>
</html>