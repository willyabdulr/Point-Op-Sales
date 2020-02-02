<?php

session_start();

include 'dbscripts/dbconnect.php';

//Get Category Data
if(isset($_POST['category'])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	$category_query = "SELECT * FROM categories LIMIT $start,$limit";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));

	

	echo "<table class='table'>
				<thead>
					<tr>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>";

	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<tr>
						<td>$cat_title</td>
						<td>
							<div class='btn-group' role='group'>
							  <button type='button' class='btn btn-default' id='catDelete' cat_id='$cat_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
							  <button type='button' class='btn btn-default' id='catEdit' cat_title='$cat_title'cat_id='$cat_id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
							</div>
						</td>
					</tr>";
		}
	}

	echo "</tbody>
			</table>";

}

//Add Category
if(isset($_POST['AddCategory'])){

	$name = $_POST['name'];
	$sql = "INSERT INTO categories VALUES(NULL, '$name')";
	$add_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Edit Category
if(isset($_POST['EditCategory'])){

	$name = $_POST['name'];
	$cid = $_POST['cid'];
	$sql = "UPDATE categories SET cat_title = '$name' WHERE cat_id = '$cid'";
	$add_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Delete Category
if(isset($_POST['DeleteCategory'])){

	$cid = $_POST['cid'];
	$sql = "DELETE FROM categories WHERE cat_id = $cid";
	$delete_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Search Cat
if(isset($_POST['SearchCat'])) {

	$txt = $_POST['CatText']; 
	$category_query = "SELECT * FROM categories WHERE cat_title LIKE '%".$txt."%'";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
	echo "<table class='table'>
					<thead>
						<tr>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>";

	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<tr>
						<td>$cat_title</td>
						<td>
							<div class='btn-group' role='group'>
							  <button type='button' class='btn btn-default' id='catDelete' cat_id='$cat_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
							  <button type='button' class='btn btn-default' id='catEdit' cat_title='$cat_title'cat_id='$cat_id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
							</div>
						</td>
					</tr>";
		}
	}

	echo "</tbody>
			</table>";
}

//Get no. of pages in category
if(isset($_POST["GetCatPage"])){
	$s = "SELECT * FROM categories";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	$count = mysqli_num_rows($query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='catPage_no'>$i</a></li>
		";
	}
}

//Get Supplier Data
if(isset($_POST['supplier'])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	$category_query = "SELECT * FROM suppliers LIMIT $start,$limit";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));

	

	echo "<table class='table'>
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>";

	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$sup_id = $row['sup_id'];
			$sup_name = $row['sup_name'];
			$sup_email = $row['sup_email'];
			$sup_phone = $row['sup_phone'];

			echo "<tr>
						<td>$sup_name</td>
						<td>$sup_email</td>
						<td>$sup_phone</td>
						<td>
							<div class='btn-group' role='group'>
							  <button type='button' class='btn btn-default' id='SupDelete' sid='$sup_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
							  <button type='button' class='btn btn-default' id='SupEdit' sid='$sup_id' supName='$sup_name' supPhone='$sup_phone' supEmail='$sup_email'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
							</div>
						</td>
					</tr>";
		}
	}

	echo "</tbody>
			</table>";

}

