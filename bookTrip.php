<?php
// define variables and set to empty values
	$Name = $Country = $Email = $Hotel = $From = $To = $onwardDate = $returnDate = $Bus = $Adults = $Children = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Name = test_input($_REQUEST["name"]);
		$Country = test_input($_REQUEST["country"]);
		$Email = test_input($_REQUEST["email"]);
		$Hotel = test_input($_REQUEST["hotel"]);
		$From = test_input($_REQUEST["from"]);
		$To = test_input($_REQUEST["to"]);
		$onwardDate = test_input($_REQUEST["onwardDate"]);
		$returnDate = test_input($_REQUEST["returnDate"]);
		$Bus = test_input($_REQUEST["bus"]);
		$Adults = test_input($_REQUEST["adults"]);
		$Children = test_input($_REQUEST["children"]);
	}
	//echo"submit clicked";
	//echo"form values: ".$Name.$Country.$Email.$Hotel.$From.$To.$onwardDate.$returnDate.$Bus.$Adults.$Children;
	if(insert()==1) {
		echo "1";
		exit;
	}
	else {
		echo "Retry";
		exit;
	}

function insert() {
	global $Name, $Country , $Email , $Hotel , $From , $To , $onwardDate , $returnDate , $Bus , $Adults , $Children ;
	$servername = "localhost";
	$uname = "root";
	$passwd = "";
	$dbname = "mk_travel";
	// Create connection
	$conn = mysqli_connect($servername, $uname, $passwd, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "INSERT INTO bookings(name, country, email, hotel, from_city, to_city, onwardDate, returnDate, bus, adults, children) VALUES ('$Name','$Country','$Email','$Hotel','$From','$To','$onwardDate','$returnDate','$Bus',$Adults,$Children)";
	if (mysqli_query($conn, $sql)) {
		return 1;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>