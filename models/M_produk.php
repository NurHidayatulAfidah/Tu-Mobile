<?php 
class M_produk extends CI_Model {
	public function view(){
		return $this->db->get('data_barang')->result();
	}
	
	function get_data(){
		$query = $this->db->query("SELECT data_barang.ID_BARANG, data_barang.NAMA_BARANG, data_barang.JUMLAH,
								   data_barang.HARGA_SATUAN, data_barang.file, data_pemasok.NAMA_PEMASOK
								   FROM data_barang JOIN data_pemasok ON data_pemasok.ID_PEMASOK=data_barang.ID_PEMASOK");
		return $query->result();
	}
	
	function get_data_pemasok(){
		$query = $this->db->query("SELECT * FROM  data_pemasok");
		return $query->result();
	}
	function id_otomatis(){
		$this->db->select('Right(data_barang.ID_BARANG,3) as kode ',false);
		$this->db->order_by('ID_BARANG', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('data_barang');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}
		$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kodejadi  = "BR".$kodemax;
		return $kodejadi;
    }
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
	public function upload(){
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = 2048;
		$config['remove_space'] = TRUE;
  
		$this->load->library('upload', $config);
		if($this->upload->do_upload('input_gambar')){ 
			$return = array(
						'result' => 'success', 
						'file' => $this->upload->data(), 
						'error' => '');
			return $return;
		}else{
			$return = array(
						'result' => 'failed', 
						'file' => '', 
						'error' => $this->upload->display_errors());
			return $return;
		}
	}
  
	public function save($upload){
		$data = array(
					  'ID_BARANG'=>$this->input->post('ID_BARANG'),
					  'ID_PEMASOK'=>$this->input->post('ID_PEMASOK'),
					  'NAMA_BARANG'=>$this->input->post('NAMA_BARANG'),
					  'HARGA_SATUAN' => $this->input->post('HARGA_SATUAN'),
					  'JUMLAH' => $this->input->post('JUMLAH'),
					  'file' => $upload['file']['file_name']
		);
		$this->db->insert('data_barang', $data);
	}
	
	function get_data_cari($cari){
		$data = $this->db->query("SELECT data_barang.ID_BARANG, data_barang.NAMA_BARANG, data_barang.JUMLAH,
								   data_barang.HARGA_SATUAN, data_barang.file, data_pemasok.NAMA_PEMASOK
								   FROM data_barang JOIN data_pemasok ON data_pemasok.ID_PEMASOK=data_barang.ID_PEMASOK
								   WHERE data_barang.NAMA_BARANG LIKE '%$cari%'");
		return $data->result();
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>