<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->view("header");
	}
	public function __destruct() 
	{
    	//$this->load->view("footer");
	}
	public function index()
	{
		if($this->account_object->is_login()===TRUE)
			redirect("account/profile");
		$this->login();
	}
	public function check_user_unique($email)
	{
		if($this->account_object->is_email_unique($email)===TRUE)
			return TRUE;
		$this->form_validation->set_message('check_user_unique', 'ایمیل وارد شده قبلا ثبت شده است');
		return FALSE;	
		
	}
	public function register()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'ایمیل', 'trim|required|min_length[5]|max_length[30]|valid_email|xss_clean|htmlspecialchars|callback_check_user_unique');
		$this->form_validation->set_rules('password', 'پسورد', 'trim|required|min_length[5]|max_length[30]|xss_clean|md5');		
		$this->form_validation->set_rules('mobile','موبایل','exact_length[11]|numeric|required');
		$this->form_validation->set_rules('firstname','نام','max_length[20]|min_length[3]|required|trim|htmlspecialchars');
		$this->form_validation->set_rules('lastname','نام خانوادگی','max_length[20]|min_length[3]|required|trim|htmlspecialchars');
		$this->form_validation->set_rules('repeat-password','تکرار پسورد','matches[password]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("account/register");
		}
		else
		{
			$array=array('email','password','firstname','lastname','mobile');
			foreach($array as $value)
			{
				$data[$value]=$this->input->post($value);
			}
			$this->account_object->set_data($data);
			if($this->account_object->register())
			{
				$this->load->view("account/register-success");
			}
			else
			{
				die("create acccount was faield plz contact to administrator of system");
			}
			
		}
	}
	public function profile()
	{
	
		if($this->account_object->is_login()===FALSE)
		{
			redirect('account/login', 'login');
		}
		$client_id=$this->account_object->get_data();
		$client_id=$client_id['id'];
		$this->load->view("account/profile",array('data'=>$this->account_object->get_data(),'products'=>$this->product_object->get_by_author_id($client_id)));
	}
	public function check_user_pass($pass)
	{
		$this->account_object->set_data(array('email'=>$this->input->post('email'),'password'=>$pass));
		if($this->account_object->do_login()===TRUE)
			return TRUE;
			
		$this->form_validation->set_message('check_user_pass', 'نام کاربری و پسورد با هم تطابق ندارند');
		return FALSE;
	}
	public function login()
	{
		
		if($this->account_object->is_login())
			redirect('/account/profile/', 'refresh');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'ایمیل', 'trim|required|min_length[5]|max_length[30]|valid_email|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('password', 'پسورد', 'trim|required|min_length[5]|max_length[30]|xss_clean|md5|callback_check_user_pass');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("account/login");
		}
		else
		{
			redirect("account/profile");
		}
	}
	public function logout()
	{
		$this->account_object->logout();
		redirect('/account/login/', 'refresh');
		
	}
	private function create()
	{
		$this->load->helper('form');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			$this->load->view('formsuccess');
		}
	
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */