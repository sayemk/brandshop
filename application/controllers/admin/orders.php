<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Orders extends CI_Controller {
	
	public function __construct($value='')
	{
		parent::__construct();
		$this->load->helper('session_helper');
		$this->load->library('form_validation');
		
		$this->load->model('admin/order_model', 'om');
		

	}

	public function index()	
	{
		$menu['active']="admin";
		$title['title']="Admin-Orders";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/order_view');
		$footer['script']='admin';
		$this->load->view('includes/footer',$footer);
	}
	public function getAll()
	{
		$results=$this->om->getAll();
		$ds='data';
		$data="{".PHP_EOL."\t".'"'.$ds.'": [';
		
		$counter=1;
		foreach ($results as $order) {
			$o_id='OR-'.sprintf("%011d",$order->order_id);
			
			if($order->status==0){
				$status='New';
			}elseif($order->status==1){
				$status='Processing';
			}elseif ($order->status==2) {
				$status='Delivered';
			}else{
				$status='Cancel';
			}

			
			
			$data.=PHP_EOL."\t\t\t[".PHP_EOL."\t\t\t\t".'"'.$counter.'",'.PHP_EOL."\t\t\t\t".'"'.$o_id.'",'
					.PHP_EOL."\t\t\t\t".'"'.$order->cus_name.'",'.PHP_EOL."\t\t\t\t".'"'.$order->cus_phone.'",'
					.PHP_EOL."\t\t\t\t".'"'.$order->date_time.'",'.PHP_EOL."\t\t\t\t".'"'.$order->order_price.'",'
					.PHP_EOL."\t\t\t\t".'"'.$order->order_paid.'",'.PHP_EOL."\t\t\t\t".'"'.$order->order_due.'",'
					.PHP_EOL."\t\t\t\t".'"'.$status.'",';
			$data=rtrim($data,',');
			$data.=PHP_EOL."\t\t\t".'],';
			$counter++;

		}
		$finalData=rtrim($data,',');
		unset($data);
		$finalData.=PHP_EOL."\t]".PHP_EOL.'}';
		
		print_r($finalData);
	}

	public function orderDetails()
	{
		$o_id=$this->input->get('o_id',TRUE);
		$o_id= intval(substr($o_id,3));

		$data['order_cus']=$this->om->getDetails($o_id);
		$data['order_products']=$this->om->orderProducts($o_id);
		
		$this->load->view('admin/order_detail_view', $data);

		//print_r($data);
	}

	public function update()
	{
		$config = array(
               array(
                     'field'   => 'order_status',
                     'label'   => 'Status',
                     'rules'   => 'xss_clean|required|numeric'
                  ),
               array(
                     'field'   => 'order_paid',
                     'label'   => 'Payment',
                     'rules'   => 'xss_clean|numeric'
                  ),
               array(
                     'field'   => 'o_id',
                     'label'   => 'o_id',
                     'rules'   => 'xss_clean|numeric'
                  )
                         
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
				
				echo '	<div class="alert alert-danger alert-dismissible fade in" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      <h4>Error!</h4>
			     
			      <p>Fail to updated the order  </p>
			    </div>';

			

			
		}else{
			$data['status']=$this->input->post('order_status');

			$order_paid=$this->input->post('order_paid');
			
			$order_paid=(is_null($order_paid)) ? 0 : $order_paid ;
			$o_id=$this->input->post('o_id',TRUE);

			$getPayment=$this->om->getPayment($o_id);

			//print_r($getPayment[0]);

			
			
			$data['order_paid']=$getPayment[0]->order_paid + $order_paid;
			$data['order_due']=$getPayment[0]->order_due - $order_paid;
			$this->om->updateOrder($data,$o_id);

			//print_r($data);

			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      <h4>Success!</h4>
			     
			      <p>Successfully updated the order  </p>
			    </div>';
			redirect('admin/orders/','location');
			


		}
	}
}