<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Plot Video Data Update</h3>

  <form id="form-plots-videos-kota" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $dataKota->id; ?>">
    

 <div class="input-group form-group-sm">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>    




      <select class="form-control get_plots_ajax" placeholder="Customer" name="customer_id" aria-describedby="sizing-addon2" required="required">
  <option value="">--Select Customer--</option>
<?php
  foreach ($this->dataCustomers as $Cust_item) { ?>
    <option value="<?php echo $Cust_item->id;?>" <?php if($Cust_item->id==$dataKota->customer_id) { ?> selected <?php } ?>> <?php echo ucfirst($Cust_item->first_name);?> </option>

  <?php }  ?>
        
      </select>

    </div>



        <div class="input-group form-group-sm">
  <span class="input-group-addon" id="sizing-addon2">
  <i class="glyphicon glyphicon-road"></i>
  </span>


      <select class="form-control" placeholder="Plot" name="plot_id" aria-describedby="sizing-addon2" required="required">
  <option value="">--Select Plot Owner--</option>
<?php
  foreach ($this->dataPlots as $Plot_item) { ?>
    <option value="<?php echo $Plot_item->id;?>" <?php if($Plot_item->id==$dataKota->plot_id) { ?> selected <?php } ?>> <?php echo ucfirst($Plot_item->owner_name);?> </option>

  <?php }  ?>
        
      </select>


  </div>



	
	     <div class="form-group-sm">
      <div><img src="https://i.imgur.com/9gpblys.png" width="100%"/></div>
    </div>	
    <div class="form-group-sm">
      <label>Video URL (See reference screenshot for add url)</label>
      <input type="text" class="form-control" placeholder="Video Path" name="file_path" id="file_path" aria-describedby="sizing-addon2"  value="<?php echo $dataKota->file_path;?>" required="required">
    </div>


    <div class="form-group-sm">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>