//Add Supplier
if(isset($_POST['AddSupplier'])){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sql = "INSERT INTO suppliers VALUES(NULL, '$name', '$email', '$phone')";
	$add_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Delete Supplier
if(isset($_POST['DeleteSupplier'])){

	$sid = $_POST['sid'];
	$sql = "DELETE FROM suppliers WHERE sup_id = $sid";
	$delete_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Edit Supplier
if(isset($_POST['EditSupplier'])){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sid = $_POST['sid'];
	$sql = "UPDATE suppliers SET sup_name = '$name', sup_email = '$email', sup_phone = '$phone' WHERE sup_id = '$sid'";
	$edit_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Get no. of pages in category
if(isset($_POST["GetSupPage"])){
	$s = "SELECT * FROM suppliers";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	$count = mysqli_num_rows($query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='supPage_no'>$i</a></li>
		";
	}
}

//Search Supplier
if(isset($_POST['SearchSup'])) {

	$txt = $_POST['SupText']; 
	$category_query1 = "SELECT * FROM suppliers WHERE sup_name LIKE '%".$txt."%' OR sup_email LIKE '%".$txt."%' OR sup_phone LIKE '%".$txt."%'";
	$run_query1 = mysqli_query($con, $category_query1) or die(mysqli_error($con));
	echo "<table class='table'>
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>";

	if(mysqli_num_rows($run_query1) > 0){
		while ($row = mysqli_fetch_array($run_query1)) {
			$sup_id = $row['sup_id'];
			$sup_name = $row['sup_name'];
			$sup_email = $row['sup_email'];
			$sup_phone = $row['sup_phone'];

			echo "<tr>
						<td>$sup_name</td>
						<td>$sup_email</td>
						<td>$sup_phone</td>
						<td>
							<div class='btn-group' role='group'>
							  <button type='button' class='btn btn-default' id='SupDelete' sid='$sup_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
							  <button type='button' class='btn btn-default' id='SupEdit' sid='$sup_id' supName='$sup_name' supPhone='$sup_phone' supEmail='$sup_email'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
							</div>
						</td>
					</tr>";
		}
	}

	echo "</tbody>
			</table>";
}

//Add Customer
if(isset($_POST['AddCustomer'])){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$disc = $_POST['disc'];
	$sql = "INSERT INTO customers VALUES(NULL, '$name', '$email', '$phone', '$disc')";
	$add_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Get Customer Data
if(isset($_POST['customer'])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	$category_query = "SELECT * FROM customers LIMIT $start,$limit";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));

	

	echo "<table class='table'>
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Discount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>";

	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$cust_id = $row['cust_id'];
			$cust_name = $row['cust_name'];
			$cust_email = $row['cust_email'];
			$cust_phone = $row['cust_phone'];
			$cust_disc = $row['cust_disc'];

			echo "<tr>
						<td>$cust_name</td>
						<td>$cust_phone</td>
						<td>$cust_email</td>
						<td>$cust_disc</td>
						<td>
							<div class='btn-group' role='group'>
							  <button type='button' class='btn btn-default' id='custDelete' cust_id='$cust_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
							  <button type='button' class='btn btn-default' id='custEdit' cust_id='$cust_id' cust_name='$cust_name' cust_email='$cust_email' cust_discount='$cust_disc' cust_phone='$cust_phone'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
							</div>
						</td>
					</tr>";
		}
	}

	echo "</tbody>
			</table>";

}

//Delete Customer
if(isset($_POST['DeleteCustomer'])){

	$cid = $_POST['cid'];
	$sql = "DELETE FROM customers WHERE cust_id = $cid";
	$delete_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Edit Customer
if(isset($_POST['EditCustomer'])){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$disc = $_POST['disc'];
	$cid = $_POST['cid'];
	$sql = "UPDATE customers SET cust_name = '$name', cust_email = '$email', cust_phone = '$phone', cust_disc = '$disc' WHERE cust_id = '$cid'";
	$edit_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Get no. of pages in customer
if(isset($_POST["GetCustPage"])){
	$s = "SELECT * FROM customers";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	$count = mysqli_num_rows($query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='custPage_no'>$i</a></li>
		";
	}
}

//Search Supplier
if(isset($_POST['SearchCust'])) {

	$txt = $_POST['CustText']; 
	$customer_query1 = "SELECT * FROM customers WHERE cust_name LIKE '%".$txt."%' OR cust_email LIKE '%".$txt."%' OR cust_phone LIKE '%".$txt."%' OR cust_disc LIKE '%".$txt."%'";
	$run_query1 = mysqli_query($con, $customer_query1) or die(mysqli_error($con));
	echo "<table class='table'>
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Discount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>";

	if(mysqli_num_rows($run_query1) > 0){
		while ($row = mysqli_fetch_array($run_query1)) {
			$cust_id = $row['cust_id'];
			$cust_name = $row['cust_name'];
			$cust_email = $row['cust_email'];
			$cust_phone = $row['cust_phone'];
			$cust_disc = $row['cust_disc'];

			echo "<tr>
						<td>$cust_name</td>
						<td>$cust_phone</td>
						<td>$cust_email</td>
						<td>$cust_disc</td>
						<td>
							<div class='btn-group' role='group'>
							  <button type='button' class='btn btn-default' id='custDelete' cust_id='$cust_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
							  <button type='button' class='btn btn-default' id='custEdit' cust_id='$cust_id' cust_name='$cust_name' cust_email='$cust_email' cust_discount='$cust_disc' cust_phone='$cust_phone'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
							</div>
						</td>
					</tr>";
		}
	}

	echo "</tbody>
			</table>";
}

//Get Category Dropdown
if(isset($_POST['GetCatDrop'])){

	$s = "SELECT * FROM categories";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	if(mysqli_num_rows($query) > 0){
		while ($row = mysqli_fetch_array($query)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<option value='$cat_id'>$cat_title</option>";
		}
	}

}

//Get Customer Dropdown
if(isset($_POST['GetCustDrop'])){
	$s = "SELECT * FROM customers";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));

	echo "<option value='0'>Valued Customer</option>";

	if(mysqli_num_rows($query) > 0){
		while ($row = mysqli_fetch_array($query)) {
			$cust_id = $row['cust_id'];
			$cust_name = $row['cust_name'];

			echo "<option value='$cust_id'>$cust_name</option>";
		}
	}

}

