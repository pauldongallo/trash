<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- show only data tables -->
<script src="<?php echo url_for('/assets/DataTables2/datatables.min.js'); ?>"></script>
<script src="<?php echo url_for('/assets/mod/js/auth/jso.js'); ?>" defer></script>
<script src="<?php echo url_for('/assets/mod/js/auth/oauth.js'); ?>" defer></script>
<script src="<?php echo url_for('/assets/mod/js/functions.js');?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="<?php echo url_for('/assets/bootstrap-4.0.0/js/bootstrap.js'); ?>"></script>
<script src="<?php echo url_for('/assets/mod/js/sidebar_menu_collapse.js'); ?>"></script>

<?php

if($current_page == 'florist.php'){
 	echo '<script src="'.url_for("/assets/mod/js/florist/floristlist.ajax.js").'" defer></script>';
 	echo '<script src="'.url_for("/assets/mod/js/florist/addflorist.ajax.js").'"></script>';	
 	echo '<script src="'.url_for("/assets/mod/js/florist/editflorist.ajax.js").'"></script>';
 	echo '<script src="'.url_for("/assets/mod/js/florist/updateflorist.ajax.js").'"></script>';	
}elseif($current_page == 'customer.php'){
  	echo '<script src="'.url_for("/assets/mod/js/customer/customer_oder.ajax.js").'" defer></script>';
}elseif($current_page == 'order-assign.php?id='.$id){
	echo '<script src="'.url_for('/assets/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.js').'"></script>';
	echo '<script src="'.url_for('/assets/mod/js/activity-log/activity-log.js').'"></script>';
?>
	<script>
		$('#deliver_date').datepicker({
	    	format: 'mm/dd/yyyy',
	    	startDate: '-3d'
		});
	</script>
	<?php 
}elseif($current_page == 'orders-dashboard.php'){
	echo '<link rel="stylesheet" href="'.url_for('/assets/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker.min.css').'">';
	echo '<script src="'.url_for('/assets/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.js').'"></script>';
?>
	<script>
		$('#fromOrderDate').datepicker({
	    	format: 'mm/dd/yyyy',
	    	autoclose: true
		});
		$('#toOrderDate').datepicker({
	    	format: 'mm/dd/yyyy',
	    	autoclose: true
		});
		$('#fromDeliveryDate').datepicker({
	    	format: 'mm/dd/yyyy',
	    	autoclose: true
		});
		$('#toDeliveryDate').datepicker({
	    	format: 'mm/dd/yyyy',
	    	autoclose: true
		});
	</script>
<?php
}elseif( site_domain_public('/admin/agent/index.php') == current_page() ){
	echo '<script src="'.url_for('/assets/mod/js/agent/agent.js').'" defer ></script>';
}elseif( site_domain_public('/admin/agent/new.php') == current_page() ){
	echo '<script src="'.url_for('/assets/mod/js/agent/new-agent.js').'" defer ></script>';
}
?>

