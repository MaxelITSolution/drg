<!DOCTYPE>
<html lang="en">
<head>
 <meta charset="utf-8">
  <?php loadAsset("css/style_basic.css"); ?>
  <?php loadAsset("css/style_drg.css"); ?>
  <?php loadAsset("css/login.css")?>
  <?php loadAsset("css/datepicker.css")?>
  <?php loadAsset("bootstrap/css/bootstrap.min.css")?>
  <?php loadAsset("bootstrap/css/clockpicker.css")?>
  <?php loadAsset("css/jquery-ui.min.css")?>
   
   <script src="<?php echo base_url("assets/js/jquery-2.2.3.min.js")?>"></script>
   
   <script src="<?php echo base_url("assets/js/jquery-ui.min.js")?>"></script>
   
   <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
   <script src="<?php echo base_url("assets/bootstrap/js/clockpicker.js"); ?>"></script> 
  <script>
	$(document).ready(function()
	{
		listDokter=[];
		
		prosesListDokter(<?php echo $dokter;?>);
		$inputan = $("#datetimepicker4");
		$inputan.clockpicker({
			donetext:"done",
			autoclose:"true"
		});
		$("#TambahAntrian").click(function()
		{
			$("#myModal").modal("show");
		})
		
		$("#saveButton").click(function()
		{
			$.ajax({
				url:"<?php echo site_url("Cont_resepsionis/tambahAntrian")?>",
				type:"post",
				data:{tanggal:$("#tanggal").val(),nama:$("#Nama").val(),waktu:$("#datetimepicker4").val(),dokter:$("#idDokter").val()},
				success:function(result)
				{
					alert(result);
				}
			});
			$("#myModal").modal("hide");
		})
		$("#showmodalpenjualan").click(function()
		{
			var rightNow = new Date();
			var res = rightNow.toISOString().slice(0,10).replace(/-/g,"/");
			$("#TanggalPenjualan").val(res);
			$("#modalPenjualan").modal("show");
		})
		function prosesListDokter(inputan)
		{
			$.each(inputan,function(index,value)
			{
				listDokter.push({value:value["dokter_nama"],idx:value["dokter_kode"]});
				
			})	
		}
		
		$("#Dokter").autocomplete({
			source:listDokter,
			select: function(a,b)
			{
				$("#idDokter").val(b.item.idx);
			}
		});
		
		
	})
	
  </script>
  <style>
  .ui-autocomplete { z-index:2147483647;}
  </style>
  <title> Aplikasi Dokter Gigi</title>
</head>

<body>
<!-- ini header, pakai <header> saja-->
<header>
	<ul>
		<li id="headerKanan"><a href="<?php echo site_url("Cont_login/index");?>">Logout</a></li>
		<li id="headerKanan"><a>[Resepsionis]</a></li>
	</ul>
</header>

<!-- ini menu2, lokasi di bawah header, ukuran dibuat agak besar (height), soalnya nanti pemakaiannya di layar touch screen, kasi gambar kalau perlu-->
<nav class="container-fluid">
  <ul class="nav nav-pills nav-justified">
    <li class="active dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size:14pt;" >
        <span style="font-size:20px" class="glyphicon glyphicon-calendar"></span> Jadwal 
        <span class="caret"></span>
	    </a>
	    <ul class="dropdown-menu">
        <li class="active"><a data-toggle="pill" href="#menu1">Jadwal Pasien</a></li>
        <li><a data-toggle="pill" href="#menu2">Reminder Pasien</a></li>
        <li><a data-toggle="pill" href="#menu3">Follow Up Pasien</a></li> 
        <li><a data-toggle="pill" href="#menu4">Jadwal Dokter</a></li> 
      </ul>
	  </li>

   <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size:14pt;" >
        <span style="font-size:20px" class="glyphicon glyphicon-calendar"></span> Informasi
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo site_url("Resepsionis/Cont_informasi/index/dataPasien")?>">Data Pasien</a></li>
        <li><a href="<?php echo site_url("Resepsionis/Cont_informasi/index/daftarHarga")?>">Daftar Harga</a></li>
      </ul>
    </li>    
  	
     <li>
      <a  style="font-size:14pt;" href="<?php echo site_url("Resepsionis/Cont_penjualan")?>">
        <span style="font-size:20px" class="glyphicon glyphicon-shopping-cart"></span> Penjualan
      </a>
    </li>

    <li>
      <a  style="font-size:14pt;" href="<?php echo site_url("Resepsionis/Cont_pembayaran");?>">
        <span style="font-size:20px" class="glyphicon glyphicon-credit-card"></span> Pembayaran
      </a>
    </li>

    <li>
      <a  style="font-size:14pt;" href="<?php echo site_url("Resepsionis/Cont_penerimaanBarang")?>">
        <span style="font-size:20px" class="glyphicon glyphicon-duplicate"></span> Penerimaan Barang
      </a>
    </li>

  </ul>

