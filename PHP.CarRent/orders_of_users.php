<?php
session_start();
$price = $_POST['price'];
$tel_number = $_SESSION['tel_number'];
$car_title = $_POST['car_title'];
$surname = $_SESSION['surname'];
$username = $_SESSION['user_name'];
 $connection = mysqli_connect('$localhost', 'root' , 'mypass123', 'accounts');
if ($connection->mysqli_connect_error)
{
  echo "Not connected";
  exit();
}
mysqli_query ($connection , "INSERT INTO `Order`(`user_name`, `tel_number`, `car_title`, `surname`, `price`) VALUES ('$username', '$tel_number', '$car_title', '$surname',$price)");
?>
