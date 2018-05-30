<?php
class Model_supplier extends CI_Model {
	function tampil_data(){
		return $this->db->get('data_pemasok');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
	function id_otomatis(){
		$this->db->select('Right(data_pemasok.ID_PEMASOK,3) as kode ',false);
		$this->db->order_by('ID_PEMASOK', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('data_pemasok');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}
		$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kodejadi  = "PM".$kodemax;
		return $kodejadi;
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
	function get_data_cari($data){
		$data = $this->db->query("SELECT * FROM data_pemasok WHERE NAMA_PEMASOK LIKE '%$data%'");
		return $data->result();
	}
	function get_data(){
		$query = $this->db->query("SELECT *FROM  data_pemasok ");
		return $query->result();
	}
}