//Get Supplier Dropdown
if(isset($_POST['GetSupDrop'])){
	$s = "SELECT * FROM suppliers";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	if(mysqli_num_rows($query) > 0){
		while ($row = mysqli_fetch_array($query)) {
			$sup_id = $row['sup_id'];
			$sup_name = $row['sup_name'];

			echo "<option value='$sup_id'>$sup_name</option>";
		}
	}

}

//Get Product Data
if(isset($_POST['product'])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con, $product_query) or die(mysqli_error($con));

	

	echo "<table class='table'>
				<thead>
					<tr>
						<th>Code</th>
						<th>Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Supplier</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>";

	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id = $row['pro_id'];
			$pro_code = $row['pro_code'];
			$pro_name = $row['pro_name'];
			$quan = $row['quantity'];
			$cat_id = $row['cat_id'];
			$pro_price = $row['pro_price'];
			$cat_title = $row['cat_title'];
			$sup_name = $row['sup_name'];
			$sid = $row['sup_id'];

			echo "<tr>
					<td>$pro_code</td>
					<td>$pro_name</td>
					<td>$cat_title</td>
					<td>$pro_price</td>
					<td>$quan</td>
					<td>$sup_name</td>
					<td>
						<div class='btn-group' role='group'>
						  <button type='button' class='btn btn-default' id='proDelete' pid='$pro_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
						  <button type='button' class='btn btn-default' id='proEdit' pid='$pro_id' pcode='$pro_code' pname='$pro_name' pcat='$cat_id' pprice='$pro_price' sid='$sid' quan='$quan'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
						</div>
					</td>
				</tr>";
		}
	}

	echo "</tbody>
			</table>";

}

