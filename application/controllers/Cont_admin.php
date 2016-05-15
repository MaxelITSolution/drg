<?php 
class Cont_admin extends CI_Controller
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
		$data["DataRow"] = $this->CreateDataRow("user");
		$data["DataRowDokter"] = $this->CreateDataRow("dokter");
		$data["rowBarang"] = $this->CreateDataRow("barang");
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
		
		echo $this->CreateDataRow("user");
		
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
		echo $this->CreateDataRow("user");
	}
	
	function CreateDataRow($tableName)
	{
		$User = $this->Model_basic->getData($tableName,null);
		$hasil = Array();
		if($tableName == "user")
		{
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
		else if($tableName == "dokter")
		{
			if(!empty($User))
			{
				foreach($User as $row)
				{
					$temp = Array($row->dokter_kode,$row->dokter_nama,$row->dokter_alamat,$row->dokter_hp,$row->dokter_status);
					Array_push($hasil,$temp);
				}
			}
			$DataRow= json_encode($hasil);
			return $DataRow;
		}
		else if($tableName == "barang")
		{
			if(!empty($User))
			{
				foreach($User as $row)
				{
					$temp = Array($row->barang_kode,$row->barang_nama,$row->barang_harga,$row->barang_stok,$row->barang_status);
					Array_push($hasil,$temp);
				}
			}
			$DataRow= json_encode($hasil);
			return $DataRow;
		}
	}
	function DeleteDataDokter()
	{
		$kodeDokter = $this->input->post("kode");
		$this->Model_basic->deleteData("dokter",Array("dokter_kode"=>$kodeDokter));
		echo $kodeDokter;
	}
	function updateDataDokter()
	{
		$kode = $this->input->post("kode_dokter");
		$namaDokter = $this->input->post("nama_dokter");
		$alamatDokter = $this->input->post("alamat_dokter");
		$hpDokter = $this->input->post("hp_dokter");
		$statusDokter = $this->input->post("status_dokter");
		$this->Model_basic->updateData("dokter",Array("dokter_nama"=>$namaDokter,"dokter_alamat"=>$alamatDokter,"dokter_hp"=>$hpDokter,"dokter_status"=>$statusDokter),Array("dokter_kode"=>$kode));
		echo $this->CreateDataRow("dokter");
	}
	function insertDataDokter()
	{
		$kode = $this->input->post("kode_dokter");
		$namaDokter = $this->input->post("nama_dokter");
		$alamatDokter = $this->input->post("alamat_dokter");
		$hpDokter = $this->input->post("hp_dokter");
		$statusDokter = $this->input->post("status_dokter");
		
		$this->Model_basic->insertDataUser("dokter",Array("dokter_nama"=>$namaDokter,"dokter_alamat"=>$alamatDokter,"dokter_hp"=>$hpDokter,"dokter_status"=>$statusDokter,"dokter_kode"=>$kode));
		
		echo $this->CreateDataRow("dokter");
	}
	//**************************************BARANG**********************************//
	function insertDataBarang()
	{
		$kodeBarang = $this->input->post("kode_barang");
		$namaBarang = $this->input->post("nama_barang");
		$hargaBarang = $this->input->post("harga_barang");
		$stokBarang = $this->input->post("stok_barang");
		$statusBarang = $this->input->post("status_barang");
		
		$this->Model_basic->insertDataUser("barang",Array("barang_kode"=>$kodeBarang,"barang_nama"=>$namaBarang,"barang_harga"=>$hargaBarang,"barang_stok"=>$stokBarang,"barang_status"=>$statusBarang));
		
		echo $this->CreateDataRow("barang");
	}
	function updateDataBarang()
	{
		$kodeBarang = $this->input->post("kode_barang");
		$namaBarang = $this->input->post("nama_barang");
		$hargaBarang = $this->input->post("harga_barang");
		$stokBarang = $this->input->post("stok_barang");
		$statusBarang = $this->input->post("status_barang");
		
		$this->Model_basic->updateData("barang",Array("barang_nama"=>$namaBarang,"barang_harga"=>$hargaBarang,"barang_stok"=>$stokBarang,"barang_status"=>$statusBarang),Array("barang_kode"=>$kodeBarang));
		
		echo $this->CreateDataRow("barang");
	}
	function DeleteDataBarang()
	{
		$kodeBarang = $this->input->post("kode_barang");
		$this->Model_basic->deleteData("barang",Array("barang_kode"=>$kodeBarang));
	}
}
?>