</nav>
<!-- Ini pilihan untuk ngubah tanggal. Default tanggal hari ini. Tabel di bawah menampilkan data antrian pada tanggal yg disini -->
<br><br>
<div>
<!-- ini tabel antrian, pakai datatable -->
<div class="container-fluid">
	<div class="tab-content">
		<div id="menu1" class="tab-pane fade in active">
    
      <h2>JADWAL ANTRIAN PASIEN</h2>
      <br>

		  <div class="table-responsive container-fluid">
			<div style="text-align: center;">
			Tanggal antrian: <input id="tanggal_antrian" type="date" value="<?php echo date("Y-m-d")?>" />
			</div>

			<br><br>
			<div style="text-align: center;">
			  <button id="TambahAntrian" class="btn_1">Tambah Antrian Baru</button>
			</div>
			<br><br>

			<table class="table table-striped table-bordered" style="background-color: white;">
			  <thead style="background-color: lightgray;">
				<tr>
				  <th width="20px">No</th>
				  <th>Jam</th>
          <th>Nama Pasien</th>
          <th>Telp</th>
          <th>Dokter</th>
          <th>Perawatan</th>
          <th>Waktu<br>Datang</th>
          <th>Waktu<br>Mulai</th>
          <th>Waktu<br>Selesai</th>
				  <th class="col-sm-1">&nbsp;</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>1</td>
				  <td>10:30</td>
          <td>Andi Wijaya</td>
          <td>08123456789</td>
          <td>Dr. Antok</td>
          <td>Tambal</td>
          <td></td>
          <td></td>
				  <td></td>
				  <td><button class="btn_1">Cancel</button></td>
				</tr>
				<tr>
          <td>2</td>
          <td>10:30</td>
          <td>Andi Wijaya</td>
          <td>08123456789</td>
          <td>Dr. Antok</td>
          <td>Tambal</td>
          <td></td>
          <td></td>
          <td></td>
          <td><button class="btn_1">Cancel</button></td>
				</tr>
				<tr>
          <td>3</td>
          <td>10:30</td>
          <td>Andi Wijaya</td>
          <td>08123456789</td>
          <td>Dr. Antok</td>
          <td>Tambal</td>
          <td></td>
          <td></td>
          <td></td>
          <td><button class="btn_1">Cancel</button></td>
				</tr>
			  </tbody>
			</table>
		 </div>
		</div>
		<div id="menu2" class="tab-pane fade">
		  <h3>Reminder Pasien</h3>
		</div>
		<div id="menu3" class="tab-pane fade">
		  <h3>Follow up Pasien</h3>
		</div>
		<div id="menu4" class="tab-pane fade">
		  <h3>Jadwal Dokter</h3>
		</div>
  </div>
</div>

</body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Antrian</h4>
      </div>
      <div class="modal-body">	
		<div id="form1" >
			<form role="form" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2" for="usr">Nama</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="Nama">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2 " for="usr">Jam</label>
					<div class="col-sm-7">
						<input type="text" data-default="20:48" class="form-control clockpicker" id="datetimepicker4">
					</div>
				</div>
				<div class="form-group ui-widget">
					<label class="control-label col-sm-2" for="usr">Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="Dokter">
					</div>
				</div>
				
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" id="saveButton" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="idDokter" value="">

<script>
  $("#tanggal_antrian").datepicker({
    minDate: "0",
    changeMonth: true,
    changeYear: true,
    showOtherMonths: true,
    selectOtherMonths: true,
    dateFormat: "yy-mm-dd",
    regional: "id"
    
  });
</script>

<html>