<?php
require_once('../../../private/initialize.php');
require_once(CLASS_PATH.'/order.php');
include(SHARED_PATH.'/admin_header.php');
$page_title = 'Order Dashboard';
?>

<form id="page_length" action="orders-dashboard.php" method="post">
    <input type="text" name="page_length" value="" />
    <button type="button" id="submitBtn" name="submitBtn">Submit Form</button>
</form>
<div class="wrapper">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
	<div id="content">
	<div class="container-fluid">
	  	<div class="row">
		    <div class="col">
		      	<h1 class="text-left"> <?php echo $page_title; ?> </h1>
		    </div>
		    <div class="col">
			  	<p class="text-right">
			  		<i class="fas fa-user-circle" style="font-size: 30px;"></i>
			  		<span class="username text-info" style="font-size:14px;"></span>
			  	</p>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
		    <strong><small>  </small></strong>
		</div>		 
	  	<div class="card-body">	  
	  		<div class="row">
		  		<div class="col-sm-3">	
		  			<div class="form-group mb-1">
					     <strong><label for="staticEmail2"><small style="font-weight:bold;">Order Date: </small></label> </strong>
					</div>
					 <div class="form-group mx-sm-3 mb-2">	
						<form class="form-inline">												
						  <div class="form-group mb-2">
						    	<strong><label for="staticEmail2"><small style="font-weight:bold;">From: </small></label> </strong>
						  </div>
						  <div class="form-group mx-sm-3 mb-2">		
						    <input type="text" id="fromOrderDate" class="form-control form-control-sm" size="10" placeholder="mm/dd/yyyy">
						  </div>
						    <div class="form-group mb-2">
						    <strong> <label for="staticEmail2"><small style="font-weight:bold;">To: </small></label> </strong>
						  </div>
						  <div class="form-group mx-sm-3 mb-2">
						    <input type="text" id="toOrderDate" class="form-control form-control-sm" size="10" placeholder="mm/dd/yyyy">
						  </div>
						</form>
					</div>
				</div>
				<div class="col-sm-3">	
		  			<div class="form-group mb-1">
					     <strong><label for="staticEmail2"><small style="font-weight:bold;">Delivery Date: </small></label> </strong>
					</div>
					 <div class="form-group mx-sm-3 mb-2">	
						<form class="form-inline">												
						  <div class="form-group mb-2">
						    	<strong><label for="staticEmail2"><small style="font-weight:bold;">From: </small></label> </strong>
						  </div>
						  <div class="form-group mx-sm-3 mb-2">		
						    <input type="text" id="fromDeliveryDate" class="form-control form-control-sm" size="10" placeholder="mm/dd/yyyy">
						  </div>
						    <div class="form-group mb-2">
						    <strong> <label for="staticEmail2"><small style="font-weight:bold;">To: </small></label> </strong>
						  </div>
						  <div class="form-group mx-sm-3 mb-2">
						    <input type="text" id="toDeliveryDate" class="form-control form-control-sm" size="10" placeholder="mm/dd/yyyy">
						  </div>
						</form>
					</div>
				</div>
				<div class="col-sm-1">		 
					 <strong><label for="staticEmail2"><small style="font-weight:bold;">Dispatch Status: </small></label> </strong>	
					<div class="row">
					  <div class="form-group mx-sm-3 mb-2">		
					     <?php echo $order_obj->dispatch_status_html(); ?> 
					  </div>
					 </div>
				</div>
				<div class="col-sm-1">		 
					 <strong><label for="staticEmail2"><small style="font-weight:bold;"> Search Store: </small></label> </strong>	
					<div class="row">
					  <div class="form-group mx-sm-3 mb-2">		
					    	<input id="searchStoreName" class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					  </div>
					 </div>
				</div>
				<div class="col-sm-1">		 
					 <strong><label for="staticEmail2"><small style="font-weight:bold;"> Order Status: </small></label> </strong>	
					<div class="row">
					  <div class="form-group mx-sm-3 mb-2">		
					    	<?php echo $order_obj->order_status_html(); ?> 		 
					  </div>
					 </div>
				</div>
				<div class="col-sm-1">		 
					 <strong><label for="staticEmail2"><small style="font-weight:bold;"> Clear Filters: </small></label> </strong>	
					<div class="row">
					  <div class="form-group mx-sm-3 mb-2">		
					    	 <button type="button" id="resetAllFilters" class="btn btn-sm btn-warning">reset</button>
					  </div>
					 </div>
				</div>
			</div>
	  	</div>
	</div>
	<br>
	<table id="dashboard" class="table-responsive display table table-striped table-bordered nowrap" style="width:100%">
		<col width="190"> <!-- Operator Name -->
	    <col width="125"> <!-- Order No. -->
	    <col width="180"> <!-- Order Date -->
	    <col width="240"> <!-- Delivery Date -->
	    <col width="120"> <!-- Order Amount -->
	    <col width="260"> <!-- Order Amount in AUD -->
	    <col width="100"> <!-- Pay to Florist -->
	    <col width="100"> <!-- Dispatch Status -->
	    <col width="90"> <!-- Notes -->
	    <col width="140"> <!-- Fraud Score -->
	    <col width="140"> <!-- Store Name -->
	    <col width="200px"> <!-- Order Status -->
    	<thead> 	
	        <tr>
	          <th> Operator Name </th>
	          <th> Order No. </th>
	          <th> Order Date </th>
	          <th> Delivery Date </th>
	          <th> Order Amount </th>
	          <th> Order Amount in AUD </th>
	          <th> Pay to Florist </th>
	          <th> Dispatch Status </th>
	          <th> Notes </th>
	          <th> Fraud Score </th>
	          <th> Store Name </th>
	          <th> Order Status </th>
	        </tr>
	    </thead>
    </table>
    <form id="agent_notes_form" >
		<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content"  style="width:60%;">
		            <div class="modal-header bg-info">
		                <h5 id="modalTitle" class="text-white"> Notes </h5>
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		            </div>
		            <div class="modal-body">
		            	<input type="hidden" id="note_id" name="note_id" />
		            	<input type="hidden" id="order_id" name="order_id" />
		            	<input type="hidden" name="shop_order_mbh_notes_agent" value="shop_order_mbh_notes_agent" />	 
		            	<div id="message_history"></div>           	
		            	<textarea id="notes_content" name="note_content" rows="10" class="form-control"></textarea>
		            </div>
		            <div class="modal-footer">
		                <button class="btn close_notes" data-dismiss="modal" aria-hidden="true">Close</button>
		              	<button type="button" id="update_notes" value="update" class="btn btn-primary">Save changes</button>
		                <!--  <button type="submit" class="btn btn-primary">Save changes</button> -->
		                <input type="hidden" name="update_notes" value="update" />
		            </div>
		        </div>
		    </div>
		</div>
	</form>
	</div>
