<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Plot Data Update</h3>

  <form id="form-update-posisi" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $dataPosisi->id; ?>">
	
	
	
	
	
	
	
	
	<div class="form-group-sm">
	<label>Customer</label>     
<select class="form-control" placeholder="Customer" name="customer_id" aria-describedby="sizing-addon2">
  <option value="">--Select Customer--</option>
<?php
  foreach ($this->dataCustomers as $Cust_item) { ?>
    <option value="<?php echo $Cust_item->id;?>" <?php if($Cust_item->id==$dataPosisi->customer_id) { ?> selected <?php } ?>> <?php echo ucfirst($Cust_item->first_name);?> </option>

  <?php }  ?>
        
      </select>
	</div>
	
    <div class="form-group-sm">
	<label>Owner Name*</label>     
     <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->owner_name; ?>">
    </div>
	
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Address1*</label>     
<input type="text" class="form-control" placeholder="Address1" name="address1" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->address1; ?>">
</div>
<div class="col-md-6">
<label>Address2</label>     
<input type="text" class="form-control" placeholder="Address2" name="address2" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->address2; ?>">
</div>
</div>	   
</div>
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Plot No.</label>     
<input type="text" class="form-control" placeholder="Plot No." name="plot_no" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->plot_no; ?>">
</div>
<div class="col-md-6">
<label>Survey No.</label>     
<input type="text" class="form-control" placeholder="Survey No." name="survey_no" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->survey_no; ?>">
</div>
</div>	   
</div>
	
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Village</label>     
<input type="text" class="form-control" placeholder="Village" name="village" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->village; ?>">
</div>
<div class="col-md-6">
<label>Mandal</label>     
<input type="text" class="form-control" placeholder="Mandal" name="mandal" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->mandal; ?>">
</div>
</div>	   
</div>
	
	
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>District</label>     
<input type="text" class="form-control" placeholder="District" name="district" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->district; ?>">
</div>
<div class="col-md-6">
<label>Pincode</label>     
 <input type="text" class="form-control" placeholder="Pincode" name="pincode" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->pincode; ?>">
</div>
</div>	   
</div>


<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Authority</label>     
<select class="form-control" placeholder="Authority" name="authority" aria-describedby="sizing-addon2">
<option value="">--Select Authority--</option>
<option value="GHMC" <?php if($dataPosisi->authority=="GHMC") { ?> selected <?php } ?>>GHMC</option>
<option value="HMDA" <?php if($dataPosisi->authority=="HMDA") { ?> selected <?php } ?>>HMDA</option>
<option value="Other" <?php if($dataPosisi->authority=="Other") { ?> selected <?php } ?>>Other</option>
</select>
</div>
<div class="col-md-6">
<label>State</label>     
<select class="form-control" placeholder="State" name="state" aria-describedby="sizing-addon2" >
<option value="">--Select State--</option>
<option value="Telangana" <?php if($dataPosisi->state=="Telangana") { ?> selected <?php } ?>>Telangana</option>
<option value="Andhra Pradesh" <?php if($dataPosisi->state=="Andhra Pradesh") { ?> selected <?php } ?>>Andhra Pradesh</option>
</select>
</div>
</div>	   
</div>
<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Latitude</label>     
<input type="text" class="form-control" placeholder="Latitude" name="lat" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->lat; ?>">
</div>
<div class="col-md-6">
<label>Longitude</label>     
 <input type="text" class="form-control" placeholder="Longitude" name="lag" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->lag; ?>">
</div>
</div>	   
</div>

<div class="form-group-sm ">
<div class="row">
<div class="col-md-6">
<label>Price *</label>     
<input type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->price; ?>">
</div>
<div class="col-md-6">
<label></label>     

</div>
</div>     
</div>
<div class="form-group-sm">
  <label>Upload Map</label>
   
      <input type="file" class="form-control" placeholder="upload map" name="plot_map" id="plot_map"  aria-describedby="sizing-addon2" >
    
    </div>
	


<div class="form-group-sm ">
<div class="row">
<div class="col-md-12">
<label>Limiations</label>     
<textarea class="form-control" placeholder="Limiations" name="limiations" aria-describedby="sizing-addon2" ><?php echo $dataPosisi->limiations; ?></textarea>
</div>
</div>     
</div>


<div class="form-group-sm ">
<div class="row">
<div class="col-md-12">
<label>Eco.Landscape</label>
<textarea class="form-control" placeholder="Eco.Landscape" name="eco_landscape" aria-describedby="sizing-addon2"><?php echo $dataPosisi->eco_landscape; ?></textarea>
</div>
</div>     
</div>

  <div class="form-group-sm">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>



  
  </form>
</div>