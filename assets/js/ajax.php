<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilPegawai();
		tampilPosisi();
		tampilKota();
		plotsPhotos();
		plotsVideos();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilPegawai() {
		$.get('<?php echo base_url('customers/tampil'); ?>', function(data) {		
			
			MyTable.fnDestroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('customers/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('customers/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('customers/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('customers/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	//Plot Photos
	function plotsPhotos() {
		$.get('<?php echo base_url('plot_photos/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-plot-photos').html(data);
			refresh();
		});
	}
	
	
	
	var id_photos;
	$(document).on("click", ".plot_photos-delete-kota", function() {
		id_photos = $(this).attr("data-id");
	})
	$(document).on("click", ".clear-photos-data", function() {
		var id = id_photos;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('plot_photos/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#plot_photos-delete').modal('hide');
			plotsPhotos();
			$('.msg').html(data);
			effect_msg();
		})
	})
	
	
		$(document).on("click", ".update-plot-photo", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('plot_photos/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})
	
	
	
	$(document).ready(function() {

		$(document).on('submit', '#form-plot-photos-add', function(e){
		
		e.preventDefault();
		
		
		var form = document.getElementById('form-plot-photos-add'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('plot_photos/prosesTambah'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){
	
	console.log(xhr.responseText);
	var out = jQuery.parseJSON(xhr.responseText);

		
			plotsPhotos();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-plot-photos-add").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
 
}
xhr.send(formdata);
e.preventDefault();
	});



	
	$(document).on('submit', '#form-plots-photos-kota', function(e){
		e.preventDefault();
		//var postdata = $(this).serializeArray();
var form = document.getElementById('form-plots-photos-kota'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('plot_photos/prosesUpdate'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){
	var out = jQuery.parseJSON(xhr.responseText);

			plotsPhotos();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-plots-photos-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
 
}
xhr.send(formdata);

	e.preventDefault();
	});
	
	});
	
	
	
	
	
	/*** Plot Videos ***/
	

	function plotsVideos() {
		$.get('<?php echo base_url('plot_videos/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-plot-videos').html(data);
			refresh();
		});
	}
	
	
	
	var id_videos;
	$(document).on("click", ".plot_videos-delete-kota", function() {
		id_videos = $(this).attr("data-id");
	})
	$(document).on("click", ".clear-videos-data", function() {
		var id = id_videos;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('plot_videos/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#plot_videos-delete').modal('hide');
			plotsVideos();
			$('.msg').html(data);
			effect_msg();
		})
	})
	
	
		$(document).on("click", ".update-plot-video", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('plot_videos/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})
	
	
	
	$(document).ready(function() {

		$(document).on('submit', '#form-plot-videos-add', function(e){
		
		e.preventDefault();
		
		
		var form = document.getElementById('form-plot-videos-add'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('plot_videos/prosesTambah'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){
	
	console.log(xhr.responseText);
	var out = jQuery.parseJSON(xhr.responseText);

		
			plotsVideos();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-plot-videos-add").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
 
}
xhr.send(formdata);
e.preventDefault();
	});



	
	$(document).on('submit', '#form-plots-videos-kota', function(e){
		e.preventDefault();
		//var postdata = $(this).serializeArray();
var form = document.getElementById('form-plots-videos-kota'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('plot_videos/prosesUpdate'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){
	var out = jQuery.parseJSON(xhr.responseText);

			plotsVideos();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-plots-videos-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
 
}
xhr.send(formdata);

	e.preventDefault();
	});
	
	});
	
	
	/*** End ***/

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('survey/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('survey/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('survey/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('survey/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kota').modal('show');
		})
	})


$(document).ready(function() {

		$(document).on('submit', '#form-tambah-kota', function(e){
		
		e.preventDefault();
		
		
		var form = document.getElementById('form-tambah-kota'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('survey/prosesTambah'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){
	
	console.log(xhr.responseText);
	var out = jQuery.parseJSON(xhr.responseText);

		
			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
 
}
xhr.send(formdata);
e.preventDefault();
	});



	
	$(document).on('submit', '#form-update-kota', function(e){
		e.preventDefault();
		//var postdata = $(this).serializeArray();
var form = document.getElementById('form-update-kota'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('survey/prosesUpdate'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){
	var out = jQuery.parseJSON(xhr.responseText);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
 
}
xhr.send(formdata);

	e.preventDefault();
	});
	
	});
	
	
	
	

	$('#tambah-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('plots/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('plots/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('plots/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('plots/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-posisi').modal('show');
		})
	})

/*
	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('plots/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
		
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});
	
	*/


$(document).ready(function() {

$(document).on('submit', '#form-update-posisi', function(e){
e.preventDefault();
var form = document.getElementById('form-update-posisi'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('plots/prosesUpdate'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){

console.log(xhr.responseText);
var out = jQuery.parseJSON(xhr.responseText);


tampilPosisi();
if (out.status == 'form') {
$('.form-msg').html(out.msg);
effect_msg_form();
} else {
document.getElementById("form-update-posisi").reset();
$('#update-posisi').modal('hide');
$('.msg').html(out.msg);
effect_msg();
}

}
xhr.send(formdata);
e.preventDefault();
});
});



/*** Add ***/


$(document).on('submit', '#form-tambah-posis', function(e){
e.preventDefault();

var form = document.getElementById('form-tambah-posis'); //id of form
var formdata = new FormData(form);
var xhr = new XMLHttpRequest();
xhr.open('POST','<?php echo base_url('plots/prosesTambah'); ?>',true);
// xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
//if you have included the setRequestHeader remove that line as you need the 
// multipart/form-data as content type.
xhr.onload = function(){
	
	console.log(xhr.responseText);
	var out = jQuery.parseJSON(xhr.responseText);

		
			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posis").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
 
}
xhr.send(formdata);
e.preventDefault();
	});



/*** End ***/





	
	
	
	
	
	
	

	$('#tambah-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>