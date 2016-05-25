<?php 
class Cont_resepsionis extends CI_Controller
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
		$data["dokter"] = $this->Model_basic->getData("dokter",null);
		$data["dokter"] = json_encode($data["dokter"]);
		$this->load->view("persons/resepsionis/view_resepsionis",$data);
	}
	public function tambahAntrian()
	{
		$tanggal = $this->input->post("tanggal");
		$waktu = $this->input->post("waktu");
		$nama = $this->input->post("nama");
		$dokter = $this->input->post("dokter");
		$kondisi = substr($nama,0,1);
		$temp = $this->Model_basic->query("select max(substr(pasien_kode,4)) as max from antrian where substr(pasien_kode,3,1) ='".$kondisi."';");
		//Buat nomor pasienID
		if(empty($nama))
		{
			if(empty($dokter))
			{
				echo "Nama dan dokter belum terpilih";
			}
			else
			{
				echo "Nama masih belum di isi";
			}
		}
		else
		{
			if(!empty($temp[0]->max))
			{
				$temp = $this->repairPasienId($temp[0]->max,substr($tanggal,2,2).$kondisi);
				$this->Model_basic->insertDataUser("antrian",Array("antrian_tanggal"=>$tanggal,"antrian_jam"=>$waktu,"pasien_kode"=>$temp,"dokter_kode"=>$dokter));
				echo "sukses";
			}
			else
			{
				
				$this->Model_basic->insertDataUser("antrian",Array("antrian_tanggal"=>$tanggal,"antrian_jam"=>$waktu,"pasien_kode"=>substr($tanggal,2,2).$kondisi."001","dokter_kode"=>$dokter));
				echo "sukses";
			}
		}
		
	}
	
	function repairPasienId($text,$front)
	{
		$text = $text + 1;
		return str_pad($text,3,"0",STR_PAD_LEFT);
		
	}
	function informasi()
	{
		$data["active1"] = "";
		$data["active2"] = "";
		
		if($this->uri->segment(3) == "dataPasien");
		{
			$data["active1"] = "active";
			$data["active2"] = "";
		}
	    if($this->uri->segment(3) == "daftarHarga")
		{
			$data["active1"] = "";
			$data["active2"] = "active";
		}
		$this->load->view("Persons/Resepsionis/View_resepsionis_informasi",$data);
	}
	function penerimaanBarang()
	{
		$this->load->view("Persons/Resepsionis/View_resepsionis_penerimaanBarang");
	}
	function penjualan()
	{
		$this->load->view("Persons/Resepsionis/View_resepsionis_Penjualan");
	}
	function pembayaran()
	{
		$this->load->view("Persons/Resepsionis/View_resepsionis_pembayaran");
	}
	function jadwalAntrian()
	{
		$data["active1"] = "";
		$data["active2"] = "";
		$data["active3"] = "";
		$data["active4"] = "";
		switch($this->uri->segment(3))
		{
			case "jadwalPasien":
			$data["active1"] = "active";
			break;
			
			case "reminder":
			$data["active2"] = "active";
			break;
			
			case "followup":
			$data["active3"] = "active";
			break;
			
			case "jadwalDokter":
			$data["active4"] = "active";
			break;
		}
		$this->load->view("Persons/Resepsionis/View_resepsionis_jadwalPasien", $data);
	}
}
?>