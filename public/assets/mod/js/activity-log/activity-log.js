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

function store_logs(formData){
	jso.ajax({
		dataType: 'json',
		url: RESTACTIVITYLOGROUTE,
		method: 'POST',
		data: formData
	})
	.done(function(object) {
		if(!object){
	     	console("error inserting data");
	  	}
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	})
}

function getAllLogs(order_id, object){

	for(i = 0; i < object.length; i++){

		var agent_user_name = object[i].cmb2.activitylog_metabox.activitylog_agent_user_name;
		var dateTime = object[i].date;

    	var date2 = new Date(dateTime);
    	var date2string = date2.toDateString();
    	var time =formatAMPM(date2);

    	var timeAndDate = date2string+" "+time;

		var logs_order_id = object[i].cmb2.activitylog_metabox.activitylog_order_id;
		var activityName = object[i].title.rendered;

		if(logs_order_id == order_id){
			buildList = "";
			buildList += '<tr>';
			buildList += '<td>' +agent_user_name+ '</td>';
			buildList += '<td>' +timeAndDate+ '</td>';
			buildList += '<td>' +activityName+ '</td>';
			buildList += '</tr>';
			$('#activityLogs > tbody:last-child').append(buildList);
		}
	}

}

function logsActivity(order_id){

	jso.ajax({
		dataType: 'json',
		url: RESTACTIVITYLOGROUTE
	})
	.done(function(object){
		 getAllLogs(order_id, object);
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
}

$(document).ready(function(){

	var order_id = $("input[name=order_id]").val();
	logsActivity(order_id);

	var username = $("input[name=userLogin]").val();

	/** Sender's Information
	**/
	$("#updateSenderInfo").click(function(){
		var desc = "Update Sender's Information";
		var userlogin = username;
		var formData = {
			"status": "publish",
			"title" : desc,
			"cmb2": {           
	            "activitylog_metabox": {
	                "activitylog_agent_user_name": userlogin,
	                 "activitylog_order_id": order_id
	            }
	        },
		}
		store_logs(formData);
	});

	/** Receiver's Information
	**/
	$("#updateReceiverInfo").click(function(){
		var desc = "Update Receiver's Information";
		// var order_id = $("input[name=order_id]").val();
		var userlogin = username;
		var formData = {
			"status": "publish",
			"title" : desc,
			"cmb2": {           
	            "activitylog_metabox": {
	                "activitylog_agent_user_name": userlogin,
	                 "activitylog_order_id": order_id
	            }
	        },
		}
		store_logs(formData);
	});

	/** Delivery Date
	**/
	$("#updateOrdeDeliveryDate").click(function(){
		var desc = "Update Delivery Date";
		// var order_id = $("input[name=order_id]").val();
		var userlogin = username;
		var formData = {
			"status": "publish",
			"title" : desc,
			"cmb2": {           
	            "activitylog_metabox": {
	                "activitylog_agent_user_name": userlogin,
	                 "activitylog_order_id": order_id
	            }
	        },
		}
		store_logs(formData);
	});

	/** Message On Card
	**/
	$("#updateMessageOnCard").click(function(){
		var desc = "Update Message On Card";
		var order_id = $("input[name=order_id]").val();
		var userlogin = username;
		var formData = {
			"status": "publish",
			"title" : desc,
			"cmb2": {           
	            "activitylog_metabox": {
	                "activitylog_agent_user_name": userlogin,
	                 "activitylog_order_id": order_id
	            }
	        },
		}
		store_logs(formData);
	});

	/** Special Delivery Instruction 
	**/
	$("#updateSpecialDeliveryInstruction").click(function(){
		var desc = "Update Special Delivery Instructions";
		// var order_id = $("input[name=order_id]").val();
		var userlogin = username;
		var formData = {
			"status": "publish",
			"title" : desc,
			"cmb2": {           
	            "activitylog_metabox": {
	                "activitylog_agent_user_name": userlogin,
	                 "activitylog_order_id": order_id
	            }
	        },
		}
		store_logs(formData);
	});

	/** Notes
	**/
	$("#update_notes").click(function(){
		var desc = "Update Notes";
		// var order_id = $("input[name=order_id]").val();
		var userlogin = username;
		var formData = {
			"status": "publish",
			"title" : desc,
			"cmb2": {           
	            "activitylog_metabox": {
	                "activitylog_agent_user_name": userlogin,
	                 "activitylog_order_id": order_id
	            }
	        },
		}
		store_logs(formData);
	});

	/** Update Order status
	*************************************************/

	/** Head Variables **/
	var current_operator_output			= $("#assign_operator").val();
	var order_status 					= $("select[name=status] :selected").val(); // will work only with server side scripting
	var current_status 					= $("input[name=current_status]").val();
	var dispatch_status 				= $("select[name=dispatch_status] :selected").val();
	var current_dis_status 				= $("input[name=current_dis_status]").val();

	var selected_operator=[];
	$("#operator_output").change(function(){
		 // change_operator_output = this.value;
		 var change_operator_output =  $(this).find(':selected').data('operator');
		 selected_operator += change_operator_output;
	});	

	var selected_dispatch_status=[];
	$("#dispatch_status").change(function(){
		 change_dispatch_status = this.value;
		 selected_dispatch_status += change_dispatch_status;
	});	

	var selected_assign_florist=[];
	$("#assign_florist").change(function(){
		var change_assign_florist = $(this).find(':selected').attr('data-assign_florist');
		selected_assign_florist += change_assign_florist;
	});

	$("#update_assign").click(function(){

		var userlogin 						= username; // all use
		// var order_id 						= $("input[name=order_id]").val();
		var agent_pay_to_florist 			= $("input[name=agent_pay_to_florist]").val();
		var current_agent_pay_to_florist 	= $("input[name=current_agent_pay_to_florist]").val();

		if(selected_operator != null && selected_operator != "value" && selected_operator != ""){
			// console.log("should be here");
			var desc = "Update Operator";
			var formData = {
				"status": "publish",
				"title" : desc+"-"+selected_operator,
				"cmb2": {           
		            "activitylog_metabox": {
		                "activitylog_agent_user_name": userlogin,
		                 "activitylog_order_id": order_id
		            }
		        },
			}
			store_logs(formData);
		}

		/** Order Status
		*************************************************/
		if(order_status != current_status){
			var desc = "Update Order Status";
			var formData = {
				"status": "publish",
				"title" : desc+"-"+order_status,
				"cmb2": {           
		            "activitylog_metabox": {
		                "activitylog_agent_user_name": userlogin,
		                "activitylog_order_id": order_id
		            }
		        },
			}
			store_logs(formData);
		}

		/** Dispatch Status
		*************************************************/
		if(selected_dispatch_status != "undefined" && selected_dispatch_status != ""){
			var desc = "Update Dispatch Status";
			var formData = {
				"status": "publish",
				"title" : desc+"-"+selected_dispatch_status,
				"cmb2": {           
		            "activitylog_metabox": {
		                "activitylog_agent_user_name": userlogin,
		                "activitylog_order_id": order_id
		            }
		        },
			}
			store_logs(formData);
		}	

		/** Assign florist
		*************************************************/
		if(selected_assign_florist != "undefined" && selected_assign_florist != ""){
			var desc = "Update Assign A Florist";
			var formData = {
				"status": "publish",
				"title" : desc+"-"+selected_assign_florist,
				"cmb2": {           
		            "activitylog_metabox": {
		                "activitylog_agent_user_name": userlogin,
		                "activitylog_order_id": order_id
		            }
		        },
			}
			store_logs(formData);
		}	
		// console.log("not save here");

		/** Pay to Florist
		*************************************************/
		if( agent_pay_to_florist != "undefined" && agent_pay_to_florist != "" && agent_pay_to_florist != current_agent_pay_to_florist){
			var desc = "Update Pay to Florist";
			var formData = {
				"status": "publish",
				"title" : desc+"-"+agent_pay_to_florist,
				"cmb2": {           
		            "activitylog_metabox": {
		                "activitylog_agent_user_name": userlogin,
		                "activitylog_order_id": order_id
		            }
		        },
			}
			store_logs(formData)
		}
		$("#OpeningOrderForm").submit();
	});
});



