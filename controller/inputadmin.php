<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inputadmin extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('M_produk');
  }
  
  public function index(){
    $data['gambar'] = $this->M_produk->view();
    $this->load->view('Appadmin/view', $data);
  }
  
  public function tambah(){
    $data = array();
    
    if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
      // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
      $upload = $this->M_produk->upload();
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
         // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
        $this->M_produk->save($upload);
        
        redirect('inputadmin'); // Redirect kembali ke halaman awal / halaman view data
      }else{ // Jika proses upload gagal
        $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('Appadmin/form', $data);
  }
}