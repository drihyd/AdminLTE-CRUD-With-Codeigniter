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
		$timeStamp = time();
		$sql = "UPDATE users SET first_name='" .$data['first_name'] ."', last_name='" .$data['last_name'] ."', email='" .$data['email'] ."', address='" .$data['address'] ."',contact_no='".$data['contact_no'] ."',modified_date='".$timeStamp."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM users WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

    public function hash($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
	public function insert($data) {
		$timeStamp = time();
		 $hash = $this->hash($data['password']);
        $data = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $hash,
            'contact_no' => $data['contact_no'],
            'address' => $data['address'],
            'dob' => '',
            'verification_code' => '1',
            'created_date' => $timeStamp,
            'modified_date' => $timeStamp,
            'status' => 1
        );
        $this->db->insert('users', $data);
        if (!empty($this->db->insert_id()) && $this->db->insert_id() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	
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