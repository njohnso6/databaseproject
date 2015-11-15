<?php
#Include the connect.php file

# FileName="connect.php"
$hostname = "localhost";
$database = "employees";
$username = "root";
$password = "root";

// Connect to the database
$mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
// get data and store in a json array
$from = 0;
$to = 30;


$query = "SELECT CompanyName, ContactName, ContactTitle, Address, City FROM employees ";
$query=$query."WHERE CompanyName='".$_GET['CompanyName']. "'";
$query=$query." LIMIT ?,?";

$result = $mysqli->prepare($query);
$result->bind_param('ii', $from, $to);
$result->execute();
/* bind result variables */
$result->bind_result($CompanyName, $ContactName, $ContactTitle, $Address, $City);
/* fetch values */
while ($result->fetch())
	{
	$employees[] = array(
		'CompanyName' => $CompanyName,
		'ContactName' => $ContactName,
		'ContactTitle' => $ContactTitle,
		'Address' => $Address,
		'City' => $City
	);
	}
echo json_encode($employees);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>