<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

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
		$this->load->model('order_model','order');

	}
	function _data($p_id)
	{
		$data['product']=$this->pm->productDetails($p_id);

		//print_r($data);

		$data['images']=$this->pm->productImages($p_id);
		//print_r($data);
		
		return $data;
	}

	public function index($p_id='')
	{
		$data['contents']=$this->cart->contents();
		
		$menu['active']="shop";
		$title['title']="Place Order";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('order_view',$data);
		$this->load->view('includes/footer');
	}

	public function place()
	{
		$config = array(
               array(
                     'field'   => 'cus_name',
                     'label'   => 'Name',
                     'rules'   => 'xss_clean|required'
                  ),
               array(
                     'field'   => 'cus_email',
                     'label'   => 'E-mail',
                     'rules'   => 'xss_clean|valid_email|required'
                  ),
               array(
                     'field'   => 'cus_phone',
                     'label'   => 'Phone',
                     'rules'   => 'required|xss_clean|max_length[15]|min_length[11]'
                  ),
               array(
                     'field'   => 'cus_address',
                     'label'   => 'Address',
                     'rules'   => 'required|xss_clean'
                  )
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
				
				$data['contents']=$this->cart->contents();
				$menu['active']="shop";
				$title['title']="Place Order";
				$this->load->view('includes/head',$title);
				$this->load->view('includes/menu',$menu);
				$this->load->view('order_view',$data);
				$this->load->view('includes/footer');
			
		}else{

			$cus_name=$this->input->post('cus_name');
			$cus_email=$this->input->post('cus_email');
			$cus_phone=$this->input->post('cus_phone');
			$cus_address=$this->input->post('cus_address');


			$id=$this->order->getExisting($cus_email,$cus_phone);
			
			if ($id) {
				$cus_id=$id;
			} else {
				$data=array(
						'cus_name'=>$cus_name,
						'cus_email'=>$cus_email,
						'cus_phone'=>$cus_phone,
						'cus_address'=>trim($cus_address)
					);
				$id = $this->order->saveCustomer($data);

				if ($id) {
						$cus_id=$id;
					} else {
						$cus_id=0;
					}
						
			}
			if($cus_id){
				$data=array(
					'cus_id'=>$cus_id,
					'status'=>0,
					'order_price'=>$this->cart->total(),
					'order_due'=>$this->cart->total(),
					);

				$o_id=$this->order->saveOrder($data);
				//print_r($o_id);
			}

			if($o_id){
				
				$this->cart->contents();

				foreach ($this->cart->contents() as $items) {
					$item['order_id']=$o_id;
					$item['p_id']=$items['id'];
					$item['quantity']=$items['qty'];
					$item['op_price']=$items['subtotal'];

					$desc=$this->cart->product_options($items['rowid']);
					$item['op_color']=$desc['color'];
					$item['op_size']=$desc['size'];
					$op_data[]=$item;

				}
				$this->order->saveOrderproducts($op_data);

				//Email Sending
				$message='<h4>Hi '.$cus_name .' </h4><p>Happy Shopping! order has been placed and order id is <strong>'.'PO-'.sprintf("%011d",$o_id).'</strong>
							Please preserved this id for any information with order.</p>';
				$this->load->library('email');

				$this->email->from('brandshop@gmail.com', 'BrandShop');
				$list = array('sayem@asteriskbd.com',$cus_email);
				$this->email->to($list);
				$this->email->reply_to('sayemk.abu@gmail.com', 'Abu Sayem');
				$this->email->subject('Shopping With BrandShop');
				$this->email->message($message);
				$test=$this->email->send();
								
				$this->cart->destroy();

				$data['order_id']='PO-'.sprintf("%011d",$o_id);
				$menu['active']="shop";
				$title['title']="Order Success";
				$this->load->view('includes/head',$title);
				$this->load->view('includes/menu',$menu);
				$this->load->view('success',$data);
				$this->load->view('includes/footer');
						   
			}
			
			


		}
	}
}