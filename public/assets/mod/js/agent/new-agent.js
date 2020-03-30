function newAgent(fromData){
	// console.log("test", fromData);
	// window.location.href = "/public/admin/agent/index.php";
	jso.ajax({
		dataType: 'json',
		url : RESTUSEROUTEALLUSER,
		method : 'POST',
		data: fromData
	})
	.done(function(object){
		window.location.href = "/public/admin/agent/index.php";
	})
	.fail(function(e){
		//console.error("REST error. Nothing returned for AJAX.");
		//console.log("detest", e);
		// console.log("detest", e.responseJSON['message']);
		var message = e.responseJSON['message'];
		if(message){
			$(".alert-message-board").show();
			$(".error_message").append(message);
		}
		
	})
}

function generateJSON(){
	let formData;
	var first_name = $("input[name=first_name]").val();
	var last_name = $("input[name=last_name]").val();
	var full_name = first_name+" "+last_name;
	formData = {
		"username"  	: $("input[name=username]").val(), 
		"name"			: full_name,
		"first_name"	: first_name,
		"last_name"		: last_name,
		"email"			: $("input[name=email]").val(),
		"roles"			: $("input[name=user_role]").val(),
		"password"		: $("input[name=password]").val()
	}
	newAgent(formData);
}

$(document).on('submit', '#addAgent', function(event){
	event.preventDefault();
	generateJSON();
});

// $(document).on('click', '.new_users', function(event){
// 	event.preventDefault();
// 	alert("testing");
// 	editUser(this.value);
// });
