<?php
class loginku extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('data_login');
	}
	
	function index(){
		$this->load->view('Appadmin/v_login');
	}
	
	function cek_login(){
		$USERNAME = $this->input->post('USERNAME');
		$PASSWORD = $this->input->post('PASSWORD');
		$where = array(
		'USERNAME' => $USERNAME,
		'PASSWORD' => $PASSWORD);
   
		$cek = $this->data_login->cek_login("data_pengguna",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
			'nama' => $USERNAME,
			'status' => "login");

			$this->session->set_userdata($data_session);
			echo "<script type='text/javascript'>
			alert ('Login berhasil ! Hallo Selamat Datang Di Web Kami!');
			</script>";
			$this->load->view('Appadmin/v_home');

		}else{
			echo "<script type='text/javascript'>
			alert ('Maaf Username Dan Password Anda Salah !');
			</script>";
			$this->load->view('Appadmin/v_login');
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		echo "<script type='text/javascript'>
			alert ('Anda Telah Logout!');
			</script>";
			$this->load->view('Appadmin/v_login');
	}
	function mhome(){
	    $this->load->view('Appadmin/v_home');
	}
}
?>