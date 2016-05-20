<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/login.css")?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/jquery.dataTables.min.css")?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/bootstrap/css/bootstrap.min.css")?>">

<script src="<?php echo base_url("Assets/js/jquery-2.2.3.min.js")?>"></script>
<script src="<?php echo base_url("Assets/js/jquery.dataTables.min.js")?>"></script>
<script src="<?php echo base_url("Assets/bootstrap/js/bootstrap.min.js")?>"></script>
<title> Hello Guys</title>

</head>
<body>
<div class="header">
	<ul>
		<li><a href="#">Logout</a></li>
		<li><a href="#">Hello </a></li>
	</ul>
</div>

<div class="container-fluid">
<ul class="nav nav-pills nav-justified">
	<li><a href="<?php echo site_url("Admin/Cont_laporan/index");?>">Penanganan</a></li>
	<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Stok<span class="caret"></span></a>
	<ul class="dropdown-menu"> 
		<li><a href="<?php echo site_url("Admin/Cont_laporan/stok/kartustok");?>">Kartu Stok</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/stok/pemakaian");?>">Pemakaian</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/stok/pindahlokasi");?>">Pindah Lokasi</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/stok/penyesuaian");?>">Penyesuaian</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/stok/stokhabis");?>">Stok Habis</a></li>
	</ul>
	
	</li>
	<li class="active dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Asset<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li class="<?php echo $active1;?>"><a>Daftar Asset</a></li>
		<li class="<?php echo $active2;?>"><a>Pembelian Asset</a></li>
		<li class="<?php echo $active3;?>"><a>Penyesuaian Asset</a></li>
	</ul>	
	</li>
	
	<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown"  href="#">Kas dan Bank<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li ><a href="<?php echo site_url("Admin/Cont_laporan/kasDanBank/kasPeriodik")?>">Kas Periodik</a></li>
		<li ><a href="<?php echo site_url("Admin/Cont_laporan/kasDanBank/giro")?>">Giro</a></li>
		<li><a  href="<?php echo site_url("Admin/Cont_laporan/kasDanBank/arusKas")?>">Arus Kas</a></li>
		<li><a  href="<?php echo site_url("Admin/Cont_laporan/kasDanBank/uangMuka")?>">Uang muka</a></li>
	</ul>
	</li>
	
	<li class="dropdown">
	<a class="dropdown-toogle" data-toggle="dropdown"  href="#">Pendapatan / Piutang <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pendapatanPiutang/pendapatan")?>">Pendapatan</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pendapatanPiutang/piutang")?>">Piutang</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pendapatanPiutang/penjualan")?>">Penjualan</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pendapatanPiutang/penyesuaian")?>">Penyesuaian</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pendapatanPiutang/rekap")?>">Rekap</a></li>
	</ul>
	</li>
	<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown"  href="#">Pembelian / Hutang<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pembelianHutang/pembelian")?>">Pembelian</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pembelianHutang/penyesuaian")?>">Penyesuaian</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pembelianHutang/hutang")?>">Hutang</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/pembelianHutang/rekapHutang")?>">Rekap Hutang</a></li>
	</ul>
	</li>
	<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown"  href="#">General Ledger <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="<?php echo site_url("Admin/Cont_laporan/generalLedger/labaRugi")?>">Laba Rugi</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/generalLedger/neracaSaldo")?>">Neraca Saldo</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/generalLedger/bukuBesar")?>">Buku Besar</a></li>
		<li><a href="<?php echo site_url("Admin/Cont_laporan/generalLedger/jurnalPenyesuaian")?>">Jurnal Penyesuaian</a></li>
	</ul>
	</li>
</ul>

</div>
	<div class="container-fluid">
		<div class="tab-content">
			<div class="tab-pane fade in active">
				<h3>ASDASDASD</h3>
			</div>
		</div>
	</div>
</body>
</html>