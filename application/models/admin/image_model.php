<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Design and Develop by 
 * Md. Abu Sayem
 *email: sayemk.abu@gmail.com
*/

class Image_model extends CI_Model{
	public function saveImg($img_data=array())
	{
		$this->db->insert('images',$img_data);
	}

	public function updateImg($img_data=array(),$p_id)
	{
		$this->db->where('p_id', $p_id);
		$this->db->update('images', $img_data); 
	}
}