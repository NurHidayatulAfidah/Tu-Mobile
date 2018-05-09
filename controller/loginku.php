<?php
class loginku extends CI_Controller{
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
		$this->load->view('Appadmin/v_login');
	}
	function cek_login(){
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $where = array(
   'username' => $username,
   'password' => $password);
   
  $cek = $this->data_login->cek_login("pengguna",$where)->num_rows();
  if($cek > 0){

   $data_session = array(
    'nama' => $username,
    'status' => "login");

   $this->session->set_userdata($data_session);
   redirect(base_url("tampiladminku"));

  }else{
   echo "<script type='text/javascript'>
               alert ('Maaf Username Dan Password Anda Salah !');
               document.write ('<center><h1> Harap Masukan Username Dan Password Dengan Benar !</h1></center><center><h1> www.kioscoding.com</h1></center>');
      </script>";
  }
}
function logout(){
  $this->session->sess_destroy();
  redirect(base_url('loginku/index'));
 }
}
?>