<?php
	if(isset($_POST['login'])){
 
		session_start();
		include('conn.php');
 
		$username=$_POST['username'];
		$password=$_POST['password'];
 
		$query=mysqli_query($conn,"select * from `user` where username='$username' && password='$password'");
 
		if (mysqli_num_rows($query) == 0){
			$_SESSION['message']="Login Failed. User not Found!";
			header('location:../index-2.php');
		}
		else{
			$row=mysqli_fetch_array($query);
 
			if (isset($_POST['remember'])){
				//set up cookie
				setcookie("user", $row['username'], time() + (86400 * 30)); 
				setcookie("pass", $row['password'], time() + (86400 * 30)); 
			}
 
			$_SESSION['id']=$row['userid'];
			header('location:adminPage.php');
		}
	}
	else{
		header('location:../index-2.php');
		$_SESSION['message']="Please Login!";
	}
?>