</div>
<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<script>

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
       	var min = $('#fromOrderDate').datepicker("getDate");
    	var max = $('#toOrderDate').datepicker("getDate");
        var startDate = new Date(data[2]);
        if (min == null && max == null) { return true; }
        if (min == null && startDate <= max) { return true;}
        if(max == null && startDate >= min) {return true;}
        if (startDate <= max && startDate >= min) { return true; }
        return false;
    }
);

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
       	var min = $('#fromDeliveryDate').datepicker("getDate");
    	var max = $('#toDeliveryDate').datepicker("getDate");
        var startDate = new Date(data[3]);
        if (min == null && max == null) { return true; }
        if (min == null && startDate <= max) { return true;}
        if(max == null && startDate >= min) {return true;}
        if (startDate <= max && startDate >= min) { return true; }
        return false;
    }
);

function RefreshTable(tableId, urlData)
{
  $.getJSON(urlData, null, function( json )
  {
    table = $(tableId).dataTable();
    oSettings = table.fnSettings();
    table.fnClearTable(this);
    for (var i=0; i<json.aaData.length; i++)
    {
      table.oApi._fnAddData(oSettings, json.aaData[i]);
    }
    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
    table.fnDraw();
  });
}

function AutoReload()
{
  RefreshTable('#dashboard', '../../../private/service/orders.php');
  setTimeout(function(){AutoReload();}, 30000);
}


