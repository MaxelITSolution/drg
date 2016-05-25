<?php 
class Cont_penjualan extends CI_Controller
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
		
		$this->load->view("persons/resepsionis/view_resepsionis_penjualan");
	}
	
}
?>