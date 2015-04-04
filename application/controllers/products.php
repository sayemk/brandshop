<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('products_model','pm');
		$this->load->model('comments_model','com');

	}
	public function index()
	{
		redirect('shop/','location');
	}

	function _data($p_id)
	{
		$data['product']=$this->pm->productDetails($p_id);

		//print_r($data);

		$data['images']=$this->pm->productImages($p_id);
		//print_r($data);
		$data['comments']=$this->com->getComments($p_id);
		$data['commentsNumber']=$this->com->getCommentsNumber($p_id);
		return $data;
	}

	public function details($p_id)
	{
		if (!isset($p_id)) {
			redirect('shop/','location');
		}
		
		$data=$this->_data($p_id);
		$menu['active']="shop";
		$title['title']="Products Details";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('products/details', $data);
		$this->load->view('includes/footer');
	}

	public function review()
	{
		
		$config = array(
               array(
                     'field'   => 'author',
                     'label'   => 'Name',
                     'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'email',
                     'label'   => 'E-mail',
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
               array(
                     'field'   => 'comment',
                     'label'   => 'Review Text',
                     'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_id',
                     'label'   => 'Products',
                     'rules'   => 'required|xss_clean|numeric'
                  )
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$p_id=$this->input->post('p_id');
			if (!isset($p_id)) {
				redirect('shop/','location');
			}

				$data=$this->_data($p_id);
				$data['error']=1;
					
				$menu['active']="shop";
				$title['title']="Products Details";
				$this->load->view('includes/head',$title);
				$this->load->view('includes/menu',$menu);
				$this->load->view('products/details', $data);
				$this->load->view('includes/footer');
			
		}else{
			//echo 'Successfull';
			$name=$this->input->post('author');
			$email=$this->input->post('email');
			$star=$this->input->post('rating_input');
			//print_r($star);
			//exit();
			$comment=$this->input->post('comment');
			$p_id=$this->input->post('p_id');
			
			$data=$this->_data($p_id);
			try {
				$this->com->addComments($p_id,$name,$email,$star,$comment);
				
				redirect('products/details/'.$p_id,'location');
				
			} catch (Exception $e) {
				//$data['error']=1;
			}
			

				
			

		}

	}
}