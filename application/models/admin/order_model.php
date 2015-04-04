<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Order_model extends CI_Model
{
	public function getNumbers()
	{
		return $this->db->count_all('orders');
	}

	public function getNew()
	{
		$this->db->like('status', 0);
		$this->db->from('orders');
		return $this->db->count_all_results();
	}

	public function getAll()
	{
		$this->db->select('orders.order_id,orders.date_time,orders.order_price,orders.order_paid,orders.order_due,orders.status,customers.cus_name,customers.cus_phone');
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.cus_id');
		$this->db->order_by("orders.order_id", "desc");
		$res=$this->db->get();
		foreach ($res->result() as $key => $value) {
			$result[$key]=$value;
		}

		return $result;
	}

	public function getDetails($o_id)
	{
		$this->db->select('orders.order_id,orders.date_time,orders.order_price,orders.order_paid,
						orders.order_due,orders.status,customers.cus_name,customers.cus_phone,
						customers.cus_email,customers.cus_address');
		
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.cus_id');
		$this->db->where('order_id', $o_id);
		$res=$this->db->get();
		return $res->result_array();
	}

	public function orderProducts($o_id)
	{
		$this->db->select('order_products.quantity,order_products.op_size,order_products.op_color,
			      			order_products.op_price,products.p_id,products.p_name,products.price');
		$this->db->from('order_products');
		$this->db->join('products', 'order_products.p_id= products.p_id', 'left');
		$this->db->where('order_products.order_id', $o_id);	
		$res=$this->db->get();
		return $res->result_array();
	}

	public function updateOrder($data=array(), $o_id)
	{
		$this->db->where('order_id', $o_id);
		$this->db->update('orders', $data); 
	}

	public function getPayment($o_id='')
	{
		$this->db->select('order_paid,order_due');
		$this->db->from('orders');
		$this->db->where('order_id', $o_id);
		$res=$this->db->get();
		return $res->result();

	}

}