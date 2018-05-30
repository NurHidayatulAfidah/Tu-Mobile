<?php
class kurirku extends CI_Controller{
		public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("loginku/index"));
		}
		
		 $this->load->model('M_kurir');
	}
	
	public	function index(){
		$data['data_kurir'] = $this->M_kurir->tampil_data()->result();
		$this->load->view('AppAdmin/v_kurir',$data);
	}

	public function tambah(){
		$data['id'] = $this->M_kurir->id_otomatis();
		$this->load->view('AppAdmin/v_tambahkurir',$data);
	}

	function tambah_aksi(){
		$ID_KURIR = $this->input->post('ID_KURIR');
		$NAMA_KURIR		= $this->input->post('NAMA_KURIR');
		$ALAMAT_KURIR = $this->input->post('ALAMAT_KURIR');
		$NO_HP_KURIR = $this->input->post('NO_HP_KURIR');
 
		$data = array(
		    'ID_KURIR' =>$ID_KURIR,
			'NAMA_KURIR' => $NAMA_KURIR,
			'ALAMAT_KURIR' => $ALAMAT_KURIR,
			'NO_HP_KURIR' => $NO_HP_KURIR
			);
		$this->M_kurir->input_data($data,'data_kurir');
		redirect('kurirku/index');
	}
	
	function cari(){
		if(isset ($_GET['data'])){
			$data=array(
				'data_kurir'=>$this->M_kurir->get_data_cari($_GET['data']));
				$this->load->view('Appadmin/v_kurir',$data);
		}else{
			$data = array(
				'data_kurir'=>$this->M_kurir->get_data());
			$this->load->view('Appadmin/v_kurir',$data);
		}
   }
	
	function delete($ID_KURIR){
		$where = array('ID_KURIR' => $ID_KURIR);
		$this->M_kurir->hapus_data($where,'data_kurir');
		redirect('kurirku/index');
	}
	
	function edit($ID_KURIR){
		$where = array('ID_KURIR' => $ID_KURIR);
		$data['data_kurir'] = $this->M_kurir->edit_data($where,'data_kurir')->result();
		$this->load->view('Appadmin/v_editkurir',$data);
	}
	function update(){
		$ID_KURIR = $this->input->post('ID_KURIR');
		$NAMA_KURIR = $this->input->post('NAMA_KURIR');
		$ALAMAT_KURIR = $this->input->post('ALAMAT_KURIR');
		$NO_HP_KURIR = $this->input->post('NO_HP_KURIR');
 
		$data = array(
			'NAMA_KURIR' => $NAMA_KURIR,
			'ALAMAT_KURIR' => $ALAMAT_KURIR,
			'NO_HP_KURIR' => $NO_HP_KURIR
		);
 
		$where = array(
			'ID_KURIR' => $ID_KURIR
		);
 
		$this->M_kurir->update_data($where,$data,'data_kurir');
		redirect('kurirku/index');
	}
}
?>