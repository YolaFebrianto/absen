<?php
// reference the Dompdf namespace
use Dompdf\Dompdf;
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsensiController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pegawai');
		$this->load->model('Absensi');
		date_default_timezone_set('Asia/Jakarta');

		if (empty(@$this->session->userdata('username'))) {
			redirect('pengguna');
		}
	}
	public function form_tambah(){
		$this->db->order_by('nama','ASC');
		$data['pegawai'] 	= $this->Pegawai->get()->result();
		$data['title'] 	= 'Form Absensi Pegawai';
		$this->load->view('templates/header');
		$this->load->view('absensi/form-tambah',$data);
		$this->load->view('templates/footer');
	}
	public function tambah(){
		$id_pegawai = $this->input->post('id_pegawai');
		$data_pegawai = $this->Pegawai->detail($id_pegawai)->row_array();
		$data = [
			'id_pegawai'	=> $id_pegawai,
			'nama'			=> $data_pegawai['nama'],
			'keterangan'	=> $this->input->post('keterangan'),
			'kategori'		=> $this->input->post('kategori'),
			'jam'           => date('H:i:s'),
		];
		try {
			$cek = $this->Absensi->insert($data);
			// if ($cek) {
				$this->session->set_flashdata('info','Data Absensi Berhasil Ditambahkan!');
			// }
		} catch (Exception $e) {
			$cek_array = [
				'id_pegawai' 	=> $id_pegawai,
				'tanggal' 		=> date('Y-m-d'),
				'kategori'		=> $this->input->post('kategori'),
			];
			$cek_pegawai = $this->Pegawai->get_where($cek_array)->row_array();
			if (!empty($cek_pegawai)) {
				$this->session->set_flashdata('danger','Data '.$cek_pegawai['nama'].' tanggal '.$cek_pegawai['tanggal'].' dengan kategori '.$cek_pegawai['kategori'].' sudah ada di dalam Database!');
			} else {
				$this->session->set_flashdata('danger','Terjadi error saat input data absensi!');
			}
		}
		redirect();
	}
	public function detail(){
		$id_pegawai = $_GET['id_pegawai'];
		$dari 		= $_GET['dari'];
		$sampai 	= $_GET['sampai'];
		$data['isi'] 	= $this->Absensi->detail_pegawai($id_pegawai,$dari,$sampai)->row_array();
		$data['title'] 	= 'Detail Absensi Pegawai';
		$data['dari'] 	= $dari;
		$data['sampai'] = $sampai;
		$this->load->view('absensi/detail',$data);
	}
	public function laporan(){
		$data['title'] = 'Laporan Absensi';
		$data['pegawai'] = $this->Pegawai->get()->result();
		if (isset($_POST['btnsubmit'])) {
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');
			$data['absensi'] = $this->Absensi->laporan2($dari,$sampai)->result();
		} else {
			$data['absensi'] = array();
		}
		$this->load->view('templates/header');
		$this->load->view('absensi/laporan',$data);
		$this->load->view('templates/footer');
	}
	public function printPDF($dari,$sampai){
		// $dari = date('Y-m-d',strtotime($this->input->post('dari')));
		// $sampai = date('Y-m-d',strtotime($this->input->post('sampai')));
		$this->db->order_by('nama','ASC');
		$data['dari'] 		= $dari;
		$data['sampai'] 	= $sampai;
		$data['pegawai'] 	= $this->Pegawai->get()->result();
		$data['cetak'] 		= $this->Absensi->laporan2($dari,$sampai)->result();
		$this->load->view('absensi/cetak-pdf',$data);
		$html = $this->output->get_output();

		require_once APPPATH.'third_party/dompdf/autoload.inc.php';
		$dompdf = new Dompdf();
		$filename = "Laporan Absensi ".$dari.' sampai '.$sampai.".pdf";
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream($filename,array("Attachment"=>false));
	}
}
