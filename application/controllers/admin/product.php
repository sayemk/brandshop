<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Product extends CI_Controller {

	public function __construct($value='')
	{
		parent::__construct();
		$this->load->helper('session_helper');
		$this->load->library('form_validation');
		$this->load->model('admin/category_model','cm');
		$this->load->model('admin/product_model','pm');
		$this->load->model('products_model','pm_1');
		// $this->load->model('admin/order_model', 'om');
		// $this->load->model('admin/sales_model', 'sm');
		// $this->load->model('admin/contact_model', 'cm');

	}

	public function index()
	{
			$menu['active']="admin";
			$title['title']="Admin-Products";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/product');
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
	}

	public function productsView()
	{
		//$this->load->helper('file');
		//$data=read_file(APPPATH.'/controllers/admin/products.json ');
		//print_r($data);
		$results=$this->pm->allProducts();
		$ds='data';
		$data="{".PHP_EOL.'"'.$ds.'": [';
		
		$counter=1;
		foreach ($results as $product) {
			$p_id='PI-'.sprintf("%011d",$product['p_id']);
			if($product['feature_product']){
				$feature='Yes';
			}else{
				$feature='No';
			}

			if ($product['status']) {
				$status='Active';
			} else {
				$status='Disabled';
			}
			
			$data.=PHP_EOL."\t\t[".PHP_EOL."\t\t\t".'"'.$counter.'",'.PHP_EOL."\t\t\t".'"'.$p_id.'",'
					.PHP_EOL."\t\t\t".'"'.$product['p_name'].'",'.PHP_EOL."\t\t\t".'"'.$product['price'].'",'
					.PHP_EOL."\t\t\t".'"'.$feature.'",'.PHP_EOL."\t\t\t".'"'.$status.'",';
			$data=rtrim($data,',');
			$data.=PHP_EOL."\t\t".'],';
			$counter++;

		}
		$finalData=rtrim($data,',');
		unset($data);
		$finalData.=PHP_EOL."\t]".PHP_EOL.'}';
		print_r($finalData);
		
		// $myfile = fopen(".admin/product.json", "r") or die("Unable to open file!");
		// echo fread($myfile,filesize("webdictionary.txt"));
		// fclose($myfile);
	}

	public function add()
	{
			
			
			$data['categories']=$this->cm->getCategories();


			$menu['active']="admin";
			$title['title']="Admin-Products";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/p_add_view',$data);
			
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
	}
	// write product in the json file

	public function _writeProducts()	
	{
		$this->load->helper('file');
		
		$results=$this->pm->allProducts();
		$ds='data';
		$data="{".PHP_EOL.'"'.$ds.'": [';
		
		$counter=1;
		foreach ($results as $product) {
			$p_id='PI-'.sprintf("%011d",$product['p_id']);
			if($product['feature_product']){
				$feature='Yes';
			}else{
				$feature='No';
			}

			if ($product['status']) {
				$status='Active';
			} else {
				$status='Disabled';
			}
			
			$data.=PHP_EOL."\t\t[".PHP_EOL."\t\t\t".'"'.$counter.'",'.PHP_EOL."\t\t\t".'"'.$p_id.'",'
					.PHP_EOL."\t\t\t".'"'.$product['p_name'].'",'.PHP_EOL."\t\t\t".'"'.$product['price'].'",'
					.PHP_EOL."\t\t\t".'"'.$feature.'",'.PHP_EOL."\t\t\t".'"'.$status.'",';
			$data=rtrim($data,',');
			$data.=PHP_EOL."\t\t".'],';
			$counter++;

		}
		$finalData=rtrim($data,',');
		unset($data);
		$finalData.=PHP_EOL."\t]".PHP_EOL.'}';

		//print_r($results);
		write_file(APPPATH.'/controllers/admin/products.json',$finalData);


		
	}
	//Rule for form validation
	
//End
	public function addNew()
	{
		$config = array(
               array(
                     'field'   => 'p_name', 'label'   => 'Name', 'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_category', 'label'   => 'Category', 'rules'   => 'required|is_numeric|callback_category_check'
                  ),
               array(
                     'field'   => 'p_color','label'   => 'Color','rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_size', 'label'   => 'Size','rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_price', 'label'   => 'Price', 'rules'   => 'required|is_numeric'
                  ),
               array(
                     'field'   => 'p_status','label'   => 'Status','rules'   => 'required|is_numeric'
                  ),
               array(
                     'field'   => 'p_featured','label'   => 'Featured', 'rules'   => 'required|is_numeric'
                  ),
               array(
                     'field'   => 'p_summary','label'   => 'Summary', 'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_desc','label'   => 'Description','rules'   => 'required|xss_clean'
                  )
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$data['categories']=$this->cm->getCategories();


			$menu['active']="admin";
			$title['title']="Admin-Products";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/p_add_view',$data);
			
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
		}else{
			$file_path=str_replace("\\", "/", FCPATH);
			$config['upload_path'] = $file_path.'assets/images/products/';
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['max_size']	= '1024';
			$config['encrypt_name'] =TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('p_image'))
			{
				$data['error'] = array('error' => $this->upload->display_errors());

				$data['categories']=$this->cm->getCategories();


				$menu['active']="admin";
				$title['title']="Admin-Products";
				$this->load->view('includes/head',$title);
				$this->load->view('includes/menu',$menu);
				$this->load->view('admin/admin_sidebar');
				$this->load->view('admin/p_add_view',$data);
				
				$footer['script']='admin';
				$this->load->view('includes/footer',$footer);
			}
			else
			{
				$imageInfo=$this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = $imageInfo['full_path'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality']=100%
				$config['width'] = 350;
				$config['height'] = 410;
				$config['wm_text'] = 'BrandShop.com';
				$config['wm_type'] = 'text';
				$config['wm_font_size'] = '16';
				$config['wm_font_color'] = '000000';
				$config['wm_vrt_alignment'] = 'bottom';
				$config['wm_hor_alignment'] = 'center';
				$config['wm_padding'] = '20';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				
				//$p_data=$this->input->post(NULL, TRUE);
				

				$img_data['img_name']=$imageInfo['file_name'];
				unset($imageInfo);


				$p_data['p_name']=$this->input->post('p_name',TRUE);
				$p_data['cat_id']=$this->input->post('p_category',TRUE);
				$p_data['price']=$this->input->post('p_price',TRUE);
				$p_data['p_color']=$this->input->post('p_color',TRUE);
				$p_data['p_dimension']=$this->input->post('p_size',TRUE);
				$p_data['p_summary']=$this->input->post('p_summary',TRUE);
				$p_data['feature_product']=$this->input->post('p_featured',TRUE);
				$p_data['description']=$this->input->post('p_desc',TRUE);
				$p_data['status']=$this->input->post('p_status',TRUE);
				
				
				
				$img_data['p_id']=$this->pm->addProducts($p_data);
				
				$img_data['featured_img']=1;
				
				$this->load->model('admin/image_model','im');
				$this->im->saveImg($img_data);
				$this->_writeProducts();

				$menu['active']="admin";
				$title['title']="Admin-Products";
				$message['message']='Successfully added the products';
				$this->load->view('includes/head',$title);
				$this->load->view('includes/menu',$menu);
				$this->load->view('admin/admin_sidebar');
				$this->load->view('admin/p_add_view',$message);
				
				$footer['script']='admin';
				$this->load->view('includes/footer',$footer);
				
				

			}
		}
	}

	function category_check($cat_id)
	{
		if ($this->cm->check_category($cat_id))
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//Ajax products details view

	public function productDetails()
	{
		$p_id=$this->input->get('p_id',TRUE);
		$p_id= intval(substr($p_id,3));
		
		$data['product']=$this->pm_1->productDetails($p_id);
		$data['categories']=$this->cm->getCategories();
		$data['images']=$this->pm_1->productImages($p_id);

		$this->load->view('admin/product_details',$data);
	}

	public function update()
	{
		$config = array(
               array(
                     'field'   => 'p_name', 'label'   => 'Name', 'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_category', 'label'   => 'Category', 'rules'   => 'required|is_numeric|callback_category_check'
                  ),
               array(
                     'field'   => 'p_color','label'   => 'Color','rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_size', 'label'   => 'Size','rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_price', 'label'   => 'Price', 'rules'   => 'required|is_numeric'
                  ),
               array(
                     'field'   => 'p_status','label'   => 'Status','rules'   => 'required|is_numeric'
                  ),
               array(
                     'field'   => 'p_featured','label'   => 'Featured', 'rules'   => 'required|is_numeric'
                  ),
               array(
                     'field'   => 'p_summary','label'   => 'Summary', 'rules'   => 'required|xss_clean'
                  ),
               array(
                     'field'   => 'p_desc','label'   => 'Description','rules'   => 'required|xss_clean'
                  )
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$data['categories']=$this->cm->getCategories();


			$menu['active']="admin";
			$title['title']="Admin-Products";
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/p_add_view',$data);
			
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
		}else{

			if($this->input->post('img_confirm',TRUE))
			{
				$file_path=str_replace("\\", "/", FCPATH);
				$config['upload_path'] = $file_path.'assets/images/products/';
				$config['allowed_types'] = 'gif|jpg|png|bmp';
				$config['max_size']	= '250';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$config['encrypt_name'] =TRUE;

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('p_image'))
				{
					$data['error'] = array('error' => $this->upload->display_errors());

					$data['categories']=$this->cm->getCategories();


					$menu['active']="admin";
					$title['title']="Admin-Products";
					$this->load->view('includes/head',$title);
					$this->load->view('includes/menu',$menu);
					$this->load->view('admin/admin_sidebar');
					$this->load->view('admin/p_add_view',$data);
					
					$footer['script']='admin';
					$this->load->view('includes/footer',$footer);
			
				}else{

					$imageInfo=$this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = $imageInfo['full_path'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality']=100%
					$config['width'] = 350;
					$config['height'] = 410;
					$config['wm_text'] = 'BrandShop.com';
					$config['wm_type'] = 'text';
					$config['wm_font_size'] = '16';
					$config['wm_font_color'] = '000000';
					$config['wm_vrt_alignment'] = 'bottom';
					$config['wm_hor_alignment'] = 'center';
					$config['wm_padding'] = '20';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					
					//$p_data=$this->input->post(NULL, TRUE);
					

					$img_data['img_name']=$imageInfo['file_name'];
					unset($imageInfo);
				}
			}


			$p_data['p_name']=$this->input->post('p_name',TRUE);
			$p_data['cat_id']=$this->input->post('p_category',TRUE);
			$p_data['price']=$this->input->post('p_price',TRUE);
			$p_data['p_color']=$this->input->post('p_color',TRUE);
			$p_data['p_dimension']=$this->input->post('p_size',TRUE);
			$p_data['p_summary']=$this->input->post('p_summary',TRUE);
			$p_data['feature_product']=$this->input->post('p_featured',TRUE);
			$p_data['description']=$this->input->post('p_desc',TRUE);
			$p_data['status']=$this->input->post('p_status',TRUE);
			$p_id=$this->input->post('p_id',TRUE);
			
			
			
			$img_data['p_id']=$this->pm->updateProducts($p_data,$p_id);
			
			$img_data['featured_img']=1;
			
			
			if($this->input->post('img_confirm',TRUE))
			{
				$this->load->model('admin/image_model','im');
				$this->im->updateImg($img_data,$p_id);
			}
			
			$this->_writeProducts();

			$menu['active']="admin";
			$title['title']="Admin-Products";
			$data['message']='Successfully Updated the products';

			$data['categories']=$this->cm->getCategories();
			
			$this->load->view('includes/head',$title);
			$this->load->view('includes/menu',$menu);
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/p_add_view',$data);
			
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
			
			

			
		}
	}
}