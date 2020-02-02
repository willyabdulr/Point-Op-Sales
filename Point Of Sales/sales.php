<?php
	require 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width', initial-scale=1, maximum-scale=1.0>
	<title>POS</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'/>
    <link rel='stylesheet' href='css/style.css'/>
		<script src='js/jquery2.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='main.js'></script>
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-8'></div>
			<div class='col-md-2' style='text-align: right; font-size: 20px;'>Search  </div>
			<div class='col-md-2'> <input type='text' name='sales_search' id='sales_search' class='form-control'></div>
			<div class='col-md-12'><br></div>
			<div class='col-md-1'></div>
			<div class='col-md-10'>
			<div id='get_sales'></div>
			</div>
			<div class='col-md-1'></div>
			<div class='col-md-9'></div>
			<div class='col-md-2' style='text-align: right;'>
				<nav aria-label='Page navigation'>
				  <ul class='pagination' id='sales_page'>
				  </ul>
				</nav>
			</div>
			<div class='col-md-1'></div>

		</div>
	</div>
</body>
</html>