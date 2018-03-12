<?php
	session_start();
	include "db.php";

	echo '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shop</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/styleali.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<!-- cars -->
	<div class="fullwidth_container container block">
		<div class="row">';
			$sel = "SELECT * FROM cars";
			$result = $conn->query($sel);
			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					if($row["img"]==""){
						$img = "../3/img/icon.jpg";
					}
					else {
						$img = $row["img"];
					}


					echo '
					<div class="row">
						<form method="POST" action="" id="buy'.$row["id"].'">
								<div class="col-lg-6 col-md-6">
									<div class="col-lg-6 col-md-6">
										<h3>'.$row["title"].'</h3>
										<h3>'.$row["price"].'$</h3>
										<h4>'.$row["category"].'</h4>
										<a data-toggle="modal" data-target="#myModal'.$row["id"].'"> Read more</a>
										<br>
										<a href="../3/Buy.php?id='.$row['id'].'" onclick="ajax(\''.$row["id"].'\', \'buy'.$row["id"].'\', \'result'.$row["id"].'\')" class="btn btn-primary form-control">Buy</a>
										<a href="../3/Add.php?id='.$row['id'].'" onclick="ajax1(\''.$row["id"].'\', \'buy'.$row["id"].'\', \'result'.$row["id"].'\')" class="btn btn-primary form-control"  name="action1" id="'.$row["id"].'"  class="btn btn-primary form-control">Add</a>
									</div>
									<div class="col-md-6 col-lg-6">
										<img src="'.$img.'" alt="img" class="img-responsive">
									</div>
									<div id="result'.$row["id"].'"></div>
								</div>
						</form>

					</div><hr>';

					if (isset($_POST['action1'])) {
						$_SESSION['orderid'] = $row['id'];
					}

			}

			}




		echo '</div>
	</div>';
	$sel = "SELECT * FROM cars";
	$result = $conn->query($sel);
	if($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
	echo '
	<!-- Modal -->

	  <div class="modal fade" id="myModal'.$row["id"].'" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">'.$row["title"].'</h4>
	        </div>
	        <div class="modal-body">
	         	<h3>'.$row["title"].'</h3>
				<h3>Price:'.$row["price"].'$</h3>
				<h4><b>Description:</b> '.$row["description"].'</h4>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>

	    </div>
	  </div>
	  ';
		}
	}
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
</script>
				<script>
				function ajax1(btn1, form1, res1){
					$("#"+btn1).click(function(){
						$.ajax({
							url:"../3/Add.php?id='.$_GET['id'].'",
							type: "POST",
							data: jQuery("#"+form1).serialize(),
							success: function(response) {
								document.getElementById(res1).innerHTML = response;
								location.reload();
							},
							error: function(response) {
								document.getElementById(res1).innerHTML = "Error try again";
							}
			});
		});
}


	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>';
?>
