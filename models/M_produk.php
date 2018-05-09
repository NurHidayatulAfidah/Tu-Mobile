<?php
class M_produk extends CI_Model {
  public function __construct() {
        parent::__construct();
		$this->load->database();
  }
  public function input($data){
    try{
      $this->db->insert('produk', $data);
      return true;
    }catch(Exception $e){
    }
  }
  public function data(){
   $this->db->select('*');
   $this->db->from('produk');
   $data = $this->db->get();
   return $data->result();
 }
}
https://www.kioscoding.com/2018/01/crud-gambar-upload-input-gambar-codeigniter.html
?>
