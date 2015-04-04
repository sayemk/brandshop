<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Home_model extends CI_Model{
	public function getFeatured()
	{
		$this->db->select('products.p_id,products.price, products.p_name,images.img_name');
		$this->db->from('products');
		$this->db->join('images','images.p_id = products.p_id');
		$cond="products.feature_product = '1' AND products.status='1' AND images.featured_img= '1'";
		$this->db->where($cond);
		//$this->db->where('images.recursive', 'IS NULL');
		$this->db->order_by("products.p_id", "desc"); 
		$res= $this->db->get();
		if($res->num_rows()>0){
			
			foreach ($res->result() as $key => $value) {
				$result[$key]=$value;
			}
			//print_r($result[0]->p_id);
			//exit();
		}
		return $result;
	}
}