const formatter = new Intl.NumberFormat('en-PH', {
  style: 'currency',
  currency: 'PHP',
  minimumFractionDigits: 2
})

$(".modal").on("hidden.bs.modal", function(){
	$("#customer-order-table > tbody:last-child").html("");
})

$('.customer').click(function(){
	var CUSTOMER_ID = $(this).attr("customer-id");
	if(CUSTOMER_ID !== null){
		let customerRoute = CUSTOMERRESTROUTE+"="+CUSTOMER_ID+"&consumer_key="+CK+"&consumer_secret="+CS;	
		let customerSingleRoute = CUSTOMERSINGLEROUTE+"/"+CUSTOMER_ID+"?&consumer_key="+CK+"&consumer_secret="+CS;
		getCustomerOrder(customerRoute);
		getCustomerSingle(customerSingleRoute);
	}
	
});