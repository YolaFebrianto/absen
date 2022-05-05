<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi extends CI_Model{
		public function get()
		{
			//$page, $size
			//, $size, $page
			return $this->db->get('absensi');
		}

		public function detail($id)
		{
			return $this->db->get_where('absensi',['id'=>$id]);
		}

		public function insert($dataAbsensi)
		{
			$dataPegawai = $this->db->get_where('pegawai',['id'=>$dataAbsensi['id_pegawai']])->row_array();
			$val = array(
				'id_pegawai'	=> $dataAbsensi['id_pegawai'],
				'nama'			=> @$dataPegawai['nama'],
				'keterangan'	=> $dataAbsensi['keterangan'],
				'kategori' 		=> $dataAbsensi['kategori']
			);
			$this->db->insert('absensi', $val);
		}
	}