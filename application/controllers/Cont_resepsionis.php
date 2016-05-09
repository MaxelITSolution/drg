<?php 
class Cont_resepsionis extends CI_Controller
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
		$this->load->view("Persons/View_resepsionis");
	}
}
?>