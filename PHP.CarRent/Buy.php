<?php
session_start();
include "db.php";
$user_id=$_SESSION['id'];
$id= $_GET['id'];

//$sql="INSERT INTO Order (SELECT users.first_name, cars.car_title, users.last_name, cars.price, users.id, cars.id FROM (Order INNER JOIN users ON Order.user_id = users.id) INNER JOIN cars ON Order.car_id = cars.id ) (user_name, car_title, surname, price, user_id, car_id) VALUES ('$first_name' , '$car_title', '$last_name', '$price', '$id, cars.id)"
$sql = "INSERT INTO accounts.Order(user_name, car_title, surname, price, user_id, car_id) SELECT u.first_name, c.title, u.last_name, c.price, u.id, c.id FROM users u, cars c WHERE u.id='$user_id' and c.id='$id' ";
//$result1 = $mysqli->query("INSERT INTO Order(car_title, price, car_id)
//SELECT title, price, id FROM cars WHERE id='$_SESSION['orderid']' ");
$result=$conn->query($sql);


if( $conn->query($sql) === TRUE){
  header("refresh: 1; url=../3/shop.php");
  echo 'Your order was bought  motherfucker';
}
else{
  echo "ERROR: ".$result."<br>".$conn->error;
}
 ?>
