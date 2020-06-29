<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Survey Data Update</h3>

  <form id="form-update-kota" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataKota->id; ?>">
    

 <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>    




      <select class="form-control" placeholder="Customer" name="customer_id" aria-describedby="sizing-addon2">
  <option value="">--Select Customer--</option>
<?php
  foreach ($this->dataCustomers as $Cust_item) { ?>
    <option value="<?php echo $Cust_item->id;?>" <?php if($Cust_item->id==$dataPosisi->customer_id) { ?> selected <?php } ?>> <?php echo ucfirst($Cust_item->first_name);?> </option>

  <?php }  ?>
        
      </select>

    </div>

        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->owner_name; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Address1" name="address1" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->address1; ?>">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Address2" name="address2" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->address2; ?>">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-flag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Survey No." name="survey_no" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->survey_no; ?>">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Village" name="village" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->village; ?>">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Mandal" name="mandal" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->mandal; ?>">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="District" name="district" aria-describedby="sizing-addon2" value="<?php echo $dataPosisi->district; ?>">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>

      <select class="form-control" placeholder="Authority" name="authority" aria-describedby="sizing-addon2">
        <option value="">--Select Authority--</option>
        <option value="GHMC" <?php if($dataPosisi->authority=="GHMC") { ?> selected <?php } ?>>GHMC</option>
        <option value="HMDA" <?php if($dataPosisi->authority=="HMDA") { ?> selected <?php } ?>>HMDA</option>
        <option value="Other" <?php if($dataPosisi->authority=="Other") { ?> selected <?php } ?>>Other</option>
      </select>
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <select class="form-control" placeholder="State" name="state" aria-describedby="sizing-addon2" >
        <option value="">--Select State--</option>
        <option value="Telangana" <?php if($dataPosisi->state=="Telangana") { ?> selected <?php } ?>>Telangana</option>
        <option value="Andhra Pradesh" <?php if($dataPosisi->state=="Andhra Pradesh") { ?> selected <?php } ?>>Andhra Pradesh</option>
      </select>

      
    </div>

    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>