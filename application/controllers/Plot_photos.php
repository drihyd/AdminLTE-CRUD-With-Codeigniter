<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plot_photos extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kota');
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_P_phots');
		$this->dataCustomers = $this->M_pegawai->select_all();
		$this->dataPlots = $this->M_posisi->select_all();
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKota'] 	= $this->M_P_phots->select_all();
		$data['page'] 		= "kota";
		$data['judul'] 		= "Data Plot Photos";
		$data['deskripsi'] 	= "Manage Data Plot Photos";

		$data['modal_tambah_kota'] = show_my_modal('modals/modal_plots_add_photos', 'tambah-kota', $data);

		$this->template->views('plots_photos/home', $data);
	}

	public function tampil() {
		$data['dataKota'] = $this->M_P_phots->select_all();
		

		$this->load->view('plots_photos/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');
		$this->form_validation->set_rules('plot_id', 'Plot Id', 'trim|required');
		

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {


			$config['upload_path'] = './assets/plots_photos/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp';			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo')){
				$error = array('error' => $this->upload->display_errors());
				
			}
			else{
				$data_kml_file = $this->upload->data();
				$data['photo'] = $data_kml_file['file_name'];
			}

			$result = $this->M_P_phots->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Photo Data Successfully added', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Plot Photo Failed Data added', '20px');
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
		$data['dataKota'] 	= $this->M_P_phots->select_by_id($id);

		echo show_my_modal('modals/modal_plots_update_photos', 'update-kota', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');
		$this->form_validation->set_rules('plot_id', 'Plot Id', 'trim|required');

		//$this->form_validation->set_rules('kml_file', 'KML File', 'trim|required');

		$data 	= $this->input->post();



		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/plots_photos/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp';			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo')){
				$error = array('error' => $this->upload->display_errors());
				
			}
			else{
				$data_kml_file = $this->upload->data();
				$data['photo'] = $data_kml_file['file_name'];
			}



			$result = $this->M_P_phots->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Photo Data Successfully updated', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Plot Photo Data Failed to update', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_P_phots->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Plot Photo Data Successfully deleted', '20px');
		} else {
			echo show_err_msg('Plot Photo Failed Data deleted', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['kota'] = $this->M_P_phots->select_by_id($id);
		$data['jumlahKota'] = $this->M_P_phots->total_rows();
		$data['dataKota'] = $this->M_P_phots->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_kota', 'detail-kota', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_P_phots->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Kota");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Kota.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Kota.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_P_phots->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_P_phots->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Kota Berhasil diimport ke database'));
						redirect('Kota');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Kota Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Kota');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */