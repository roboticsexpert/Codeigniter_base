<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class licenses extends CI_Controller 
{

	public function __construct()
	{	
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function get_all()
	{
	}
	
	
	
}
