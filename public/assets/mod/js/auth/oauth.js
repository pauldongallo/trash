// Based on https://github.com/andreassolberg/jso/tree/version3
var ROOTURL = "http://mabuhayflowersbeta.websavii.com";
const RESTROOT = ROOTURL + '/wp-json';
const ALLFLORISTRESTROUTE = RESTROOT + '/wp/v2/florists?per_page=100';
const RESTROUTE = RESTROOT + '/wp/v2/florists/';
const RESTUSEROUTE = RESTROOT + '/wp/v2/users/me';
const RESTUSEROUTEALLUSER = RESTROOT + '/wp/v2/users/';
const RESTUSERAGENTROUTE = RESTROOT + '/mod/v1/agent/';
const RESTACTIVITYLOGROUTE = RESTROOT + '/wp/v2/activitylogs';
const RESTNOTESROUTE = RESTROOT + '/wp/v2/notes?order=asc';
const RESTCREATENOTESROUTE = RESTROOT + '/wp/v2/notes/';
const USERROUTE = RESTROOT + '/wp/v2/users';
const PROVINCEROUTE = RESTROOT + '/wp/v2/wbsvii/province';
const PROVINCECITYMUNCIPALITY = RESTROOT + '/wp/v2/wbsvii/city/';
const PROVINCECITYMUNCIPALITYBARANGAY = RESTROOT  + '/wp/v2/wbsvii/barangay/';
const CK = 'ck_d821a38859a4b58b90f6dd3207ec7c2545e20405';
const CS = 'cs_1d1a48d56ac2a28e5dfde654c4f9307aa1326dfe';

// const ROOTURLS = "https://demo.dev.websavii.com";
const RESTROOTV3 = ROOTURL + '/wp-json';
const CUSTOMERRESTROUTE = RESTROOTV3 + '/wc/v3/orders?customer';
const CUSTOMERSINGLEROUTE = RESTROOTV3 + '/wc/v3/customers';
const ORDERSSEARCH = RESTROOTV3 + '/wc/v3/orders?search';
const ORDERSROUTE = RESTROOT + '/wc/v3/orders?consumer_key=ck_d821a38859a4b58b90f6dd3207ec7c2545e20405&consumer_secret=cs_1d1a48d56ac2a28e5dfde654c4f9307aa1326dfe';

var jso = new JSO({
    providerID: "MabuhayFlowers",
    client_id: "ih3Q2dI6Z8osAo0BoYENQF8DhDF5hIkfl4LuplGa", 
    redirect_uri: "https://modtest.dev.websavii.com/public/admin/orders/orders-dashboard.php", // The URL where you is redirected back, and where you perform run the callback() function.
    authorization: ROOTURL + "/oauth/authorize",
});

// Catch the response after login:
jso.callback();

var token = localStorage.getItem('tokens-MabuhayFlowers');

// Trigger OAuth 2 authentication sequence:
function oauthLogin() {
	// jso.getToken();
	jso.getToken(function(newToken){
		console.info("I got the token: ", newtoken.user_info);
	});
}

// Log out and wipe all memory of the session:
function oauthLogout() {
	jso.wipeTokens();
}

// Monitor the login button:
$('#login').click(function() {
    oauthLogin();
});

// Monitor the logout button:
$('#logout').click(function() {
    oauthLogout();
    window.location.href = "http://mabuhayflowersbeta.websavii.com/wp-json/mod/v1/logout";
	// window.location.href = "http://modin.test";
});

(function() {
	// If we are on the home page, redirect to tasklist.html:
	if ( location.pathname == "/" ) {
		// If we have a token, assume we're logged in:
		if ( token !== null ) {
			window.location.href = "/public/admin/orders/orders-dashboard.php";
		}

	} else {
		// If we have a token, assume we're logged in:
		if ( token !== null ) {
			// Enable JSO jQuery wrapper:
			JSO.enablejQuery($);

				jso.ajax({
					type: "GET",
					url: RESTUSEROUTE,
					async: false,
				})
				.done(function(object){
					result  = object;
					console.log("test result", result);
				})
				.fail(function(){
					console.error("REST Error. Nothing return for ajax");
				})
				var username = result.name;
				var loginID = result.id;
				$(document).ready(function(){
					$(".username").append(username);
					$("#userLogin").val(username);
					$(".loginID").append(loginID);
				});

		} else {
			// If we're not logged in, redirect to the login page:
			window.location.href = "/";
		}
	}
})();

