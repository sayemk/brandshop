<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Admin extends CI_Controller {

	public function __construct($value='')
	{
		parent::__construct();
		$this->load->helper('session_helper');
		$this->load->model('admin/order_model', 'om');
		$this->load->model('admin/sales_model', 'sm');
		$this->load->model('admin/contact_model', 'cm');
		$this->load->model('admin/product_model', 'pm');

	}

	public function index()
	{		
			
			$data['or_new']=$this->om->getNew();
			$data['total_or']=$this->om->getNumbers();
			$data['total_sale']=$this->sm->getSum();
			$data['total_due']=$this->sm->getDue();

			//$data['con_new']=$this->cm->getNew();
			//$data['total_con']=$this->cm->getNumbers();
			$data['pro_new']=$this->pm->getNew();
			$data['total_pro']=$this->pm->getNumbers();

			$menu['active']="admin";
			$title['title']="Admin";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/index_view', $data);
			
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
	}

}