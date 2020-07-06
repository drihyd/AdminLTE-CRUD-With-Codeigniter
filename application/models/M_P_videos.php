<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_P_videos extends CI_Model {
	public function select_all() {
		$sql = " SELECT users.id AS user_id, users.first_name AS first_name, users.last_name AS last_name, plots.id as plot_id,plots.owner_name AS owner_name,plots.address1,plots.address2,plots.survey_no,plots.village,plots.mandal,plots.district,plots.authority,plots.state,plots_videos.id as plots_videosid,plots_videos.file_path as photo FROM users,plots,plots_videos WHERE plots_videos.plot_id = plots.id and plots.customer_id = users.id";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM plots_videos WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, plots_videos.nama AS plots_videos, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, plots_videos, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_plots_videos = plots_videos.id AND pegawai.id_plots_videos={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {

		$timeStamp = time();
	     $data = array(
			'customer_id' => $data['customer_id'],
			'plot_id' => $data['plot_id'],
			'file_path' => $data['file_path'],
			'created_date' => $timeStamp,
			'modified_date' => $timeStamp

			);

        $this->db->insert('plots_videos', $data);
 
        if (!empty($this->db->insert_id()) && $this->db->insert_id() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }


	}

	public function insert_batch($data) {
		$this->db->insert_batch('plots_videos', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {


	$sql = "UPDATE plots_videos SET customer_id='".$data['customer_id']."',plot_id ='".$data['plot_id']."',file_path='".$data['file_path']."' WHERE id='".$data['id'] ."'";
	//echo $this->db->last_query(); 

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM plots_videos WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('plots_videos');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('plots_videos');

		return $data->num_rows();
	}
	
		public function _getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */