<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProformController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Absensi');
		$this->load->model('Proform');
		date_default_timezone_set('Asia/Jakarta');

		if (empty(@$this->session->userdata('username'))) {
			redirect('pengguna');
		}
	}
	public function form_tambah(){
		$data['isi'] = array();
		$data['title'] = 'Form Tambah Data Proform';
		$this->load->view('proform/form-tambah',$data);
	}
	public function tambah(){
		$data = [
			'deadline'				=> $this->input->post('deadline'),
			'nama_pesanan'			=> $this->input->post('nama_pesanan'),
			'jumlah'				=> $this->input->post('jumlah'),
			'deadline_penyelesaian'	=> $this->input->post('deadline_penyelesaian'),
			'status'				=> $this->input->post('status'),
		];
		try {
			$cek = $this->Proform->insert($data);
			$this->session->set_flashdata('info','Data Proform Berhasil Ditambahkan!');
		} catch (Exception $e) {
			$this->session->set_flashdata('info','Data Proform Gagal Ditambahkan!');
		}
		redirect('proform/index');
	}
	public function index(){
		$data['isi'] = $this->Proform->get()->result();
		$data['title'] = 'Data Proform';
		if (isset($_POST['btnsubmit'])) {
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');
			$data['absensi'] = $this->Absensi->laporan($dari,$sampai)->result();
		} else {
			$data['absensi'] = array();
		}
		$data['jumlahData'] = $this->Proform->getCount();
		$this->load->view('proform/index',$data);
	}
	public function form_edit($id){
		$data['isi'] 	= $this->Proform->detail($id)->row_array();
		$data['title'] 	= 'Form Edit Data Proform';
		$data['id'] 	= $id;
		$this->load->view('proform/form-edit',$data);
	}
	public function edit($id){
		$data = [
			'deadline'				=> $this->input->post('deadline'),
			'nama_pesanan'			=> $this->input->post('nama_pesanan'),
			'jumlah'				=> $this->input->post('jumlah'),
			'deadline_penyelesaian'	=> $this->input->post('deadline_penyelesaian'),
			'status'				=> $this->input->post('status'),
		];
		try {
			$cek = $this->Proform->update($data, $id);
			$this->session->set_flashdata('info','Data Proform Berhasil Diubah!');
		} catch (Exception $e) {
			$this->session->set_flashdata('info','Data Proform Gagal Diubah!');
		}
		redirect('proform/index');
	}
	public function hapus($id){
		try {
			$cek = $this->Proform->delete($id);
			$this->session->set_flashdata('info', 'Data Proform Berhasil Dihapus!');
		} catch (Exception $e) {
			$this->session->set_flashdata('danger', 'Data Proform Gagal Dihapus!');
		}
		redirect('proform/index');
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
