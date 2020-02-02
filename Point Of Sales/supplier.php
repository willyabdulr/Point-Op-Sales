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

			<!--Search Bar and Add Button-->
			<div class="col-md-1"></div>
			<div class="col-md-2"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#SupplierModal">Add Supplier</button></div>
			<div class="col-md-5"></div>
			<div class="col-md-2" style="text-align: right; font-size: 20px;">Search  </div>
			<div class="col-md-2"> <input type="text" name="sup_search" class="form-control" id="sup_search"></div>
			<!--Search Bar and Add Button End-->

			<div class="col-md-12"><br></div><!--Space-->

			<!--Supplier Data-->
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div id="get_supplier"></div>
				<!--<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						<tr>
							<td>supplier01</td>
							<td>1234567890</td>
							<td>supplier01@gmail.com</td>
							<td>
								<div class='btn-group' role='group'>
								  <button type='button' class='btn btn-default' id='SupDelete' sid='1'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
								  <button type='button' class='btn btn-default' id='SupEdit' sid='1' supName='supplier01' supPhone='1234567890' supEmail='supplier01@gmail.com'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
								</div>
							</td>
						</tr>
						
					</tbody>
				</table>-->
			</div>
			<div class="col-md-1"></div>
			<!--Supplier Data Ends-->

			<div class="col-md-9"></div>
			<div class="col-md-2" style="text-align: right;">
				<nav aria-label="Page navigation">
				  <ul class="pagination" id='sup_page'>
				    
				    <!--<li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>-->
				    
				  </ul>
				</nav>
			</div>
			<div class="col-md-1"></div>

			<!--Supplier Modal -->
			<div class="modal fade" id="SupplierModal" tabindex="-1" role="dialog" aria-labelledby="SupplierModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="SupplierModalLabel">Add Supplier</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="supName">Name</label>
			        		<input type="text" name="supName" class="form-control" id="supName" placeholder="Name">
			        	</div>
			        	<div class="form-group">
			        		<label for="supPhone">Phone</label>
			        		<input type="text" name="supPhone" class="form-control" id="supPhone" placeholder="Phone">
			        	</div>
			        	<div class="form-group">
			        		<label for="supEmail">Email</label>
			        		<input type="email" name="supEmail" class="form-control" id="supEmail" placeholder="Email">
			        	</div>
			        	<button type="submit" class="btn btn-primary" id="supSubmit">SUBMIT</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!--Modal Ends-->

			<!--Supplier Edit Modal -->
			<div class="modal fade" id="SupplierEditModal" tabindex="-1" role="dialog" aria-labelledby="SupplierEditModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="SupplierEditModalLabel">Edit Supplier</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="supEditName">Name</label>
			        		<input type="text" name="supEditName" class="form-control" id="supEditName" placeholder="Name">
			        	</div>
			        	<div class="form-group">
			        		<label for="supEditPhone">Phone</label>
			        		<input type="text" name="supEditPhone" class="form-control" id="supEditPhone" placeholder="Phone">
			        	</div>
			        	<div class="form-group">
			        		<label for="supEditEmail">Email</label>
			        		<input type="email" name="supEditEmail" class="form-control" id="supEditEmail" placeholder="Email">
			        	</div>
			        	<button type="submit" class="btn btn-primary" id="supEditSubmit">SUBMIT</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!--Modal Ends-->

		</div>
	</div>
</body>
</html>