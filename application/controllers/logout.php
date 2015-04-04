<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*@author Abu Sayem
*@email sayem@asteriskbd.com
*This class is for registration controllers
*/
 
 class Logout extends CI_Controller 
 {
 	public function index()
 	{
 		$this->session->unset_userdata('username');
 		$this->session->unset_userdata('islogedin');
 		$this->session->sess_destroy();
 		redirect('/home','location');
 	}
 	
 }