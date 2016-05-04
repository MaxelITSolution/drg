<?php 
class Cont_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_basic");
		$this->load->helper("form","url");
	}
	public function index()
	{
		$this->load->view("Persons/View_admin");
	}
	
}
?>