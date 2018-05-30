<?php
class Model_pengirimku extends CI_Model {
	function get_data(){
		$data = $this->db->query("SELECT data_pengiriman.ID_PENGIRIMAN, data_pemesanan.TGL_PESAN, data_pengiriman.ID_PEMESANAN, 
								  data_kurir.NAMA_KURIR, data_pengiriman.STATUS, data_pengguna.NAMA_PENGGUNA, 
								  data_pengguna.ALAMAT_PENGGUNA FROM data_pengguna JOIN 
								  (data_pemesanan JOIN (data_pengiriman JOIN data_kurir ON data_pengiriman.ID_KURIR = data_kurir.ID_KURIR) 
								  ON data_pemesanan.ID_PEMESANAN = data_pengiriman.ID_PEMESANAN) ON data_pemesanan.ID_PENGGUNA = data_pengguna.ID_PENGGUNA");
		return $data->result();
	}
	function get_data_cari($data){
		$data = $this->db->query("SELECT data_pengiriman.ID_PENGIRIMAN, data_pemesanan.TGL_PESAN, data_pengiriman.ID_PEMESANAN, 
								  data_kurir.NAMA_KURIR, data_pengiriman.STATUS, data_pengguna.NAMA_PENGGUNA, 
								  data_pengguna.ALAMAT_PENGGUNA FROM data_pengguna JOIN 
								  (data_pemesanan JOIN (data_pengiriman JOIN data_kurir ON data_pengiriman.ID_KURIR = data_kurir.ID_KURIR) 
								  ON data_pemesanan.ID_PEMESANAN = data_pengiriman.ID_PEMESANAN) ON data_pemesanan.ID_PENGGUNA = data_pengguna.ID_PENGGUNA
								  WHERE data_pemesanan.TGL_PESAN = '%$data%'");
		return $data->result();
	}
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
	function data_kurir(){		
		$query = $this->db->query("SELECT * FROM  data_kurir");
		return $query->result();
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>