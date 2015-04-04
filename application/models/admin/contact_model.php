<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Contact_model extends CI_Model
{
	public function getNumbers()
	{
		return $this->db->count_all('contacts');
	}

	public function getNew()
	{
		$this->db->like('status', 0);
		$this->db->from('contacts');
		return $this->db->count_all_results();
	}
}