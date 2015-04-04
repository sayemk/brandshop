<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Login_model extends CI_Model
{
	
	public function check_username($username='')
	{
		$this->db->select('username');
		$this->db->where('username',$username);
		$this->db->where('status','Active');
		$query=$this->db->get('users');
		if ($query->num_rows()==1) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function check_password($username='')
	{
		$this->db->select('password,password_salt');
		$this->db->where('username',$username);
		$this->db->where('status','Active');
		$query=$this->db->get('users');
		if ($query->num_rows()==1) {
			foreach ($query->result() as $row) {
				$data[]=$row;
			}
			return $data;
		}
		return false;
	}
}