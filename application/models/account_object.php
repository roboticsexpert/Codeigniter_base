<?php
class account_object extends CI_Model {

	private $data=array();
	public function set_data(array $input)
	{
		foreach($input as $key=>$value)
			$this->data[$key]=$value;

	}
	public function get_data($key='all')
	{
		if($this->is_login()===TRUE)
		{
		
			if(  $key!='all')
				return $this->data[$key];
			$data=array();
			foreach($this->data as $key=>$value)
			{
				if($key!="password")
					$data[$key]=$value;
			}
			return $data;
		}
		return FALSE;
	}
	
	public function __construct()
	{
		parent::__construct();
	}
	public function do_login()
	{
		if($this->is_login())
			return TRUE;
		if(! empty($this->data['email']) && ! empty($this->data['password']) )
		{
			
			$query = $this->db->get_where('accounts',array('email' => $this->data['email'],'password' => $this->data['password']));

			if($query->num_rows()==1)
			{
				$this->data = $query->row();
				$user=array('account'=>$this->data);
				$this->session->set_userdata($user);
				return TRUE;
			}
		}
		return FALSE;
	}
	public function is_login()
	{
		$tmp = $this->session->userdata('account');
		if(empty($tmp))
		{
			return FALSE;	
		}
		$this->data=get_object_vars ($tmp);
		if(isset($this->data['id']) and !empty($this->data['id']))
			return TRUE;
		return FALSE;
	}
	public function logout()
	{
		$this->session->unset_userdata('account');
		return TRUE;
	}
	public function register()
	{
		$query = $this->db->get_where('accounts', array('email' => $this->data['email']));
		if($this->is_email_unique($this->data['email'])===TRUE)
		{
			$this->db->insert('accounts', $this->data);
			return TRUE;
		}
		return FALSE;
	}
	public function is_email_unique($email)
	{
		$query = $this->db->get_where('accounts', array('email' => $email));
		if($query->num_rows()==0)
			return TRUE;
		return FALSE;
	}
}
