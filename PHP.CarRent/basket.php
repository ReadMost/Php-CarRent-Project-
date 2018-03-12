<?php
include "db.php";
session_start();
//$rrr = "SELECT id FROM users WHERE email = '$_SESSION['email']' " ;
//$result1 = $conn->query($rrr);
//$mail=$_SESSION['email'];
$user_id = $_SESSION['id'];
$sel = "SELECT cars.title, cars.price, cars.category, cars.id FROM ((Basket INNER JOIN users ON Basket.user_id = users.id) INNER JOIN cars ON Basket.car_id = cars.id ) WHERE users.id= '$user_id'";
$result = $conn->query($sel);
if($result->num_rows > 0){
  while ($row = $result->fetch_assoc()){
    //if($result1 == $row['id']){
echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <title>'.$_SESSION['email'].'</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/styleali.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body><!--navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="col-md-1 col-lg-1"></div>
    <div class="navbar-header">
      <a class="navbar-brand" href="../">CarRental</a>
    </div>
    <div class="col-md-2 col-lg-2"></div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../3/shop.php">Shop</a></li>
        <li class="active"><a href="../3/basket.php">Basket</a></li>
      <li>
        <form class="navbar-form navbar-left">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">';
      if($_SESSION['name'] == ""){
        echo '

          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        ';
      } else {
        echo '<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>logup</a></li>';
      }
    echo '
    <div class="col-md-1 col-lg-1"></div></ul>
  </div>
</nav>


<div class="container">
  <h2>Your Choice in Basket</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Car title</th>
        <th>Car price</th>
        <th>Car category</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>'.$row["title"].'</td>
        <td>'.$row["price"].'</td>
        <td>'.$row["category"].'</td>
      </tr>

    </tbody>
  </table>
</div>
<a href="../3/Buy.php?id='.$row['id'].'" onclick="ajax(\''.$row["id"].'\', \'buy'.$row["id"].'\', \'result'.$row["id"].'\')" class="btn btn-primary form-control">Buy</a>
</body>';
echo '<script>
function ajax(btn, form, res){
  $("#"+btn).click(function(){
    $.ajax({
      url:"../3/Buy.php?id='.$_GET['id'].'",
      type: "POST",
      data: jQuery("#"+form).serialize(),
      success: function(response) {
        document.getElementById(res).innerHTML = response;
        location.reload();
      },
      error: function(response) {
        document.getElementById(res).innerHTML = "Error try again";
      }
});
});
}
</script>';}}?>
