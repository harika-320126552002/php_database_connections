<?php
$servername = "localhost";
$username = "root";
$password = "root";
$conn = new mysqli($servername,
			$username, $password);
if ($conn->connect_error) {
	die("Connection failure: "
		. $conn->connect_error);
}
$sql = "CREATE DATABASE demo1";
if ($conn->query($sql) === TRUE) {
	echo "Database with name demo1 created";
} else {
	echo "Error: " . $conn->error;
}
$conn->close();
?>
