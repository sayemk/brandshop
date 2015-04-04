<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Category extends CI_Controller
{

    public function __construct($value='')
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('session_helper');
		$this->load->model('admin/category_model', 'cm');
		

	}

	public function index()
	{
		$menu['active']="admin";
		$title['title']="Admin-Orders";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('admin/admin_sidebar');
		$data['categories']=$this->cm->getCategories();
		$this->load->view('admin/category_view',$data);
		$footer['script']='admin';
		$this->load->view('includes/footer',$footer);
	}

	public function add()	
	{
		$config = array(
               array(
                     'field'   => 'category', 
                     'label'   => 'Category Name', 
                     'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'cat_status', 
                     'label'   => 'Status', 
                     'rules'   => 'required|is_numeric'
                  )
               );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$menu['active']="admin";
			$title['title']="Admin-Orders";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$data['categories']=$this->cm->getCategories();
			$this->load->view('admin/category_view',$data);
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
		}else{

			$data['cat_name']=$this->input->post('category',TRUE);
			$data['status']=$this->input->post('cat_status');

			$this->cm->insertCat($data);

			$menu['active']="admin";
			$title['title']="Admin-Orders";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$data['categories']=$this->cm->getCategories();
			$this->load->view('admin/category_view',$data);
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
		}

	}

	public function update($cat_id)
	{
		if(is_null($cat_id)){
			redirect('admin/category/','location');
		}
		if(!filter_var($cat_id, FILTER_VALIDATE_INT)){
			redirect('admin/category/','location');
		}

		$menu['active']="admin";
		$title['title']="Admin-Category";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('admin/admin_sidebar');
		$data['category']=$this->cm->getCategory($cat_id);

		$this->load->view('admin/edit_category_view',$data);
		$footer['script']='admin';
		$this->load->view('includes/footer',$footer);

	}

	public function updateSet()
	{
		$config = array(
               array(
                     'field'   => 'category', 
                     'label'   => 'Category Name', 
                     'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'cat_status', 
                     'label'   => 'Status', 
                     'rules'   => 'required|is_numeric'
                  ),
               array(
                     'field'   => 'cat_id', 
                     'label'   => ' ', 
                     'rules'   => 'required|is_numeric'
                  )
               );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$menu['active']="admin";
			$title['title']="Admin-Orders";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$data['categories']=$this->cm->getCategories();
			$this->load->view('admin/edit_category_view',$data);
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);


		}else{

			$data['cat_name']=$this->input->post('category',TRUE);
			$data['status']=$this->input->post('cat_status',TRUE);
			$cat_id=$this->input->post('cat_id',TRUE);

			$this->cm->updateCat($data,$cat_id);

			$menu['active']="admin";
			$title['title']="Admin-Orders";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$data['categories']=$this->cm->getCategories();
			$this->load->view('admin/category_view',$data);
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
		}

	}
	

}