<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add plot data</h3>

  <form id="form-tambah-posisi" method="POST">
	
	
	<div class="form-group-sm">
	<label>Customer</label>     
	       <select class="form-control" placeholder="Customer" name="customer_id" aria-describedby="sizing-addon2">
  <option value="">--Select Customer--</option>
<?php
  foreach ($this->dataCustomers as $Cust_item) {
    echo "<option value=".$Cust_item->id.">".ucfirst($Cust_item->first_name)."</option>";

  }

  ?>
        
      </select>
	</div>
	
    <div class="form-group-sm">
	<label>Owner Name*</label>     
     <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" aria-describedby="sizing-addon2">
    </div>
	
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Address1*</label>     
<input type="text" class="form-control" placeholder="Address1" name="address1" aria-describedby="sizing-addon2">
</div>
<div class="col-md-6">
<label>Address2</label>     
<input type="text" class="form-control" placeholder="Address2" name="address2" aria-describedby="sizing-addon2">
</div>
</div>	   
</div>
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Plot No.</label>     
<input type="text" class="form-control " placeholder="Plot No." name="plot_no" aria-describedby="sizing-addon2">
</div>
<div class="col-md-6">
<label>Survey No.</label>     
<input type="text" class="form-control col-md-6" placeholder="Survey No." name="survey_no" aria-describedby="sizing-addon2">
</div>
</div>	   
</div>
	
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Village</label>     
<input type="text" class="form-control" placeholder="Village" name="village" aria-describedby="sizing-addon2">
</div>
<div class="col-md-6">
<label>Mandal</label>     
<input type="text" class="form-control" placeholder="Mandal" name="mandal" aria-describedby="sizing-addon2">
</div>
</div>	   
</div>
	
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>District</label>     
<input type="text" class="form-control" placeholder="District" name="district" aria-describedby="sizing-addon2">
</div>
<div class="col-md-6">
<label>Pincode</label>     
<input type="text" class="form-control" placeholder="Pincode" name="pincode" aria-describedby="sizing-addon2">
</div>
</div>	   
</div>


<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Authority</label>     
<select class="form-control" placeholder="Authority" name="authority" aria-describedby="sizing-addon2">
<option value="">--Select Authority--</option>
<option value="GHMC">GHMC</option>
<option value="HMDA">HMDA</option>
<option value="Other">Other</option>
</select>
</div>
<div class="col-md-6">
<label>State</label>     
<select class="form-control" placeholder="State" name="state" aria-describedby="sizing-addon2">
<option value="">--Select State--</option>
<option value="Telangana">Telangana</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
</select>
</div>
</div>	   
</div>

<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Latitude</label>     
<input type="text" class="form-control" placeholder="Latitude" name="lat" aria-describedby="sizing-addon2">
</div>
<div class="col-md-6">
<label>Longitude</label>     
<input type="text" class="form-control" placeholder="Longitude" name="lag" aria-describedby="sizing-addon2">
</div>
</div>     
</div>
<div class="form-group-sm">
  <label>Upload Map</label>
   
      <input type="file" class="form-control" placeholder="upload map" name="plot_map" aria-describedby="sizing-addon2" >
    
    </div>





    <div class="form-group-sm">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Add Data</button>
      </div>
    </div>


  </form>
</div>