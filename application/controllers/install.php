<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->library('migration');
//		if ( ! $this->migration->version(3))
		if ( ! $this->migration->latest())
		{
			show_error($this->migration->error_string());
		}
		
	}
}
