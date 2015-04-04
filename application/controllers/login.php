<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	* Design and Develop by 
	* Md. Abu Sayem
	*email: sayemk.abu@gmail.com
	*/
class Login extends CI_Controller
{
	
	public function __construct()		
	{
		parent::__construct();
		
		
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('login_model');

	}
	public function index()
	{

		$config = array(
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'required|xss_clean|min_length[5]|alpha|max_length[30]|callback_username_check'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'required|callback_password_check'
                  ),
                              
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$menu['active']="home";
			$data['error']=6;
			$username=$this->input->post('username');
			if(!is_null($username)){
				redirect('home/','location');
			}
			
			$this->load->view('includes/head');
			$this->load->view('includes/menu',$menu);
			$this->load->view('login_view',$data);
			$this->load->view('includes/footer');


		}else{

			$username=$this->input->post('username');
			$this->load->library('session');
			$sess_data=array('username'=>$username,'islogedin'=>1);
			$this->session->set_userdata($sess_data);
			redirect('admin/admin','location');

			
		}
	}

	public function username_check($username)
	{
		
		if ($this->login_model->check_username($username))
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function password_check($password)
	{
		$username=$this->input->post('username');
		$get_data=$this->login_model->check_password($username);

		if ($get_data) {
					$encrypt_password=$this->encrypt->sha1($password,$get_data[0]->password_salt);
		
					if (trim($encrypt_password)==trim($get_data[0]->password))
					{
						return TRUE;
					}else{
						return FALSE;
					}
				} else {
					return FALSE;
				}

		
	}
}