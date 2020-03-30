<?php
require_once('../../../private/initialize.php');
require_once(CLASS_PATH.'/order.php');
require_once(SERVICE_PATH.'/orders.php');
include(SHARED_PATH.'/admin_header.php');
$page_title = 'Add New Agent';
?>
<div class="wrapper">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
                <div class="container-fluid">
			             		<h5 class="text-left"> <?php echo $page_title; ?> <button class="btn btn-primary btn-sm" role="button" aria-pressed="true" onclick="location.href='<?php echo url_for('/admin/agent/index.php'); ?>'">Back</button> </h5>
				              	<div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                               <i class="fas fa-user-circle" style="font-size: 30px;"></i>
				  				                     <span class="username text-info" style="font-size:14px;"></span>
                            </li>                        
                        </ul>
                    </div>					  			
                </div>
            </nav> 
           <div class="row">
            <div class="col-md-6 mb-3">
              <div class="alert-message-board alert alert-danger" role="alert">
                <p class="error_message"></p>
              </div>
             </div>
           </div>
            <form id="addAgent">
               <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="userName">Username</label>
                    <input type="text" class="form-control form-control-sm" id="username" name="username" value="" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control form-control-sm" id="email" name="email" value="" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control form-control-sm" id="firstName" name="first_name" value="" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control form-control-sm" id="lastName" name="last_name" value="" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" value="" required="">
                  </div>
                </div>
                 <input type="hidden" class="form-control form-control-sm" id="role" name="user_role" value="mod_agent" required="">
                <hr class="mb-4">
                <div class="col-md-1 mb-3">
                    <button class="new_users btn btn-primary btn-block btn-sm" type="submit"> Submit </button>
                </div>
            </form>

        </div>
</div>
<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<script>
$(document).ready(function(){
  $(".alert-message-board").hide();
});
</script>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>