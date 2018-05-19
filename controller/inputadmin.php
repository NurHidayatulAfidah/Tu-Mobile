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
  public function tambahStok($ID_BARANG='ID_BARANG'){
	  $where = array('0'=>$ID_BARANG);	
		$data['data_barang'] = $this->M_produk->edit_data($where,'data_barang')->result();
		$this->load->view('Appadmin/edit_barang',$data);
  }
 public function update(){
	$ID_BARANG = $this->input->post('ID_BARANG');
	$ID_PEMASOK = $this->input->post('ID_PEMASOK');
	$NAMA_BARANG = $this->input->post('NAMA_BARANG');
	$JENIS_BARANG = $this->input->post('JENIS_BARANG');
	$HARGA_SATUAN = $this->input->post('HARGA_SATUAN');
	$STOCK_BARANG = $this->input->post('STOCK_BARANG');
	$nama_file =$this->input->post('nama_file');
 
	$data = array(
	    'ID_BARANG'=>$ID_BARANG,
		'ID_PEMASOK'=>$ID_PEMASOK,
		'NAMA_BARANG' => $NAMA_BARANG,
		'JENIS_BARANG' => $JENIS_BARANG,
		'HARGA_SATUAN' => $HARGA_SATUAN,
		'STOCK_BARANG' => $STOCK_BARANG
		
	);
 
	$where = array(
		'ID_BARANG' => $ID_BARANG
	);
 
	$this->M_produk->update_data($where,$data,'data_barang');
	redirect('inputadmin/index');
}

	}
