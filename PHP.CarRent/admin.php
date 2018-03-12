<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin panel</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/styleali.css" rel="stylesheet">

	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<style>
		input {
			height: 45px;
			width: 50%;
		}
		body{
			text-decoration: none;
		}
		#section3 li , #section2 li {
			list-style-type: none;
			font-size: 1.5em;
			vertical-align: middle;
			margin-top: 6px;

		}
	</style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="0">

	<!-- navigation -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="../">CarRental</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="../3/admin.php">Admin panel</a></li>
				<li><a href="../3/orders.php">Orders</a></li>
				<li class="active"><a href="../3/shop.php">Shop</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
				if($_SESSION['name'] == ""){
					echo '

					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					';
				} else {
					echo '<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>logup</a></li>';
				}

				?>
			</ul>
		</div>
	</nav>


	<!-- body -->
	<div class="container">
		<div class="row">
			<nav class="col-sm-3" id="myScrollspy">
				<ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="-10">
					<li><a href="#section1">Add new item</a></li>
					<li><a href="#section2">Edit</a></li>
					<li><a href="#section3">Delete</a></li>
				</ul>
			</nav>
			<div class="fullwidth_container container block" >
				<div class="row">
					<div class="col-md-9 col-lg-9"  id="section1" style="padding: 50px;">
						<form enctype="multipart/form-data" action="addNewItem.php" id="form1" method="POST">
							<div class="form-group">
								<select name="title" id="title" class="form-control">
									<option disabled selected value>Select mark of a car</option>
									<option disabled>Sweden</option>
									<option value="SAAB">SAAB</option>
									<option value="Volvo">Volvo</option>
									<option disabled>Great Britain</option>
									<option value="Jaguar">Jaguar</option>
									<option value="Land Rover">Land Rover</option>
									<option value="Mini">Mini</option>
									<option value="Rolls-Royce">Rolls-Royce</option>
									<option disabled>Germany</option>
									<option value="Audi">Audi</option>
									<option value="BMW">BMW</option>
									<option value="Mercedes">Mercedes</option>
									<option value="Opel">Opel</option>
									<option value="Porshe">Porshe</option>
									<option value="Volkswagen">Volkswagen</option>
									<option disabled>Italy</option>
									<option value="Fiat">Fiat</option>
									<option value="Ferrari">Ferrari</option>
									<option disabled>USA</option>
									<option value="Dodge">Dodge</option>
									<option value="Ford">Ford</option>
									<option disabled>France</option>
									<option value="Citroen">Citroen</option>
									<option value="Peugeot">Peugeot</option>
									<option value="Renault">Renault</option>
									<option disabled>Czech Republic</option>
									<option value="Skoda">Skoda</option>
									<option disabled>South Korea</option>
									<option value="Hyundai">Hyundai</option>
									<option value="Kia">Kia</option>
									<option disabled>Japan</option>
									<option value="Infiniti">Infiniti</option>
									<option value="Lexus">Lexus</option>
									<option value="Mazda">Mazda</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Subaru">Subaru</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Toyota">Toyota</option>
								</select>
							</div>
							<div class="form-group">
								<input name="descShort" placeholder="Short Description" maxlength="170" class="form-control">
								<p style="color: white"> Maxlength = 170</p>
							</div>
							<div class="form-group">
								<textarea name="description" placeholder="Description" rows="5" cols="52" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<input type="price" name="price" placeholder="Price - $" class="form-control">
							</div>
							<div class="form-group">
								<label for="category">Categories</label>
								<select name="category" id="category" class="form-control">
									<option value="sedan">
										Sedan
									</option>
									<option value="limousine">
										Limousine
									</option>
									<option value="coupe">
										Coupe
									</option>
									<option value="wagon">
										Wagon
									</option>
									<option value="hatchback">
										Hatchback
									</option>
									<option value="van">
										Van
									</option>
									<option value="cabriolet">
										Cabriolet
									</option>
									<option value="phaeton">
										Phaeton
									</option>
									<option value="minivan">
										Minivan
									</option>
									<option value="pickup">
										Pickup
									</option>
								</select>
							</div>
							<input type="file" value="" name="file">
							<div class="form-group">
								<input type="button" value="Submit" id="submit" class="btn btn-primary">
							</div>
						</form>
						<div id="result"></div>
					</div>
				</div>
			</div>
			<div class="fullwidth_container container block" >
				<div class="row">
					<div class="col-md-3 col-lg-3"></div>
					<div class="col-md-9 col-lg-9"  id="section2" style="padding: 50px;">
						<ul>
							<?php
							$sel = "SELECT * FROM cars";
							$result = $conn->query($sel);
							if($result->num_rows > 0){
								while ($row = $result->fetch_assoc()) {
									echo '<li><div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" href="#col'.$row['id'].'">'.$row['title'].' '.$row["category"].'</a>
											</h4>
										</div>
										<div id="col'.$row['id'].'" class="panel-collapse collapse">
											<form action="editItem.php" id="form'.$row['id'].'" method="POST">
												<div class="panel-body">
													<input type="hidden" name="id" value="'.$row['id'].'">
													<div class="form-group">
														<select name="title" id="title" class="form-control">
															<option disabled selected value>Select mark of a car</option>
															<option disabled>Sweden</option>
															<option value="SAAB">SAAB</option>
															<option value="Volvo">Volvo</option>
															<option disabled>Great Britain</option>
															<option value="Jaguar">Jaguar</option>
															<option value="Land Rover">Land Rover</option>
															<option value="Mini">Mini</option>
															<option value="Rolls-Royce">Rolls-Royce</option>
															<option disabled>Germany</option>
															<option value="Audi">Audi</option>
															<option value="BMW">BMW</option>
															<option value="Mercedes">Mercedes</option>
															<option value="Opel">Opel</option>
															<option value="Porshe">Porshe</option>
															<option value="Volkswagen">Volkswagen</option>
															<option disabled>Italy</option>
															<option value="Fiat">Fiat</option>
															<option value="Ferrari">Ferrari</option>
															<option disabled>USA</option>
															<option value="Dodge">Dodge</option>
															<option value="Ford">Ford</option>
															<option disabled>France</option>
															<option value="Citroen">Citroen</option>
															<option value="Peugeot">Peugeot</option>
															<option value="Renault">Renault</option>
															<option disabled>Czech Republic</option>
															<option value="Skoda">Skoda</option>
															<option disabled>South Korea</option>
															<option value="Hyundai">Hyundai</option>
															<option value="Kia">Kia</option>
															<option disabled>Japan</option>
															<option value="Infiniti">Infiniti</option>
															<option value="Lexus">Lexus</option>
															<option value="Mazda">Mazda</option>
															<option value="Mitsubishi">Mitsubishi</option>
															<option value="Nissan">Nissan</option>
															<option value="Subaru">Subaru</option>
															<option value="Suzuki">Suzuki</option>
															<option value="Toyota">Toyota</option>
														</select>
													</div>
													<div class="form-group">
														<input name="descShort" class="form-control" value="'.$row['descShort'].'">
														<p style="color: white" >Maxlength = 170</p>
													</div>
													<div class="form-group">
														<textarea class="form-control" name="description"rows="5" cols="52">'.$row['description'].'</textarea>
													</div>
													<div class="form-group">
														<input type="price" name="price" value="'.$row['price'].'" class="form-control"><p style="color: white">$</p>
													</div>
													<div class="form-group">
														<label for="category">Categories</label>
														<select name="category" id="category" class="form-control">
															<option value="sedan">
																Sedan
															</option>
															<option value="limousine">
																Limousine
															</option>
															<option value="coupe">
																Coupe
															</option>
															<option value="wagon">
																Wagon
															</option>
															<option value="hatchback">
																Hatchback
															</option>
															<option value="van">
																Van
															</option>
															<option value="cabriolet">
																Cabriolet
															</option>
															<option value="phaeton">
																Phaeton
															</option>
															<option value="minivan">
																Minivan
															</option>
															<option value="pickup">
																Pickup
															</option>
														</select>
													</div>
												</div>
												<div class="panel-footer">
													<div class="form-group">
														<input type="button" value="Submit" id="'.$row['id'].'" onclick="edit(\''.$row['id'].'\', \'form'.$row['id'].'\', \'result'.$row['id'].'\')" class="btn btn-primary">
													</div>
													<div id="result'.$row['id'].'"></div>
												</div>
											</form>
										</div>
									</div>
								</div></li>';
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>


		<div class="fullwidth_container container block" >
			<div class="row">
				<div class="col-md-3 col-lg-3"></div>
				<div class="col-md-9 col-lg-9"  id="section3" style="padding: 50px;">
					<div class="panel panel-default">
						<ul>
							<?php
							$sel = "SELECT * FROM cars";
							$result = $conn->query($sel);
							if($result->num_rows > 0){
								while ($row = $result->fetch_assoc()) {
									echo '<li><div class="panel-body"><form action="del.php" id="form1'.$row['id'].'" method="POST">  '.$row["title"].'<i class="glyphicon glyphicon-remove" id="del'.$row["id"].'" onclick="del(\'del'.$row['id'].'\', \'form1'.$row['id'].'\', \'result1'.$row['id'].'\')"></i><input type="hidden" value="'.$row['id'].'" name="id"><div id="result1'.$row['id'].'"></div></form></div></li>';
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<script type="text/javascript">
	$("#submit").click(function(){
		$.ajax({
			url:'addNewItem.php',
			type: "POST",
			data: jQuery("#form1").serialize(),
			success: function(response) {
				document.getElementById('result').innerHTML = response;
				location.reload();
			},
			error: function(response) {
				document.getElementById('result').innerHTML = "Error try again";
			}

		});
	});
</script>
<script type="text/javascript">
	function edit(id, form_id, res_id){
		$('#'+id).click(function(){
			$.ajax({
				url:"editItem.php",
				type: "POST",
				data: jQuery('#'+form_id).serialize(),
				success: function(response) {
					document.getElementById(res_id).innerHTML = response;
					location.reload();
				},
				error: function(response) {
					document.getElementById(res_id).innerHTML = "Error try again";
				}

			});
		});
	}
</script>
<script type="text/javascript">
	function del(i, f_id, r_id){
		$('#'+i).click(function(){
			$.ajax({
				url:"del.php",
				type: "POST",
				data: jQuery('#'+f_id).serialize(),
				success: function(response) {
					document.getElementById(r_id).innerHTML = response;
					location.reload();
				},
				error: function(response) {
					document.getElementById(r_id).innerHTML = "Error try again";
				}

			});
		});
	}
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
