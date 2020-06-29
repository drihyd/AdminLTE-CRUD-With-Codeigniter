<!DOCTYPE html>
<html>
  <head>
    <title>SecureMyPlot | Dashboard</title>
    <!-- meta -->
    <?php echo @$_meta; ?>

    <!-- css --> 
    <?php echo @$_css; ?>

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900|Open+Sans:300|Lora' rel='stylesheet' type='text/css'>
	<style>
	body{display:block;margin:0 auto;font-size:12px;font-family:"Lato",sans-serif!important;color:#54585B;line-height:160%;background: #EAF8EB!important;}
	
	h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family:"Lato",sans-serif;
}
	</style>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- header -->
      <?php echo @$_header; ?> <!-- nav -->
      
      <!-- sidebar -->
      <?php echo @$_sidebar; ?>
      
      <!-- content -->
      <?php echo @$_content; ?> <!-- headerContent --><!-- mainContent -->
    
      <!-- footer -->
      <?php echo @$_footer; ?>
    
      <div class="control-sidebar-bg"></div>
    </div>

    <!-- js -->
    <?php echo @$_js; ?>
  </body>
</html>