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
			<div class="col-md-2"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#ProductModal">Add Product</button></div>
			<div class="col-md-5"></div>
			<div class="col-md-2" style="text-align: right; font-size: 20px;">Search  </div>
			<div class="col-md-2"> <input type="text" name="pro_search" id="pro_search" class="form-control"></div>
			<!--Search Bar and Add Button End-->

			<div class="col-md-12"><br></div><!--Space-->

			<!--Product Data-->
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div id="get_Products"></div>
				<!--<table class="table">
					<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Category</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>112345</td>
							<td>product01</td>
							<td>category01</td>
							<td>200</td>
							<td>
								<div class='btn-group' role='group'>
								  <button type='button' class='btn btn-default' id='proDelete' pid='1'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
								  <button type='button' class='btn btn-default' id='proEdit' pid='1' pcode='112345' pname='product01' pcat='category01' pprice='200'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>-->
			</div>
			<div class="col-md-1"></div>
			<!--Product Data Ends-->

			<div class="col-md-9"></div>
			<div class="col-md-2" style="text-align: right;">
				<nav aria-label="Page navigation">
				  <ul class="pagination" id="pro_page">

				    <!--<li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>-->
				    
				  </ul>
				</nav>
			</div>
			<div class="col-md-1"></div>

			<!--Product Modal -->
			<div class="modal fade" id="ProductModal" tabindex="-1" role="dialog" aria-labelledby="ProductLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="ProductModalLabel">Add Product</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="prodCode">Code</label>
			        		<input type="text" name="prodCode" class="form-control" id="prodCode" placeholder="Code">
			        	</div>
			        	<div class="form-group">
			        		<label for="prodName">Name</label>
			        		<input type="text" name="prodName" class="form-control" id="prodName" placeholder="Name">
			        	</div>
			        		<label for="prodCategory">Category</label>
				        	<select class="form-control" name="prodCategory" id="prodCategory">
							  <!--Dummy Data-->
							  <!--<option>category01</option>
							  <option>category02</option>-->
							  <!--Dummy Data-->
							</select>
			        	<div class="form-group">
			        		<label for="prodPrice">Price</label>
			        		<input type="text" name="prodPrice" class="form-control" id="prodPrice" placeholder="Price">
			        	</div>
			        	<div class="form-group">
			        		<label for="prodQuantity">Quantity</label>
			        		<input type="text" name="prodQuantity" class="form-control" id="prodQuantity" placeholder="Quantity">
			        	</div>
			        		<label for="prodSupplier">Supplier</label>
				        	<select class="form-control" name="prodSupplier" id="prodSupplier">
							  <!--Dummy Data-->
							  <!--<option>category01</option>
							  <option>category02</option>-->
							  <!--Dummy Data-->
							</select><br>
			        	<button type="submit" class="btn btn-primary" id="prodSubmit">SUBMIT</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!--Modal Ends-->

			<!--Product Edit Modal -->
			<div class="modal fade" id="ProductEditModal" tabindex="-1" role="dialog" aria-labelledby="ProductEditModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="ProductEditModalLabel">Edit Product</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="prodEditCode">Code</label>
			        		<input type="text" name="prodEditCode" class="form-control" id="prodEditCode" placeholder="Code">
			        	</div>
			        	<div class="form-group">
			        		<label for="prodEditName">Name</label>
			        		<input type="text" name="prodEditName" class="form-control" id="prodEditName" placeholder="Name">
			        	</div>
			        		<label for="prodEditCategory">Category</label>
				        	<select class="form-control" name="prodEditCategory" id="prodEditCategory">
							  <!--Dummy Data-->
							  <!--<option>category01</option>
							  <option>category02</option>-->
							  <!--Dummy Data-->
							</select>
			        	<div class="form-group">
			        		<label for="prodEditPrice">Price</label>
			        		<input type="text" name="prodEditPrice" class="form-control" id="prodEditPrice" placeholder="Price">
			        	</div>
			        	<div class="form-group">
			        		<label for="prodEditQuantity">Quantity</label>
			        		<input type="text" name="prodEditQuantity" class="form-control" id="prodEditQuantity" placeholder="Quantity">
			        	</div>
			        		<label for="prodEditSupplier">Supplier</label>
				        	<select class="form-control" name="prodEditSupplier" id="prodEditSupplier">
							  <!--Dummy Data-->
							  <!--<option>category01</option>
							  <option>category02</option>-->
							  <!--Dummy Data-->
							</select><br>
			        	<button type="submit" class="btn btn-primary" id="prodEditSubmit">SUBMIT</button>
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