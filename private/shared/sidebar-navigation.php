<!-- Page Content  -->
  <!-- Sidebar  -->
  <nav id="sidebar">
      <div class="sidebar-header">
        <img src="<?php echo url_for('/assets/img/modin-logo.png'); ?>" class="mod-logo-default img-fluid" alt="modin" title="modin">
        <img src="<?php echo url_for('/assets/img/mod-logo-collapse.png'); ?>" class="mod-logo-collapse img-fluid" width="60" height="80" alt="modin" title="modin">
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
      </div>
       <ul class="list-unstyled components">
        <li >
          <div class="col-md-12">
            <button type="button" id="sidebarCollapse" class="btn btn-mod-default form-control">
                <i class="fas fa-chevron-circle-left"></i>
                <span class="collapse_menu"> Collapse Menu </span>
            </button>
          </div>
        </li>
      <li>
          <a href="<?php echo url_for('/admin/orders/orders-dashboard.php'); ?>">
            <div class="side_bar_list">
              <img src="<?php echo url_for('/assets/img/orders-dashboard.png'); ?>" class="icon_image_holder float-left" width="20px" height="20px" alt="" title="">
                <div class="side_bar_text">
                   Orders Dashboard
                </div>
              <div class="clearfix"></div>
            </div>
          </a>
      </li>
      <li>
          <a href="<?php echo url_for('/admin/customers/customer.php'); ?>">
              <div class="side_bar_list">
                <img src="<?php echo url_for('/assets/img/customer-database.png'); ?>" class="icon_image_holder float-left" width="20px" height="20px" alt="" title="">
                  <div class="side_bar_text">
                    Customers Dashboard
                  </div>
                  <div class="clearfix"></div>
              </div>
          </a>
      </li>
        <li>
          <a href="<?php echo url_for('/admin/florists/florist.php'); ?>">            
              <img src="<?php echo url_for('/assets/img/florist-dashboard.png'); ?>" class="icon_image_holder float-left" width="20px" height="20px" alt="" title="">
              <div class="side_bar_text">
                Florists Dashboard
              </div>
              <div class="clearfix"></div>       
          </a>
        </li>
        <li>
          <a href="<?php echo url_for('/admin/product/products.php'); ?>">         
              <img src="<?php echo url_for('/assets/img/flourist-database.png'); ?>" class="icon_image_holder float-left" width="20px" height="20px" alt="" title="">
                <div class="side_bar_text">
                  Products Dashboard
                </div>
              <div class="clearfix"></div>       
          </a>
        </li> 
      <li>
          <a href="<?php echo url_for('/admin/supplier/supplier-orders.php'); ?>">
              <img src="<?php echo url_for('/assets/img/supplier-orders.png'); ?>" class="icon_image_holder float-left" width="20px" height="20px" alt="" title="">
              <div class="side_bar_text">
                Supplier Orders
              </div>
              <div class="clearfix"></div>       
          </a>
      </li>        
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span> Settings </span>
      <a class="d-flex align-items-center text-muted" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
      </a>
    </h6>  
    <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <div class="col-md-12">
            <p class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <div class="btn-group btn-bloc" >
                <button type="button" class="admin_settings btn btn-info dropdown-toggle btn-sm center-block btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin Settings
                </button> 
                <button type="button" class="admin_settings_icon btn btn-info btn-sm center-block btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-users-cog"></i>
                </button>             
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo url_for('/admin/agent/index.php');?>">All Agents</a>
                    <a class="dropdown-item" href="<?php echo url_for('/admin/agent/new.php');?>"> Add New Agent </a>
                    <a class="dropdown-item" href="<?php echo url_for('/admin/florists/florist.php');?>"> All Florist </a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addNewFloristhsModal" > Add New Florist </a>
                </div>
              </div>
            </p>     
          </div>
      </li>
      <li class="nav-item">
          <div class="col-md-12">
              <p class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <div class="btn-group btn-bloc" >
                    <button id="logout" class="btn btn-warning btn-sm">Logout</button>
                </div>
              </p>     
         </div>
      </li>
    </ul>
  </nav>