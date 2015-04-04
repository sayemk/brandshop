<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Sales_model extends CI_Model
{
	public function getSum()
	{
		$this->db->select_sum('order_price');
		$query = $this->db->get('orders');
		return $query->result();
	}

	public function getDue()
	{
		$this->db->select_sum('order_due');
		$query = $this->db->get('orders');
		return $query->result();
	}
}