//Add Product
if(isset($_POST['AddProduct'])){

	$code = $_POST['code'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$cat = $_POST['cat'];
	$cname = $_POST['cname'];
	$sid = $_POST['sid'];
	$sname = $_POST['sname'];
	$quan = $_POST['quan'];
	$sql = "INSERT INTO products VALUES(NULL, '$code', '$name', '$quan', '$cat', '$cname', '$price', '$sid', '$sname')";
	$add_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Delete Product
if(isset($_POST['DeleteProduct'])){

	$pid = $_POST['pid'];
	$sql = "DELETE FROM products WHERE pro_id = $pid";
	$delete_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Edit Product
if(isset($_POST['EditProduct'])){

	$code = $_POST['code'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$cat = $_POST['cat'];
	$cname = $_POST['cname'];
	$pid = $_POST['pid'];
	$sid = $_POST['sid'];
	$quan = $_POST['quan'];
	$sname = $_POST['sname'];
	$sql = "UPDATE products SET pro_name = '$name', pro_code = '$code', pro_price = '$price', cat_id = '$cat', cat_title = '$cname', sup_id='$sid', sup_name='$sname', quantity='$quan' WHERE pro_id = '$pid'";
	$edit_query = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//Search Products
if(isset($_POST['SearchPro'])) {

	$txt = $_POST['ProText']; 
	$customer_query1 = "SELECT * FROM products WHERE pro_name LIKE '%".$txt."%' OR pro_code LIKE '%".$txt."%' OR cat_title LIKE '%".$txt."%' OR pro_price LIKE '%".$txt."%' OR sup_name LIKE '%".$txt."%'";
	$run_query1 = mysqli_query($con, $customer_query1) or die(mysqli_error($con));
	echo "<table class='table'>
				<thead>
					<tr>
						<th>Code</th>
						<th>Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Supplier</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>";

	if(mysqli_num_rows($run_query1) > 0){
		while ($row = mysqli_fetch_array($run_query1)) {
			$pro_id = $row['pro_id'];
			$pro_code = $row['pro_code'];
			$pro_name = $row['pro_name'];
			$quan = $row['quantity'];
			$cat_id = $row['cat_id'];
			$pro_price = $row['pro_price'];
			$cat_title = $row['cat_title'];
			$sup_name = $row['sup_name'];
			$sid = $row['sup_id'];

			echo "<tr>
					<td>$pro_code</td>
					<td>$pro_name</td>
					<td>$cat_title</td>
					<td>$pro_price</td>
					<td>$sup_name</td>
					<td>
						<div class='btn-group' role='group'>
						  <button type='button' class='btn btn-default' id='proDelete' pid='$pro_id'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
						  <button type='button' class='btn btn-default' id='proEdit' pid='$pro_id' pcode='$pro_code' pname='$pro_name' pcat='$cat_id' pprice='$pro_price' sid='$sid' quan='$quan'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
						</div>
					</td>
				</tr>";
		}
	}

	echo "</tbody>
			</table>";
}

//Get no. of pages in products
if(isset($_POST["GetProPage"])){
	$s = "SELECT * FROM products";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	$count = mysqli_num_rows($query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='proPage_no'>$i</a></li>
		";
	}
}

//Get Category Sort Buttons
if(isset($_POST['GetCatSort'])){

	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));

	echo "<button class='btn btn-primary btn-lg' id='catSort' cat_id='0'><span class='glyphicon glyphicon-home'></span></button>";

	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<button class='btn btn-primary btn-lg' id='catSort' cat_id='$cat_id' style='margin-left:5px;'>$cat_title</button>";
		}
	}
}

//Get Product Data for bill page tabs
if(isset($_POST['GetBillProduct'])){
	$limit = 17;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	if(isset($_POST['setCat'])){
		$cid = $_POST["ct"];
		if($cid == 0){
			$product_query = "SELECT * FROM products LIMIT $start,$limit";
		}else{
			$product_query = "SELECT * FROM products WHERE cat_id = '$cid' LIMIT $start,$limit";
		}
			
	}else{
		$product_query = "SELECT * FROM products LIMIT $start,$limit";
	}

	
	$run_query = mysqli_query($con, $product_query) or die(mysqli_error($con));


	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id = $row['pro_id'];
			$pro_name = $row['pro_name'];
			$pro_price = $row['pro_price'];

			echo "<div class='col-md-3' style='text-align: center;'>
						<button class='btn btn-info prodPanel' pid='$pro_id' pprice='$pro_price' id='addProd' pro_name='$pro_name'>$pro_name</button>	
					</div>";
		}
	}
}

//Get no. of pages in products of bill page
if(isset($_POST["GetBillProPages"])){
	$s = "SELECT * FROM products";
	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	$count = mysqli_num_rows($query);
	$pageno = ceil($count/17);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='billProPage_no'>$i</a></li>
		";
	}
}

//Search Products at Bill Page
if(isset($_POST['SearchBillProd'])) {

	$txt = $_POST['BillProdText']; 
	$customer_query1 = "SELECT * FROM products WHERE pro_name LIKE '%".$txt."%' OR pro_code LIKE '%".$txt."%'";
	$run_query1 = mysqli_query($con, $customer_query1) or die(mysqli_error($con));

	if(mysqli_num_rows($run_query1) > 0){
		while ($row = mysqli_fetch_array($run_query1)) {
			$pro_id = $row['pro_id'];
			$pro_name = $row['pro_name'];
			$pro_price = $row['pro_price'];

			echo "<div class='col-md-2'>
						<button class='btn btn-info prodPanel' pid='$pro_id' pprice='$pro_price' id='addProd' pro_name='$pro_name'>$pro_name</button>	
					</div>";
		}
	}
}

