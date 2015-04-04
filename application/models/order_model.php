<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Order_model extends CI_Model{

	public function saveCustomer($data=array())
	{
		try {
			$this->db->insert('customers', $data); 
			$id=$this->db->insert_id();
			
			return $id;
		} catch (Exception $e) {
			return 0;
		}
	}

	public function getExisting($email="",$phone='')
	{
		$this->db->select('cus_id');
		$this->db->from('customers');
		$this->db->where('cus_email',$email);
		$this->db->where('cus_phone',$phone);
		$res=$this->db->get();
		if ($res->num_rows()>0) {
			try{

				foreach ($res->result() as $key => $value) {
					$result=$value;
				}
				return $result->cus_id;
			} catch (Exception $e) {
   			
			}
		}else{
			return 0;
		}
	}

	public function saveOrder($data=array())
	{
		try {
			$this->db->insert('orders', $data); 
			$id=$this->db->insert_id();
			
			return $id;
		} catch (Exception $e) {
			return 0;
		}
	}

	public function saveOrderproducts($data=array())
	{
		try {
			$this->db->insert_batch('order_products', $data); 
					
		} catch (Exception $e) {
			
		}
	}
}