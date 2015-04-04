<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Contact_model extends CI_Model{
	public function save($data=array())
	{
		$this->db->insert('contacts',$data);
	}
}