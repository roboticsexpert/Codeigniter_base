<?php
class product_object extends CI_Model {

	public $data;
	private $tbl_name="products";
	
	public function set_data(array $input)
	{
		foreach($input as $key=>$value)
		{
			if(!is_numeric($key))
				$this->data[$key]=$value;
		}
	}
	public function __construct()
	{
		parent::__construct();

	}
	public function get()
	{
		if(!empty($this->data['id']))
		{
			$query = $this->db->get_where($this->tbl_name,array('id' => $this->data['id']));
			if($query->num_rows()==1)
			{
				$row=$query->row_array();
				$this->set_data($row);
				return $row;
			}
		}
		return FALSE;
	}
	public function get_by_author_id($author_id=-1)
	{
		$array=array();
		if($author_id===-1)
			$ans=$this->db->get($this->tbl_name);
		else
			$ans=$this->db->get_where($this->tbl_name,array('author_id'=>$author_id));
		foreach ($ans->result_array() as $row)
		{
			$array[]=$row;
		}
		
		return $array;
		
	}
	public function save()
	{
		if(isset($data['id']) and ! empty($data['id']))
		{
			//update
			$this->db->where('id', $data['id']);
			$ans=$this->db->update($tbl_name, $data); 
			return $ans;
		}
		else if(!empty($data))
		{
			//insert
			$ans=$this->db->insert($tbl_name, $data);
			//$ans=$this->db->simple_query($query);
			return $ans;
		}
		
	}
}
