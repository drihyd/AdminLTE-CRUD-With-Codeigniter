<?php
  $no = 1;
  foreach ($dataKota as $kota) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo ucfirst($kota->first_name); ?> <?php echo ucfirst($kota->last_name); ?></td>
       <td> <?php echo ucfirst($kota->owner_name); ?></td>
       

     <td> 
<?php if(!empty($kota->photo)) {?>
<img src="./assets/plots_photos/<?php echo $kota->photo; ?>" class="img-fluid rounded" style="width:104px;height:auto;"/>
      <a target="_new" href="./assets/plots_photos/<?php echo $kota->photo; ?>"><i class="glyphicon glyphicon-new-window"></i></a>
    <?php } ?>
      </td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-plot-photo" data-id="<?php echo $kota->plots_photosid; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
          <button class="btn btn-danger plot_photos-delete-kota" data-id="<?php echo $kota->plots_photosid; ?>" data-toggle="modal" data-target="#plot_photos-delete"><i class="glyphicon glyphicon-remove-sign"></i></button>
         <!-- <button class="btn btn-info detail-dataKota" data-id="<?php echo $kota->plots_photosid; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>-->
      </td>
    </tr>
    <?php
    $no++;
  }
?>