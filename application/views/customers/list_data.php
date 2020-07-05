<?php
$sno=1;
  foreach ($dataPegawai as $pegawai) {
    ?>
    <tr>
      <td><?php echo $sno; ?></td>
      <td><?php echo ucfirst($pegawai->first_name)." ".ucfirst($pegawai->last_name); ?></td>
      <td><?php echo $pegawai->email; ?></td>
      <td><?php echo $pegawai->contact_no; ?></td>
	   <!--<td><?php echo $pegawai->address; ?></td>-->
        <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
      </td>
    </tr>
    <?php
	
	$sno++;
  }
?>