<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add Plot Photo data</h3>

  <form id="form-plot-photos-add" class="form-tambah-kota" method="POST" enctype="multipart/form-data">
  <div class="input-group form-group-sm">
  <span class="input-group-addon" id="sizing-addon2">
  <i class="glyphicon glyphicon-user"></i>
  </span>
  <select class="form-control get_plots_ajax" placeholder="Customer" name="customer_id" aria-describedby="sizing-addon2" required="required">
  <option value="">--Select Customer--</option>
  <?php
  foreach ($this->dataCustomers as $Cust_item) {
  echo "<option value=".$Cust_item->id.">".ucfirst($Cust_item->first_name)."</option>";
  }
  ?>
  </select>
  </div>

    <div class="input-group form-group-sm">
  <span class="input-group-addon" id="sizing-addon2">
  <i class="glyphicon glyphicon-road"></i>
  </span>
  <select class="form-control" placeholder="Plot" name="plot_id" aria-describedby="sizing-addon2" required="required">
  <option value="">--Select Plot Owner--</option>
  <?php
  foreach ($this->dataPlots as $Plot_item) {
  echo "<option value=".$Plot_item->id.">".ucfirst($Plot_item->owner_name)."</option>";
  }
  ?>
  </select>
  </div>

 

    <div class="input-group form-group-sm">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <input type="file" class="form-control" placeholder="Photo" name="photo" id="photo" required="required">
    </div>
    <div class="form-group-sm">
  <label>Description</label>     
     <input type="text" class="form-control" placeholder="Description" name="description" aria-describedby="sizing-addon2">
    </div>
   

    <div class="form-group-sm">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Add Data</button>
      </div>
    </div>
  </form>
</div>