<?php
	$username = "root";
	$password = "mypass123";
	$localhost= "localhost";
	$DB = "accounts";

	$conn = new mysqli($localhost, $username, $password, $DB);

	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
?>
