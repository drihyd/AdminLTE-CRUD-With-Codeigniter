<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	public function select_all_users() {
		$sql = "SELECT * FROM users";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT * FROM users";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM users where id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM users WHERE id = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM users WHERE id = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE users SET nama='" .$data['nama'] ."', telp='" .$data['telp'] ."', id_kota=" .$data['kota'] .", id_kelamin=" .$data['jk'] .", id_posisi=" .$data['posisi'] ." WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM users WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO users VALUES('{$id}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['kota'] ."," .$data['jk'] ."," .$data['posisi'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('users', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('users');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('users');

		return $data->num_rows();
	}
}

/* End of file M_users.php */
/* Location: ./application/models/M_users.php */