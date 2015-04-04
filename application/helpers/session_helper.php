<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/

$CI =& get_instance();

$CI->load->library('session');

$username=$CI->session->userdata('username');
$islogedIn=$CI->session->userdata('islogedin');

if(!$username || !$islogedIn){
	redirect('home/','location');
}



