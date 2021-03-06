<?php 
class supplierku extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_supplier');
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("loginku/index"));
		}
	}
	public function index(){
		$data['data_pemasok'] = $this->Model_supplier->tampil_data()->result();
		$this->load->view('Appadmin/supplier',$data);
	}
	public function tambah(){
		$data['id'] = $this->Model_supplier->id_otomatis();	
		$this->load->view('Appadmin/v_supplier',$data);
	}
 
	 function tambah_aksi(){
		$ID_PEMASOK = $this->input->post('ID_PEMASOK');
		$NAMA_PEMASOK = $this->input->post('NAMA_PEMASOK');
		$ALAMAT = $this->input->post('ALAMAT');
		$NO_HP_PEMASOK = $this->input->post('NO_HP_PEMASOK');
 
		$data = array(
		    'ID_PEMASOK' =>$ID_PEMASOK,
			'NAMA_PEMASOK' => $NAMA_PEMASOK,
			'ALAMAT' => $ALAMAT,
			'NO_HP_PEMASOK' => $NO_HP_PEMASOK
			);
		$this->Model_supplier->input_data($data,'data_pemasok');
		redirect('supplierku/index');
	}
   function cari(){
		if(isset ($_GET['data'])){
			$data=array(
				'data_pemasok'=>$this->Model_supplier->get_data_cari($_GET['data']));
				$this->load->view('Appadmin/supplier',$data);
		}else{
		$data = array(
				'data_pemasok'=>$this->Model_supplier->get_data());
		$this->load->view('Appadmin/supplier',$data);
   }}
	 function hapus($ID_PEMASOK){
		$where = array('ID_PEMASOK' => $ID_PEMASOK);
		$this->Model_supplier->hapus_data($where,'data_pemasok');
		redirect('supplierku/index');
	}
 
	 function edit($ID_PEMASOK){
		$where = array('ID_PEMASOK' => $ID_PEMASOK);
		$data['data_pemasok'] = $this->Model_supplier->edit_data($where,'data_pemasok')->result();
		$this->load->view('Appadmin/v_editsupplier',$data);
	}
  function update(){
	$ID_PEMASOK = $this->input->post('ID_PEMASOK');
	$NAMA_PEMASOK = $this->input->post('NAMA_PEMASOK');
	$ALAMAT = $this->input->post('ALAMAT');
	$NO_HP_PEMASOK = $this->input->post('NO_HP_PEMASOK');
 
	$data = array(
		'NAMA_PEMASOK' => $NAMA_PEMASOK,
		'ALAMAT' => $ALAMAT,
		'NO_HP_PEMASOK' => $NO_HP_PEMASOK
	);
 
	$where = array(
		'ID_PEMASOK' => $ID_PEMASOK
	);
 
	$this->Model_supplier->update_data($where,$data,'data_pemasok');
	redirect('supplierku/index');
}
	}
?>