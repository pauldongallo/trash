function getloadFirstFloristStatus(getFloristStatus){
	if(getFloristStatus == "Active"){
		var option = 'selected="selected"';
		$("select#editStatus").val("Active");
	}else{
		$("select#editStatus").val("Inactive");
	}
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
			$("#edit_state").append('<option data-edit-state-full-name="'+name+'" data-edit-state="'+code+'" value="'+code+'"> '+name+' </option>');
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
		url: "../../../private/class/country.php",
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
	var JSONObject = JSON.parse(object);
	for(key in JSONObject.states){
		if(JSONObject.states.hasOwnProperty(key)){
			var code = JSONObject.states[key].code;
			var name = JSONObject.states[key].name;
			if(code == getStateCode ){
				console.log("getStateCode", getStateCode);
				var option = 'selected="selected"';
				$("#editStateFullName").val(name);
				$("#edit_state").append('<option data-edit-state-full-name="'+name+'" value="'+code+'" '+option+'> '+name+' </option>');
			} else {
				$("#edit_state").append('<option data-edit-state-full-name="'+name+'" value="'+code+'"> '+name+' </option>');
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
function buildLoadFirstCurrentCountry(object, getCountryCode){
	$.each(object, function(key, value){
		var code = value.code;
		var name = value.name;
		if(code == getCountryCode){
			var option = 'selected="selected"';
			$("#editCountryFullName").val(name);	
			$("select#edit_country").append('<option data-edit-country-full-name="'+name+'" data-edit-country-down-state="'+code+'" value="'+code+'" '+option+'>' +name+ '</option>');
		} else {
			$("select#edit_country").append('<option data-edit-country-full-name="'+name+'" data-edit-country-down-state="'+code+'" value="'+code+'"> '+name+' </option>');
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


/**
* Build form output current value
*/
function buildEditFloristModal(object){
	var id 					= object.id;
	var title 				= object.title.rendered;
	var contact_person 		= object.cmb2.florist_metabox.florist_contact_person;
	var mobile_no 			= object.cmb2.florist_metabox.florist_mobile_no;
	var telephone_no 			= object.cmb2.florist_metabox.florist_telephone_no;
	var email_1 				= object.cmb2.florist_metabox.florist_email_1;
	var country 			= object.cmb2.florist_metabox.florist_country;
	var address_1 				= object.cmb2.florist_metabox.florist_address_1;
	var address_2 				= object.cmb2.florist_metabox.florist_address_2;
	var city 				= object.cmb2.florist_metabox.florist_city;
	var state 				= object.cmb2.florist_metabox.florist_state;
	var latitude 			= object.cmb2.florist_metabox.florist_latitude;
	var longitude 			= object.cmb2.florist_metabox.florist_longitude;
	var code 				= object.cmb2.florist_metabox.florist_zip_code;
	var status 				= object.cmb2.florist_metabox.florist_status;

	$("input[name=floristID]").val(id);
	$("input[name=edit_florist_name]").val(title);	
	$("input[name=edit_contact_person]").val(contact_person);
	$("input[name=edit_mobile_no]").val(mobile_no);		
	$("input[name=edit_telephone_no]").val(telephone_no);	
	$("input[name=edit_email]").val(email_1);
	$("select[name=edit_country]").val(country);
	$("input[name=edit_address_1]").val(address_1);
	$("input[name=edit_address_2]").val(address_2);
	$("input[name=edit_city]").val(city)
	$("input[name=edit_latitude]").val(latitude);
	$("input[name=edit_longitude]").val(longitude);
	$("input[name=edit_postal_code_zip]").val(code);
	$("input[name=edit_status]").val(status);
}
function getfloristEdit(floristDataID){
	jso.ajax({
		type: "GET",
		url: RESTROUTE+floristDataID
	})
	.done(function(object){
		buildEditFloristModal(object);
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
}

/**
* Get the full country name and city name base on country
*/
$('select#edit_country').change(function() {
    var capacityValue = $('select#edit_country').find(':selected').data('edit-country-full-name');
    $("#editCountryFullName").val(capacityValue);
});

$('select#edit_state').change(function() {
    var add_state = $('select#edit_state').find(':selected').data('edit-state-full-name');
    $("#editStateFullName").val(add_state);
});

/* show modal box by clicking the florist id */
$(function(){
    $('#florist-table').on('click','.florist', function(){
    	var floristPostID = $(this).data('florist-post-id');
    	var getCountryCode = $(this).data('country-code');
    	var getStateCode = $(this).data('state-code');
    	console.log("get statecode", getStateCode);
    	var getFloristStatus = $(this).data('florist-status');
    	loadFirstCurrentCountry(getCountryCode);
    	getloadFirstCurrentCountryState(getCountryCode,getStateCode);
    	getloadFirstFloristStatus(getFloristStatus);
    	getfloristEdit(floristPostID);
    });
});