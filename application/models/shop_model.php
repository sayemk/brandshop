<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Shop_model extends CI_Model{

	public function getNumbers($cat_id=0)
	{
		
		$this->db->where('status', '1');
		
		if($cat_id > 0){
			$this->db->where('cat_id', $cat_id);
		}
		$this->db->from('products');
		
		return $this->db->count_all_results();
	}

	public function getProducts($offset=0, $count=9,$cat_id=0)
	{
		$this->db->select('products.p_id,products.price, products.p_name,images.img_name');
		$this->db->from('products');
		$this->db->join('images','images.p_id = products.p_id');
		$cond="products.status = '1' AND images.featured_img = '1'";
		$this->db->where($cond);
		if ($cat_id>0) {
			$this->db->where('cat_id', $cat_id);
		} 
		
		//$this->db->where('images.recursive', 'IS NULL');
		$this->db->limit($count,$offset);
		$this->db->order_by("products.p_id", "desc"); 
		$res= $this->db->get();
		if($res->num_rows()>0){
			
			foreach ($res->result() as $key => $value) {
				$result[$key]=$value;
			}
			//print_r($result);
			//exit();
		}
		return $result;
	}
}