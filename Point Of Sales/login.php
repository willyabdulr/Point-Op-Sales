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
	<div class="modal fade" tabindex="-1" role="dialog" id="loginForm"> 
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body" id="loginBody">
	        <center><h1>Login</h1></center>
	        <div class="row">
	        	<form action="loginScript.php" method="POST">
	        	<div class="col-md-12">
	        		<div class="form-group">
	        			<label for="loginID" style="color: #dedee0; font-family: sans-serif;">Username</label>
	        			<input type="text" name="loginID" id="loginID"  class="form-control" placeholder="Enter Username" style="color: #dedee0; font-family: sans-serif;">
	        		</div>
	        	</div>
	        	<div class="col-md-12">
	        		<div class="form-group">
	        			<label for="Pass" style="color: #dedee0; font-family: sans-serif;">Password</label>
	        			<input type="password" name="Pass" id="Pass" class="form-control" placeholder="Enter Password" style="color: #dedee0; font-family: sans-serif;">
	        		</div>
	        	</div>
	        	<div class="col-md-12" style="text-align: center;">
	        		<button class="btn btn-primary" id="loginButton" type="submit">Login</button>
	        	</div>
	        	</form>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
      $(document).ready(function() {
         $('#loginForm').modal('show').on('hide.bs.modal', function (e) {
            e.preventDefault();
         });

      });
      </script>

</body>
</html>