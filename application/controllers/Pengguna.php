<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function index()
	{
		if ($this->session->userdata('username') != '') {
			$where = [
				'username' => $this->session->userdata('username'),
			];
			$data['user'] = $this->db->get_where('pengguna',$where)->row_array();
			$user_id = @$data['user']['id'];
			$data['isi'] = array();
			$data['title'] = 'Home Page';
			$this->load->view('pegawai/index',$data);
		} else {
			$this->load->view('pegawai/login');
		}		
	}
	public function login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = [
			'username' => $username,
			'password' => $password
		];
		$cek = $this->db->get_where('pengguna',$where)->row_array();
		if ($cek != null) {
			$this->session->set_userdata('username',$username);
			redirect();
		} else {
			$this->session->set_flashdata('error','Username atau Password Salah!');
			redirect();
		}	
	}
	public function form_data_pegawai(){
		$data['isi'] = array();
		$data['title'] = 'Form Tambah Data Pegawai';
		$this->load->view('pegawai/form-add',$data);
	}
	public function tambah_pegawai(){
		$data = [
			'nama'		=> $this->input->post('nama'),
			'alamat'	=> $this->input->post('alamat'),
			'telp'		=> $this->input->post('telp'),
			'gaji'		=> $this->input->post('gaji'),
		];
		// $config['upload_path']          = './img';
		// $config['allowed_types']        = 'gif|jpg|png|bmp|jpeg';
		// $config['max_size']             = 1000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		// $this->load->library('upload', $config);

		// if (!$this->upload->do_upload('foto'))
		// {
		// 	$error = $this->upload->display_errors();
		// 	$this->session->set_flashdata('danger',$error);
		// }
		// else
		// {
		// 	$data['gambar'] = $this->upload->data('file_name');
		// }
		$cek = $this->db->insert('pegawai',$data);
		if ($cek) {
			$this->session->set_flashdata('info','Data Pegawai Berhasil Ditambahkan!');
		}
		redirect('pengguna/data_pegawai');
	}
	public function data_pegawai(){
		$data['isi'] = $this->db->get_where('pegawai')->result();
		$data['title'] = 'Data Pegawai';
		$this->load->view('pegawai/data_pegawai',$data);
	}
	public function form_edit_pegawai($id){
		$data['isi'] 	= $this->db->get_where('pegawai',['id'=>$id])->row_array();
		$data['title'] 	= 'Form Edit Data Pegawai';
		$data['id'] 	= $id;
		$this->load->view('pegawai/form-edit',$data);
	}
	public function edit_pegawai($id){
		$data = [
			'nama'		=> $this->input->post('nama'),
			'alamat'	=> $this->input->post('alamat'),
			'telp'		=> $this->input->post('telp'),
			'gaji'		=> $this->input->post('gaji'),
		];
		// $config['upload_path']          = './img';
		// $config['allowed_types']        = 'gif|jpg|png|bmp|jpeg';
		// $config['max_size']             = 1000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		// $this->load->library('upload', $config);

		// if (!$this->upload->do_upload('foto'))
		// {
		// 	if ($this->upload->data('file_name') != null) {
		// 		$error = $this->upload->display_errors();
		// 		$this->session->set_flashdata('danger',$error);
		// 		redirect();
		// 		die;
		// 	}
		// }
		// else
		// {
		// 	$data['gambar'] = $this->upload->data('file_name');
		// }
		$this->db->where('id',$id);
		$cek = $this->db->update('pegawai',$data);
		if ($cek) {
			$this->session->set_flashdata('info','Data Pegawai Berhasil Diubah!');
		}
		redirect('pengguna/data_pegawai');
	}
	public function hapus_pegawai($id){
		$cek = $this->db->delete('pegawai',['id'=>$id]);
		if ($cek) {
			$this->session->set_flashdata('info', 'Data Pegawai Berhasil Dihapus!');
		}
		redirect('pengguna/data_pegawai');
	}
	public function form_detail_pegawai($id){
		$data['isi'] 	= $this->db->get_where('pegawai',['id'=>$id])->row_array();
		$data['title'] 	= 'Form Detail Data Pegawai';
		$data['id'] 	= $id;
		$this->load->view('pegawai/detail_pegawai',$data);
	}
	public function form_absensi_pegawai(){
		$this->db->order_by('nama','ASC');
		$data['pegawai'] 	= $this->db->get('pegawai')->result();
		$data['title'] 	= 'Form Absensi Pegawai';
		$this->load->view('pegawai/absensi_pegawai',$data);
	}
	public function absensi_pegawai(){
		$id_pegawai = $this->input->post('id_pegawai');
		$data_pegawai = $this->db->get_where('pegawai',['id'=>$id_pegawai])->row_array();
		$data = [
			'id_pegawai'	=> $id_pegawai,
			'nama'			=> $data_pegawai['nama'],
			'keterangan'	=> $this->input->post('keterangan'),
			'kategori'		=> $this->input->post('kategori'),
		];
		try {
			$cek = $this->db->insert('absensi',$data);
			if ($cek) {
				$this->session->set_flashdata('info','Data Absensi Berhasil Ditambahkan!');
			}
		} catch (Exception $e) {
			$cek_array = [
				'id_pegawai' 	=> $id_pegawai,
				'tanggal' 		=> date('Y-m-d'),
				'kategori'		=> $this->input->post('kategori'),
			];
			$cek_pegawai = $this->db->get_where('pegawai',$cek_array)->row_array();
			if (!empty($cek_pegawai)) {
				$this->session->set_flashdata('danger','Data '.$cek_pegawai['nama'].' tanggal '.$cek_pegawai['tanggal'].' dengan kategori '.$cek_pegawai['kategori'].' sudah ada di dalam Database!');
			} else {
				$this->session->set_flashdata('danger','Terjadi error saat input data absensi!');
			}
		}
		redirect();
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect();
	}
	
	// public function jadwal()
	// {
	// 	if ($this->session->userdata('username') != '') {
	// 		$where = [
	// 			'username' => $this->session->userdata('username'),
	// 		];
	// 		$data['user'] = $this->db->get_where('pengguna',$where)->row_array();
	// 		$user_id = @$data['user']['id'];
	// 		$data['title'] = 'Jadwal dan Hari Rilis';
	// 		$this->db->order_by('hari','ASC');
	// 		$this->db->order_by('pukul','ASC');
	// 		$data['jadwal'] = $this->db->get_where('tblanime',['user_id'=>$user_id])->result();
	// 		$this->load->view('pegawai/jadwal',$data);
	// 	}
	// }
	// public function kategori($idstatus=0)
	// {
	// 	$where = [
	// 		'username' => $this->session->userdata('username'),
	// 	];
	// 	$data['user'] = $this->db->get_where('pengguna',$where)->row_array();
	// 	$user_id = @$data['user']['id'];
	// 	$this->db->order_by('tahun','DESC');
	// 	$this->db->order_by('season','DESC');
	// 	$this->db->order_by('judul','ASC');
	// 	$data['isi'] = $this->db->get_where('tblanime',['user_id'=>$user_id,'status'=>$idstatus])->result();
	// 	$ongoingSeason='';
	// 	$month = date('m');
	// 	if ($month>=1 && $month<=3) {
	// 		$ongoingSeason .= "WINTER ";
	// 	} else if ($month>=4 && $month<=6) {
	// 		$ongoingSeason .= "SPRING ";
	// 	} else if ($month>=7 && $month<=9) {
	// 		$ongoingSeason .= "SUMMER ";
	// 	} else if ($month>=10 && $month<=12) {
	// 		$ongoingSeason .= "FALL ";
	// 	}
	// 	$ongoingSeason .= date('Y');
	// 	if ($idstatus==0) {
	// 		$status='SCHEDULE LIST';
	// 	} else if ($idstatus==1) {
	// 		$status='ONGOING LIST ('.$ongoingSeason.')';
	// 	} else if ($idstatus==2) {
	// 		$status='FINISHED LIST';
	// 	} else {
	// 		$status='KATEGORI: '.$idstatus;
	// 	}
	// 	$data['title'] = $status;
	// 	$data['id_kategori'] = $idstatus;
	// 	$this->load->view('pegawai/index',$data);	
	// }
	// public function updateStatus(){
	// 	$month = date('m');
	//     $season=0;
	// 	if ($month>=1 && $month<=3) {
	// 		$season = 1;
	// 	} else if ($month>=4 && $month<=6) {
	// 		$season = 2;
	// 	} else if ($month>=7 && $month<=9) {
	// 		$season = 3;
	// 	} else if ($month>=10 && $month<=12) {
	// 		$season = 4;
	// 	}
	// 	$this->db->where('season',$season);
	// 	$this->db->where('tahun',date('Y'));
	// 	$this->db->where('status',0);
	// 	$data = [
	// 	    'status' => 1,
	// 	];
	// 	$cek = $this->db->update('tblanime',$data);
	// 	if ($cek) {
	// 		$this->session->set_flashdata('info','Status Berhasil Diubah!');
	// 	}
	// 	redirect('pengguna/kategori/1');
	// }
	// public function nextEps(){
	// 	$id = $_POST['id'];
	// 	$dataLama = $this->db->get_where('tblanime',['id'=>$id])->row_array();
	// 	$eps = @$dataLama['last_view_eps']+1;
	// 	$data = [
	// 	    'last_view_eps' => $eps
	// 	];
	// 	$this->db->where('id',$id);
	// 	$cek = $this->db->update('tblanime',$data);
	// 	// if ($cek) {
	// 	// 	$this->session->set_flashdata('info','Data Berhasil Diubah!');
	// 	// }
	// 	// redirect('user/kategori/1');
	// 	echo $eps;
	// }
	public function printPDF(){
		$where = [
			'username' => $this->session->userdata('username'),
		];
		$data['user'] = $this->db->get_where('pengguna',$where)->row_array();
		$user_id = @$data['user']['id'];
		$this->db->order_by('tahun','DESC');
		$this->db->order_by('season','ASC');
		$this->db->order_by('judul','ASC');
		$where2 = ['user_id'=>$user_id];
		$data['cetak'] = $this->db->get_where('tblanime',$where2)->result();
		// $data['cetak'] = $this->db->get('tblanime')->result();
		$this->load->view('crud/cetak-pdf',$data);
		$html = $this->output->get_output();
		//$this->load->library('Dompdf_gen');
		//$this->dompdf->load_html($html);
		//$this->dompdf->render();
		//$this->dompdf->stream("cetak.pdf",array('Attachment'=>0));
		
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $dompdf = new DOMPDF();
        $filename = "Absensi - ".@$data['user']['username'].".pdf";
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($filename,array("Attachment"=>false));
	}
	public function printExcel(){
		$where = [
			'username' => $this->session->userdata('username'),
		];
		$data['user'] = $this->db->get_where('pengguna',$where)->row_array();
		$user_id = @$data['user']['id'];
		$username= @$data['user']['username'];

        $objPHPExcel = new \PHPExcel();

        $title = "Absensi - ".$username;

        $objPHPExcel->getProperties()->setCreator($username)
                                     ->setLastModifiedBy($username)
                                     ->setTitle($title)
                                     ->setSubject("Absensi")
                                     ->setDescription("Absensi")
                                     ->setKeywords("Absensi")
                                     ->setCategory("Absensi");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', 'No.')
            ->setCellValue('B3', 'Judul')
            ->setCellValue('C3', 'Season')
            ->setCellValue('D3', 'Tahun')
            ->setCellValue('E3', 'Status')
            ->setCellValue('F3', 'Catatan')
            ->setCellValue('G3', 'Platform');
        $no=1;
		$this->db->order_by('tahun','DESC');
		$this->db->order_by('season','ASC');
		$this->db->order_by('judul','ASC');
		$data['cetak'] = $this->db->get_where('tblanime',['user_id'=>$user_id])->result();
		// $data['cetak'] = $this->db->get('tblanime')->result();
        foreach ($data['cetak'] as $key => $value) {
			if ($value->season==1) {
				$season = "Winter";
			} else if ($value->season==2) {
				$season = "Spring";
			} else if ($value->season==3) {
				$season = "Summer";
			} else if ($value->season==4) {
				$season = "Fall";
			} else { $season = "-"; }
			if ($value->status==0) {
				$status = "SCHEDULE";
			} else if ($value->status==1) {
				$status = "ONGOING";
			} else if ($value->status==2) {
				$status = "FINISHED";
			} else { $status = "-"; }
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.($key + 4), $no++)
                    ->setCellValue('B'.($key + 4), $value->judul)
                    ->setCellValue('C'.($key + 4), $season)
                    ->setCellValue('D'.($key + 4), $value->tahun)
                    ->setCellValue('E'.($key + 4), $status)
                    ->setCellValue('F'.($key + 4), $value->catatan)
                    ->setCellValue('G'.($key + 4), $value->platform);
        }            

        $objPHPExcel->getActiveSheet()->setTitle($title);

        $objPHPExcel->setActiveSheetIndex(0); 

        $writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
        
        $filepath = "Absensi (".$username.").xlsx";

        try {
            $writer->save($filepath);
            echo "<script>alert('Berhasil')</script>Berhasil";
			$this->session->set_flashdata('info','Berhasil!');
			redirect();
            
        } catch (Exception $e) {
            echo "<script>alert('Berhasil')</script>Gagal";
			$this->session->set_flashdata('danger','Gagal!');
			redirect();
        }
	}
	public function login1(){
		$this->load->view('pegawai/login1');
	}
}
