<?php 
class tampiladminku extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_delivery');
        $this->load->model('admin_Model');
		 $this->load->model('M_produk');
		 $this->load->model('data_login');
        //$this->model = $this->Model_Mahasiswa;
		 if($this->session->userdata('status') != "login"){
   redirect(base_url("loginku/index"));
  
 }
	}
	
	function index(){
		$this->load->view('Appadmin/home','Appadmin/datapemesan','Appadmin/input_delivery','Appadmin/v_admin');
	}
	function home(){
		//$data = $this->Model_Mahasiswa->get_data();
		
		$this->load->view('Appadmin/v_admin');
		
		$data = array(
				'data'=>$this->Model_delivery->get_data());
		//$this->load->view('App/list_mhs',['data' => $data]);
		$this->load->view('Appadmin/list_delivery',$data);
	}


function pemesan(){
		$this->load->view('Appadmin/datapemesan');
	}
	function datapemesan(){
		if(isset ($_GET['data'])){
			$data=array(
				'data'=>$this->Model_delivery->get_data_cari($_GET['data']));
				$this->load->view('Appadmin/datapemesan',$data);
		}else{
			$data = array(
				'data'=>$this->Model_delivery->get_data());
		//$this->load->view('App/list_mhs',['data' => $data]);
		$this->load->view('Appadmin/datapemesan',$data);
	}
	}
	function input(){
		if (isset($_POST['btnTambah'])){
			$data = $this->Model_delivery->input(array (
			'Id_Pemesanan' => $this->input->post('Id_Pemesanan'),
			'Nama_Pemesan' => $this->input->post('Nama_Pemesan'),
			'Alamat' => $this->input->post('Alamat'),
			'Waktu_Pemesanan' => $this->input->post('Waktu_Pemesanan'),
			'Waktu_Tiba' => $this->input->post('Waktu_Tiba'),
			'Pengirim' => $this->input->post('Pengirim'),
			'id_status' => $this->input->post('status')));
			redirect('tampiladminku/datapemesan');
		}else{
			$x =$this->Model_delivery->get_status();
			$data = array(
				'nama_status'=>$this->Model_delivery->get_status()
				);
			//var_dump($x);
			$this->load->view('Appadmin/input_delivery',$data);
		}
	}
	
	function update(){
		$id = $this->input->post('No_Pemesan');
		$insert = $this->Model_Mahasiswa->update(array(
                
				'No_Pemesan' => $this->input->post('No_Pemesan'),
				'Alamat' => $this->input->post('Alamat'),
				'Waktu_Pemesanan' => $this->input->post('Waktu_Pemesanan')
            ), $id);
        redirect('Mahasiswa/home');
        }
		
	}

	
	


   

 
	