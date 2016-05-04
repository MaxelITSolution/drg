<?php 
class Model_basic extends CI_Model
{
    function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getData($tablename,$conditions)
	{
		$this->db->where($conditions);
		return $this->db->get($tablename)->result();
	}
	
}


?>