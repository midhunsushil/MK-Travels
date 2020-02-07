<!DOCTYPE HTML>  
<html>
<head>
</head>
<style>
td,th {
	padding:10px;
	font-family:"Segoe UI";
	text-align: center;
	color:black;
	border:4px solid white;
	//background-color:#b2cecf;
}

tr:hover {background-color: #83b0b2;}

th {
	background:#88B04B;
}
tr {
	background:#b2cecf;
} 

#table {
	margin-left:auto;
	margin-right:auto;
	width:500px;
	text-align:center;
	border-collapse: collapse;
}
#form {
	font-family:"Segoe UI";
	font-weight: bold;
}

input {
  width: 300px;
  padding:5px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
}

.id {
	width:5em; 
}

#deleteButton {
	background-color: red;
}

button {
	width: 80px;
	background-color: #4CAF50;
	color: white;
	font-weight:bold;
	padding: 7px 6px;
	margin: 3px 0;
	border: none;
	border-radius: 4px;
	cursor: point;
}
</style>
<body> 
<h1 align="center" style="font-family:'Britannic'; color:blue;">Booking Information</h1>
<?php
$username = "root";
$password = "";
$dbname = "test";


//TABLE OUTPUT
// Create connection
include('conn.php');

$sql = "SELECT * FROM bookings order by id"; //query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	
	echo "<table id=\"table\">
	<tr id='tableHead'>
		<th>ID</th>
		<th>Name</th>
		<th>Country</th>
		<th>Email</th>
		<th>Hotel</th>
		<th>From</th>
		<th>To</th>
		<th>Onward Date</th>
		<th>Return Date</th>
		<th>Bus</th>
		<th>Adults</th>
		<th>Children</th>
	</tr>";
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
			<td>".$row["id"]."</td>
			<td>".$row["name"]."</td>
			<td>".$row["country"]."</td>
			<td>".$row["email"]."</td>
			<td>".$row["hotel"]."</td>
			<td>".$row["from_city"]."</td>
			<td>".$row["to_city"]."</td>
			<td>".$row["onwardDate"]."</td>
			<td>".$row["returnDate"]."</td>
			<td>".$row["bus"]."</td>
			<td>".$row["adults"]."</td>
			<td>".$row["children"]."</td>
		</tr>";
    }
	echo "</table><br>";
} 
else echo "0 results";

mysqli_close($conn);
// END OF TABLE

// FOR DELETION
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['submit'])) {
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = test_input($_POST["id"]);
	}
	echo"submit clicked";
	echo"form values: ".$id;
	
	if(deleteRecord($id)==1) {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$file = "adminPage.php";
		header("Location: http://$host$uri/$file");
		exit;
	}
	else {
		echo "Retry";
	}
}

if (isset($_POST['update'])) {
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = test_input($_POST["updateId"]);
		$email = test_input($_POST["updateEmail"]);
	}
	echo"submit clicked";
	echo"form values: ".$id.$email;
	
	if(updateRecord($id,$email)==1) {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$file = "adminPage.php";
		header("Location: http://$host$uri/$file");
		exit;
	}
	else {
		echo "Retry";
	}
}

if (isset($_POST['return'])) {
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$file = "logout.php";
	header("Location: http://$host$uri/$file");
	exit;
}

function updateRecord($id,$email) {
	global $dbname;
	// Create connection
	include('conn.php');
	
	//PDO START
	try {
    $conn = new PDO("mysql:host='localhost';dbname='mk_travel'", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	//PDO END

	$sql = "UPDATE bookings SET email='$email' WHERE id=$id";

	if (mysqli_query($conn, $sql)) {
		return 1;
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
}

function deleteRecord($id) {
global $dbname;

// Create connection
include('conn.php');

// sql to delete a record
$sql = "DELETE FROM bookings WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    return 1;
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}

?>

<form method="post" id="form">
Click Here -->
<button id="backButton" name="return">LOGOUT</button>
to logout from admin page<br><br>
  Enter ID to Delete:
  <input class="id" type="number" name="id" autofocus/>
  <button id="deleteButton" name="submit">DELETE</button><br><br>

Enter Id to UPDATE email:
<input class="id" type="number" name="updateId" autofocus/><br>
Enter new email:
<input class="input" type="email" name="updateEmail" autofocus/>
<button id="updateButton" name="update">UPDATE</button><br>
</form>

</body>
</html>