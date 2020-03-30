/** 
* Script for loading the Task List.
* Constant RESTROUTE and variable token
*/

$(document).ready(function() {
	
	/** Load State base on country
	*/
	function buildCountryState(object){
		var JSONObject = JSON.parse(object);
		for(key in JSONObject.states){
			if(JSONObject.states.hasOwnProperty(key)){
				var code = JSONObject.states[key].code;
				var name = JSONObject.states[key].name;
				$("#filterCountryState").append('<option data-state-full-name="'+name+'" value="'+name+'"> '+name+' </option>');
			}
		}
	}	
	$("#filterCountry").change(function(event){
		event.preventDefault();
		var countrDownState = $(this).find(':selected').data('country-down-state') 
	  	$.ajax({
			type: "POST",
			url: "private/class/country.php",
			data: {'selectData': countrDownState },
		    success:  function(object){
		    	buildCountryState(object)			
		    }
		});
	});

	/** Get Country
	*/
	function buildCountryForFloristsList(object){
		$.each(object, function(key, value){
			var code = value.code;
			var name = value.name;
			$("#filterCountry").append('<option data-add-country-full-name="'+name+'" data-country-down-state="'+code+'" value="'+name+'"> '+name+' </option>');
		});
	}
	function getCountryForFloristsList(){
		$.ajax({
			dataType : 'json',
			url 	 : '../../../private/class/countries.php'
		})
		.done(function(object){
			buildCountryForFloristsList(object);
		})
		.fail(function(){
			console.error("REST Error. Nothing return for ajax");
		})
	}
	getCountryForFloristsList();

	/** Update Florist **/
	$(".updating_info").hide();

	var floristTable = $('#florist-table').DataTable( {
		"scrollCollapse"	: false,
        "paging"			: false,
        "orderClasses"		: false,
        "ordering"			: false,
        "select" 			: true,
	    ajax: {
	        url: ALLFLORISTRESTROUTE,
	        dataSrc: ''
	    },
	    columns: [
	    	{ 
	    		data: 'id', 
	    		"render": function(data, type, row) {		    			
	           		var build_icon = '';
						build_icon += '<a href="javascript:void(0);" class="florist" ';
						build_icon += 'data-toggle="modal" ';
						build_icon += 'data-target="#editFloristhsModal" ';		
						build_icon += 'data-florist-post-id="'+data+'"  ';	
						build_icon += 'data-country-code="'+row.cmb2.florist_metabox.florist_country+'"  ';		
						build_icon += 'data-state-code="'+row.cmb2.florist_metabox.florist_state+'"  ';
						build_icon += 'data-florist-status="'+row.cmb2.florist_metabox.florist_status+'"  ';							
						build_icon += '>';
						build_icon += data
						build_icon += '</a>';
						return build_icon;
	           	}},		
	    	{ data: 'title.rendered' },
	    	{ data: 'cmb2.florist_metabox.florist_contact_person' },
	    	{ data: 'cmb2.florist_metabox.florist_mobile_no' },
	    	{ data: 'cmb2.florist_metabox.florist_telephone_no' },
	    	{ data: 'cmb2.florist_metabox.florist_email_1' },
	    	{ data: 'cmb2.florist_metabox.florist_country_full_name'},
	    	{ data: 'cmb2.florist_metabox.florist_state_full_name' },
	    	{ data: 'cmb2.florist_metabox.florist_status' },
	    	{ 
	    		data: 'id', 
	    		"render": function(data, type, row){	    			
	           		var build_icon = '';						
						build_icon += '<a href="#" onClick="checkflorist('+data+');" value='+data+' data-florist-name='+row.title.rendered+' class="delete_florist btn btn-danger btn-sm">Delete</a>';	
						return build_icon;
	           	}},	
	    ],
	    "deferLoading": 	57,
	});

	$("#resetAllFilters").click(function(){
		location.reload(true);
	});

	$('.searchfloristDashboard').on('keyup', function(){
	    floristTable
	    .column(1)
	    .search(this.value)
	    .draw();
	});

	$('.filterCountries').on('change', function(){
	    floristTable
	    .column(6)
	    .search(this.value)
	    .draw();
	});

   $('select#status_acin').on('change', function(){
	    floristTable
	    .column(8)
	    .search( "^" + this.value, true, false, true )
	    .draw();
	});

    $('.filter_city_municipality').on('change', function(){
	    floristTable
	    .column(7)
	    .search(this.value)
	    .draw();
	});

});


function floristSingle(object){
	$(".florist_name").text(object.title.rendered);
}

function index_florist(id){
	jso.ajax({
		type: "GET",
		url: RESTROUTE+id
	})
	.done(function(object){
		floristSingle(object);
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
}