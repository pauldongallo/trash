<?php 
require_once('../../../private/initialize.php');
require_once(CLASS_PATH.'/customer.php');
include(SHARED_PATH.'/admin_header.php');
?>
<div class="wrapper" style="width:100%">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
	<div id="content">
		<div class="container-fluid">
		  	<div class="row">
			    <div class="col">
			      	<h1 class="h2"> Customers Dashboard </h1>
			    </div>
			    <?php // include('username/username.php'); ?>
			</div>
		</div>
		<table id="customerTable" class="table table-striped table-hover" style="font-size:14px;">
		  <thead>
		    <tr>
		    	<th scope="col">ID No.</th>
		    	<th scope="col">Name</th>
		    	<th scope="col">Email</th>
		    	<th scope="col">Contact No.</th>
		    	<th scope="col">Country of Origin</th>
		    	<th scope="col">Country of Delivery</th>
		    	<th scope="col">Date Of Last Purchase</th>
		    	<th scope="col">No. Of Orders Set </th>
		    	<th scope="col">No. Orders Received </th>
		    </tr>
		  </thead>
		  <tbody>	
		  </tbody>
		</table>
	</div>
</div>
<!-- Modal -->
<form id="updateCustomerInfo" >
	<div class="modal fade" id="customerDashboardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-info">
	        <h5 class="modal-title customer-profile text-light" > Customer Profile </h5>
	        <h5 class="modal-title cust-edit-information text-warning" id="exampleModalLabel"> Edit Information </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">  
	      	<div class="showCustomerInfo">
		      	<table id="customer-single-table" class="table table-none-border table-borderless" style="font-size:14px;">
					 <tbody>
					 	<tr>
					 		<td> <strong> First Name </strong> </td>
					 		<td><p id="firstName" class="mb_stand_txt_table"></p> </td>
					 		<td rowspan="4"> <strong> Billing Address </strong></td>
							<td rowspan="4"> 
								<span id="custCompany"></span> <br>
								<span id="custBillingAddress1"></span> <br>
								<span id="custBillingAddress2"></span> <br>	
								<span id="custBillingCity" class="mb_stand_txt_table"></span>&nbsp;<span id="custBillingState" class="mb_stand_txt_table"></span><br>	
								<span id="custBillingCode" class="mb_stand_txt_table"></span>&nbsp;<span id="custBillingCountry" class="mb_stand_txt_table"></span><br>
							</td>	
						</tr>
						<tr>
							<td> <strong> Last Name </strong> </td>
							<td> <span id="LastName" class="mb_stand_txt_table"></span> </td>
						</tr>
						<tr>
							<td> <strong> Email Address </strong> </td>
							<td> <span id="custBillingEmail" class="mb_stand_txt_table"></span> </td>
						</tr>
						<tr>
							<td> <strong> Phone</strong> </td>
							<td> <span id="custBillingPhone" class="mb_stand_txt_table"></span> </td>
						</tr>
						<tr>
							<td colspan="4"> <p class="text-right"> <button type="button" id="editCustomerInfo" class="btn btn-info btn-sm"> edit </button> </p> </td>
						</tr>
					 </tbody>
				</table>
				<h5 class="modal-title purchase-history text-info" > Purchase History </h5>
		      	<table id="customer-order-table" class="table table-borderless " style="font-size:14px;">
				  	<thead class="thead-dark">
				    	<tr>
				      <th scope="col">Order Date</th>
				      <th scope="col">Delivery Date</th>
				      <th scope="col">Order No.</th>
				      <th scope="col">Order Value</th>
				    	</tr>
				  	</thead>
				  	<tbody>
				 	 </tbody>
				</table>
			</div>
			<input type="hidden" name="customer_id" />
			<div class="showCustomerEditInfo">
				<div class="row">
					<div class="col-sm-5">
						<label for="staticEmail2">&nbsp;</label>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm"> <strong class="stdard_font_label"> First Name </strong></label>
						    <div class="col-sm-5">
						      <input type="text" id="editBillingfirstName" name="editBillingfirstName" class="form-control form-control-sm" />					    
						    </div>
						</div>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm"> <strong class="stdard_font_label">Last Name </strong></label>
						    <div class="col-sm-5">
						      <input type="text" id="editBillingLastName" name="editBillingLastName" class="form-control form-control-sm" />					    
						    </div>
						</div>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm"> <strong class="stdard_font_label"> Email</strong> </label>
						    <div class="col-sm-5">
						      <input type="text" id="editBillingEmail" name="editBillingEmail" class="form-control form-control-sm" />					    
						    </div>
						</div>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm"> <strong class="stdard_font_label"> Phone </strong> </label>
						    <div class="col-sm-5">
						      <input type="text" id="editBillingPhone" name="editBillingPhone" class="form-control form-control-sm" />					    
						    </div>
						</div>
					</div>
					<div class="col-sm-5">
						<h5 class="modal-title" id="exampleModalLabel"> <strong class="stdard_font_label"> Billing Address </strong> </h5>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> <strong class="stdard_font_label"> Company </strong> </label>
						    <div class="col-sm-7">
						       	<input type="text" id="editBillingCompany" name="editCompany" class="form-control form-control-sm">					    
						    </div>
						</div>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> <strong class="stdard_font_label"> Country </strong> </label>
						    <div class="col-sm-7">
						     	<select id="edit_country" name="editBillingCountry" class="form-control form-control-sm"></select>						    
						    </div>
						</div>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> <strong class="stdard_font_label"> Street address </strong> </label>
						    <div class="col-sm-7">
						      <input type="text" id="editBillingStreetAddress1" name="editBillingStreetAddress1" class="form-control form-control-sm">
						        <small> Houseand number and street name </small>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> </label>
						    <div class="col-sm-7">
						      <input type="text" id="editBillingStreetAddress2" name="editBillingStreetAddress2" class="form-control form-control-sm">
						        <small> Apartment, suite, unit etc. </small>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="stateCountry" class="col-sm-3 col-form-label"><strong class="stdard_font_label">Town/City</strong></label>
						    <div class="col-sm-7">
						      	<input type="text" id="editBillingCity" name="editBillingCity" class="form-control form-control-sm">
						    </div>
						</div>
						<div class="form-group row">
						    <label for="stateCountry" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> State/Country</strong></label>
						    <div class="col-sm-7">
						      	<select id="edit_state" name="editBillingState" class="form-control form-control-sm"></select>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="stateCountry" class="col-sm-3 col-form-label"><strong class="stdard_font_label"> Postcode/ZIP </strong></label>
						    <div class="col-sm-7">
						      	<input type="text" id="editBillingPostcode" name="editBillingPostcode" class="form-control form-control-sm">
						    </div>
						</div>
					</div>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary close_customer" data-dismiss="modal">Close</button>
	        <button type="button" id="update_customer_info"  class="btn btn-warning updateButton">Save changes</button>
	        <input type="hidden" name="update_customer_info" value="update" />
	      </div>
	    </div>
	  </div>
	</div>
