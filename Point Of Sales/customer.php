<?php
	require 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1, maximum-scale=1.0>
	<title>POS</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#CustomerModal">Add Customer</button></div>
			<div class="col-md-5"></div>
			<div class="col-md-2" style="text-align: right; font-size: 20px;">Search  </div>
			<div class="col-md-2"> <input type="text" name="cust_search" id="cust_search" class="form-control"></div>
			<div class="col-md-12"><br></div>
			<div class="col-md-1"></div>
			<div class="col-md-10">
			<div id='get_customers'></div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-9"></div>
			<div class="col-md-2" style="text-align: right;">
				<nav aria-label="Page navigation">
	
				  </ul>
				</nav>
			</div>
			<div class="col-md-1"></div>
			<div class="modal fade" id="CustomerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="CustomerModalLabel">Add Customer</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="custName">Name</label>
			        		<input type="text" name="custName" class="form-control" id="custName" placeholder="Name">
			        	</div>
			        	<div class="form-group">
			        		<label for="custPhone">Phone</label>
			        		<input type="text" name="custPhone" class="form-control" id="custPhone" placeholder="Phone">
			        	</div>
			        	<div class="form-group">
			        		<label for="custEmail">Email</label>
			        		<input type="email" name="custEmail" class="form-control" id="custEmail" placeholder="Email">
			        	</div>
			        	<div class="form-group">
			        		<label for="custDiscount">Discount</label>
			        		<input type="text" name="custDiscount" class="form-control" id="custDiscount" placeholder="Discount">
			        	</div>
			        	<button type="submit" class="btn btn-primary" id='custSubmit'>SUBMIT</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="modal fade" id="CustomerEditModal" tabindex="-1" role="dialog" aria-labelledby="CustomerEditModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="CustomerEditModalLabel">Edit Customer</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="custEditName">Name</label>
			        		<input type="text" name="custEditName" class="form-control" id="custEditName" placeholder="Name">
			        	</div>
			        	<div class="form-group">
			        		<label for="custEditPhone">Phone</label>
			        		<input type="text" name="custEditPhone" class="form-control" id="custEditPhone" placeholder="Phone">
			        	</div>
			        	<div class="form-group">
			        		<label for="custEditEmail">Email</label>
			        		<input type="email" name="custEditEmail" class="form-control" id="custEditEmail" placeholder="Email">
			        	</div>
			        	<div class="form-group">
			        		<label for="custEditDiscount">Discount</label>
			        		<input type="text" name="custEditDiscount" class="form-control" id="custEditDiscount" placeholder="Discount">
			        	</div>
			        	<button type="submit" class="btn btn-primary" id='custEditSubmit'>SUBMIT</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</body>
</html>