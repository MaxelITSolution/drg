<html lang="en">
<head>
 <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/login.css")?>" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/datepicker.css")?>" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/bootstrap/css/bootstrap.min.css")?>"/>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/bootstrap/css/clockpicker.css")?>"/>
   
   <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/jquery-ui.min.css")?>" />
  
   <script src="<?php echo base_url("Assets/js/jquery-2.2.3.min.js")?>"></script>
   
   <script src="<?php echo base_url("Assets/js/jquery-ui.min.js")?>"></script>
   
   <script src="<?php echo base_url("Assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
   <script src="<?php echo base_url("Assets/bootstrap/js/clockpicker.js"); ?>"></script> 
  <Script>
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
  <title> Aplikasi Dokter Gigi</title>
</head>

<body>
<!-- ini header, pakai <header> saja-->
<div class="Header">
	<ul>
		<li id="headerKanan"><a href="<?php echo site_url("Cont_login/index");?>">Logout</a></li>
		<li id="headerKanan"><a>Hello</a></li>
	</ul>
</div>

<!-- ini menu2, lokasi di bawah header, ukuran dibuat agak besar (height), soalnya nanti pemakaiannya di layar touch screen, kasi gambar kalau perlu-->
<div class="container-fluid">
  <ul class="nav nav-pills nav-justified">
    <li class="active dropdown">
	<a class="dropdown-toggle"   data-toggle="dropdown" href="#" style="font-size:14pt;" ><img width="55" height="55" src="<?php echo base_url("Assets/img/icon1.png")?>">Jadwal Antrian <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
      <li><a data-toggle="pill" href="#menu1">index</a></li>
      <li><a data-toggle="pill" href="#">Reminder</a></li>
      <li><a data-toggle="pill" href="#">Follow Up</a></li> 
    </ul>
	</li>
  
	
	<li><a data-toggle="pill" style="font-size:14pt;" href="#menu3"><img width="55" height="55" src="<?php echo base_url("Assets/img/icon1.png")?>">Jadwal Dokter</a></li>
    <li><a data-toggle="pill" style="font-size:14pt;" href="#menu2"><img width="55" height="55" src="<?php echo base_url("Assets/img/icon1.png")?>">Penjualan</a></li>
    <li><a data-toggle="pill" style="font-size:14pt;" href="#menu4"><img width="55" height="55" src="<?php echo base_url("Assets/img/icon1.png")?>">Pembayaran</a></li>
    <li><a data-toggle="pill" style="font-size:14pt;" href="#menu5"><img width="55" height="55" src="<?php echo base_url("Assets/img/icon1.png")?>">Penerimaan Barang</a></li>
  </ul>
</div>
<!-- Ini pilihan untuk ngubah tanggal. Default tanggal hari ini. Tabel di bawah menampilkan data antrian pada tanggal yg disini -->
<br><br>
<div>
<!-- ini tabel antrian, pakai datatable -->
<div class="container-fluid">
	<div class="tab-content">
		<div id="menu1" class="tab-pane fade in active">
		  <div class="table-responsive container-fluid">
			<div style="text-align: center;">
			Tanggal antrian: <input id="tanggal" type="date">
			</div>

			<br><br>
			<div style="text-align: center;">
			  <button id="TambahAntrian">Tambah Antrian Baru</button>
			</div>
			<br><br>

			<table class="table table-bordered table-striped">
			  <thead>
				<tr>
				  <th>No</th>
				  <th>Nama</th>
				  <th>Jam</th>
				  <th>Dokter</th>
				  <th class="col-sm-1">&nbsp;</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>1</td>
				  <td>Andi Wijaya</td>
				  <td>10:30</td>
				  <td>Dr. Antok</td>
				  <td><button>Cancel</button></td>
				</tr>
			  </tbody>
			  <tbody>
				<tr>
				  <td>2</td>
				  <td>Andi Wijaya</td>
				  <td>10:30</td>
				  <td>Dr. Antok</td>
				  <td><button>Cancel</button></td>
				</tr>
			  </tbody>
			  <tbody>
				<tr>
				  <td>3</td>
				  <td>Andi Wijaya</td>
				  <td>10:30</td>
				  <td>Dr. Antok</td>
				  <td><button>Cancel</button></td>
				</tr>
			  </tbody>
			</table>
		 </div>
		</div>
		<div id="menu2" class="tab-pane fade">
			<div class="row">
				<div class="col-sm-10">
				</div>
				<div class="col-sm-2">
					<h4>TOTAL: Rp.0,00</h4>
				</div>
			</div>
		</div>
		<div id="menu3" class="tab-pane fade">
		  <h3>Jadwal Dokter</h3>
		</div>
		<div id="menu4" class="tab-pane fade">
		  <h3>Pembayaran</h3>
		</div>
		<div id="menu5" class="tab-pane fade">
		  <h3>Penerimaan Barang</h3>
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
<html>