//Add to Bill
if(isset($_POST['AddToBill'])){

	$user = $_SESSION['id'];
	$pid = $_POST['pid'];
	$pprice = $_POST['pprice'];
	$name = $_POST['name'];

	$check_sql = "SELECT * FROM transactions WHERE pro_id = '$pid' AND status = '0' AND user_id = '$user' ";
	$check_query = mysqli_query($con, $check_sql) or die(mysqli_error($con));

	if(mysqli_num_rows($check_query)>0){
		$row = mysqli_fetch_array($check_query);
		$old_quan = $row['quantity'];
		$new_quan = $old_quan + 1;

		$inventory_sql = "SELECT * FROM products WHERE pro_id = '$pid'";
		$inventory_query = mysqli_query($con, $inventory_sql) or die(mysqli_error($con));
		$inv_row =mysqli_fetch_array($inventory_query);

		if($inv_row['quantity'] >= 1){
			
			$update_sql = "UPDATE transactions SET quantity = '$new_quan' WHERE pro_id = '$pid' AND user_id = '$user' ";
			$update_query = mysqli_query($con, $update_sql) or die(mysqli_error($con));

			$updated_inventory = $inv_row['quantity'] - 1;
			$inventory_edit = "UPDATE products SET quantity = '$updated_inventory' WHERE pro_id = '$pid'";
			$inv_update =  mysqli_query($con, $inventory_edit) or die(mysqli_error($con));

			echo "added";
		}else{
			echo "low";
		}

	}else {

		$inventory_sql = "SELECT * FROM products WHERE pro_id = '$pid'";
		$inventory_query = mysqli_query($con, $inventory_sql) or die(mysqli_error($con));
		$inv_row =mysqli_fetch_array($inventory_query);

		if($inv_row['quantity'] >= 1){

			$updated_inventory = $inv_row['quantity'] - 1;
			$inventory_edit = "UPDATE products SET quantity = '$updated_inventory' WHERE pro_id = '$pid'";
			$inv_update =  mysqli_query($con, $inventory_edit) or die(mysqli_error($con));

			$add_sql = "INSERT INTO transactions VALUES(NULL, '$name', '$pprice', '$pid', '1', '$user', '0', '0')"; //User id = 0
			$add_query = mysqli_query($con, $add_sql);
			echo "added";
		}else{
			echo "low";
		}
		
	}

}

if(isset($_POST['GetBill'])){

	$user = $_SESSION['id'];
	$bill_sql = "SELECT * FROM transactions WHERE status = '0' AND user_id = '$user' ";
	$bill_query = mysqli_query($con, $bill_sql);

	if(mysqli_num_rows($bill_query)>0){
		while ($row = mysqli_fetch_array($bill_query)) {

			$pid = $row['pro_id'];
			$name = $row['prod_name'];
			$price = $row['prod_price'];
			$quan = $row['quantity'];
			$total = $price * $quan;
			
			echo "<div class='col-md-12'>	
									<div class='panel panel-default' style='border: none; padding: 0px; margin-bottom: 1px;'>
										<div class='panel-body' style='color: #000;'>
											<div class='row'>
												<div class='col-md-5'>
												<button class='btn btn-danger btn-sm' id='billRemove' pid='$pid'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
												$name
												</div>
												<div class='col-md-2'>$price</div>
												<div class='col-md-3'>
												<div class='row'>
													<div class='col-md-4'>
														<button class='btn btn-primary btn-sm' id='inc_dec' change='1' pid='$pid'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
													</div>
													<div class='col-md-4'>
														<input type='text' name='prodQuan' id='prodQuan' class='form-control' value='$quan' style='padding:2px; width: 30px;'>
													</div>
													<div class='col-md-4'>
														<button class='btn btn-primary btn-sm' id='inc_dec' change='2' pid='$pid'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>
													</div>
												</div>
												</div>
												<div class='col-md-2'>
													<input type='text' name='prodTotal' id='prodTotal' class='form-control' disabled value='$total' style='font-size:1px;'>
												</div>
											</div>
										</div>
									</div>
								</div>";

		}
	}
}