$(document).ready(function(){

	var table = $('#dashboard').DataTable({ 
        "paging"			: true,
        "serverSide": true,
        ajax                : "../../../private/service/orders.php",
        "columns": [
            { "data": "operator"},
            { 
            	"data"		: "order_number",
            	"render": function(data, type, row, meta){
		            if(type === 'display'){
		                data = '<a class="mod_order_number card-link" href="http://modin.test/public/admin/orders/order-assign.php?id='+data.id+'">'+data.order_number+'</a>';
		            }
		            return data;
		         }
            },
	      { "data": "order_date"    },
	      { "data": "delivery_date"	},
	      { "data": "order_amount"	},
	      { "data": "order_amount_aud"},
	      { "data": "pay_to_florist"	},
	      { "data": "dispatch_status" },
	      { "data": "notes", 
	      	"render": function(data, type, row){
	      		var build_icon = '';
				build_icon += '<a href="javascript:void(0)" ';
				build_icon += 'data-target="#myModal" ';
				build_icon += 'data-toggle="modal" ';
				build_icon += 'data-order-id="'+ data +'" ';
				build_icon += '>';
				build_icon += '<i class="fas fa-clipboard text-danger"></i>';
				build_icon += '</a>';
				return build_icon;
	      	}},		           	
	      { "data": "fraud_score"		},
	      { "data": "store_name"		},
	      { "data": "order_status"	}
		]	

    });	
    	
    $("select[name=dashboard_length]").change(function(){
    	$("input[name=page_length]").val(this.value);
    	 console.log(this.value);
    	$("#submitBtn").submit(); // Submit the form
    });

    setTimeout(function(){AutoReload();}, 30000);


	/*** Order Date ***/
    $("#fromOrderDate").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $("#toOrderDate").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $('#fromOrderDate, #toOrderDate').change(function () {
        table.draw();
    });

    /*** Delivery Date ***/
	$("#fromDeliveryDate").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
		$("#toDeliveryDate").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
		$('#fromDeliveryDate, #toDeliveryDate').change(function () {
		    table.draw();
	});

	$('#orde_status_dash').on('change', function(){
	    table
	    .column(11)
	    .search(this.value)
	    .draw();
	});

	$('#dispatch_status_dash').on('change', function(){
	    table
	    .column(7)
	    .search(this.value)
	    .draw();
	});

	$('#searchStoreName').on('keyup', function(){
	    table
	    .column(10)
	    .search(this.value)
	    .draw();
	});

	$("#resetAllFilters").click(function(){
		location.reload(true);
	});

	function buildAgentNotes(order_id, object){
		// console.log(object);
		var agentNotes = "";
		var msg_output = "";
		for(let i=0; i< object.length; i++){
			var id = object[i].id;

			var agent_order_note = object[i].cmb2.note_metabox.note_agent_note_id;
			var note_event = object[i].cmb2.note_metabox.note_event;
			var note_assigned_by = object[i].cmb2.note_metabox.note_assigned_by;

			var title = object[i].title.rendered;
			var content = object[i].content.rendered;
			if(agent_order_note==order_id){
				$("#order_id").val(order_id);
				$("#note_id").val(id);
				msg_output += '<div class="card text-white bg-info">';
				msg_output += '<div class="card-header"><small>'+title+'</small></div>';
				msg_output += '<div class="card-body">';
				msg_output += '<div id="message_content_event" class="card-text"><small>'+note_event+'</small></div>';
				msg_output += '<div id="message_content" class="card-text"><small>'+content+'</small></div>';
				msg_output += '<div id="message_content" class="card-text"><small> Assigned By: '+note_assigned_by+'</small></div>';
				msg_output += '</div>';
				msg_output += '</div><br>';
			}
		}
		$("#message_history").append(msg_output);
	}

	function getAgentNotes(order_id, orderRoutes){
		jso.ajax({
			dataType: 'json',
			url : orderRoutes
		})
		.done(function(object){
			buildAgentNotes(order_id, object);
		})
		.fail(function(){
			console.error("REST error. Nothing returned for AJAX.");
		});
	}

	function formatAMPM(date) {
	  var hours = date.getHours();
	  var minutes = date.getMinutes();
	  var ampm = hours >= 12 ? 'pm' : 'am';
	  hours = hours % 12;
	  hours = hours ? hours : 12; // the hour '0' should be '12'
	  minutes = minutes < 10 ? '0'+minutes : minutes;
	  var strTime = hours + ':' + minutes + ' ' + ampm;
	  return strTime;
	}

	$("#myModal").on('show.bs.modal', function (e) {
	    var triggerLink = $(e.relatedTarget);
	    var order_id = triggerLink.data("order-id");
	    $("input[name=order_id]").val(order_id);
		getAgentNotes(order_id, RESTNOTESROUTE);	  	   
	});

	$(".close_notes").click(function(){
	  	$("#notes_content").text("");
	  	$("#message_history").text("");
	});

	$(".close").click(function(){
		$("#notes_content").text("");
		$("#message_history").text("");
	});
	  
   	$("#update_notes").on('click', function(event){
			event.preventDefault();

			var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();
		var today = mm + '-' + dd + '-' + yyyy;
		var hours = formatAMPM(new Date);
		var today_hours = today+" "+hours;
	
		var note_content = $("#notes_content").val();
		var order_id = $("input[name=order_id]").val();

		var unique = "NT"; // note added
		var desc = "NOTE ADDED";
		var event = "Added Note";

		var formData = {
			"status": "publish",
			"title" : today_hours+" - "+desc,
			"content": note_content,
			"cmb2": {
	           "note_metabox": {
	           		"note_unique" : unique,
	               	"note_agent_note_id": order_id,
	               	"note_related_id": loginID,
	                "note_event": event+" * "+username,
	           },
		    },
		}

   		jso.ajax({
   			dataType: 'json',
   			url: RESTCREATENOTESROUTE,
   			method: "POST",
   			data: formData,
		    success:  function(data){
		    	if(data){
		    		location.reload(true);		    		
		    	} else {
		    		alert("error inserting data");
		    	}
		    }
   		});

   		$('#myModal').modal('toggle');
			return false;
    });
	    
});

</script>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>