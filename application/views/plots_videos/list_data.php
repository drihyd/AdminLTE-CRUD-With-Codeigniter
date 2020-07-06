<?php
  $no = 1;
  foreach ($dataKota as $kota) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo ucfirst($kota->first_name); ?> <?php echo ucfirst($kota->last_name); ?></td>
       <td> <?php echo ucfirst($kota->owner_name); ?></td>
       

     <td> 
<?php if(!empty($kota->photo)) {
	$video_ID=$this->M_P_videos->_getYouTubeIdFromURL($kota->photo);
	
	?>

      <a target="_new" href="<?php echo $kota->photo; ?>"><img src="http://img.youtube.com/vi/<?php echo $video_ID;?>/hqdefault.jpg" class="photo img-responsive" width="100"></a></a>
    <?php } ?>
      </td>
      <td> <?php echo ucfirst($kota->description); ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-plot-video" data-id="<?php echo $kota->plots_videosid; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
          <button class="btn btn-danger plot_videos-delete-kota" data-id="<?php echo $kota->plots_videosid; ?>" data-toggle="modal" data-target="#plot_videos-delete"><i class="glyphicon glyphicon-remove-sign"></i></button>
         <!-- <button class="btn btn-info detail-dataKota" data-id="<?php echo $kota->plots_photosid; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>-->
      </td>
    </tr>
    <?php
    $no++;
  }
?>