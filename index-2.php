<?php
	session_start();
	include('admin/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ADMIN</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->
	</head>
	<style>
input[type=text],input[type=password] {
text-align:center;
padding: 12px 20px;
display:inline-block;
border: 1px solid #ccc;
border-radius:px;
display:inline-block;
border-radius:10px;
box-sizing:border-box;
}

input[type=submit],input[type=reset]{
font-size:0.8em;
background-color:#4CAF50;
color:black;
padding:14px 40px;
margin:10px;
border:none;
display:inline-block;
border-radius:10px;
cursor:pointer;
}

input[type=submit]:hover,input[type=reset]:hover{
background-color:#45a049;
}

#form label {
padding:10px;
width:100px;	
display:inline-block;
}

#form{
	margin-right:auto;
	margin-left:auto;
text-align:center;
border-radius:20px;
font-size:1.5em;
background-color:#ffcc99;
padding:20px 100px;
}
</style>
	<body>
<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li><a href="index.html">ABOUT</a></li>
								<li><a href="index-1.html">INTERNATIONAL TOURS</a></li>
								<li class="current"><a href="index-2.html">ADMIN</a></li>
								<li><a href="game/game.html">GAME</a></li>
								<li><a href="index-4.html">CONTACTS</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="index.html">
							<img src="images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->
		<div class="content">
			<div class="container_12">
				<div class="grid_8">
				
						<fieldset style="margin-top:50px;">
<legend style="font-size:50px; color:black; line-height: normal;"><center>Login To MK Travels</center></legend>
<div id="form">
<form method="POST" action="admin/login.php">
<label for="username"> Username &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label> 
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
					<h3>Special offers</h3>
					<div class="block2">
						<img src="images/page3_img1.jpg" alt="" class="img_inner fleft">
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Barcelona</a></div>
							<p>Cras facilisis, nulla vel viverra auctor, leo gna sodales felis, quis malesuada nibh odio ut velit. Proin pharetra luctus diam, a celerisque eros convallis accumsan. </p>Maecenas vehicula egestas venenatis. Duis massa elit, auctor non pellentesque vel
							<br>
							<a href="#" class="link1">LEARN MORE</a>
						</div>
					</div>
					<div class="block2">
						<img src="images/page3_img2.jpg" alt="" class="img_inner fleft">
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Moscow</a></div>
							<p>Cras facilisis, nulla vel viverra auctor, leo gna sodales felis, quis malesuada nibh odio ut velit. Proin pharetra luctus diam, a celerisque eros convallis accumsan. </p>Maecenas vehicula egestas venenatis. Duis massa elit, auctor non pellentesque vel
							<br>
							<a href="#" class="link1">LEARN MORE</a>
						</div>
					</div>
					<div class="block2">
						<img src="images/page3_img3.jpg" alt="" class="img_inner fleft">
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Thailand</a></div>
							<p>Cras facilisis, nulla vel viverra auctor, leo gna sodales felis, quis malesuada nibh odio ut velit. Proin pharetra luctus diam, a celerisque eros convallis accumsan. </p>Maecenas vehicula egestas venenatis. Duis massa elit, auctor non pellentesque vel
							<br>
							<a href="#" class="link1">LEARN MORE</a>
						</div>
					</div>
				</div>
				<div class="grid_3 prefix_1">
					<h5>CHOOse the country</h5>
					<ul class="list">
						<li><a href="#">Albania</a></li>
						<li><a href="#">American Samoa</a></li>
						<li><a href="#">Antarctica</a></li>
						<li><a href="#">Argentina</a></li>
						<li><a href="#">Armenia</a></li>
						<li><a href="#">Australia</a></li>
						<li><a href="#">Austria</a></li>
						<li><a href="#">Bahrain</a></li>
						<li><a href="#">Barbados</a></li>
						<li><a href="#">Belgium</a></li>
						<li><a href="#">Belize</a></li>
						<li><a href="#">Bermudas</a></li>
					</ul>
					<a href="#" class="link1">VIEW A<span class="low">ll</span></a>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						MK Travels (c) 2014 | <a href="#">Privacy Policy</a> | Website and php designed and developed by Midhun Sushil. This Website is for Educational purpose only
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>