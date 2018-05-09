<?php
class Inputadmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_delivery');
        $this->load->model('admin_Model');
		 $this->load->model('M_produk');
		 $this->load->model('data_login');
		 $this->load->model('temp_model');
        //$this->model = $this->Model_Mahasiswa;
		
	}
	
	function input(){
		$this->load->view('Appadmin/input');
		
	}
	function proses_input(){
      //membuat konfigurasi
     $config = [
        'upload_path' => './assets/images/',
        'allowed_types' => 'gif|jpg|png',
        'max_size' => 1000, 'max_width' => 1000,
        'max_height' => 1000
      ];
	 $this->load->library('upload', $config);
     
      if (!$this->upload->do_upload()) //jika gagal upload
      {
          $error = array('error' => $this->upload->display_errors()); //tampilkan error
          $this->load->view('Appadmin/input', $error);
      } else
      //jika berhasil upload
      {
          $file = $this->M_produk->data();
          //mengambil data di form
          $data = ['gambar' => $file['file_name'],
           'nama' => set_value('nama'),
           'harga' => set_value('harga'),
           'stok' => set_value('stok')
         ];
          $this->M_produk->input($data); //memasukan data ke database
          redirect('Appadmin/input'); //mengalihkan halaman

      }
  }
 function data(){
  $data['produk'] = $this->M_produk->data();
  $this->load->view('Appadmin/data', $data);
}
}
?>