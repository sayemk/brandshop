<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Design and Develop by 
 * Md. Abu Sayem
 *email: sayemk.abu@gmail.com
*/

class Product_model extends CI_Model
{
	public function getNumbers()
	{
		return $this->db->count_all('products');
	}

	public function getNew()
	{
		$this->db->like('feature_product', 1);
		$this->db->from('products');
		return $this->db->count_all_results();
	}

	public function allProducts()
	{
		$this->db->select('products.p_id,products.p_name,products.price,products.feature_product, products.status,categories.cat_name');
		$this->db->from('products');
		$this->db->join('categories','categories.cat_id=products.cat_id');
		try {
			$res=$this->db->get();

			foreach ($res->result_array() as $row)
			{
			    $data[]=$row;

			}
			 return $data;
						
		} catch (Exception $e) {
			log_message('Tat', $e);
		}


	}

	public function addProducts($p_data=array())
	{
		 
		$this->db->trans_start();
	    $this->db->insert('products',$p_data);
	    $insert_id = $this->db->insert_id();
	    $this->db->trans_complete();
	    return  $insert_id;
	}

	public function updateProducts($p_data=array(),$p_id)
	{
		 
		$this->db->where('p_id', $p_id);
		$this->db->update('products', $p_data); 
	    
	}

}