<?php
session_start();
include "db.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$sql="INSERT INTO Basket(car_id, user_id) VALUE('$id', '$user_id')";
$reuslt = $conn->query($sql);
if( $conn->query($sql) === TRUE){
  header("refresh: 1; url=../3/shop.php");
  echo 'Your order was added in Basket motherfucker';
}
else{
  echo "ERROR: ".$sql."<br>".$conn->error;
}
 ?>
