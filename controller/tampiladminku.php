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
		$this->load->view('Appadmin/list_delivery','Appadmin/datapemesan','Appadmin/input_delivery','Appadmin/v_admin');
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
			'ID_PEMESANAN' => $this->input->post('ID_PEMESANAN'),
			'ID_PEMESANAN' => $this->input->post('STATUS'),
			'ID_PENGGUNA' => $this->input->post('ID_PENGGUNA'),
			'ID_PENGGUNA' => $this->input->post('NAMA_PENGGUNA'),
			'ID_BARANG' => $this->input->post('ID_BARANG'),
			'ID_BARANG' =>$this->input->post('NAMA_BARANG'),
			'JUMLAH'=>$this->input->post('JUMLAH')));
			redirect('tampiladminku/datapemesan');
		}else{
			$x =$this->Model_delivery->get_status();
			$data = array(
			'namapengguna'=>$this->Model_delivery->get_pengguna(),
			 'nama_status'=>$this->Model_delivery->get_status(),
				'namabarang'=>$this->Model_delivery->get_barang()
				);
			//var_dump($x);
			$this->load->view('Appadmin/input_delivery',$data);
		}
	}
	
	function update(){
		$id = $this->input->post('ID_PEMESANAN');
		$insert = $this->Model_delivery->update(array(
                
				'ID_PEMESANAN' => $this->input->post('ID_PEMESANAN'),
				'ID_PENGGUNA' => $this->input->post('ID_PENGGUNA'),
				'ID_BARANG' => $this->input->post('ID_BARANG'),
				'JUMLAH'=>$this->input->post('JUMLAH')
            ), $id);
        redirect('Mahasiswa/home');
        }
		
	}

	
	


   

 
	