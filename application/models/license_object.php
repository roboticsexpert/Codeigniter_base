<?php
class license_object extends CI_Model {

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
	public function has_access($create=TRUE,$get=TRUE)
	{
		return TRUE;
	}
	public function load_by(array $where=array())
	{
		$array=array();
		if(! $this->has_access()===TRUE)
			return;
		if(! empty($where) )
		{
			
			$query = $this->db->get_where('licenses',$where);

			if($query->num_rows()>0)
			{
				foreach ($query->result_array() as $row)
				{
					$array[]=$row;
				}
			}
		}
		return $array;
	}
	public function generate_key_string() {
 
		$tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$num_segments=$this->config->item('license_segment_count');
		$segment_chars=$this->config->item('license_segment_chars');
		
		$key_string = '';
	 
		for ($i = 0; $i < $num_segments; $i++) {
	 
			$segment = '';
	 
			for ($j = 0; $j < $segment_chars; $j++) {
					$segment .= $tokens[rand(0, 35)];
			}
	 
			$key_string .= $segment;
	 
			if ($i < ($num_segments - 1)) {
					$key_string .= '-';
			}
	 
		}
	 
		return $key_string;
	 
	}
	public function create($count)
	{
		
		if(! $this->has_access()===TRUE)
			return FALSE;

		
		$query=$this->db->get_where("products",array('id'=>$this->data['product_id']));
		if($query->num_rows()==0)
			return FALSE;
		$product=$query->row_array();
		
		$ans=$this->account_object->get_data("type");

		if($ans==='seller')
			$this->set_data(array('price'=>$product['seller_price']));
		else
			$this->set_data(array('price'=> $product["price"]));
		$this->set_data(array('product_id'=>$product['id']));
		
		$this->db->insert("buys",array('product_id'=>$this->data['product_id'],
		"count"=>$count,
		"price"=>$this->data['price'],
		"user_id"=>$this->account_object->get_data('id'),
		));
		
		$buy_id=$this->db->insert_id();
		for($i=0;$i<$count;$i++)
		{
			$this->make_license($buy_id);
		}
		return TRUE;
	}
	private function make_license($buy_id)
	{	
		do
		{
			$this->data['license']=$this->generate_key_string();
		}while($this->is_license_unique($this->data['license'])===FALSE);
		
		
		
		$this->data['author_id']=$this->account_object->get_data('id');
		unset($this->data['price']);
		$this->db->insert('licenses', $this->data);
		return TRUE;
		
	}
	private function is_license_unique($license)
	{
		$query = $this->db->get_where('licenses', array('license' => $license));
		if($query->num_rows()==0)
		{
			return TRUE;
		}
		return FALSE;
	}
	public function get_buys($user_id=NULL)
	{
		if($user_id===NULL)
			return FALSE;
		$query = $this->db->get_where('buys', array('user_id' => intval($user_id)));
		if($query->num_rows()==0)
		{
			return FALSE;
		}
		return $query->result_array();
	}
	public function get_buys_licenses($buy_id)
	{
		return $this->load_by(array("buy_id"=>$buy_id));
	}
	
}
