<?php
  $no = 1;
  foreach ($dataPosisi as $posisi) {
    ?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo ucfirst($posisi->first_name); ?> <?php echo ucfirst($posisi->last_name); ?></td>
    <td><?php echo $posisi->owner_name; ?></td>
    <td><?php echo $posisi->address1; ?><br><?php echo $posisi->address2; ?></td>
	<td><?php echo $posisi->plot_no; ?></td>
    <td><?php echo $posisi->survey_no; ?></td>
    <td><?php echo $posisi->village; ?></td>
    <td><?php echo $posisi->mandal; ?> - <?php echo $posisi->district; ?></td>
    <td><?php echo $posisi->state; ?> - <?php echo $posisi->pincode; ?></td>
    <td><?php echo $posisi->authority; ?></td>
    <td><?php echo $posisi->lat; ?> - <?php echo $posisi->lag; ?></td>
    <td> 
<?php if(!empty($posisi->plot_map)) {?>
<img src="./assets/plot_map/<?php echo $posisi->plot_map; ?>" class="img-fluid rounded" style="width:104px;height:auto;"/>
      <a target="_new" href="./assets/plot_map/<?php echo $posisi->plot_map; ?>"><i class="glyphicon glyphicon-new-window"></i></a>
    <?php } ?>
      </td>

      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPosisi btn-sm" data-id="<?php echo $posisi->plot_id; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-danger konfirmasiHapus-posisi btn-sm" data-id="<?php echo $posisi->plot_id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
        <!--<button class="btn btn-info detail-dataPosisi" data-id="<?php echo $posisi->plot_id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>-->
      </td>
    </tr>
    <?php
    $no++;
  }
?>