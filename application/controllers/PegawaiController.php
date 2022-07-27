<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pegawai');
		date_default_timezone_set('Asia/Jakarta');

		if (empty(@$this->session->userdata('username'))) {
			redirect('pengguna');
		}
	}
	public function form_tambah(){
		$data['isi'] = array();
		$data['title'] = 'Form Tambah Data Pegawai';
		$this->load->view('templates/header');
		$this->load->view('pegawai/form-tambah',$data);
		$this->load->view('templates/footer');
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
			$this->session->set_flashdata('danger','Data Pegawai Gagal Ditambahkan!');
		}
		redirect('pegawai/index');
	}
	public function index(){
		$data['isi'] = $this->Pegawai->get()->result();
		$data['title'] = 'Data Pegawai';
		$data['jumlahData'] = $this->Pegawai->getCount();
		$this->load->view('templates/header');
		$this->load->view('pegawai/index',$data);
		$this->load->view('templates/footer');
	}
	public function form_edit($id){
		$data['isi'] 	= $this->Pegawai->detail($id)->row_array();
		$data['title'] 	= 'Form Edit Data Pegawai';
		$data['id'] 	= $id;
		$this->load->view('templates/header');
		$this->load->view('pegawai/form-edit',$data);
		$this->load->view('templates/footer');
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
			$this->session->set_flashdata('danger','Data Pegawai Gagal Diubah!');
		}
		redirect('pegawai/index');
	}
	public function hapus($id){
		try {
			$cek = $this->Pegawai->delete($id);
			$this->session->set_flashdata('info', 'Data Pegawai Berhasil Dihapus!');
		} catch (Exception $e) {
			$this->session->set_flashdata('danger', 'Data Pegawai Gagal Dihapus!');
		}
		redirect('pegawai/index');
	}
	public function detail($id){
		$data['isi'] 	= $this->Pegawai->detail($id)->row_array();
		$data['title'] 	= 'Detail Data Pegawai';
		$data['id'] 	= $id;
		$this->load->view('templates/header');
		$this->load->view('pegawai/detail',$data);
		$this->load->view('templates/footer');
	}
}
