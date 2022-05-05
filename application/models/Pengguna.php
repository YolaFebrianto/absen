<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pengguna extends CI_Model{
		public function login($username,$password)
		{
	        $where = [
	            'username' => $username,
	            'password' => md5($password)
	        ];
	        return $this->db->get_where('pengguna',$where);
		}
		public function detail($username)
		{
			return $this->db->get_where('pengguna',['username'=>$username]);
		}
	}