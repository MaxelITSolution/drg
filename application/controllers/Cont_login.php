<?php 
class Cont_login extends CI_Controller
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
		$this->load->view("View_login");
	}
	public function submitReq()
	{
		$conditions = Array("user_username"=> $this->input->post("username") ,"user_password"=> $this->input->post("password"));
		
		$temp = $this->Model_basic->getData("user",$conditions);
		if($temp[0]->user_tipe == 1)
		{
			redirect("Cont_admin/index");
		}
		if($temp[0]->user_tipe == 2)
		{
			redirect("Cont_dokter/index");
		}
		if($temp[0]->user_tipe == 3)
		{
			redirect("Cont_resepsionis/index");
		}
		
	}
}
?>