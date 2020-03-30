function updateFlorist(formData, floristID){
	let requestUpdateFloristRoute;
	requestRoute = RESTROUTE + floristID;
	jso.ajax({
		dataType: 'json',
		url: requestRoute,
		method: 'POST',
		data: formData
	})
	.done(function(object) {
		if(object){
			location.reload(true);
		}
	})
	.fail(function() {
		alert("REST error. Nothing returned for AJAX.");
	})
}
function updateFloristGenerateJSON(floristID){
	let formData = {
		"status": "publish",
		"title": $("input[name=edit_florist_name]").val(),
		"cmb2": {
	        "florist_metabox": {
	            "florist_contact_person": 			$('input[name=edit_contact_person]').val(),
	            "florist_mobile_no": 				$('input[name=edit_mobile_no]').val(),
	            "florist_telephone_no": 			$('input[name=edit_telephone_no]').val(),
	            "florist_email_1": 					$('input[name=edit_email]').val(),
	            "florist_country": 					$('select[name=edit_country]').val(),
	            "florist_country_full_name": 		$('#editCountryFullName').val(),
	            "florist_address_1": 				$('input[name=edit_address_1]').val(),
	            "florist_address_2": 				$('input[name=edit_address_2]').val(),
	            "florist_city": 					$('input[name=edit_city]').val(),
	            "florist_state": 					$('select[name=edit_state]').val(),	        
	            "florist_state_full_name": 			$('#editStateFullName').val(),
	         	"florist_latitude": 				$('input[name=edit_latitude]').val(),
	            "florist_longitude": 				$('input[name=edit_longitude]').val(),
	            "florist_zip_code":					$('select[name=edit_postal_code_zip]').val(),
	            "florist_status":					$('select[name=edit_status]').val(),
	        }
	    }
	}
	updateFlorist(formData, floristID);
}

$(document).on('submit', '#updateFlorist', function(event){
	event.preventDefault();
	var floristID = $("input[name=floristID]").val();

	updateFloristGenerateJSON(floristID);
});

