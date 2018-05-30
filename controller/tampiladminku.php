<?php 
class tampiladminku extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_delivery');
        
		if($this->session->userdata('status') != "login"){
			redirect(base_url("loginku/index"));
		}
	}
	function datapemesan(){
		if(isset ($_GET['data'])){
			$data=array(
				'data'=>$this->Model_delivery->get_data_cari($_GET['data']));
				$this->load->view('Appadmin/datapemesan',$data);
		}else{
			$data = array(
				'data'=>$this->Model_delivery->get_data());
		$this->load->view('Appadmin/datapemesan',$data);
		}
	}
	function input(){
		$data = array('namapengguna'=>$this->Model_delivery->get_pengguna(),
					  'namabarang'=>$this->Model_delivery->get_barang(),
					  'id' => $this->Model_delivery->id_otomatis()
			);
		$this->load->view('Appadmin/input_delivery',$data);
	}
	function input_aksi(){
		$data = array ('ID_PEMESANAN' => $this->input->post('ID_PEMESANAN'),
					   'ID_PENGGUNA' => $this->input->post('ID_PENGGUNA'),
					   'ID_BARANG' => $this->input->post('ID_BARANG'),
					   'JUMLAH'=>$this->input->post('JUMLAH')
					   );
		
		$this->Model_delivery->input_data($data,'data_pemesanan');
		redirect('tampiladminku/datapemesan');
	}
}
?>

	
	


   

 
	