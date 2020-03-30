<?php
require_once('../../../private/initialize.php');
require_once(CLASS_PATH.'/order.php');
require_once(SERVICE_PATH.'/orders.php');
include(SHARED_PATH.'/admin_header.php');
$page_title = 'Agents';
?>
<div class="wrapper">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
     <!-- Page Content  -->
  <div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
      <div class="container-fluid">
       <h4 class="text-left"> <?php echo $page_title; ?> <button class="btn btn-primary btn-sm active" role="button" aria-pressed="true" onclick="location.href='<?php echo url_for('/admin/agent/new.php'); ?>'">Add New</button> </h4>
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
    <table id="agentList" class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>              
            <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form>
                <input type="hidden" name="user_id" value="" >
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="userName">Username (<i class="font-weight-light">Usernames cannot be changed </i>) </label>
                    <input type="text" class="form-control form-control-sm" id="username" name="username" value="" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control form-control-sm" id="firstName" name="first_name" value="" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control form-control-sm" id="lastName" name="last_name" value="" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" value="" >
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="updateUsers" class="btn btn-primary">Save changes</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>

