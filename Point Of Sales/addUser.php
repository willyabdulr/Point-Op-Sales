<?php
	require 'auth.php';

	if($_SESSION['role'] != 'admin'){
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width', initial-scale=1, maximum-scale=1.0>
	<title>POS</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'/>
    <link rel='stylesheet' href='css/style.css'/>
    <link rel='stylesheet' type='text/css' href='css/mdb.min.css'>
		<script src='js/jquery2.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script type='text/javascript' src='js/mdb.min.js'></script>
		<script src='main.js'></script>
</head>
<body>
	<?php include 'navbar.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row" style="background-color: #0D47A1; box-shadow: 10px 10px 5px #000000;">
					<div class="col-md-12">
						<center><h1>ADD USER</h1></center>
					</div>
					<div class="col-md-12"><br></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" name="Name" id="Name" class="form-control" placeholder="Enter Name" style="color: #dedee0; font-family: sans-serif;">
						</div>
					</div>
					<div class="col-md-12"><br></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="userName">UserName</label>
							<input type="text" name="userName" id="userName" class="form-control" placeholder="Enter UserName" style="color: #dedee0; font-family: sans-serif;">
						</div>
					</div>
					<div class="col-md-12"><br></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="Password">Password</label>
							<input type="password" name="Password" id="Password" class="form-control" placeholder="Enter Password" style="color: #dedee0; font-family: sans-serif;">
						</div>
					</div>
					<div class="col-md-12"><br></div>
					<div class="col-md-12">
						<div class="form-group">
							<select class="form-control" style="color: #dedee0; font-family: sans-serif; background-color: #0D47A1;" id="Role">
							  <option value="admin">Administrator</option>
							  <option value="cashier">Cashier</option>
							</select>
						</div>
					</div>
					<div class="col-md-12"><br></div>
					<div class="col-md-12" style="text-align: center;">
						<button class="btn btn-danger btn-lg" id="addUser">ADD</button>
					</div>
					<div class="col-md-12"><br></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-12"><br></div>
			<div class="col-md-12"><br></div>
		</div>
	</div>
</body>
</html>