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

		public function data_grafik()
		{
			$sql = "SELECT SUM(p.jumlah) AS total, YEAR(p.deadline) AS YEAR, m.MONTH 
					FROM proform AS p
					LEFT JOIN 
					(SELECT '01' AS MONTH
					UNION SELECT '02' AS MONTH
					UNION SELECT '03' AS MONTH
					UNION SELECT '04' AS MONTH
					UNION SELECT '05' AS MONTH
					UNION SELECT '06' AS MONTH
					UNION SELECT '07' AS MONTH
					UNION SELECT '08' AS MONTH
					UNION SELECT '09' AS MONTH
					UNION SELECT '10' AS MONTH
					UNION SELECT '11' AS MONTH
					UNION SELECT '12' AS MONTH) AS m
					ON MONTH(p.deadline) = m.MONTH
					GROUP BY YEAR(p.deadline),MONTH(p.deadline)
					ORDER BY YEAR(p.deadline),MONTH(p.deadline) DESC";
			return $this->db->query($sql);
		}
	}