<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pegawai extends CI_Model{
		public function getCount(){
			return $this->db->count_all_results('pegawai', FALSE);
		}

		public function get()
		{
			//$page, $size
			//, $size, $page
			return $this->db->get('pegawai');
		}

		public function detail($id)
		{
			return $this->db->get_where('pegawai',['id'=>$id]);
		}

		public function get_where($where=array())
		{
			return $this->db->get_where('pegawai',$where);
		}

		public function insert($dataPegawai=array())
		{
			$this->db->insert('pegawai', $dataPegawai);
		}

		public function update($dataPegawai=array(), $id)
		{
			$this->db->where('id', $id);
			$this->db->update('pegawai', $dataPegawai);
		}

		public function delete($id)
		{
			$val = array(
				'id' => $id
			);
			$this->db->delete('pegawai', $val);
		}
	}