<?php 
class contactku extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_delivery');
        $this->load->model('admin_Model');
		 $this->load->model('M_produk');
		 $this->load->model('data_login');
        //$this->model = $this->Model_Mahasiswa;
		
	}
	
	function index(){
		$this->load->view('Appadmin/contact');
	}
	function contact(){
		$this->load->view('Appadmin/contact');
	}
}
?>