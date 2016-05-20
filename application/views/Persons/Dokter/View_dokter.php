<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/login.css")?>">


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
<title> Hello Guys</title>

<style>
.dropdown-menu {
width:100%;
text-align:center;
}
</style>
</head>

<body>
<div class="Header">
	<ul>
		<li class="LIUL"><a href="<?php echo site_url("Cont_login/index")?>">Logout</a></li>
		<li class="LIUL"><a>Hello Dokter</a></li>
	</ul>
</div>
<div class="container-fluid">
  <ul class="nav nav-pills nav-justified">
    <li class="active dropdown">
	<a class="dropdown-toggle"   data-toggle="dropdown" href="#" style="font-size:14pt;" ><img width="55" height="55" src="<?php echo base_url("Assets/img/icon1.png")?>">Jadwal Pasien <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
      <li><a data-toggle="pill" href="#lihatHistoryPasien">Lihat History Pasien</a></li>
      <li><a data-toggle="pill" href="#penangananBaru">Input penanganan baru</a></li>
      <li><a data-toggle="pill" href="#BahanYangDigunakan">Bahan yang digunakan</a></li> 
    </ul>
	</li>
	<li><a data-toggle="pill" style="font-size:14pt;" href="#Penanganan"><img width="55" height="55" src="<?php echo base_url("Assets/img/icon1.png")?>">Penanganan</a></li>
  </ul>
</div>

<div class="container-fluid">
	<div class="tab-content">
		<div id="lihatHistoryPasien" class="tab-pane fade in active">
			<h3>History Pasien</h3>
		</div>
		
		<div id="BahanYangDigunakan" class="tab-pane fade in ">
			<h3>Bahan Yang Digunakan</h3>
		</div>
		
		<div id="penangananBaru" class="tab-pane fade in ">
			<h3>Penanganan Baru</h3>
		</div>
		
		<div id="Penanganan" class="tab-pane fade in ">
			<h3>Penanganan</h3>
		</div>
	</div>
</div>


</body>

<html>