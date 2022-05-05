<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Proform extends CI_Model{
		public function getCount(){
			return $this->db->count_all_results('proform', FALSE);
		}

		public function get()
		{
			//$page, $size
			//, $size, $page
			return $this->db->get('proform');
		}

		public function detail($id)
		{
			return $this->db->get_where('proform',['id'=>$id]);
		}

		public function get_where($where=array())
		{
			return $this->db->get_where('proform',$where);
		}

		public function insert($dataProform=array())
		{
			$this->db->insert('proform', $dataProform);
		}

		public function update($dataProform=array(), $id)
		{
			$this->db->where('id', $id);
			$this->db->update('proform', $dataProform);
		}

		public function delete($id)
		{
			$val = array(
				'id' => $id
			);
			$this->db->delete('proform', $val);
		}
	}