<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
	public function index()
	{
		//echo base_url();
		$this->load->model('home_model');
		
		$data['featureImg']=$this->home_model->getFeatured();
		$menu['active']="home";
		$title['title']="Home";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('home_view', $data);
		$this->load->view('includes/footer');
	}
}