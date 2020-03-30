// const formatter = new Intl.NumberFormat('en-PH', {
//   style: 'currency',
//   currency: 'PHP',
//   minimumFractionDigits: 2
// })

// $(".modal").on("hidden.bs.modal", function(){
// 	$("#customer-order-table > tbody:last-child").html("");
// })

// $('.customer').click(function(){

// 	var CUSTOMER_ID = $(this).attr("customer-id");
// 	if(CUSTOMER_ID !== null){
// 		let customerRoute = CUSTOMERRESTROUTE+"="+CUSTOMER_ID+"&consumer_key="+CK+"&consumer_secret="+CS;	
// 		let customerSingleRoute = CUSTOMERSINGLEROUTE+"/"+CUSTOMER_ID+"?&consumer_key="+CK+"&consumer_secret="+CS;
// 		// console.log(customerSingleRoute);
// 		getCustomerOrder(customerRoute);
// 		getCustomerSingle(customerSingleRoute);
// 	}

// });

// function buildCustomerSingle(object){
// 	$("#custFirstName").text(object.first_name);
// 	$("#custLastName").text(object.last_name);
// 	$("#custBillingAddress1").text(object.billing.address_1);
// 	$("#custBillingAddress2").text(object.billing.address_2);
// 	$("#custBillingCity").text(object.billing.city);
// 	$("#custBillingState").text(object.billing.state);
// 	$("#custBillingCode").text(object.billing.postcode);
// 	$("#custBillingCountry").text(object.billing.country);
// 	$("#custBillingEmail").text(object.billing.email);
// 	$("#custBillingPhone").text(object.billing.phone);
// }

// function getCustomerSingle(customerSingleRoute){
// 	$.ajax({
// 		dataType: 'json',
// 		url : customerSingleRoute
// 	})
// 	.done(function(object){
// 		buildCustomerSingle(object);
// 	})
// 	.fail(function(){
// 		console.error("REST error. Nothing returned for AJAX.");
// 	})
// }

// function buildCustomerOrder(object){
// 	for(let i=0; i<object.length; i++){
// 		var id = object[i].id;
// 		// console.log(id);
// 		var date_created = dateTimeT(object[i].date_created);	
// 		var meta_data = object[i].meta_data;
// 		var number_ = object[i].number;	
// 		var total_ = object[i].total;	

// 		for(let c=0; c<meta_data.length; c++){
// 			if(meta_data[c].key =='_orddd_lite_timestamp'){
// 				var delivery_date = meta_data[c].value;
// 				var epoch_delivery = epochToHumanReadable(delivery_date);
// 			}
// 		}
// 		let navListItem = 
// 			'<tr>' +
// 				'<td><span id="date_created">'+ date_created + '</td>' + 
// 				'<td>'+ epoch_delivery +'</td>' + 
// 				'<td><a href="https://mod.dev.websavii.com/view/order-assign.php?id='+id+'">'+ number_ +'</a></td>' + 
// 				'<td>' + formatter.format(total_) + '</td>' + 
// 			'</tr>';
// 		$('#customer-order-table > tbody:last-child').append(navListItem);
// 	}
// }

// function getCustomerOrder(customerRoute){
// 	$.ajax({
// 		dataType: 'json',
// 		url : customerRoute
// 	})
// 	.done(function(object){
// 		buildCustomerOrder(object);
// 	})
// 	.fail(function(){
// 		console.error("REST error. Nothing returned for AJAX.");
// 	})
// }

// function epochToHumanReadable(datemtime){
// 	dateObj = new Date(datemtime * 1000);
// 	var month = dateObj.getUTCMonth(); 
// 	var day = dateObj.getUTCDate();
// 	var year = dateObj.getUTCFullYear();
// 	var months = [ "January", "February", "March", "April", "May", "June", 
//            "July", "August", "September", "October", "November", "December" ];
// 	var selectedMonthName = months[month];
// 	newdate = selectedMonthName + "-" + day + "-" + year;
// 	return newdate;
// }

// function dateTimeT(datetime){
// 	var date = new Date(datetime);
// 	var date_month = date.getMonth();
// 	var months = [ "January", "February", "March", "April", "May", "June", 
//            "July", "August", "September", "October", "November", "December" ];
// 	var selectedMonthName = months[date_month];
// 	return selectedMonthName + '-' + date.getDate() + '-' +  date.getFullYear();
// }

// function currencyFormat(num) {
//   return 'P' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
// }