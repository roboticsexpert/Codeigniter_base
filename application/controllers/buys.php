<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buys extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if($this->account_object->is_login()===FALSE)
			redirect("account/");
			
		$this->load->model("license_object");
	}
	public function index()
	{
		$this->load->view("buys",array('buys'=>$this->license_object->get_buys($this->account_object->get_data('id'))));
	}
	public function view()
	{	
		$this->load->view("buy_item",array('licenses'=>$this->license_object->get_buys_licenses($this->uri->segment(3))));
	}
	public function export()
	{
		$licenses=$this->license_object->get_buys_licenses($this->uri->segment(3));
		$address=$this->config->item('cart_image');
		$count=0;
		$offset=0;
		
		
		for($offset=0;$offset<count($licenses);$offset+=12)
		{
			
			
				$image = imagecreatefromjpeg($address);	
				$black = imagecolorallocate($image, 0, 0, 0);
				$font_path = './system/fonts/texb.ttf';
				$x=600;
				$x2=840;
				$y=453;
				$dx=1010;
				$dy=569;
				for($row=0;$row<6;$row++)
				{
					for($col=0;$col<2;$col++)
					{
						if($offset+$row*2+$col<count($licenses))
						{
						imagettftext ( $image , 20,0 , $x+$dx*$col , $y+$dy*$row, $black , $font_path , $licenses[$offset+$row*2+$col]['id'] );
						imagettftext ( $image , 20,0 , $x2+$dx*$col , $y+$dy*$row, $black , $font_path ,  $licenses[$offset+$row*2+$col]['license'] );
						}
					}
				}
				imagejpeg($image,"./output/".$this->uri->segment(3)."-".$offset.".jpg",100);			
				$imgs[]="./output/".$this->uri->segment(3)."-".$offset.".jpg";
			
		
		}
		
		$this->load->view("show_cart",array("imgs"=>$imgs,'zip'=>$_SERVER['DOCUMENT_ROOT']."/portal/output/".$this->uri->segment(3).".zip"));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */