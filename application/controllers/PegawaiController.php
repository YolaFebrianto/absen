<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pegawai');

		if (empty(@$this->session->userdata('username'))) {
			redirect('pengguna');
		}
	}
	public function form_tambah(){
		$data['isi'] = array();
		$data['title'] = 'Form Tambah Data Pegawai';
		$this->load->view('pegawai/form-tambah',$data);
	}
	public function tambah(){
		$data = [
			'nama'		=> $this->input->post('nama'),
			'alamat'	=> $this->input->post('alamat'),
			'telp'		=> $this->input->post('telp'),
			'gaji'		=> $this->input->post('gaji'),
		];
		try {
			$cek = $this->Pegawai->insert($data);
			$this->session->set_flashdata('info','Data Pegawai Berhasil Ditambahkan!');
		} catch (Exception $e) {
			$this->session->set_flashdata('info','Data Pegawai Gagal Ditambahkan!');
		}
		redirect('pegawai/index');
	}
	public function index(){
		$data['isi'] = $this->Pegawai->get()->result();
		$data['title'] = 'Data Pegawai';
		$data['jumlahData'] = $this->Pegawai->getCount();
		$this->load->view('pegawai/index',$data);
	}
	public function form_edit($id){
		$data['isi'] 	= $this->Pegawai->detail($id)->row_array();
		$data['title'] 	= 'Form Edit Data Pegawai';
		$data['id'] 	= $id;
		$this->load->view('pegawai/form-edit',$data);
	}
	public function edit($id){
		$data = [
			'nama'		=> $this->input->post('nama'),
			'alamat'	=> $this->input->post('alamat'),
			'telp'		=> $this->input->post('telp'),
			'gaji'		=> $this->input->post('gaji'),
		];
		try {
			$cek = $this->Pegawai->update($data, $id);
			$this->session->set_flashdata('info','Data Pegawai Berhasil Diubah!');
		} catch (Exception $e) {
			$this->session->set_flashdata('info','Data Pegawai Gagal Diubah!');
		}
		redirect('pegawai/index');
	}
	public function hapus($id){
		try {
			$cek = $this->Pegawai->delete($id);
			$this->session->set_flashdata('info', 'Data Pegawai Berhasil Dihapus!');
		} catch (Exception $e) {
			$this->session->set_flashdata('info', 'Data Pegawai Gagal Dihapus!');
		}
		redirect('pegawai/index');
	}
	public function detail($id){
		$data['isi'] 	= $this->Pegawai->detail($id)->row_array();
		$data['title'] 	= 'Detail Data Pegawai';
		$data['id'] 	= $id;
		$this->load->view('pegawai/detail',$data);
	}
	public function printPDF(){
		$where = [
			'username' => $this->session->userdata('username'),
		];
		$data['user'] = $this->db->get_where('pengguna',$where)->row_array();
		$user_id = @$data['user']['id'];
		$this->db->order_by('tahun','DESC');
		$this->db->order_by('season','ASC');
		$this->db->order_by('judul','ASC');
		$where2 = ['id'=>$user_id];
		$data['cetak'] = $this->db->get_where('pegawai',$where2)->result();
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
		$data['cetak'] = $this->db->get_where('pegawai',['id'=>$user_id])->result();
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
}
