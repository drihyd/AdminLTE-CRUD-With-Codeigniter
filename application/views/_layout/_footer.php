<footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
		Dashboard Admin
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2020 <a href="#">SecureMyPlot</a>.</strong> All rights reserved.
</footer>

<script>

$(document).ready(function() {
  $('select.get_plots_ajax').on('change', function() {
      var custID = $(this).val();
      if(custID) {
          $.ajax({
              url: "<?php echo base_url() ?>auth/myformAjax/"+custID,
              type: "GET",
              dataType: "json",
              success:function(data) {
			      $('select[name="plot_id"]').empty();
                  $('select[name="plot_id"]').append('<option value="">----Select Plot Owner----</option>');
                  $.each(data, function(key, value) {
                      $('select[name="plot_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                  });
              }
          });
      }else{
          $('select[name="plot_id"]').empty();
          $('select[name="plot_id"]').append('<option value="">----Select Plot Owner----</option>');
      }
	  
  });
  });
  </script>