<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy extends CI_Controller {
	public function __construct()
	{	
		parent::__construct();
		if($this->account_object->is_login()===FALSE)
			redirect("account/");
	}
	public function index()
	{
		$lpi=1;
		$this->load->helper('form');
		$this->load->library('form_validation');
		$ans=$this->account_object->get_data('type');
		if($ans==='seller')
		{
			$this->form_validation->set_rules('number', 'تعداد', 'required|is_natural_no_zero|less_than[100]|callback_check_number');
			$lpi=$this->config->item('license_per_image');
		}
		else
			$this->form_validation->set_rules('number', 'تعداد', 'required|is_natural_no_zero|less_than[500]');
		if ($this->form_validation->run() === FALSE)
		{
			$this->product_object->set_data(array("id"=>$this->uri->segment(2)));
			
			
			
			$this->load->view('buy',array("product"=>$this->product_object->get(),'lpi'=>$lpi)); 
		}
		else
		{
			$this->load->model("license_object");
			$this->license_object->set_data(array('product_id'=>intval($this->uri->segment(2))));
			if($this->license_object->create($this->input->post('number'))===TRUE)
				redirect("buys");
			else
			{
				die("we have problem plz contact to system administrator!!");
			}
			
		}
		
	}
	public function check_number($number)
	{
		
		$per=$this->config->item('license_per_image');
		if($number%$per===0)
		{
			return TRUE;
		}
		$this->form_validation->set_message('check_number', 'تعداد خرید باید بر '.$per.' بخشپذیر باشد');
		return FALSE;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */