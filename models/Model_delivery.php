<?php
class Model_delivery extends CI_Model {
	
	function get_table(){
        return $this->db->get("data_pemesanan");
    }
     function get_data_cari($data){
		$data = $this->db->query("SELECT * FROM ( SELECT data_pemesanan.ID_PEMESANAN,data_pemesanan.ID_PENGGUNA,data_pemesanan.ID_BARANG,data_pemesanan.JUMLAH FROM data_pemesanan,data_pengguna,data_barang WHERE data_pemesanan.ID_PENGGUNA=data_pengguna.ID_PENGGUNA ) AS tabel WHERE tabel.ID_PENGGUNA='$data'");
		return $data->result();
	}
	function get_data(){
		$query = $this->db->query("SELECT *FROM  data_pemesanan,data_pengguna,data_barang  ");
		return $query->result();
	}
	function get_pembayaran(){
		$query = $this->db->query("SELECT * FROM data_pembayaran ");
		return $query->result();
	}
	function get_pengguna(){
		$query = $this->db->query("SELECT * FROM data_pengguna ");
		return $query->result();
	}
	function get_status(){
		$query = $this->db->query("SELECT * FROM data_pengiriman ");
		return $query->result();
	}
	function get_pengirim(){
		$query = $this->db->query("SELECT * FROM data_kurir ");
		return $query->result();
	}
	function get_barang(){
		$query = $this->db->query("SELECT * FROM data_barang ");
		return $query->result();
	}
		function get_pemesan(){
		$query = $this->db->query("SELECT * FROM data_pemesanan ");
		return $query->result();
	}
	
	function get_data_edit(){
		return $query->result_array();
	}
	
	function input($data = array()){
		return $this->db->insert('data_pemesanan',$data);
		//return $this->db->update('tm_mahasiswa',$data);
	}
	
	function delete($id){
		$this->db->where('ID_PEMESANAN', $id);
        return $this->db->delete('data_pemesanan');
	}
	
	function update($data = array(),$id){
		$this->db->where('ID_Pemesan',$id);
		return $this->db->update('data_pemesanan',$data);
	}
	
 
 
}