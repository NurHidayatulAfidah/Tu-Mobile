<?php
class Pengirimku extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_pengirimku');
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("loginku/index"));
		}
	}
	
	function index(){	
		if(isset ($_GET['data'])){
			$data=array(
				'data'=>$this->Model_pengirimku->get_data_cari($_GET['data']));
				$this->load->view('Appadmin/pengirim',$data);
		}else{
			$data = array(
				'data'=>$this->Model_pengirimku->get_data());
				$this->load->view('Appadmin/pengirim',$data);
		}
	}
	function edit($ID_PENGIRIMAN){
		if (isset ($_GET['edit'])){
			$where = array('ID_PENGIRIMAN' => $ID_PENGIRIMAN);
			$data['data'] = $this->Model_pengirimku->edit_data($where,'data_pengiriman')->result();
		}
		$data['data_kurir'] = $this->Model_pengirimku->data_kurir();
		$this->load->view('Appadmin/v_editpengirim',$data);
	}
	function update(){
		$ID_PENGIRIMAN = $this->input->post('ID_PENGIRIMAN');
		$ID_PEMESANAN = $this->input->post('ID_PEMESANAN');
		$STATUS = $this->input->post('STATUS');
		$ID_KURIR= $this->input->post('ID_KURIR');
 
		$data = array(
			'ID_PEMESANAN'=>$ID_PEMESANAN,
			'STATUS'=>$STATUS,
			'ID_KURIR'=>$ID_KURIR
		);
 
		$where = array(
			'ID_PENGIRIMAN' => $ID_PENGIRIMAN
		);
 
		$this->Model_pengirimku->update_data($where,$data,'data_pengiriman');
		redirect('pengirimku/index');
	}
}
?>