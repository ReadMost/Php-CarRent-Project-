<?php
	include "db.php";
$title = $_POST['title'];
$description = $_POST['description'];
$descShort = $_POST['descShort'];
$price = $_POST['price'];
$category = $_POST['category'];

$sql = "INSERT INTO cars (title, descShort, description, price, category) VALUES ('$title', '$descShort', '$description', '$price', '$category')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>