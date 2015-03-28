<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view("header");
		$this->load->view("home",array('products'=>$this->product_object->get_by_author_id()));
		$this->load->view("footer");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */