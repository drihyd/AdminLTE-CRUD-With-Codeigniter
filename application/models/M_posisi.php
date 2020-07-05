<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posisi extends CI_Model {

	public function select_all() {


		$sql = " SELECT users.id AS id, users.first_name AS first_name, users.last_name AS last_name, plots.id as plot_id,plots.owner_name AS owner_name,plots.address1,plots.address2,plots.plot_no,plots.survey_no,plots.village,plots.mandal,plots.district,plots.authority,plots.pincode,plots.state FROM users,plots WHERE users.id = plots.customer_id";

		$data = $this->db->query($sql);

		return $data->result();

	
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM plots WHERE id = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function select_by_users($id) {
		$sql = " SELECT users.id AS id, users.nama AS users, users.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, plots.nama AS plots FROM users, kota, kelamin, plots WHERE users.id_kelamin = kelamin.id AND users.id_plots = plots.id AND users.id_kota = kota.id AND users.id_plots={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {

		$timeStamp = time();

	     $data = array(
			'customer_id' => $data['customer_id'],
			'owner_name' => $data['owner_name'],
			'address1' => $data['address1'],
			'address2' => $data['address2'],
			'plot_no' => $data['plot_no'],
			'survey_no' => $data['survey_no'],
			'village' => $data['village'],
			'mandal' => $data['mandal'],
			'district' => $data['district'],
			'pincode' => $data['pincode'],
			'authority' => $data['authority'],
			'state' => $data['state'],
			'created_date' => $timeStamp,
			'modified_date' => $timeStamp

			);

        $this->db->insert('plots', $data);
 
        if (!empty($this->db->insert_id()) && $this->db->insert_id() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function insert_batch($data) {
		$this->db->insert_batch('plots', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE plots SET state='" .$data['state'] ."',authority='" .$data['authority'] ."',district='" .$data['district'] ."',pincode='" .$data['pincode'] ."',mandal='" .$data['mandal'] ."',survey_no='" .$data['survey_no'] ."',plot_no='" .$data['plot_no'] ."',village='" .$data['village'] ."',address2='" .$data['address2'] ."',address1='" .$data['address1'] ."',customer_id='" .$data['customer_id'] ."',owner_name='" .$data['owner_name'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM plots WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('plots');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('plots');

		return $data->num_rows();
	}
}

/* End of file M_plots.php */
/* Location: ./application/models/M_plots.php */