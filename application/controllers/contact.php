<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Contact extends CI_Controller
{
	
	public function __construct()		
	{
		parent::__construct();
		
		
		$this->load->library('form_validation');
		$this->load->model('contact_model','cm');

	}
	public function index()
	{
		$menu['active']="contact";
		$title['title']="Contacts Us";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('contact_view');

		$footer['script']='contact';
		$this->load->view('includes/footer',$footer);
	}

	public function connect()
	{
		$config = array(
               array(
                     'field'   => 'con_name',
                     'label'   => 'Name',
                     'rules'   => 'required|xss_clean|min_length[4]'
                  ),
               array(
                     'field'   => 'con_email',
                     'label'   => 'E-mail',
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
               array(
                     'field'   => 'con_message',
                     'label'   => 'Review Text',
                     'rules'   => 'required|xss_clean'
                  ),
               
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			
				// $menu['active']="contact";
				// $this->load->view('includes/head');
				// $this->load->view('includes/menu',$menu);
				// $this->load->view('contact_view');
				// $this->load->view('includes/footer');
			echo '<div class="alert alert-warning alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 				 <strong>Fail!</strong> Please check your credential.
				</div>';
			
		}else{
			$data['con_name']=$this->input->post('con_name');
			$data['con_email']=$this->input->post('con_email');
			$data['con_message']=$this->input->post('con_message');
			$data['status']=0;
			$this->cm->save($data);

			$message='<h4>Hi '.$data['con_name'].' </h4><p>Thanks! for intouch with us. <br/> Your message is</br > '.$data['con_message'].'</p>';
			$this->load->library('email');

			$this->email->from('brandshop@gmail.com', 'BrandShop');
			$list = array('sayem@asteriskbd.com',$data['con_email']);
			$this->email->to($list);
			$this->email->reply_to('sayemk.abu@gmail.com', 'Abu Sayem');
			$this->email->subject('BrandShop Contact');
			$this->email->message($message);
			$test=$this->email->send();

			echo 'OK';
		}
	}
}