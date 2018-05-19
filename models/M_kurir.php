<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kurir extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function view(){
    return $this->db->get('data_kurir')->result();
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload(){
    $config['upload_path'] = './images/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  
    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Fungsi untuk menyimpan data ke database
  public function save($upload){
    $data = array(
	   'ID_KURIR'=>$this->input->post('ID_KURIR'),
      'NAMA_KURIR'=>$this->input->post('NAMA_KURIR'),
      'ALAMAT_KURIR' => $this->input->post('ALAMAT_KURIR'),
	  'NO_HP_KURIR' => $this->input->post('NO_HP_KURIR'),
	  'nama_file' => $upload['file']['file_name']
    );
    
    $this->db->insert('data_kurir', $data);
}
function edit_data($where,$table){
	return $this->db->get_where($table,$where);
}
function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	function delete($id){
		$this->db->where($id);
        return $this->db->delete('data_kurir');
	}
}