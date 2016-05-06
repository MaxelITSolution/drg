<?php 
class Cont_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_basic");
		$this->load->helper("form");
		$this->load->helper("url");
	}
	public function index()
	{
		$data["DataRow"] = $this->CreateDataRow();
		$this->load->view("Persons/View_admin",$data);
	}
	
	public function DeleteDataTable()
	{
		$user_id = $this->input->post("userID");
		
		
		$this->Model_basic->deleteData("user",Array("user_id"=>$user_id));
	}
	public function insertDataUser()
	{
		$username = $this->input->post("username");
		$user_username = $this->input->post("user_username");
		$uer_password = $this->input->post("user_password");
		$user_alamat = $this->input->post("user_alamat");
		$user_hp = $this->input->post("user_hp");
		$user_email = $this->input->post("user_email");
		$user_type = $this->input->post("user_type");
		$role_id = $this->input->post("role_id");
		$user_status = $this->input->post("user_status");
		
		$dataInsert=Array("user_name"=>$username,"user_username"=>$user_username,"user_password"=>$uer_password,"user_alamat"=>$user_alamat,"user_hp"=>$user_hp,"user_email"=>$user_email,"user_tipe"=>$user_type,"role_id"=>$role_id,"user_status"=>$user_status);
		
		$this->Model_basic->insertDataUser("user",$dataInsert);
		
		echo $this->CreateDataRow();
		
	}
	
	function updateDataUser()
	{
		$username = $this->input->post("username");
		$user_username = $this->input->post("user_username");
		$uer_password = $this->input->post("user_password");
		$user_alamat = $this->input->post("user_alamat");
		$user_hp = $this->input->post("user_hp");
		$user_email = $this->input->post("user_email");
		$user_type = $this->input->post("user_type");
		$role_id = $this->input->post("role_id");
		$user_status = $this->input->post("user_status");
		$user_id = $this->input->post("user_ID");
		
		$dataUpdate=Array("user_name"=>$username,"user_username"=>$user_username,"user_password"=>$uer_password,"user_alamat"=>$user_alamat,"user_hp"=>$user_hp,"user_email"=>$user_email,"user_tipe"=>$user_type,"role_id"=>$role_id,"user_status"=>$user_status);
		
		$this->Model_basic->updateData("user",$dataUpdate,Array("user_id"=>$user_id));
		echo $this->CreateDataRow();
	}
	
	function CreateDataRow()
	{
		$User = $this->Model_basic->getData("user",null);
		$hasil = Array();
		if(!empty($User))
		{
			foreach($User as $row)
			{
				$temp = Array($row->user_id,$row->user_name,$row->user_username,$row->user_password,$row->user_alamat,$row->user_hp,$row->user_email,$row->user_tipe,$row->role_id,$row->user_status);
				Array_push($hasil,$temp);
			}
		}
		$DataRow= json_encode($hasil);
		return $DataRow;
	}
}
?>