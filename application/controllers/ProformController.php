<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProformController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Absensi');
		$this->load->model('Proform');
		$this->load->model('Pegawai');
		date_default_timezone_set('Asia/Jakarta');

		if (empty(@$this->session->userdata('username'))) {
			redirect('pengguna');
		}
	}
	public function form_tambah(){
		$data['isi'] = array();
		$data['title'] = 'Form Tambah Data Proform';
		$this->load->view('templates/header');
		$this->load->view('proform/form-tambah',$data);
		$this->load->view('templates/footer');
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
			$this->session->set_flashdata('danger','Data Proform Gagal Ditambahkan!');
		}
		redirect('proform/index');
	}
	public function index(){
		$data['isi'] = $this->Proform->get()->result();
		$data['title'] = 'Data Proform';
		$data['jumlahData'] = $this->Proform->getCount();
		$this->load->view('templates/header');
		$this->load->view('proform/index',$data);
		$this->load->view('templates/footer');
	}
	public function form_edit($id){
		$data['isi'] 	= $this->Proform->detail($id)->row_array();
		$data['title'] 	= 'Form Edit Data Proform';
		$data['id'] 	= $id;
		$this->load->view('templates/header');
		$this->load->view('proform/form-edit',$data);
		$this->load->view('templates/footer');
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
			$this->session->set_flashdata('danger','Data Proform Gagal Diubah!');
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
	public function grafik(){
		$data['isi'] = $this->Proform->data_grafik()->result();
		$data['title'] = 'Grafik Data Proform';
		$this->load->view('templates/header');
		$this->load->view('proform/grafik',$data);
		$this->load->view('templates/footer');
	}
}