</form>

<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<script>

	const formatter = new Intl.NumberFormat('en-PH', {
		style: 'currency',
		currency: 'PHP',
		minimumFractionDigits: 2
	});

	function dateTimeT(datetime){
		var date = new Date(datetime);
		var date_month = date.getMonth();
		var months = [ "January", "February", "March", "April", "May", "June", 
            "July", "August", "September", "October", "November", "December" ];
		var selectedMonthName = months[date_month];
		return selectedMonthName + '-' + date.getDate() + '-' +  date.getFullYear();
	}

	function epochToHumanReadable(datemtime){
		dateObj = new Date(datemtime * 1000);
		var month = dateObj.getUTCMonth(); 
		var day = dateObj.getUTCDate();
		var year = dateObj.getUTCFullYear();
		var months = [ "January", "February", "March", "April", "May", "June", 
	           "July", "August", "September", "October", "November", "December" ];
		var selectedMonthName = months[month];
		newdate = selectedMonthName + "-" + day + "-" + year;
		return newdate;
	}

	$(".modal").on("hidden.bs.modal", function(){
		$("#customer-order-table > tbody:last-child").html("");
	});

	function currencyFormat(num) {
	  return 'P' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
	}

	function buildCustomerOrderHistory(object){
		var output = "";
		for(let i=0; i<object.length; i++){
			var id = object[i].id;
			var date_created = dateTimeT(object[i].date_created);	
			var meta_data = object[i].meta_data;
			var number_ = object[i].number;	
			var total_ = object[i].total;	
				for(let c=0; c<meta_data.length; c++){
					if(meta_data[c].key =='_orddd_lite_timestamp'){
						var delivery_date = meta_data[c].value;
						var epoch_delivery = epochToHumanReadable(delivery_date);
					}
				}
			output += "<tr>";
			output += "<td>"+ date_created + "</td>";
			output += "<td>"+ epoch_delivery + "</td>";
			output += "<td><a href='../orders/order-assign.php?id="+id+"'>" +number_+ "</a></td>";
			output += "<td>"+ formatter.format(total_) + "</td>";
		}

		$('#customer-order-table > tbody:last-child').append(output);
	}

	function getCustomerOderHistory(orderHistory){
		jso.ajax({
			dataType: 'json',
			url : orderHistory
		})
		.done(function(object){
			buildCustomerOrderHistory(object);
		})
		.fail(function(){
			console.error("REST error. Nothing returned for AJAX.");
		})
	}

	/**
	* Dynamicaly Change state by basing the Country
	*/
	function buildEditCountryState(object){
		var JSONObject = JSON.parse(object);
		for(key in JSONObject.states){
			if(JSONObject.states.hasOwnProperty(key)){
				var code = JSONObject.states[key].code;
				var name = JSONObject.states[key].name;
				$("#edit_state").append('<option value="'+code+'"> '+name+' </option>');
			}
		}
	}	
	$("#edit_country").change(function(event){
		event.preventDefault();
		var countrDownState = $(this).find(':selected').data('edit-country-down-state')
		var dropdown=$('#edit_state');
		dropdown.empty(); 
	  	$.ajax({
			type: "POST",
			url: " ../../../private/service/country.php",
			data: {'selectData': countrDownState },
		    success:  function(object){
		    	buildEditCountryState(object)			
		    }
		});
	});

	/**
	* Get the current Country and state by first loading parameter
	*/
	function buildLoadFirstCurrentCountryState(object, getStateCode){
		console.log(object);
		var JSONObject = JSON.parse(object);
		for(key in JSONObject.states){
			if(JSONObject.states.hasOwnProperty(key)){
				var code = JSONObject.states[key].code;
				var name = JSONObject.states[key].name;
				if(code == getStateCode ){
					var option = 'selected="selected"';
					$("#edit_state").append('<option value="'+code+'" '+option+'> '+name+' </option>');
				} else {
					$("#edit_state").append('<option value="'+code+'"> '+name+' </option>');
				}
			}
		}
	}
	function getloadFirstCurrentCountryState(getCountryCode,getStateCode){
		$.ajax({
			type: "POST",
			url: "../../../private/class/country.php",
			data: {'selectData': getCountryCode },
	    	success:  function(object){
	    		buildLoadFirstCurrentCountryState(object, getStateCode)			
	    	}
		});
	}

	/* laod first country */
	function buildLoadFirstCurrentCountry(object, getCountryCode){
		$.each(object, function(key, value){
			var code = value.code;
			var name = value.name;
			if(code == getCountryCode){
				var option = 'selected="selected"';
				$("select#edit_country").append('<option data-edit-country-down-state="'+code+'" value="'+code+'" '+option+'>' +name+ '</option>');
			} else {
				$("select#edit_country").append('<option data-edit-country-down-state="'+code+'" value="'+code+'"> '+name+' </option>');
			}	
		});
	}
	function loadFirstCurrentCountry(getCountryCode){
		$.ajax({
			dataType : 'json',
			url: "../../../private/class/countries.php",
		})
		.done(function(object){
			buildLoadFirstCurrentCountry(object, getCountryCode);
		})
		.fail(function(){
			console.error("REST Error. Nothing return for ajax");
		})
	}

	$(document).ready(function(){
		$(".showCustomerEditInfo").hide(); // show of view
		$(".cust-edit-information").hide(); //show of edit
		$(".updateButton").hide();

		var dataTableCustomer = $("#customerTable").DataTable({
			"scrollCollapse"	: false,
           	"paging"			: false,
            "orderClasses"	: false,
            "ordering"		: false,
           	"select"		: true,
            ajax:				"../../../private/service/customers.php",
            columns: [
            	{ "data": "id" },
            	{ "data": "full_name",
            		"render": function(data, type, row){
            			var build_link = '';
						build_link += '<a href="javascript:void(0);" class="florist" ';
						build_link += 'data-toggle="modal" ';
						build_link += 'data-target="#customerDashboardModal" ';	
						build_link += 'data-customer-dashboard-id="'+row.id+'" ';
						build_link += 'data-customer-first-name="'+row.first_name+'" ';
						build_link += 'data-customer-last-name="'+row.last_name+'" ';		
						build_link += 'data-customer-company="'+row.company+'" ';
						build_link += 'data-customer-address_1="'+row.address_1+'" ';
						build_link += 'data-customer-address_2="'+row.address_2+'" ';	
						build_link += 'data-customer-city="'+row.city+'" ';
						build_link += 'data-customer-state="'+row.state+'" ';
						build_link += 'data-customer-postcode="'+row.postcode+'" ';		
						build_link += 'data-customer-country="'+row.country+'" ';	
						build_link += 'data-customer-email="'+row.email+'" ';	
						build_link += 'data-customer-phone="'+row.phone+'" ';	
						build_link += 'data-customer-shipping_country="'+row.shipping_country+'" ';
						build_link += 'data-customer-purchase-history="'+row.order_history+'" ';		
						build_link += 'data-customer-date_created="'+row.date_created+'" ';													
						build_link += '>';
						build_link += data
						build_link += '</a>';
						return build_link;
			         }
           		},
            	{ "data": "email"},
            	{ "data": "phone"},
            	{ 
            		"data": "country"
            	},
            	{ "data": "shipping_country"},
            	{ "data": "date_created"},
            	{ "data": "orders_sent"},
            	{ "data": "orders_recieved"}       
            ],
		});

		$("#customerDashboardModal").on('show.bs.modal', function (e) {
		    var triggerLink = $(e.relatedTarget);
		   	var customerID = triggerLink.data("customer-dashboard-id");
		    var firstName = triggerLink.data("customer-first-name");	
 			var LastName = triggerLink.data("customer-last-name");	
 			var company = triggerLink.data("customer-company");
 			var address_1 = triggerLink.data("customer-address_1");
 			var address_2 = triggerLink.data("customer-address_2");
 			var city = triggerLink.data("customer-city");	
 			var state = triggerLink.data("customer-state");
 			var postcode = triggerLink.data("customer-postcode");
 			var country = triggerLink.data("customer-country");
 			var email = triggerLink.data("customer-email");
 			var phone = triggerLink.data("customer-phone");
 			var shipping_country = triggerLink.data("customer-shipping_country");			
			if(email !== null){	
				let orderHistory = ORDERSSEARCH+"="+email+"&consumer_key="+CK+"&consumer_secret="+CS;
				getCustomerOderHistory(orderHistory);
			}
		    $("#firstName").html(firstName);
		    $("#LastName").html(LastName);
		    $("#custCompany").html(company);
		    $("#custBillingAddress1").html(address_1);
		    $("#custBillingAddress2").html(address_2);
		    $("#custBillingCity").html(city);
		    $("#custBillingState").html(state);
		    $("#custBillingCountry").html(country);
		    $("#custBillingCode").html(postcode);
		    $("#custBillingEmail").html(email);
		    $("#custBillingPhone").html(phone);		

		    /* Edit */
		    // $("input[name=firstName]").html(firstName);
		    $("input[name=customer_id]").val(customerID);
		    $("#editBillingfirstName").val(firstName);
		    $("#editBillingLastName").val(LastName);
		    $("#editBillingEmail").val(email);
		    $("#editBillingPhone").val(phone);
		    $("#editBillingCompany").val(company);
		    $("#editBillingStreetAddress1").val(address_1);
		    $("#editBillingStreetAddress2").val(address_2);
		    $("#editBillingCity").val(city);
		    $("#editBillingState").val(state);
		    loadFirstCurrentCountry(country);
		    getloadFirstCurrentCountryState(country,state);
		    $("#editBillingPostcode").val(postcode);
		    $("#editBillingEmail").val(email);
		    $("#editbillingPhone").val(phone);	
		});

		$("#editCustomerInfo").click(function(){
			$(".showCustomerInfo").hide();
			$(".purchase-history").hide();
			$(".customer-profle").hide();

			$(".cust-edit-information").show();
			$(".showCustomerEditInfo").show();
			$(".updateButton").show();
		});

		$("#update_customer_info").on('click', function(event){
	   		event.preventDefault();
	   		var formData = new FormData($('form#updateCustomerInfo')[0]);
	   		$.ajax({
	   			type: "POST",
	   			url: "../../../private/service/customer_info_update.php",
	   			data: formData,
			    cache: false,
			    contentType: false,
			    processData: false,
			    success:  function(data){
			    	if(data){		    	
			    		location.reload(true);
			    	} else {
			    		alert("error inserting data");
			    	}
			    }
	   		});
	   		$('#customerDashboardModal').modal('toggle');	   		
	    });

		$(".close_customer").click(function(){
			$(".showCustomerInfo").show();
			$(".purchase-history").show();
			$(".customer-profile").show();

			$(".cust-edit-information").hide();
			$(".showCustomerEditInfo").hide();
			$(".updateButton").hide();
		});

		$(".modal").on("hidden.bs.modal", function(){
			$("#customer-order-table > tbody:last-child").html("");
		})

	});
/* show modal box by clicking the florist id */
</script>
<?php // include('../template/footer.php'); ?> -->