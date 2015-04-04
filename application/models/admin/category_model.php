<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Category_model extends CI_Model{

	public function getCategories()
	{
		$res=$this->db->get('categories');
		foreach ($res->result()as $value) {
			$result[]=$value;
		}
		return $result;
	}
	public function check_category($cat_id='')
	{
		$this->db->select('cat_id');
		$this->db->where('cat_id',$cat_id);
		
		$query=$this->db->get('categories');
		if ($query->num_rows()==1) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function insertCat($data=array())
	{
		$this->db->insert('categories',$data);
	}

	public function getCategory($cat_id)
	{
		$this->db->where('cat_id', $cat_id);
		$res=$this->db->get('categories');
		return $res->result();
	}

	public function updateCat($data=array(),$cat_id)
	{
		$this->db->where('cat_id', $cat_id);
		$this->db->update('categories', $data); 
	}
}