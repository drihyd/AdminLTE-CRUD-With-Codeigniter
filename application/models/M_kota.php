<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends CI_Model {
	public function select_all() {
		$sql = " SELECT users.id AS user_id, users.first_name AS first_name, users.last_name AS last_name, plots.id as plot_id,plots.owner_name AS owner_name,plots.address1,plots.address2,plots.survey_no,plots.village,plots.mandal,plots.district,plots.authority,plots.state,survey.date_of_survey,survey.id as surveyid FROM users,plots,survey WHERE survey.plot_id = plots.id and plots.	customer_id = users.id";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM survey WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, survey.nama AS survey, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, survey, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_survey = survey.id AND pegawai.id_survey={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO survey VALUES('','" .$data['survey'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('survey', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE survey SET nama='" .$data['survey'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM survey WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('survey');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('survey');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */