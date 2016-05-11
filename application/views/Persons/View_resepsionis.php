<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <script src="<?php echo base_url("Assets/js/jquery.min.js")?>"></script>
  <script src="<?php echo base_url("Assets/js/jquery-2.2.3.min.js");?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/login.css")?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/bootstrap/css/bootstrap.css")?>"/>
  <script type="text/javascript" src="<?php echo base_url("Assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
  
 
  <Script>
	$(document).ready(function()
	{
		
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
  <ul class="nav nav-pills">
    <li class="active"> <a data-toggle="pill" href="#menu1"><img width="30" height="30" src="<?php echo base_url("Assets/img/icon1.png")?>">Antrian</a></li>
    <li><a data-toggle="pill" href="#menu2"><img width="30" height="30" src="<?php echo base_url("Assets/img/icon1.png")?>">Penjualan</a></li>
    <li><a data-toggle="pill" href="#menu3"><img width="30" height="30" src="<?php echo base_url("Assets/img/icon1.png")?>">Pembayaran</a></li>
    <li><a data-toggle="pill" href="#menu4"><img width="30" height="30" src="<?php echo base_url("Assets/img/icon1.png")?>">Menu 4</a></li>
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
			Tanggal antrian: <input type="date">
			</div>

			<br><br>
			<div style="text-align: center;">
			  <button>Tambah Antrian Baru</button>
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
		  <h3>Menu 1</h3>
		</div>
		<div id="menu3" class="tab-pane fade">
		  <h3>Menu 2</h3>
		</div>
		<div id="menu4" class="tab-pane fade">
		  <h3>Menu 3</h3>
		</div>
  </div>
</div>

</body>

<html>