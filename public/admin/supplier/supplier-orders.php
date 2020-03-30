<?php 
include('../template/header.php');
?>
<div class="wrapper" style="width:100%">
	<?php include('../template/sidebar-navigation.php'); ?>
	<div id="content">
		<div class="container-fluid">
		  	<div class="row">
			    <div class="col">
			      	<h1 class="h2"> Supplier Orders </h1>
			    </div>
			    <?php include('username/username.php'); ?>
			</div>
		</div>
		<br>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
		          <a href="#">
		            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/150x150" alt="">
		          </a>
		        </div>
		        <div class="col-md-8">
		          <h3> Supplier Product One</h3>
		          <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</small>
		 		 </p>
		 		 <a class="btn btn-primary" href="#">View Products</a>
		        </div>
		    </div>
		</div>
		<br>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
		          <a href="#">
		            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/150x150" alt="">
		          </a>
		        </div>
		        <div class="col-md-8">
		          <h3>Supplier Product Two</h3>
		          <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</small>
		 		 </p>
		 		 <a class="btn btn-primary" href="#">View Products</a>
		        </div>
		    </div>
		</div>
		<br>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
		          <a href="#">
		            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/150x150" alt="">
		          </a>
		        </div>
		        <div class="col-md-8">
		           <h3>Supplier Product Three</h3>
		          <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</small>
		 		 </p>
		 		 <a class="btn btn-primary" href="#">View Products</a>
		        </div>
		    </div>
		</div>

	</div>
	<?php include('modal/florists-modal.php'); ?>
</div>
<?php include('../template/javascript.php'); ?>

<?php include('../template/footer.php'); ?>