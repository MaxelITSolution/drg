<?php 
class Cont_laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_basic");
		$this->load->helper("form");
		$this->load->helper("url");
		header('Access-Control-Allow-Origin: *');
	}
	public function index()
	{
		$data["active"]="active";
		$this->load->view("Persons/Admin/View_laporan",$data);
	}
	
	function stok()
	{
		$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "";
		if($this->uri->segment(4) == "kartustok")
		{
			$data["active1"] = "active";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "pemakaian")
		{
			$data["active1"] = "";$data["active2"] = "active";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "pindahlokasi")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "active";$data["active4"] = "";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "penyesuaian")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "active";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "stokhabis")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "active";
		}
		$this->load->view("Persons/Admin/View_laporan_stok",$data);
	}
	function asset()
	{
		$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";
		if($this->uri->segment(4) == "daftarAsset")
		{
			$data["active1"] = "active";$data["active2"] = "";$data["active3"] = "";
		}
		if($this->uri->segment(4) == "pembelianAsset")
		{
			$data["active1"] = "";$data["active2"] = "active";$data["active3"] = "";
		}
		if($this->uri->segment(4) == "penyesuaianAsset")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "active";
		}
		$this->load->view("Persons/Admin/View_laporan_asset",$data);
	}
	function kasDanBank()
	{
		$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"]="";
		if($this->uri->segment(4) == "kasPeriodik")
		{
			$data["active1"] = "active";$data["active2"] = "";$data["active3"] = "";
		}
		if($this->uri->segment(4) == "giro")
		{
			$data["active1"] = "";$data["active2"] = "active";$data["active3"] = "";
			
		}
		if($this->uri->segment(4) == "arusKas")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "active";
			
		}
		if($this->uri->segment(4) == "uangMuka")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "active";
			$data["active4"] = "active";
		}
		$this->load->view("Persons/Admin/View_laporan_kasdanbank",$data);
	}
	function pendapatanPiutang()
	{
		$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "";
		if($this->uri->segment(4) == "pendapatan")
		{
			$data["active1"] = "active";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "piutang")
		{
			$data["active1"] = "";$data["active2"] = "active";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "penjualan")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "active";$data["active4"] = "";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "penyesuaian")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "active";$data["active5"] = "";
		}
		if($this->uri->segment(4) == "rekap")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"] = "";$data["active5"] = "active";
		}
		$this->load->view("Persons/Admin/View_laporan_pendapatan",$data);
	}
	function pembelianHutang()
	{
		$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"]="";
		if($this->uri->segment(4) == "pembelian")
		{
			$data["active1"] = "active";$data["active2"] = "";$data["active3"] = "";
		}
		if($this->uri->segment(4) == "penyesuaian")
		{
			$data["active1"] = "";$data["active2"] = "active";$data["active3"] = "";
			
		}
		if($this->uri->segment(4) == "hutang")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "active";
		}
		if($this->uri->segment(4) == "rekapHutang")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";
			$data["active4"] = "active";
		}
		$this->load->view("Persons/Admin/View_laporan_pembelian",$data);
	}
	function generalLedger()
	{
		$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";$data["active4"]="";
		if($this->uri->segment(4) == "labaRugi")
		{
			$data["active1"] = "active";$data["active2"] = "";$data["active3"] = "";
		}
		if($this->uri->segment(4) == "neracaSaldo")
		{
			$data["active1"] = "";$data["active2"] = "active";$data["active3"] = "";
			
		}
		if($this->uri->segment(4) == "bukuBesar")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "active";
		}
		if($this->uri->segment(4) == "jurnalPenyesuaian")
		{
			$data["active1"] = "";$data["active2"] = "";$data["active3"] = "";
			$data["active4"] = "active";
		}
		$this->load->view("Persons/Admin/View_laporan_generalLedger",$data);
	}
}
?>