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

	<div class='container-fluid'>
		<div class='row'>

			<!--Number of Customer-->
			<div class='col-md-4' style='text-align: center;'>
				<div class='row'>
					<div class='col-md-1'></div>
					<div class='col-md-10'>
						<div class='panel panel-default' style='border: none;'>
						  <div class='panel-body' style='background-color: #009688; box-shadow: 10px 10px 5px #000000;'>
						    <div class='row'>
						    	<div class='col-md-4'><span class='glyphicon glyphicon-user' style='font-size: 50px; padding: 15px 5px;'></span></div>
						    	<div class='col-md-8' style='text-align: left; border-left: solid #E0F2F1; ' id='cust_total'>
						    		<!--<p style='font-size: 40px;'>
						    		4 
						    		</p>
						    		Customers-->
						    	</div>
						    </div>
						  </div>
						</div>
					</div>
					<div class='col-md-1'></div>
				</div>
			</div>

			<!--Number of Products-->
			<div class='col-md-4' style='text-align: center;'>
				<div class='row'>
					<div class='col-md-1'></div>
					<div class='col-md-10'>
						<div class='panel panel-default' style='border: none;'>
						  <div class='panel-body' style='background-color: #F4511E; box-shadow: 10px 10px 5px #000000;'>
						    <div class='row'>
						    	<div class='col-md-4'><span class='glyphicon glyphicon-briefcase' style='font-size: 50px; padding: 15px 5px;'></span></div>
						    	<div class='col-md-8' style='text-align: left; border-left: solid #FBE9E7; ' id='pro_total'>
						    		<!--<p style='font-size: 40px;'>
						    		20 
						    		</p>
						    		Products-->
						    	</div>
						    </div>
						  </div>
						</div>
					</div>
					<div class='col-md-1'></div>
				</div>
			</div>

			<!--Total Sales-->
			<div class='col-md-4' style='text-align: center;'>
				<div class='row'>
					<div class='col-md-1'></div>
					<div class='col-md-10'>
						<div class='panel panel-default' style='border: none;'>
						  <div class='panel-body' style='background-color: #1E88E5; box-shadow: 10px 10px 5px #000000;'>
						    <div class='row'>
						    	<div class='col-md-4'><span class='glyphicon glyphicon-usd' style='font-size: 50px; padding: 15px 5px;'></span></div>
						    	<div class='col-md-8' style='text-align: left; border-left: solid #E0F2F1; ' id='sale_total'>
						    		<!--<p style='font-size: 40px;'>
						    		10000 INR 
						    		</p>
						    		Today's Sale-->
						    	</div>
						    </div>
						  </div>
						</div>
					</div>
					<div class='col-md-1'></div>
				</div>
			</div>

			<div class='col-md-12'><br></div>

			<div class='col-md-1'></div>
			<!--Line Chart-->
			<div class='col-md-10'>
				<div class='row'>
					<div class='col-md-1'></div>
					<div class='col-md-10'>
						<div class='panel panel-default' style='border: none;'>
							<div class='panel-body' style='background-color: #141f30; box-shadow: 10px 10px 5px #000000; border: solid #000000; border-width: 1px; '>
								<center><b style='font-size: 20px;'>monthly stats</b></center><br>
								<canvas id='lineChart'></canvas>
							</div>
						</div>
					</div>
					<div class='col-md-1'></div>
				</div>
			</div>

			<div class='col-md-1'></div>

		</div>
	</div>

	<script type='text/javascript'>
		$(function () {

				//Line Chart
			    var data = {
				    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', "August", "Sept", "Oct", "Nov", "Dec"],
				    datasets: [
				        {
				            label: 'My First dataset',
				            fillColor: 'rgba(220,220,220,0.2)',
				            strokeColor: 'rgba(220,220,220,1)',
				            pointColor: 'rgba(220,220,220,1)',
				            pointStrokeColor: '#fff',
				            pointHighlightFill: '#fff',
				            pointHighlightStroke: 'rgba(220,220,220,1)',
				            data: [65, 59, 80, 81, 56, 55, 40, 0, 0, 0, 0, 0]
				        }
				        ]
				    };

		    var option = {
						    responsive: true,
						    
						    };	

		    // Get the context of the canvas element we want to select
		    var ctx = document.getElementById('lineChart').getContext('2d');
		    var myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.
		});
	</script>
</body>
</html>