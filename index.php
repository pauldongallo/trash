<?php 
require_once('private/initialize.php');
include(SHARED_PATH.'/header.php');
?>
<div class="col-md-2">
<img src="<?php echo url_for('../public/assets/img/modin-logo.png'); ?> " class="mod-logo-default img-fluid" alt="modin" title="modin">
<button id="login" class="btn btn-lg btn-primary btn-block">Sign in</button>
<p class="mt-5 mb-3 text-muted text-center">© 2017-2019</p>
</div>
<?php include(SHARED_PATH.'/footer.php'); ?>