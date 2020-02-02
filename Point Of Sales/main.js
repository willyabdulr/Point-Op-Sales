$(document).ready(function(){

	cat();
	catPage();
	sup();
	supPage();
	cust();
	custPage();
	proDrop();
	proDrop2();
	pro();
	proPage();
	custDropDown();
	catButton();
	billPro();
	billProPages();
	getBill();
	//getTotal();
	getSales();
	salePage();
	getTotalSales();
	getTotalProducts();
	getTotalCustomer();

	function getTotalProducts(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetTotalProducts:1},
			success: function(data){
				$("#pro_total").html(data);
			}
		})
	}

	function getTotalCustomer(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetTotalCustomers:1},
			success: function(data){
				$("#cust_total").html(data);
			}
		})
	}

	function getTotalSales(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetTotalSales:1},
			success: function(data){
				$("#sale_total").html(data);
			}
		})
	}

	function getSales(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetSales:1},
			success: function(data){
				$("#get_sales").html(data);
			}
		})
	}

	function getBill() {

		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetBill:1},
			success: function(data){
				$("#billDetails").html(data);
				getTotal();
			}
		})
	}

	function getTotal() {
		if(!document.getElementById("discount")){
			var disc = 0;//alert('0');
		}else{
			var disc = $("#discount").val();
		}
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetTotal:1, disc:disc},
			success: function(data){
				$("#get_total").html(data);
			}
		})
	}

	function custDropDown(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetCustDrop:1},
			success: function(data){
				$("#custNameDrop").html(data);
			}
		})
	}

	function catButton(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetCatSort:1},
			success: function(data){
				$("#get_catSort").html(data);
			}
		})
	}

	function proDrop(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetCatDrop:1},
			success: function(data){
				$("#prodCategory").html(data);
				$("#prodEditCategory").html(data);
			}
		})
	}

	function proDrop2(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetSupDrop:1},
			success: function(data){
				$("#prodSupplier").html(data);
				$("#prodEditSupplier").html(data);
			}
		})
	}

	function catPage(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetCatPage:1},
			success: function(data){
				$("#cat_page").html(data);
			}
		})
	}

	function salePage(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetSalePage:1},
			success: function(data){
				$("#sales_page").html(data);
			}
		})
	}

	function cat(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {category:1},
			success: function(data){
				$("#get_category").html(data);
			}
		})
	}

	function sup(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {supplier:1},
			success: function(data){
				$("#get_supplier").html(data);
			}
		})
	}

	function supPage(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetSupPage:1},
			success: function(data){
				$("#sup_page").html(data);
			}
		})
	}

	function cust(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {customer:1},
			success: function(data){
				$("#get_customers").html(data);
			}
		})
	}

	function custPage(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetCustPage:1},
			success: function(data){
				$("#cust_page").html(data);
			}
		})
	}

	function pro(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {product:1},
			success: function(data){
				$("#get_Products").html(data);
			}
		})
	}

	function billPro(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetBillProduct:1},
			success: function(data){
				$("#get_BillProd").html(data);
			}
		})
	}

	function proPage(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetProPage:1},
			success: function(data){
				$("#pro_page").html(data);
			}
		})
	}

	function billProPages(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {GetBillProPages:1},
			success: function(data){
				$("#get_BillProdPages").html(data);
			}
		})
	}


	//Get Category Page
	$("body").delegate("#catPage_no","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{category:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_category").html(data);
			}
		})
	});

	//Get Sales Page
	$("body").delegate("#salePage_no","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{GetSales:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_sales").html(data);
			}
		})
	});

	//Get Bill Page Product page
	$("body").delegate("#billProPage_no","click",function(e){
		e.preventDefault();
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{GetBillProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_BillProd").html(data);
			}
		})
	});

	//Get Bill Page Product page sorted on category
	$("body").delegate("#catSort","click",function(e){
		e.preventDefault();
		var ct = $(this).attr("cat_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{GetBillProduct:1,setCat:1,ct:ct},
			success	:	function(data){
				$("#get_BillProd").html(data);
			}
		})
	});

	//Add Category
	$("#catSubmit").on('click', function(e){
		var name = $("#catName").val();
		var cid = $("#cat_id");
		//alert(name);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {AddCategory:1, name:name},
			success: function(data){
				alert("Success");
				cat();
				$("#catName").val('');
				$('#CategoryModal').modal('toggle');
			}
		})
	});

	//Delete Category
	$("body").delegate("#catDelete", "click", function(event){
		var cid = $(this).attr('cat_id');
		//alert(cid);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {DeleteCategory:1, cid:cid},
			success: function(data){
				alert("Delete Successful");
				cat();
			} 
		})
	});

	//Edit Category Modal 
	$("body").delegate("#catEdit", "click", function(event){
		var cname = $(this).attr('cat_title');
		var cid = $(this).attr('cat_id');
		
		$("#catEditName").val(cname);
		$("#catEditSubmit").attr("catEd_id", cid);
		$('#CategoryEditModal').modal('toggle');
		
	});

	//Edit Category
	$("#catEditSubmit").on('click', function(e){
		var name = $("#catEditName").val();
		var cid = $("#catEditSubmit").attr('catEd_id');
		//alert(cid);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {EditCategory:1, name:name, cid:cid},
			success: function(data){
				alert("Success");
				cat();
				$("#catEditName").val('');
				$('#CategoryEditModal').modal('toggle');
			}
		})
	});

	//Category Search
	$("body").delegate("#cat_search", "keyup", function(e){
		var CatText = $(this).val();
		if(CatText != ''){
			//alert(CatText);
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {SearchCat:1, CatText:CatText},
				success: function(data){
					$("#get_category").html(data);
				}
			});
		}
		else {
			cat();
		}
	});

	//Bill page product Search
	$("body").delegate("#bill_ProdSearch", "keyup", function(e){
		var BillProdText = $(this).val();
		if(BillProdText != ''){
			//alert(CatText);
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {SearchBillProd:1, BillProdText:BillProdText},
				success: function(data){
					$("#get_BillProd").html(data);
				}
			});
		}
		else {
			billPro();
		}
	});

	//Sales page product Search
	$("body").delegate("#sales_search", "keyup", function(e){
		var SaleText = $(this).val();
		if(SaleText != ''){
			//alert(CatText);
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {SearchSales:1, SaleText:SaleText},
				success: function(data){
					$("#get_sales").html(data);
				}
			});
		}
		else {
			getSales();
		}
	});

	//Add Supplier
	$("#supSubmit").on('click', function(e){
		var name = $("#supName").val();
		var email = $("#supEmail").val();
		var phone = $("#supPhone").val();
		//alert(name);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {AddSupplier:1, name:name, email:email, phone:phone},
			success: function(data){
				alert("Success");
				sup();
				$("#supName").val('');
				$("#supEmail").val('');
				$("#supPhone").val('');
				$('#SupplierModal').modal('toggle');
			}
		})
	});

	//Delete Supplier
	$("body").delegate("#SupDelete", "click", function(event){
		var sid = $(this).attr('sid');
		//alert(cid);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {DeleteSupplier:1, sid:sid},
			success: function(data){
				alert("Delete Successful");
				sup();
			} 
		})
	});

	//Edit Supplier Modal 
	$("body").delegate("#SupEdit", "click", function(event){
		var sname = $(this).attr('supName');
		var sphone = $(this).attr('supPhone');
		var semail = $(this).attr('supEmail');
		var sid = $(this).attr('sid');
		
		$("#supEditName").val(sname);
		$("#supEditPhone").val(sphone);
		$("#supEditEmail").val(semail);
		$("#supEditSubmit").attr("sid", sid);
		$('#SupplierEditModal').modal('toggle');
		
	});

	//Edit Supplier
	$("#supEditSubmit").on('click', function(e){
		var name = $("#supEditName").val();
		var phone = $("#supEditPhone").val();
		var email = $("#supEditEmail").val();
		var sid = $("#supEditSubmit").attr('sid');
		//alert(name);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {EditSupplier:1, name:name, sid:sid, email:email, phone:phone},
			success: function(data){
				alert("Success");
				sup();
				$("#supEditName").val('');
				$("#supEditPhone").val('');
				$("#supEditEmail").val('');
				$('#SupplierEditModal').modal('toggle');
			}
		})
	});

	//Get Supplier Page
	$("body").delegate("#supPage_no","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{supplier:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_supplier").html(data);
			}
		})
	});

	//Supplier Search
	$("body").delegate("#sup_search", "keyup", function(e){
		var SupText = $(this).val();
		if(SupText != ''){
			//alert(SupText);
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {SearchSup:1, SupText:SupText},
				success: function(data){
					$("#get_supplier").html(data);
				}
			});
		}
		else {
			sup();
		}
	});

	//Add Customer
	$("body").delegate("#custSubmit", 'click', function(e){
		var name = $("#custName").val();
		var email = $("#custEmail").val();
		var phone = $("#custPhone").val();
		var disc = $("#custDiscount").val();
		//alert(name);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {AddCustomer:1, name:name, email:email, phone:phone, disc:disc},
			success: function(data){
				alert("Success");
				cust();
				custDropDown();
				$("#custName").val('');
				$("#custEmail").val('');
				$("#custPhone").val('');
				$("#custDiscount").val('');
				$('#CustomerModal').modal('toggle');
			}
		})
	});

	//Delete Customer
	$("body").delegate("#custDelete", "click", function(event){
		var cid = $(this).attr('cust_id');
		//alert(cid);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {DeleteCustomer:1, cid:cid},
			success: function(data){
				alert("Delete Successful");
				cust();
			} 
		})
	});

	//Edit Customer Modal 
	$("body").delegate("#custEdit", "click", function(event){
		var cname = $(this).attr('cust_name');
		var cphone = $(this).attr('cust_phone');
		var cemail = $(this).attr('cust_email');
		var cdisc = $(this).attr('cust_discount');
		var cid = $(this).attr('cust_id');
		
		$("#custEditName").val(cname);
		$("#custEditPhone").val(cphone);
		$("#custEditEmail").val(cemail);
		$("#custEditDiscount").val(cdisc);
		$("#custEditSubmit").attr("cust_id", cid);
		$('#CustomerEditModal').modal('toggle');
		
	});

	//Edit Customer
	$("#custEditSubmit").on('click', function(e){
		var name = $("#custEditName").val();
		var phone = $("#custEditPhone").val();
		var email = $("#custEditEmail").val();
		var disc = $("#custEditDiscount").val();
		var cid = $("#custEditSubmit").attr('cust_id');
		//alert(sid);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {EditCustomer:1, name:name, cid:cid, email:email, phone:phone, disc:disc},
			success: function(data){
				alert("Success");
				cust();
				$("#custEditName").val('');
				$("#custEditPhone").val('');
				$("#custEditEmail").val('');
				$("#custEditDiscount").val('');
				$('#CustomerEditModal').modal('toggle');
			}
		})
	});

	//Get Customer Page
	$("body").delegate("#custPage_no","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{customer:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_customers").html(data);
			}
		})
	});

	//Customer Search
	$("body").delegate("#cust_search", "keyup", function(e){
		var CustText = $(this).val();
		if(CustText != ''){
			//alert(CustText);
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {SearchCust:1, CustText:CustText},
				success: function(data){
					$("#get_customers").html(data);
				}
			});
		}
		else {
			cust();
		}
	});

	//Add Product
	$("body").delegate("#prodSubmit", 'click', function(e){
		var code = $("#prodCode").val();
		var name = $("#prodName").val();
		var price = $("#prodPrice").val();
		var catDrop = document.getElementById("prodCategory");
		var cat = catDrop.options[catDrop.selectedIndex].value;
		var cname = catDrop.options[catDrop.selectedIndex].text;
		var supDrop = document.getElementById("prodSupplier");
		var sid = supDrop.options[supDrop.selectedIndex].value;
		var sname = supDrop.options[supDrop.selectedIndex].text;
		var quan = $("#prodQuantity").val();
		//alert(quan);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {AddProduct:1, name:name, code:code, price:price, cat:cat, cname:cname, sid:sid, sname:sname, quan:quan},
			success: function(data){
				alert("Success");
				pro();
				$("#prodCode").val('');
				$("#prodName").val('');
				$("#prodPrice").val('');
				$('#ProductModal').modal('toggle');
			}
		})
	});

	//Delete Product
	$("body").delegate("#proDelete", "click", function(event){
		var pid = $(this).attr('pid');
		//alert(cid);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {DeleteProduct:1, pid:pid},
			success: function(data){
				alert("Delete Successful");
				pro();
			} 
		})
	});

	//Edit Product Modal 
	$("body").delegate("#proEdit", "click", function(event){
		var pname = $(this).attr('pname');
		var pcode = $(this).attr('pcode');
		var cid = $(this).attr('pcat');
		var sid = $(this).attr('sid');
		var pprice = $(this).attr('pprice');
		var pid = $(this).attr('pid');
		var quan = $(this).attr('quan');
		
		$("#prodEditName").val(pname);
		$("#prodEditCode").val(pcode);
		$("#prodEditPrice").val(pprice);
		$("#prodEditCategory").val(cid);
		$("#prodEditSupplier").val(sid);
		$("#prodEditQuantity").val(quan);
		$("#prodEditSubmit").attr("pid", pid);
		$('#ProductEditModal').modal('toggle');
		
	});

	//Edit Product
	$("#prodEditSubmit").on('click', function(e){
		var name = $("#prodEditName").val();
		var code = $("#prodEditCode").val();
		var price = $("#prodEditPrice").val();
		var quan = $("#prodEditQuantity").val();
		var pid = $("#prodEditSubmit").attr('pid');
		var catDrop = document.getElementById("prodEditCategory");
		var cat = catDrop.options[catDrop.selectedIndex].value;
		var cname = catDrop.options[catDrop.selectedIndex].text;
		var supDrop = document.getElementById("prodEditSupplier");
		var sid = supDrop.options[supDrop.selectedIndex].value;
		var sname = supDrop.options[supDrop.selectedIndex].text;
		//alert(sid);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {EditProduct:1, name:name, code:code, price:price, cat:cat, pid:pid, cname:cname, sid:sid, sname:sname, quan:quan},
			success: function(data){
				alert("Success");
				pro();
				$("#prodEditName").val('');
				$("#prodEditCode").val('');
				$("#prodEditPrice").val('');
				$("#prodEditQuantity").val('');
				$("#prodEditCategory")[0].selectedIndex = 0;
				$('#ProductEditModal').modal('toggle');
			}
		})
	});

	//Product Search
	$("body").delegate("#pro_search", "keyup", function(e){
		var ProText = $(this).val();
		if(ProText != ''){
			//alert(ProText);
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {SearchPro:1, ProText:ProText},
				success: function(data){
					$("#get_Products").html(data);
				}
			});
		}
		else {
			pro();
		}
	});

	//Get Product Page
	$("body").delegate("#proPage_no","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{product:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_Products").html(data);
			}
		})
	});

	//Add to Bill
	$("body").delegate("#addProd", "click", function(){
		var pid = $(this).attr("pid");
		var pprice = $(this).attr("pprice");
		var name = $(this).attr("pro_name");

		$.ajax({
			url: "action.php",
			method: "POST",
			data: {AddToBill:1, pid:pid, pprice:pprice, name:name},
			success: function(data){
				if(data == 'added'){
					getBill();
				}else{
					alert("Low Inventory");
				}
			}			
		})
	});

	//Delete from Bill
	$("body").delegate("#billRemove", "click", function(){
		var pid = $(this).attr("pid");

		$.ajax({
			url: "action.php",
			method: "POST",
			data: {DeleteFromBill:1, pid:pid},
			success: function(data){
				alert("Item Removed");
				getBill();
			}			
		})
	});

	//Cancel Transaction
	$("body").delegate("#cancelTrans", "click", function(){

		$.ajax({
			url: "action.php",
			method: "POST",
			data: {DeleteFromBill:1},
			success: function(data){
				alert("Transaction Cancelled");
				$("#discount").val('0');
				getBill();
			}			
		})
	});

	//Update Quantity Bill
	$("body").delegate("#inc_dec", "click", function(){
		var change = $(this).attr("change");
		var pid = $(this).attr("pid");
		//alert(change);
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {UpdateBill:1, change:change, pid:pid},
			success: function(data){
				//alert(data);
				if(data == 'low'){
					alert("Low Inventory");
				}
				getBill();
			}			
		})
	});

	//Apply Discount
	$("body").delegate("#discount", "change", function(){
		getBill();
	});

	//Pay 
	$("body").delegate("#payButton", "click", function(){
		var bill = $(this).attr("totalBill");
		$("#payTotal").val(bill);
		$("#payTotal").attr('t',bill);
		$("#PaymentModal").modal('toggle');
	});

	//Calculate change
	$("body").delegate("#Cash", "keyup", function(){
		var t = $("#payTotal").attr("t");
		//alert(t);
		var pay = $(this).val();
		var change = t - pay;
		//alert(change);
		$("#changeDue").val(change);
	});

	//Pay Complete
	$("body").delegate("#compPay", "click", function(){
		var t = $("#payTotal").attr("t");
		var r = $("#Cash").val();
		var d = $("#changeDue").val();
		var custDrop = document.getElementById("custNameDrop");
		var custName = custDrop.options[custDrop.selectedIndex].text;
		var custID = custDrop.options[custDrop.selectedIndex].value;

		if(r != 0){
			if(d == 0){

				$.ajax({
					url: "action.php",
					method: "POST",
					data: {CompPay:1, t:t, r:r, custName:custName, custID:custID},
					success: function(){
						
						getBill();
						$("#discount").val('0');
						$("#Cash").val('');
						$("#custNameDrop").selectedIndex = 0;
						$("#PaymentModal").modal('toggle');
					}
				})

			}else{
				alert("Rs. "+d+" due");
			}
		}else{
			alert("Please enter Cash Amount");
		}
	});

	$("body").delegate("#addUser", "click", function(){

		var name = $("#Name").val();
		var username = $("#userName").val();
		var password = $("#Password").val();
		var roleDrop = document.getElementById("Role");
		var role = roleDrop.options[roleDrop.selectedIndex].value;

		$.ajax({
			url: "action.php",
			method: "POST",
			data: {AddUser:1, username:username, name:name, password:password, role:role},
			success: function(){
				alert("Success");
				$("#Name").val('');
				$("#userName").val('');
				$("#Password").val('');
			}
		})
	});

})