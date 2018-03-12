<?php 
	session_start();
	include "db.php";

	echo '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main page</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
		.bg{
			background: '.$row["path"].';
		}

	</style>
</head>
<body>
	<!--navigation-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	  	<div class="col-md-1 col-lg-1"></div>
	    <div class="navbar-header">
	      <a class="navbar-brand" href="../">CarRental</a>
	    </div>
	  	<div class="col-md-2 col-lg-2"></div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="../admin.php">Admin panel</a></li>
	      <li class="active"><a href="../shop.php">Shop</a></li>
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
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	      		<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	      	';
	      } else {
	      	echo '<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>logup</a></li>';
	      }
	    echo '
	  	<div class="col-md-1 col-lg-1"></div></ul>
	  </div>
	</nav>
	
<!-- main -->	
	<div class="fullwidth_container block">
		<div class="row">
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
			    <!-- Indicators -->
			    <ol class="carousel-indicators">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>
			      <li data-target="#myCarousel" data-slide-to="2"></li>
			    </ol>

			    <!-- Wrapper for slides -->
			    <div class="carousel-inner">

			      <div class="item active">
			        <img src="img/slider3.jpg" alt="slide1" style="max-width:100%;">
			        <div class="carousel-caption">
			          
			        </div>
			      </div>

			      <div class="item">
			        <img src="img/slider2.jpg" alt="slide2" style="max-width:100%;">
			        <div class="carousel-caption">
			         
			        </div>
			      </div>
			    
			      <div class="item">
			        <img src="img/slider1.jpg" alt="slide3" style="max-width:100%;">
			        <div class="carousel-caption">
			          
			        </div>
			      </div>
			  
			    </div>

			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left"></span>
			      <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right"></span>
			      <span class="sr-only">Next</span>
			    </a>
			  </div>
		</div>
	</div>
	<br>
<!-- about -->
	<div class="fullwidth_container container block">
		<div class="row">
			<h2 style="text-align:center;">
				About Us
			</h2>
			<p style="text-align:center;">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac ultrices lectus. Donec eget malesuada erat. Integer laoreet neque ullamcorper, porttitor ante id, tincidunt diam. Suspendisse facilisis leo vel lectus mollis faucibus. Duis tristique vehicula sapien et consectetur. Donec fermentum blandit massa, sed luctus dui fringilla vitae. Vestibulum vitae fermentum magna. Aenean ac sem blandit, volutpat eros vel, egestas libero. Praesent in sapien sit amet est posuere tincidunt. Aliquam risus leo, dictum eget diam sed, auctor malesuada purus.
			</p>
		</div>
	</div>
	<br>
<!-- cars -->
	<div class="fullwidth_container container block">
		<div class="row">';
			$sel = "SELECT * FROM cars";
			$result = $conn->query($sel);
			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					echo '
					<div class="col-lg-4 col-md-4">
						<h3>'.$row["title"].'</h3>
						<h3>'.$row["price"].'$</h3>
						<h4>'.$row["descShort"].'</h4>	
					</div>';
				}
			}
		echo '</div>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>';
?>