<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Design and Develop by 
 * Md. Abu Sayem
 *email: sayemk.abu@gmail.com
*/

class Users_model extends CI_Model
{
	public function getUsers()
	{
		$res=$this->db->get('users');
		foreach ($res->result() as $key => $user) {
			$users[$key]=$user;
		}
		return $users;
	}

	public function userDelete($user_id='')
	{
		if($this->db->count_all('users')){
			$this->db->where('user_id', $user_id);
			$this->db->delete('users'); 
		}
	}
}