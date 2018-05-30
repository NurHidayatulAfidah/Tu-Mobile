<?php
class Model_delivery extends CI_Model {
	function get_data(){
		$query = $this->db->query("SELECT data_pemesanan.ID_PEMESANAN, data_pemesanan.TGL_PESAN, data_pengguna.NAMA_PENGGUNA, data_barang.NAMA_BARANG, data_pemesanan.JUMLAH, 
									data_barang.HARGA_SATUAN, data_pemesanan.HRG_TOTAL FROM data_pengguna 
									JOIN (data_pemesanan JOIN data_barang ON data_pemesanan.ID_BARANG = data_barang.ID_BARANG) 
									ON data_pemesanan.ID_PENGGUNA = data_pengguna.ID_PENGGUNA");
		return $query->result();
	}
	function get_data_cari($data){
		$query = $this->db->query("SELECT data_pemesanan.ID_PEMESANAN, data_pemesanan.TGL_PESAN, data_pengguna.NAMA_PENGGUNA, data_barang.NAMA_BARANG, data_pemesanan.JUMLAH, 
									data_barang.HARGA_SATUAN, data_pemesanan.HRG_TOTAL FROM data_pengguna 
									JOIN (data_pemesanan JOIN data_barang ON data_pemesanan.ID_BARANG = data_barang.ID_BARANG) 
									ON data_pemesanan.ID_PENGGUNA = data_pengguna.ID_PENGGUNA
									WHERE data_pemesanan.TGL_PESAN = '%$data%'");
		return $query->result();
	}
	function id_otomatis(){
		$this->db->select('Right(data_pemesanan.ID_PEMESANAN,3) as kode ',false);
		$this->db->order_by('ID_PEMESANAN', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('data_pemesanan');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}
		$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kodejadi  = "PS".$kodemax;
		return $kodejadi;
    }
	function get_pengguna(){
		$query = $this->db->query("SELECT * FROM data_pengguna ");
		return $query->result();
	}
	
	function get_barang(){
		$query = $this->db->query("SELECT * FROM data_barang ");
		return $query->result();
	}
	public function get_hrg_satuan($id){
		$query = $this->db->query("SELECT HARGA_SATUAN FROM data_barang where ID_BARANG='$id'");
		return $query;
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}?>