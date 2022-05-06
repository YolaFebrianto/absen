<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pengguna');
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		if ($this->session->userdata('username') != '') {
			$username = $this->session->userdata('username');
			$data['user'] = $this->Pengguna->detail($username)->row_array();
			$user_id = @$data['user']['id'];
			$data['isi'] = array();
			$data['title'] = 'Home Page';
			$this->load->view('pengguna/index',$data);
		} else {
			$this->load->view('pengguna/login');
		}		
	}
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
        $cek = $this->Pengguna->login($username,$password)->row_array();
		if ($cek != null) {
			$this->session->set_userdata('username',$username);
			redirect();
		} else {
			$this->session->set_flashdata('error','Username atau Password Salah!');
			redirect();
		}	
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect();
	}
	public function login1(){
		$this->load->view('pengguna/login1');
	}
}