//Delete Item from Bill
if(isset($_POST['DeleteFromBill'])){

	$user = $_SESSION['id'];

	if(isset($_POST['pid'])){

		$pid = $_POST['pid'];
		$get_quantity = "SELECT * FROM transactions WHERE pro_id = $pid AND status = '0' AND user_id = '$user' ";
		$get_quantity_query = mysqli_query($con, $get_quantity) or die(mysqli_error($con));
		$r = mysqli_fetch_array($get_quantity_query);
		$quan = $r['quantity'];

		$inventory_sql = "SELECT * FROM products WHERE pro_id = '$pid'";
		$inventory_query = mysqli_query($con, $inventory_sql) or die(mysqli_error($con));
		$inv_row =mysqli_fetch_array($inventory_query);

		$updated_inventory = $inv_row['quantity'] + $quan;

		$inventory_edit = "UPDATE products SET quantity = '$updated_inventory' WHERE pro_id = '$pid'";
		$inv_update =  mysqli_query($con, $inventory_edit) or die(mysqli_error($con));	

		$sql = "DELETE FROM transactions WHERE pro_id = $pid AND status = '0' AND user_id = '$user' ";
		$delete_query = mysqli_query($con, $sql) or die(mysqli_error($con));

	}else{

		$getPro_sql = "SELECT * FROM transactions WHERE status = '0' AND user_id = '$user' ";
		$getPro_query = mysqli_query($con, $getPro_sql) or die(mysqli_error($con));

		if(mysqli_num_rows($getPro_query)>0){
			while ($row = mysqli_fetch_array($getPro_query)) {
				$pid = $row['pro_id'];
				
				$get_quantity = "SELECT * FROM transactions WHERE pro_id = $pid AND status = '0' AND user_id = '$user' ";
				$get_quantity_query = mysqli_query($con, $get_quantity) or die(mysqli_error($con));
				$r = mysqli_fetch_array($get_quantity_query);
				$quan = $r['quantity'];

				$inventory_sql = "SELECT * FROM products WHERE pro_id = '$pid'";
				$inventory_query = mysqli_query($con, $inventory_sql) or die(mysqli_error($con));
				$inv_row =mysqli_fetch_array($inventory_query);

				$updated_inventory = $inv_row['quantity'] + $quan;

				$inventory_edit = "UPDATE products SET quantity = '$updated_inventory' WHERE pro_id = '$pid'";
				$inv_update =  mysqli_query($con, $inventory_edit) or die(mysqli_error($con));	

				$sql = "DELETE FROM transactions WHERE pro_id = $pid AND status = '0' AND user_id = '$user' ";
				$delete_query = mysqli_query($con, $sql) or die(mysqli_error($con));
			}
		}

	}

	
}

//Update Bill Quantity
if(isset($_POST['UpdateBill'])){

	$user = $_SESSION['id'];
	$code = $_POST['change'];
	$pid = $_POST['pid'];

	if($code == '1'){	//Increment

		$pid = $_POST['pid'];
		$get_quantity = "SELECT * FROM transactions WHERE pro_id = $pid AND status = '0' AND user_id = '$user' ";
		$get_quantity_query = mysqli_query($con, $get_quantity) or die(mysqli_error($con));
		$r = mysqli_fetch_array($get_quantity_query);
		$quan = $r['quantity'];

		$new_quan = $quan + 1;

		$inventory_sql = "SELECT * FROM products WHERE pro_id = '$pid'";
		$inventory_query = mysqli_query($con, $inventory_sql) or die(mysqli_error($con));
		$inv_row =mysqli_fetch_array($inventory_query);

		if($inv_row['quantity'] >= 1){
			$update_sql = "UPDATE transactions SET quantity = '$new_quan' WHERE pro_id = '$pid' AND user_id = '$user' ";
			$update_query = mysqli_query($con, $update_sql) or die(mysqli_error($con));

			$updated_inventory = $inv_row['quantity'] - 1;
			$inventory_edit = "UPDATE products SET quantity = '$updated_inventory' WHERE pro_id = '$pid'";
			$inv_update =  mysqli_query($con, $inventory_edit) or die(mysqli_error($con));

			echo "added";
		}else{
			echo "low";
		}

	}else{				//Decrement
		$pid = $_POST['pid'];
		$get_quantity = "SELECT * FROM transactions WHERE pro_id = $pid AND status = '0' AND user_id = '$user' ";
		$get_quantity_query = mysqli_query($con, $get_quantity) or die(mysqli_error($con));
		$r = mysqli_fetch_array($get_quantity_query);
		$quan = $r['quantity'];

		$new_quan = $quan - 1;

		if($new_quan > 0){
			
			$inventory_sql = "SELECT * FROM products WHERE pro_id = '$pid'";
			$inventory_query = mysqli_query($con, $inventory_sql) or die(mysqli_error($con));
			$inv_row =mysqli_fetch_array($inventory_query);

			$updated_inventory = $inv_row['quantity'] + 1;

			$inventory_edit = "UPDATE products SET quantity = '$updated_inventory' WHERE pro_id = '$pid'";
			$inv_update =  mysqli_query($con, $inventory_edit) or die(mysqli_error($con));

			$update_sql = "UPDATE transactions SET quantity = '$new_quan' WHERE pro_id = '$pid' AND user_id = '$user' ";
			$update_query = mysqli_query($con, $update_sql) or die(mysqli_error($con));

		}else{

			$inventory_sql = "SELECT * FROM products WHERE pro_id = '$pid'";
			$inventory_query = mysqli_query($con, $inventory_sql) or die(mysqli_error($con));
			$inv_row =mysqli_fetch_array($inventory_query);

			$updated_inventory = $inv_row['quantity'] + 1;

			$inventory_edit = "UPDATE products SET quantity = '$updated_inventory' WHERE pro_id = '$pid'";
			$inv_update =  mysqli_query($con, $inventory_edit) or die(mysqli_error($con));

			$sql = "DELETE FROM transactions WHERE pro_id = $pid AND status = '0' AND user_id = '$user' ";
			$delete_query = mysqli_query($con, $sql) or die(mysqli_error($con));
		}

		
	}
}

