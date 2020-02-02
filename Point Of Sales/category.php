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
			<div class="col-md-2"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#CategoryModal" id="AddCat">Add Category</button></div>
			<div class="col-md-5"></div>
			<div class="col-md-2" style="text-align: right; font-size: 20px;">Search  </div>
			<div class="col-md-2"> <input type="text" name="cat_search" id="cat_search" class="form-control"></div>
			<div class="col-md-12"><br></div>
			<div class="col-md-1"></div>
			<div class="col-md-10">
            <div id="get_category"></div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-9"></div>
			<div class="col-md-2" style="text-align: right;">
				<nav aria-label="Page navigation">
				  <ul class="pagination" id="cat_page">
				    
				  </ul>
				</nav>
			</div>
			<div class="col-md-1"></div>
			<div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="CategoryModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="CategoryModalLabel">Add Category</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="catName">Name</label>
			        		<input type="text" name="catName" class="form-control" id="catName" placeholder="Name">
			        	</div>
			        	<button type="button" id="catSubmit" class="btn btn-primary">SUBMIT</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="modal fade" id="CategoryEditModal" tabindex="-1" role="dialog" aria-labelledby="CategoryEditModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="CategoryEditModalLabel">Edit Category</h4>
			      </div>
			      <div class="modal-body">
			        <form>
			        	<div class="form-group">
			        		<label for="catEditName">Name</label>
			        		<input type="text" name="catEditName" class="form-control" id="catEditName" placeholder="Name">
			        	</div>
			        	<button type="button" id="catEditSubmit" class="btn btn-primary" catEd_id="">SUBMIT</button>
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