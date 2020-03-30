function checkfloristresult(id, object){
	for(let i=0; i<object.length; i++){
		var meta_data = object[i].meta_data;
		for(let c=0; c<meta_data.length; c++){
			if(meta_data[c].key =='shop_order_mbh_assign_florist' && id==meta_data[c].value ){
				 index_florist(id);
				$(".bd-example-modal-lg").modal('show');
				return;
			}else if(meta_data[c].key =='shop_order_mbh_assign_florist' && id!==meta_data[c].value) {
				$(".optiondelete").modal('show');
				 index_florist(id);							
				$("input[name=delete_florist]").val(id);
				return;				
			}
		}
	}
}

function checkflorist(id){
	$.ajax({
		dataType : 'json',
		url : ORDERSROUTE
	})
	.done(function(object) {
		checkfloristresult(id, object);
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	})
}

function updateTrashFlorist(floristID, formData){
	// console.log(floristID);
	var urlFlorist = RESTROUTE+floristID;
	jso.ajax({
		dataType: 'json',
		url : RESTROUTE+floristID,
		method: 'DELETE',
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

function trashfloristGenerateJSON(floristID){
	let formData = {
		"status": "trash",
	}
	updateTrashFlorist(floristID, formData);
}