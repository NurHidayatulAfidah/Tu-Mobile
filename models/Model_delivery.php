<?php
class Model_delivery extends CI_Model {
	
	function get_table(){
        return $this->db->get("data_pengiriman");
    }
     function get_data_cari($data){
		$data = $this->db->query("SELECT * FROM ( SELECT data_pengiriman.Id_Pemesanan,data_pengiriman.Nama_Pemesan,data_pengiriman.Alamat,data_pengiriman.Waktu_Pemesanan,data_pengiriman.Waktu_Tiba,data_pengiriman.Pengirim,status.status FROM data_pengiriman,status WHERE data_pengiriman.id_status=status.id_status) AS tabel WHERE tabel.Nama_Pemesan='$data'");
		return $data->result();
	}
	function get_data(){
		$query = $this->db->query("SELECT *FROM  data_pengiriman,status WHERE data_pengiriman.id_status=status.id_status");
		return $query->result();
	}
	
	function get_status(){
		$query = $this->db->query("SELECT * FROM status ");
		return $query->result();
	}
	
	function get_data_edit(){
		$query = $this->db->query("SELECT * FROM tm_mahasiswa WHERE nim = '$id'");
		return $query->result_array();
	}
	
	function input($data = array()){
		return $this->db->insert('data_pengiriman',$data);
		//return $this->db->update('tm_mahasiswa',$data);
	}
	
	function delete($id){
		$this->db->where('No_Pemesan', $id);
        return $this->db->delete('tampilpesan');
	}
	
	function update($data = array(),$id){
		$this->db->where('No_Pemesan',$id);
		return $this->db->update('tampilpesan',$data);
	}
	
 
 
}