<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Comments_model extends CI_Model{

	public function getComments($p_id)
	{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('p_id',$p_id);
		
		$res=$this->db->get();
		//$result=[];
		try{

			foreach ($res->result() as $key => $value) {
				$result[$key]=$value;
			}
			return $result;
		} catch (Exception $e) {
   			
		}
	}

	public function getCommentsNumber($p_id)
	{
		
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('p_id',$p_id);
		$res=$this->db->get();
		$rownum=$res->num_rows();
		return $rownum;
		
	}

	public function addComments($p_id,$name,$email,$star,$comment)
	{
		if (!$star) {
			$star=0;
		}
		$this->db->set('com_name', $name);
		$this->db->set('com_email', $email);
		$this->db->set('star', $star);
		$this->db->set('p_id', $p_id);
		$this->db->set('comment', $comment);
		$this->db->set('com_date', date('Y-m-d'));

		$this->db->insert('comments'); 
	}
}