<?php 
class Cont_informasi extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		$this->load->model("Model_basic");
		header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
		header('Access-Control-Allow-Origin: *');
	}
	public function index()
	{
		$data["active1"] = "";
		$data["active2"] = "";
		switch($this->uri->segment(4))
		{
			case "dataPasien":
			$data["active1"] = "active";
			break;
			
			case "dataHarga":
			$data["active2"] = "active";
			break;
		}
		$this->load->view("persons/resepsionis/view_resepsionis_informasi",$data);
	}
	
}
?>