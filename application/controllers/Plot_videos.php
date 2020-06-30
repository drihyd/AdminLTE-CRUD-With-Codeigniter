<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plot_videos extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kota');
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_P_videos');
		$this->dataCustomers = $this->M_pegawai->select_all();
		$this->dataPlots = $this->M_posisi->select_all();
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKota'] 	= $this->M_P_videos->select_all();
		$data['page'] 		= "kota";
		$data['judul'] 		= "Data Plot Videos";
		$data['deskripsi'] 	= "Manage Data Plot Videos";

		$data['modal_tambah_kota'] = show_my_modal('modals/modal_plots_add_photos', 'tambah-kota', $data);

		$this->template->views('plots_videos/home', $data);
	}

	public function tampil() {
		$data['dataKota'] = $this->M_P_videos->select_all();
		

		$this->load->view('plots_videos/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');
		$this->form_validation->set_rules('plot_id', 'Plot Id', 'trim|required');
		

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {


			$config['upload_path'] = './assets/plots_videos/';
			$config['allowed_types'] = 'jpg|png';			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo')){
				$error = array('error' => $this->upload->display_errors());
				
			}
			else{
				$data_kml_file = $this->upload->data();
				$data['file_path'] = $data_kml_file['file_name'];
			}

			$result = $this->M_P_videos->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Video Data Successfully added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Plot Video Failed Data added', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataKota'] 	= $this->M_P_videos->select_by_id($id);

		echo show_my_modal('modals/modal_plots_update_photos', 'update-kota', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');
		$this->form_validation->set_rules('plot_id', 'Plot Id', 'trim|required');

		//$this->form_validation->set_rules('kml_file', 'KML File', 'trim|required');

		$data 	= $this->input->post();



		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/plots_videos/';
			$config['allowed_types'] = 'jpg|png';			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo')){
				$error = array('error' => $this->upload->display_errors());
				
			}
			else{
				$data_kml_file = $this->upload->data();
				$data['file_path'] = $data_kml_file['file_name'];
			}



			$result = $this->M_P_videos->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Video Data Successfully updated', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Video Data Failed to update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_P_videos->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Plot Video Data Successfully deleted', '20px');
		} else {
			echo show_err_msg('Plot Video Failed Data deleted', '20px');
		}
	}



	
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */