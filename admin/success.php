 <?php
	session_start();
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('index.php');
		exit();
	}
	include('conn.php');
	$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
	$row=mysqli_fetch_assoc($query);
?>

<style>
	input {
	text-align:center;
	padding:6px;
	display:inline-block;
	border: 1.5px solid orange;
	border-radius:4px;
	box-sizing:border-box;
	width:500px;
	font-size:1em;
}

	select {
	text-align:center;
	padding:6px;
	display:inline-block;
	border: 1.5px solid blue;
	border-radius:4px;
	box-sizing:border-box;
	font-size:1em;
}

#logout {
	position: absolute;
	text-align:right;
	top: 0px;
	right: 10px;
	padding:10px;
	padding-top : 0px;
	width: 400px;
	height: 100px;
}

#search {
  position: relative;
  height:100px;
} 

button{

background-color:#4CAF50;
color:white;
padding:7px;
border:none;
border-radius:4px;
font-size:1em;
cursor:pointer;
}

h3 {
	font-family:roboto_condensedbold;
	font-size:2em;
	margin:14px;
	margin-top:-5px;
}

</style>


<!DOCTYPE html>
<html>
<head>
	<title>E-COMMERCE STORE</title>
	<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
</head>

<body>
	
	<div id="header">
	<img src="silkroad.jpg">
	<h1>THE SILK ROAD - DARKWEB STORE</h1>
	</div>

	<div id="search" >
	<form action="/action_page.php" style="margin:40px;">
	<select name="All" >
	<option value="All Categories">All categories</option>
	<option value="Apps&Games">Apps & Games </option>
	<option value="Beauty">Beauty</option>
	<option value="Books">Books</option>
	<option value="Clothing&Accessories">Clothing & Accessories </option>
	<option value="Computer&Accessories">Computer & Accessories </option>
	<option value="Electronics">Electronics</option>
	<option value="Furnitures">Furnitures</option>
	</select>
	<input type="text" placeholder="What are you looking for..." style="margin-left:30px;">
	<button style="margin-left:30px;">SEARCH</button>
	</form>
	
	<div id="logout" >
	<h3>Welcome <?php echo $row["fullname"]; ?> </h3>
	<a href="logout.php"><button onclick="logout.php">Log out</button></a>
	<a href="https://www.amazon.in/gp/cart/view.html?ref_=nav_cart"> 
		<img src="2.png"style="width:45px;height:45px; margin-left:10px; float:right;">
	</a>
	</div>
	</div>
	
	<br>
	
	<iframe style="margin-left:1%;margin-top:1%;"  src="http://www.alibaba.com/" height="400" width="1300"></iframe> <br>
	
	<a href="https://www.amazon.in/b?node=16382860031&pf_rd_p=fa25496c-7d42-4f20-a958-cce32020b23e&pf_rd_r=S2X1Y5XT77W2SZX2N3BV">
		<img src="26.png"style="width:200;height:400;margin-left:2%;margin-top:6%;">
	</a> <br>
	
	<a href="https://www.amazon.in/Low-Price-With-Free-Shipping/bbp?pf_rd_p=7ae8bb23-c2d2-4277-a4e5-a651d0266ae5&pf_rd_r=S2X1Y5XT77W2SZX2N3BV">
		<img src="3.png"style="width:200;height:400;margin-left:23%;margin-top:-30%;">
	</a> <br>
	
	<a href="https://www.amazon.in/hfc/mobileRecharge?ref_=apay_pc_qc_rech">
		<img src="56.png"style="width:200;height:400;margin-left:46%;margin-top:-30%;">
	</a> <br>
	
	<a href="https://www.amazon.in/s?bbn=1380365031&rh=n%3A976442031%2Cn%3A%21976443031%2Cn%3A1380263031%2Cn%3A1380365031%2Cp_85%3A10440599031&pf_rd_p=b1d1e129-bf21-4fdd-af07-12aa1b78af02&pf_rd_r=S2X1Y5XT77W2SZX2N3BV">
		<img src="6.png"style="width:200;height:400;margin-left:67%;margin-top:-30%;">
	</a><br>
	
	
</body>
</html>