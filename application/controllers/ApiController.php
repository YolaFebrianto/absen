<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pengguna');
		$this->load->model('Pegawai');
		$this->load->model('Absensi');
		$this->load->model('Proform');
	}
    public function login($username,$password)
    {
        $response = $this->Pengguna->login($username,$password)->row_array();
		// $response = array(
		// 	'Success' => true,
		// 	'Info' => 'Berhasil Login!');
		if (empty($response)) {
			$response = array(
				'Success' => false,
				'Info' => 'Username atau Password Salah!');
		} else {
			unset($response['password']);
		}

        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
    }
	public function getPegawai()
	{
		//$page, $size
		// $response = array(
		// 	'content' => $this->Pegawai->get(($page - 1) * $size, $size)->result(),
		// 	'totalPages' => ceil($this->Pegawai->getCount() / $size));
		//($page - 1) * $size, $size
		$response = $this->Pegawai->get()->result();

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function detailPegawai($id=0)
	{
		$response = $this->Pegawai->detail($id)->row_array();

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function savePegawai()
	{
		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Pegawai->insert($data);

		$response = array(
			'Success' => true,
			'Info' => 'Data Tersimpan');

		$this->output
		->set_status_header(201)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function updatePegawai($id)
	{
		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Pegawai->update($data, $id);

		$response = array(
			'Success' => true,
			'Info' => 'Data Berhasil di update');

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function deletePegawai($id)
	{
		$this->Pegawai->delete($id);

		$response = array(
			'Success' => true,
			'Info' => 'Data Berhasil di hapus');

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	/// ABSENSI
	public function saveAbsensi()
	{
		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Absensi->insert($data);

		$response = array(
			'Success' => true,
			'Info' => 'Data Tersimpan');

		$this->output
		->set_status_header(201)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	/// PROFORM
	public function getProform()
	{
		//$page, $size
		// $response = array(
		// 	'content' => $this->Pegawai->get(($page - 1) * $size, $size)->result(),
		// 	'totalPages' => ceil($this->Pegawai->getCount() / $size));
		//($page - 1) * $size, $size
		$response = $this->Proform->get()->result();

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function detailProform($id=0)
	{
		$response = $this->Proform->detail($id)->row_array();

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function saveProform()
	{
		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Proform->insert($data);

		$response = array(
			'Success' => true,
			'Info' => 'Data Tersimpan');

		$this->output
		->set_status_header(201)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function updateProform($id)
	{
		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Proform->update($data, $id);

		$response = array(
			'Success' => true,
			'Info' => 'Data Berhasil di update');

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function deleteProform($id)
	{
		$this->Proform->delete($id);

		$response = array(
			'Success' => true,
			'Info' => 'Data Berhasil di hapus');

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}
}