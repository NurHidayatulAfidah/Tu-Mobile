<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inputadmin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("loginku/index"));
		}
		$this->load->model('M_produk');
	}
  
	public function index(){
		$data['data']= $this->M_produk->get_data();
		$this->load->view('Appadmin/v_barang', $data);
	}
  
	public function tambah(){
		$data = array();
		
		if($this->input->post('submit')){ 
			$upload = $this->M_produk->upload();
      
			if($upload['result'] == "success"){ 
				$this->M_produk->save($upload);
        
				redirect('inputadmin/index'); 
		
			}else{ 
				$data['message'] = $upload['error']; 
			}
		}
		$data = array('nama_pemasok' => $this->M_produk->get_data_pemasok(),
					  'id' => $this->M_produk->id_otomatis());
		$this->load->view('Appadmin/form', $data);
	}

	function hapus($ID_BARANG){
		$where = array('ID_BARANG' => $ID_BARANG);
		$this->M_produk->hapus_data($where,'data_barang');
		redirect('inputadmin/index');
	}
	
	function cari(){
		if(isset ($_GET['cari'])){
			$data=array(
				'data'=>$this->M_produk->get_data_cari($_GET['cari']));
				$this->load->view('Appadmin/v_barang',$data);
		}else{
			$data = array(
				'data'=>$this->M_produk->get_data());
			$this->load->view('Appadmin/v_barang',$data);
		}
   }
   
	function edit($ID_BARANG){
		$where = array('ID_BARANG' => $ID_BARANG);
		$data['data_barang'] = $this->M_produk->edit_data($where,'data_barang')->result();
		$this->load->view('Appadmin/v_tambah_stok',$data);
	}
	
	function update(){
		$ID_BARANG = $this->input->post('ID_BARANG');
		$NAMA_BARANG = $this->input->post('NAMA_BARANG');
		$HARGA_SATUAN = $this->input->post('HARGA_SATUAN');
		$JUMLAH= $this->input->post('JUMLAH');
		$tambahan = $this->input->post('stok_tambah');
		$abc = $JUMLAH+$tambahan;
 
		$data = array(
			'NAMA_BARANG'=>$NAMA_BARANG,
			'HARGA_SATUAN'=>$HARGA_SATUAN,
			'JUMLAH'=>$abc
		);
 
		$where = array(
			'ID_BARANG' => $ID_BARANG
		);
 
		$this->M_produk->update_data($where,$data,'data_barang');
		redirect('inputadmin/index');
	}
	
	function edit1($ID_BARANG){
		$where = array('ID_BARANG' => $ID_BARANG);
		$data['data_barang'] = $this->M_produk->edit_data($where,'data_barang')->result();
		$this->load->view('Appadmin/v_editbarang',$data);
	}
	
	function update1(){
		$ID_BARANG = $this->input->post('ID_BARANG');
		$NAMA_BARANG = $this->input->post('NAMA_BARANG');
		$HARGA_SATUAN = $this->input->post('HARGA_SATUAN');
		$JUMLAH= $this->input->post('JUMLAH');
 
		$data = array(
			'NAMA_BARANG'=>$NAMA_BARANG,
			'HARGA_SATUAN'=>$HARGA_SATUAN,
			'JUMLAH'=>$JUMLAH
		);
 
		$where = array(
			'ID_BARANG' => $ID_BARANG
		);
 
		$this->M_produk->update_data($where,$data,'data_barang');
		redirect('inputadmin/index');
	}
}
