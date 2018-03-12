<?php
	include "db.php";
	$id = $_POST['id'];
	$sql = "DELETE FROM cars WHERE id = '$id'";
	if ($conn->query($sql) === TRUE) {
    	echo "Record deleted successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>