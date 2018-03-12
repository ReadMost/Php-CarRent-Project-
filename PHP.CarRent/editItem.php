<?php
	include "db.php";
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$descShort = $_POST['descShort'];
$price = $_POST['price'];
$category = $_POST['category'];
	$sql = "UPDATE cars SET title = '$title', description = '$description', descShort = '$descShort', price = '$price', category = '$category' WHERE id = '$id'";
	if ($conn->query($sql) === TRUE) {
    	echo "New record edited successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>