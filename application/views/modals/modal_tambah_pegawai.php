<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add Customer</h3>

  <form id="form-tambah-pegawai" method="POST">
  

  
    <div class="form-group-sm">
	<label>First Name*</label>     
      <input type="text" class="form-control" placeholder="First Name*" name="first_name" aria-describedby="sizing-addon2">
    </div>
	
	<div class="form-group-sm">
	<label>Last Name*</label>     
	<input type="text" class="form-control" placeholder="Last Name*" name="last_name" aria-describedby="sizing-addon2">
	</div>
	
		<div class="form-group-sm">
	<label>Email*</label>     
	<input type="email" class="form-control" placeholder="Email*" name="email" aria-describedby="sizing-addon2">
	</div>


		<div class="form-group-sm">
	<label>Phone*</label>     
	 <input type="text" class="form-control" placeholder="Phone" name="contact_no" aria-describedby="sizing-addon2">
	</div>

	

		<div class="form-group-sm">
		<label>Password*</label>    
      <input type="password" class="form-control" placeholder="Password *" name="password" id="password" >
      
    </div>
	
			<div class="form-group-sm">
		<label>Confirm Password *</label>    
     <input type="password" class="form-control" placeholder="Confirm Password *" name="confirm_password" id="confirm_password">
      
    </div>
	
<!--
	
				<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Address" name="address" aria-describedby="sizing-addon2">
    </div>
	-->
	
<input type="hidden" class="form-control" placeholder="Address" name="address" aria-describedby="sizing-addon2" value="">
     


    <div class="form-group-sm">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Save</button>
      </div>
    </div>
  </form>
</div>


<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>