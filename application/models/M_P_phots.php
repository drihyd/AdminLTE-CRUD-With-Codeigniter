<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_P_phots extends CI_Model {
	public function select_all() {
		$sql = " SELECT users.id AS user_id, users.first_name AS first_name, users.last_name AS last_name, plots.id as plot_id,plots.owner_name AS owner_name,plots.address1,plots.address2,plots.survey_no,plots.village,plots.mandal,plots.district,plots.authority,plots.state,plots_photos.description,plots_photos.id as plots_photosid,plots_photos.photo as photo FROM users,plots,plots_photos WHERE plots_photos.plot_id = plots.id and plots.customer_id = users.id";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM plots_photos WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, plots_photos.nama AS plots_photos, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, plots_photos, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_plots_photos = plots_photos.id AND pegawai.id_plots_photos={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {

		$timeStamp = time();
	     $data = array(
			'customer_id' => $data['customer_id'],
			'plot_id' => $data['plot_id'],
			'photo' => $data['photo'],
			'description' => $data['description'],
			'created_date' => $timeStamp,
			'modified_date' => $timeStamp

			);

        $this->db->insert('plots_photos', $data);
 
        if (!empty($this->db->insert_id()) && $this->db->insert_id() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }


	}

	public function insert_batch($data) {
		$this->db->insert_batch('plots_photos', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {


	$sql = "UPDATE plots_photos SET customer_id='".$data['customer_id']."',plot_id ='".$data['plot_id']."',description ='".$data['description']."',photo='".$data['photo']."' WHERE id='".$data['id'] ."'";
	//echo $this->db->last_query(); 

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM plots_photos WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('plots_photos');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('plots_photos');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */