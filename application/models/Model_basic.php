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
		if(!empty($conditions))
		{
			$this->db->where($conditions);
		}
		return $this->db->get($tablename)->result();
	}
	function insertDataUser($tablename,$data)
	{
		$this->db->insert($tablename,$data);
	}
	public function deleteData($tablename,$conditions)
	{
		$this->db->delete($tablename,$conditions);
	}
	
	public function updateData($tablename,$data,$conditions)
	{
		$this->db->where($conditions);
		$this->db->update($tablename,$data);
	}
}


?>