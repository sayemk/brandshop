<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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

		$this->load->model('admin/users_model','user');
	}

	public function index()
	{
		$data['users']=$this->user->getUsers();

		$menu['active']="admin";
		$title['title']="Admin-Orders";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/users_view',$data);
		$footer['script']='admin';
		$this->load->view('includes/footer',$footer);
	}

	public function Del($user_id='')
	{
		$this->user->userDelete($user_id);

		$data['users']=$this->user->getUsers();

		$menu['active']="admin";
		$title['title']="Admin-Orders";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/users_view',$data);
		$footer['script']='admin';
		$this->load->view('includes/footer',$footer);
	}

	public function add()
	{
		$menu['active']="admin";
		$title['title']="Admin-Orders";
		$this->load->view('includes/head',$title);
		$this->load->view('includes/menu',$menu);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/registration_view');
		$footer['script']='admin';
		$this->load->view('includes/footer',$footer);
	}

	public function registration()
	{
		$config = array(
               array(
                     'field'   => 'fullname',
                     'label'   => 'Full Name',
                     'rules'   => 'required|aplha|xss_clean'
                  ),
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'required|min_length[5]|max_length[30]|alpha_numeric|is_unique[users.username]|xss_clean'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'required|matches[conf_password]'
                  ),
               array(
                     'field'   => 'conf_password',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'required'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required|valid_email|is_unique[users.email]'
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
			$this->load->view('admin/registration_view');
			$footer['script']='admin';
			$this->load->view('includes/footer',$footer);
		}else{

			$username=$this->input->post('username');
			$fullname=$this->input->post('fullname');
			$password=$this->input->post('password');
			$email=$this->input->post('email');
			/*
			* Load our hash_helper
			*/
			$this->load->helper('hash_helper');
			/*
			* Generate hash key/salt
			*/
			$key= generate_key(16);
			/*
			* Load encryption class
			*/
			$this->load->library('encrypt');
			/*
			* Generate encrypted password
			*/
			$encrypt_password=$this->encrypt->sha1($password,$key);

			$activission_code=generate_key(20);
			
			$code_lifetime=calculate_time(86400);

			$db_data=array('fullname'=>$fullname,'username'=>$username,'email'=>$email,'password'=>$encrypt_password,
				'password_salt'=>$key, 'activission_code'=>$activission_code, 'registration_time'=>time(),
				'code_lifetime'=>$code_lifetime, 'status'=>'Active');
			$this->load->model("admin/registration_model");

			$this->registration_model->insert_registration($db_data);

			redirect('admin/users','location');
			
		}
	}

}