//Calculate Bill
if(isset($_POST['GetTotal'])){

	$user = $_SESSION['id'];
	$bill_sql = "SELECT * FROM transactions WHERE user_id = '$user' AND status = '0' AND user_id = '$user' ";
	$bill_query = mysqli_query($con, $bill_sql);
	$grandTotal = 0;
	$tax = 14;
	
	if(isset($_POST['disc'])){
		$disc = $_POST['disc'];
	}else{
		$disc = 0;
	}

	if(mysqli_num_rows($bill_query)>0){
		while ($row = mysqli_fetch_array($bill_query)) {

			$price = $row['prod_price'];
			$quan = $row['quantity'];
			$total = $price * $quan;
			$grandTotal = $grandTotal + $total;
			$gt = $grandTotal;
			$gt = $gt - (($disc/100)*$gt);
			$gt = $gt + (($tax/100)*$gt);
		}
	}else{
		$grandTotal = 0;
		$gt = 0;
	}

	echo "<div class='col-md-9' style='text-align: right;'><p style='font-size: 20px;'>TOTAL: Rs</p></div>
			<div class='col-md-3' style='text-align: left;'><input type='text' name='total' id='total' class='form-control' value='$grandTotal' disabled></div>
			<div class='col-md-9' style='text-align: right;'><p style='font-size: 20px;'>TAX(%): </p></div>
					<div class='col-md-3' style='text-align: left;'><input type='text' name='tax' id='tax' class='form-control' value='$tax' disabled></div>

					<div class='col-md-9' style='text-align: right;'><p style='font-size: 20px;'>DISCOUNT: </p></div>
					<div class='col-md-3' style='text-align: left;'><input type='text' name='discount' id='discount' class='form-control' value='$disc'></div>

					<div class='col-md-9' style='text-align: right;'><p style='font-size: 20px;'>GRAND TOTAL: Rs</p></div>
					<div class='col-md-3' style='text-align: left;'><input type='text' name='totalBill' id='totalBill' class='form-control' value='$gt' disabled></div>

					<div class='col-md-12'><br></div> <!--Space-->

					<div class='col-md-6' style='text-align: right;'><button class='btn btn-danger btn-lg' id='cancelTrans'>CANCEL</button></div>
					<div class='col-md-6' style='text-align: left;'><button class='btn btn-primary btn-lg' id='payButton' totalBill='$gt'>PAY</button></div>";
}

//Complete Payment
if(isset($_POST['CompPay'])){

	$user = $_SESSION['id'];
	$total = $_POST['t'];
	$received = $_POST['r'];
	$cust_name = $_POST['custName'];
	$cust_id = $_POST['custID'];
	$date = date('Y-m-d H:i:s');

	$sale_sql = "INSERT INTO sales VALUES (NULL, '$user', '$cust_id', '$cust_name', '$total', '$received', '$date') ";
	$sale_query = mysqli_query($con, $sale_sql) or die(mysqli_error($con));

	if($sale_query){
		$invoiceNum = mysqli_insert_id($con);
	}
	else{
		$invoiceNum = 0;
	}

	$trans_sql = "UPDATE transactions SET status = '1', invoiceNum = '$invoiceNum' WHERE user_id = '$user' AND status = '0' ";
	$trans_query = mysqli_query($con, $trans_sql) or die(mysqli_error($con));
}

