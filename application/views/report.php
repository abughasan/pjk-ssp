<!DOCTYPE html>
<html>
  <head>
    <title>Report</title>
    <meta charset="utf-8" />
	<title>Aplikasi SSP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->        
	<link href="<?=base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	
	<!-- BEGIN THEME STYLES --> 
	
	<!-- END THEME STYLES -->
	
	<link rel="shortcut icon" href="favicon.ico" />

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="<?=base_url();?>assets/plugins/excanvas.min.js"></script>
	<script src="<?=base_url();?>assets/plugins/respond.min.js"></script>  
	<![endif]-->  
	<script src="<?=base_url();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- END JAVASCRIPTS -->
	
  </head>
  
  <body class="page-header-fixed page-full-width">
	<?php if ( ! empty( $komponen_top ) &&  is_array( $komponen_top )): ?>
		<?php foreach($komponen_top as $isi): ?>
			<?php $this->load->view("komponen/".$isi); ?>
		<?php endforeach; ?>
	<?php endif; ?>

    <?php ((isset($template)) ? $this->load->view("template/".$template) : ""); ?>
	
    <?php if (! empty( $komponen_bottom ) &&  is_array( $komponen_top )): ?>
		<?php foreach($komponen_bottom as $isi): ?>
			<?php $this->load->view("komponen/".$isi); ?>
		<?php endforeach; ?>
	<?php endif; ?>

  </body>
</html>