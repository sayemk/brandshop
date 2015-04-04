<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Registration model for User registration
*@author Abu Sayem
*@email sayem@asteriskbd.com
*/

class Registration_model extends CI_Model
{
	public function insert_registration($data=array())
	{	

		if($this->db->insert('users',$data)){
			
			return TRUE;
			
		}else{

			return FALSE;
		}
		
	}
	
}