//Get Sales Data
if(isset($_POST['GetSales'])){

	$user = $_SESSION['id'];

	//Check if Admin and show data

	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	if($_SESSION['role'] == 'admin'){
		$sale_sql = "SELECT * FROM sales LIMIT $start,$limit";
	}else{
		$sale_sql = "SELECT * FROM sales WHERE createdBy = '$user' LIMIT $start,$limit";
	}

	
	$sale_query = mysqli_query($con, $sale_sql) or die(mysqli_error($con));

	echo "<table class='table'>
					<thead>
						<tr>
							<th>Created By</th>
							<th>Customer</th>
							<th>Total</th>
							<th>Paid</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>";

	if(mysqli_num_rows($sale_query)>0){
		while ($row = mysqli_fetch_array($sale_query)) {
			$id = $row['sale_id'];
			$creator = $row['createdBy'];
			$cust = $row['cust_name'];
			$total = $row['total'];
			$paid = $row['received'];
			$date = $row['date'];

			$user_sql = "SELECT * FROM users WHERE user_id = '$creator' ";
			$user_query = mysqli_query($con, $user_sql) or die(mysqli_error($con));
			$ur = mysqli_fetch_array($user_query);
			$c = $ur['user_name'];

			echo "<tr>
							<td>$c</td>
							<td>$cust</td>
							<td>$total</td>
							<td>$paid</td>
							<td>$date</td>
							<td>
								<button class='btn btn-primary' sale_id='$id'>Generate Receipt <span class='glyphicon glyphicon-cog'></span></button>
							</td>
						</tr>";
		}
	}

	echo "</tbody>
				</table>";

}

if(isset($_POST["GetSalePage"])){

	$user = $_SESSION['id'];

	if($_SESSION['role'] == 'admin'){
		$s = "SELECT * FROM sales";
	}else{
		$s = "SELECT * FROM sales WHERE createdBy = '$user'";
	}

	$query = mysqli_query($con,$s) or die(mysqli_error($con));
	$count = mysqli_num_rows($query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='salePage_no'>$i</a></li>
		";
	}
}

//Search Sales Data
if(isset($_POST['SearchSales'])){

	$user_id = $_SESSION['id'];

	//Check if Admin and show data

	$txt = $_POST['SaleText'];

	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	if($_SESSION['role'] == 'admin'){
		$search_sql = "SELECT * FROM sales WHERE cust_name LIKE '%".$txt."%' OR createdBy LIKE '%".$txt."%'";
	}else{
		$search_sql = "SELECT * FROM sales WHERE cust_name LIKE '%".$txt."%' OR createdBy LIKE '%".$txt."%' AND createdBy = '$user'";
	}

	$search_query = mysqli_query($con, $search_sql) or die(mysqli_error($con));

	echo "<table class='table'>
					<thead>
						<tr>
							<th>Created By</th>
							<th>Customer</th>
							<th>Total</th>
							<th>Paid</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>";

	if(mysqli_num_rows($search_query)>0){
		while ($row = mysqli_fetch_array($search_query)) {
			$id = $row['sale_id'];
			$creator = $row['createdBy'];
			$cust = $row['cust_name'];
			$total = $row['total'];
			$paid = $row['received'];
			$date = $row['date'];

			echo "<tr>
							<td>$creator</td>
							<td>$cust</td>
							<td>$total</td>
							<td>$paid</td>
							<td>$date</td>
							<td>
								<button class='btn btn-primary' sale_id='$id'>Generate Receipt <span class='glyphicon glyphicon-cog'></span></button>
							</td>
						</tr>";
		}
	}

	echo "</tbody>
				</table>";

}

//Report Section
if(isset($_POST['GetTotalProducts'])){
	$sql1 = "SELECT * FROM products";
	$query1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
	$tot = mysqli_num_rows($query1);

	echo "<p style='font-size: 40px;'>
						    		$tot 
						    		</p>
						    		Products";
}

if(isset($_POST['GetTotalCustomers'])){
	$sql2 = "SELECT * FROM customers";
	$query2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
	$tot = mysqli_num_rows($query2);

	echo "<p style='font-size: 40px;'>
						    		$tot 
						    		</p>
						    		Customers";	
}

if(isset($_POST['GetTotalSales'])){
	$current = date('Y-m-d');
	$sql3 = "SELECT * FROM sales WHERE date = '$current' ";
	$query3 = mysqli_query($con, $sql3) or die(mysqli_error($con));
	$tot = 0;
	
	if(mysqli_num_rows($query3)>0){
		while ($row = mysqli_fetch_array($query3)) {
			$tot = $tot + $row['total'];
		}
	}

	echo "<p style='font-size: 40px;'>
						    		$tot INR 
						    		</p>
						    		Today's Sale";	
}

//Add User
if(isset($_POST['AddUser'])){
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	$user_sql = "INSERT INTO users VALUES (NULL, '$name','$username', '$password', '$role')";
	$user_query = mysqli_query($con, $user_sql) or die(mysqli_error($con));
}
?>