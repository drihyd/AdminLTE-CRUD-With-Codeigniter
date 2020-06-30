<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add plot data</h3>

  <form id="form-tambah-posisi" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
     
<select class="form-control" placeholder="Customer" name="customer_id" aria-describedby="sizing-addon2">
  <option value="">--Select Customer--</option>
<?php
  foreach ($this->dataCustomers as $Cust_item) {
    echo "<option value=".$Cust_item->id.">".ucfirst($Cust_item->first_name)."</option>";

  }

  ?>
        
      </select>

    </div>

        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Address1" name="address1" aria-describedby="sizing-addon2">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Address2" name="address2" aria-describedby="sizing-addon2">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-flag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Survey No." name="survey_no" aria-describedby="sizing-addon2">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class=" glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Village" name="village" aria-describedby="sizing-addon2">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Mandal" name="mandal" aria-describedby="sizing-addon2">
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="District" name="district" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Pincode" name="pincode" aria-describedby="sizing-addon2">
    </div>


        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
           </span>

      <select class="form-control" placeholder="Authority" name="authority" aria-describedby="sizing-addon2">
        <option value="">--Select Authority--</option>
        <option value="GHMC">GHMC</option>
        <option value="HMDA">HMDA</option>
        <option value="Other">Other</option>
      </select>
    </div>
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <select class="form-control" placeholder="State" name="state" aria-describedby="sizing-addon2">
        <option value="">--Select State--</option>
        <option value="Telangana">Telangana</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
      </select>

      
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Add Data</button>
      </div>
    </div>


  </form>
</div>