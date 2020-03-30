/** Load first Country down state on AddNewFlorist Modal
*/
function buildCountryState(object){
	var JSONObject = JSON.parse(object);
	for(key in JSONObject.states){
		if(JSONObject.states.hasOwnProperty(key)){
			var code = JSONObject.states[key].code;
			var name = JSONObject.states[key].name;
			$("#add_state").append('<option data-add-state-full-name="'+name+'" data-state="'+code+'" value="'+code+'"> '+name+' </option>');
		}
	}
}	
$("#add_country").change(function(event){
	event.preventDefault();
	var countrDownState = $(this).find(':selected').data('country-down-state')
	var dropdown=$('#add_state');
	dropdown.empty(); 
  	$.ajax({
		type: "POST",
		url: "../class/country.php",
		data: {'selectData': countrDownState },
	    success:  function(object){
	    	buildCountryState(object)			
	    }
	});
});

/** Load first data and Country on AddNewFlorist Modal
*/
function buildCountryForAddNewFlorist(object){
	var o = new Option("option text", "");
	$(o).html("---select---");
	$("#add_country").append(o)
	$.each(object, function(key, value){
		var code = value.code;
		var name = value.name;
		$("#add_country").append('<option data-add-country-full-name="'+name+'" data-country-down-state="'+code+'" value="'+code+'"> '+name+' </option>');
	});
}
function getCountryForAddNewFlorist(){
	$.ajax({
		dataType : 'json',
		url 	 : '../../../private/class/countries.php'
	})
	.done(function(object){
		buildCountryForAddNewFlorist(object);
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
}
getCountryForAddNewFlorist();

/* Save Data florist */
function createFlorist(formData){
	jso.ajax({
		dataType: 'json',
		url: RESTROUTE,
		method: 'POST',
		data: formData
	})
	.done(function(object) {
		if(object){
			location.reload(true);
		}
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	})
}
function generateJSON(){

	let formData = {
		"status": "publish",
		"title" : $('input[name=add_florist_name]').val(),
		"cmb2": {
	        "florist_metabox": {
	            "florist_contact_person": 			$('input[name=add_contact_person]').val(),
	            "florist_mobile_no": 				$('input[name=add_mobile_no]').val(),
	            "florist_telephone_no": 			$('input[name=add_telephone_no]').val(),
	            "florist_email_1": 					$('input[name=add_email]').val(),
	            "florist_country": 					$('select[name=add_country]').val(),
	            "florist_country_full_name":		$('#addCountryFullName').val(),
	            "florist_address_1": 				$('input[name=add_address_1]').val(),
	            "florist_address_2": 				$('input[name=add_address_2]').val(),
	            "florist_city": 					$('input[name=add_city]').val(),
	            "florist_state": 					$('select[name=add_state]').val(),
	            "florist_state_full_name":          $('#addStateFullName').val(),
	            "florist_latitude": 				$('input[name=latitude]').val(),
	            "florist_longitude": 				$('input[name=longitude]').val(),
	            "florist_zip_code": 				$('input[name=postal_code_zip]').val(),
	            "florist_status":					$('select[name=status]').val(),
	        }
	    }
	}
	createFlorist(formData);
}

$('select#add_country').change(function() {
    var capacityValue = $('select#add_country').find(':selected').data('add-country-full-name');
    $("#addCountryFullName").val(capacityValue);
});

$('select#add_state').change(function() {
    var add_state = $('select#add_state').find(':selected').data('add-state-full-name');
    $("#addStateFullName").val(add_state);
});

$(document).on('submit', 'form#addNewFlorist', function(event){
	event.preventDefault();
	$(".updating_info").show();
	generateJSON();
});