<?php

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('/', $actual_link);
$current_page = $tokens[sizeof($tokens)-1];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = 0;
}

$site = "MOD - ";
if(!empty($page_title)){
  $page_title = $site.$page_title;
}else {
  $page_title = $site."Site";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Javascript -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo url_for('/assets/bootstrap-4.0.0/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo url_for('/assets/mod/css/sidebar_collapse.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="">
    <?php 
        if($current_page == 'order-assign.php?id='.$id){ 
            echo ' <link rel="stylesheet" href="'.url_for("/assets/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker.min.css").'">';
        } elseif($actual_link === $site_name){
            echo '<link rel="stylesheet" href="<?php echo url_for("/assets/mod/css/signin.css");?>">';
        }
    ?> 
    <link rel="stylesheet" href="<?php echo url_for('/assets/mod/css/style.css');?>">
    <?php    
    if($current_page == 'florist.php'){ ?>
      <script src="<?php echo url_for('/assets/mod/js/florist/delete.ajax.js'); ?>"></script>
    <?php
    }
    ?>
   <style type="text/css" media="print">
        @media print {
          * {
            display: none;
          }
          #printableTable {
            display: block;
          }
          #printableTableLogo{
            display: block;
          }      
        }
    </style>
      <title> 
        <?php echo $page_title; ?>
      </title>
  </head>
<body>