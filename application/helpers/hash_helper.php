<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @author Abu Sayem;
* @email sayem@asteriskbd.com
* Helper Class for random key generation for encryption 
*/

// Function for generating random key

if(!function_exists("generate_key")){
	function generate_key($length=16)
	{
		return substr(str_shuffle('0123456789@!#*%abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
	}
}

//Function for generating time 
// take one params int

if (!function_exists("calculate_time")) {
	function calculate_time($extra=86400)
	{
		return time() + $extra;
	}
}
