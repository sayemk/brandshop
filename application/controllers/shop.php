<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('shop_model','sm');
		$this->load->library('pagination');
		$this->load->model('admin/category_model','cm');
		//$this->load->model('admin/product_model', 'pm');
		//$this->load->model('comments_model','com');

	}
	public function index()
	{
		try {

			$offset= (int)$this->uri->segment(4);
			//var_dump($offset);
			//exit();
			if($offset){
				if(!is_int($offset)){
					redirect("shop/","location");
				}
				
			}else{
				$offset=0;
			}
			

			$cat_id= (int)$this->uri->segment(3);
			//var_dump($cat_id);
			//exit();
			if($cat_id){
				if(!is_int($cat_id)){
					redirect("shop/","location");
				}

			}else{
				$cat_id=0;
			}
			$count=9;

			$config['base_url'] = base_url().'shop/index/'.$cat_id.'/';
			$config['total_rows'] =$this->sm->getNumbers($cat_id);

			$config['per_page'] =$count;
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';

			$this->pagination->initialize($config); 


			$data['products']=$this->sm->getProducts($offset,$count,$cat_id);
			$data['categories']=$this->cm->getCategories();
			$data['cat_id']=$cat_id;

			$menu['active']="shop";
			$title['title']="Shopping";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('shop_view', $data);
			$this->load->view('includes/footer');


		} catch (Exception $e) {
			
		}
	}

	public function categorise()
	{
		$config=array(
					array(
	                     'field'   => 'cat_id',
	                     'label'   => 'Cat_ID',
	                     'rules'   => 'required|is_numeric'
	                 ),
				);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode('FALSE');


		}else{

		}
	}
}