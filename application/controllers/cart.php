<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

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
	public function index($p_id='')
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
	
	public function add($p_id='')
	{
		if (!isset($p_id)) {
			redirect('shop/','location');
		}
		
		$data=$this->_data($p_id);
		$menu['active']="shop";
		$title['title']="Add To Cart";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('cart_view', $data);
		$this->load->view('includes/footer');
	}

	

	public function added($p_id='')
	{
		$p_id=$this->input->post('p_id');
		if (!isset($p_id)) {
			redirect('shop/','location');
		}

		$config = array(
               array(
                     'field'   => 'p_color',
                     'label'   => 'Color',
                     'rules'   => 'xss_clean'
                  ),
               array(
                     'field'   => 'p_dimension',
                     'label'   => 'Size',
                     'rules'   => 'xss_clean'
                  ),
               array(
                     'field'   => 'quantity',
                     'label'   => 'Quantity',
                     'rules'   => 'required|xss_clean|numeric'
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
				
				$data=$this->_data($p_id);
				$data['error']=1;
					
				$menu['active']="shop";
				$title['title']="Add to Cart";
				$this->load->view('includes/head',$title);
				$this->load->view('includes/menu',$menu);
				$this->load->view('products/details', $data);
				$this->load->view('includes/footer');
			
		}else{
			//echo 'Successfull';
			$p_color=$this->input->post('p_color');
			$p_dimension=$this->input->post('p_dimension');
			$quantity=$this->input->post('quantity');
			
			$product=$this->pm->productDetails($p_id);

			$img=$this->pm->productImages($p_id);

			

			$data = array(
               'id'      => $product[0]->p_id,
               'qty'     => $quantity,
               'price'   => $product[0]->price,
               'name'    => $product[0]->p_name,
               'options' => array('img'=>$img[0]->img_name,'size' => $p_dimension, 'color' => $p_color)
            );

			$this->cart->insert($data); 		
			
			try {
								
				redirect('products/details/'.$p_id,'location');
				
			} catch (Exception $e) {
				//$data['error']=1;
			}
			

				
			

		}
	}

	public function ajaxView()
	{
		echo $this->cart->total();

	}

	public function viewcart()
	{
		

		$data['contents']=$this->cart->contents();
		// echo '<pre>';
		// print_r($data['contents']);
		// exit();
		$menu['active']="shop";
		$title['title']="Add to Cart";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('cart_details_view',$data);
		$this->load->view('includes/footer');
	}

	public function remove($rowid)
	{
		
		$rowid=filter_var($rowid, FILTER_SANITIZE_MAGIC_QUOTES);
		
			$data = array(
	               'rowid' => $rowid,
	               'qty'   => 0
	            );

			if($this->cart->update($data)) {
				echo 'Successfull';
			}else{
				echo 'Fail';
			}
		
	}

	public function update()
	{
			$rowid=$this->input->get('rowid');
			$qty=$this->input->get('qty');

			$rowid=filter_var($rowid, FILTER_SANITIZE_MAGIC_QUOTES);
		
			if(filter_var($qty, FILTER_VALIDATE_INT)){
				$data = array(
	               'rowid' => $rowid,
	               'qty'   =>$qty 
	            );

				if($this->cart->update($data)) {
					echo 'Successfull';
				}else{
					echo 'Fail';
				}
			}else{
				echo 'Fail2';
			}
	
			
	}
			
}