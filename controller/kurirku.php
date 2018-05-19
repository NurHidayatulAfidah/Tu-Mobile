<?php
class kurirku extends CI_Controller{
	 public function __construct(){
		parent::__construct();
		
		 $this->load->model('M_kurir');
        //$this->model = $this->Model_Mahasiswa;
	}
	
public	function index(){
		$data['gambar'] = $this->M_kurir->view();
		$this->load->view('Appkurir/kurir',$data);
	}

public function tambah(){
    $data = array();
    
    if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
      // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
      $upload = $this->M_kurir->upload();
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
         // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
        $this->M_kurir->save($upload);
        
        redirect('kurirku'); // Redirect kembali ke halaman awal / halaman view data
      }else{ // Jika proses upload gagal
        $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('Appkurir/formKurir', $data);
  }
public function delete($ID_KURIR){
		$where = array('ID_KURIR' => $ID_KURIR);
		$this->M_kurir->delete ($where,'data_kurir');
		redirect('kurirku/index');
	}

}
?>