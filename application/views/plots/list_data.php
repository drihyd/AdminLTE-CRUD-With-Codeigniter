<?php
  $no = 1;
  foreach ($dataPosisi as $posisi) {
    ?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo ucfirst($posisi->first_name); ?> <?php echo ucfirst($posisi->last_name); ?></td>
    <td><?php echo $posisi->owner_name; ?></td>
    <td><?php echo $posisi->address1; ?><br><?php echo $posisi->address2; ?></td>
    <td><?php echo $posisi->survey_no; ?></td>
    <td><?php echo $posisi->village; ?></td>
    <td><?php echo $posisi->mandal; ?></td>
    <td><?php echo $posisi->district; ?> - <?php echo $posisi->state; ?></td>
    <td><?php echo $posisi->authority; ?></td>

      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPosisi" data-id="<?php echo $posisi->plot_id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-posisi" data-id="<?php echo $posisi->plot_id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <!--<button class="btn btn-info detail-dataPosisi" data-id="<?php echo $posisi->plot_id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>-->
      </td>
    </tr>
    <?php
    $no++;
  }
?>