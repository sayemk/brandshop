<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Products_model extends CI_Model{

	public function productDetails($p_id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('p_id',$p_id);
		$res=$this->db->get();
		try{

			foreach ($res->result() as $key => $value) {
				$result[$key]=$value;
			}
			return $result;
		} catch (Exception $e) {
   			
		}	

	}


	public function productImages($p_id)
	{
		$this->db->select('img_name');
		$this->db->from('images');
		$this->db->where('p_id',$p_id);
		$res=$this->db->get();
		try{

			foreach ($res->result() as $key => $value) {
				$result[$key]=$value;
			}
			return @$result;
		} catch (Exception $e) {
   			
		}	

	}
}