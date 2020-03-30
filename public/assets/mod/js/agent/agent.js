/*
* Create List
*/
function createUserList(object){
	var html = [];
	console.log("sorting", object);
	for(var i = 0; i < object.length; i++){
		// console.log("testing2", object[i].data.display_name);
		html[html.length] ='<tr>';
		html[html.length] ='<td>' + object[i].data.display_name + '</td>';
		html[html.length] ='<td>' + object[i].data.user_login + '</td>';
		html[html.length] ='<td>' + object[i].data.user_email + '</td>';
		html[html.length] ='<td><button type="button" class="edit_user btn btn-warning btn-sm" data-user="'+object[i].data.ID+'" value="'+object[i].data.ID+'" data-toggle="modal" data-target="#exampleModal" >Edit</button> <button type="button" data-user-delete="'+object[i].data.ID+'" class="deleteUser btn btn-danger btn-sm" value="'+object[i].data.ID+'" >Delete</button> </td>'
		html[html.length] ='</tr>';
	}
	$("#agentList tbody").append(html);
}
function getuserlist(){
	jso.ajax({
		dataType: 'json',
		url : RESTUSERAGENTROUTE,
		async: false
	})
	.done(function(object){
		// console.log("Test",);
		createUserList(object);
	})
	.fail(function(){
		console.error("REST error. Nothing returned for AJAX.");
	})
}
getuserlist();

/*
* edit User
*/
function buildModalSingleUser(object, id){
	let userRoute = RESTUSEROUTEALLUSER +id;
	$("input[name=user_id]").val(id);
	$("input[name=username]").val(object.username);
	$("input[name=email]").val(object.email);
	$("input[name=first_name]").val(object.first_name);
	$("input[name=last_name]").val(object.last_name);
}
function editUser(id){
	let userRoute = RESTUSEROUTEALLUSER+id+"?context=edit";
	jso.ajax({
		dataType: 'json',
		url: userRoute,
		async: false
	})
	.done(function(object) {
		buildModalSingleUser(object, id);
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	})
}
$(document).on('click', '.edit_user', function(event){
	event.preventDefault();
	editUser(this.value);
});

/*
* update User
*/
function updateUser(formData, id){
	let userRoute = RESTUSEROUTEALLUSER + id;
	jso.ajax({
		dataType: 'json',
		url: userRoute,
		method: 'POST',
		data: formData
	})
	.done(function(object) {
		console.log("save");
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	})
}
function generateJSON(){
	var password = $("input[name=password]").val();
	var userId = $("input[name=user_id]").val();
	var first_name = $("input[name=first_name]").val();
	var last_name = $("input[name=last_name]").val();
	var full_name = first_name+" "+last_name;
	if(password){
		formData = {
			"email"    		: $("input[name=email]").val(),
			"name"			: full_name,
			"first_name"    : $("input[name=first_name]").val(),
			"last_name"     : $("input[name=last_name]").val(),
			"password" 		: password
		}
	}else {
		formData = {
			"email"    		: $("input[name=email]").val(),
			"name"			: full_name,
			"first_name"    : $("input[name=first_name]").val(),
			"last_name"     : $("input[name=last_name]").val(),
		}
	}
	updateUser(formData, userId);
}
$(document).on('click', '#updateUsers', function(event){
	event.preventDefault();
	generateJSON();
});

/*
* delete User
*/
function deleteUser(id, reassignID){
	console.log("two ID", id, reassignID);
	let userRoute = RESTUSEROUTEALLUSER+id+"?reassign="+reassignID+"&force=true";
	console.log("testing ", userRoute);
	jso.ajax({
		dataType: 'json',
		url: userRoute,
		method: 'DELETE'
	})
	.done(function(object) {
		console.log("deleted");
		window.location.href = "/public/admin/agent/index.php";
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	})

}
$(document).on('click', '.deleteUser', function(event){
	event.preventDefault();

	var agentIDs=[];
	var agentIDsSet=[];
	var current_link = this.value;
	var citrus_result = "";
	var arraySet = "";

	$(".deleteUser").each(function(index, value){
		if(current_link != this.value){
			agentIDs.push(this.value);
		}
	});
	for(i=0; i < agentIDs.length; i++){
		if(agentIDs[i]<current_link){
			agentIDsSet.push(agentIDs[i]);
		}
	}
	var getDecreaseOne = get_count(agentIDsSet) - 1;
	if(getDecreaseOne == -1){
		for(i=0; i < agentIDs.length; i++){
			if(agentIDs[i]>current_link){
				var agentIDsSet = agentIDs[0];
				// agentIDsSet.push(agentIDs[i]);
			}
		}
		arraySet = agentIDsSet;
	} else {
		arraySet = agentIDsSet[getDecreaseOne];
	}
	deleteUser(current_link, arraySet);
});
