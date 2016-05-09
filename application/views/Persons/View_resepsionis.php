<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/login.css")?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/bootstrap/css/bootstrap.css")?>" />
  <script type="text/javascript" src="<?php echo base_url("Assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

  <style>
    /* cellpadding */
    th, td { padding: 5px; }

    /* cellspacing */
    table { border-collapse: separate; border-spacing: 5px; } /* cellspacing="5" */
    table { border-collapse: collapse; border-spacing: 0; }   /* cellspacing="0" */

    /* valign */
    th, td { vertical-align: top; }

    /* align (center) */
    table { margin: 0 auto; }

  </style>
  
  <title> Aplikasi Dokter Gigi</title>
</head>

<body>
<!-- ini header, pakai <header> saja-->
<div class="Header">
	<ul>
		<li class="LIUL"><a href="<?php echo site_url("Cont_login/index")?>">Logout</a></li>
		<li class="LIUL"><a>Hello Resepsionis</a></li>
	</ul>
</div>

<!-- ini menu2, lokasi di bawah header, ukuran dibuat agak besar (height), soalnya nanti pemakaiannya di layar touch screen, kasi gambar kalau perlu-->
<nav>
  <table width="100%" style="background-color: gray; height: 75px">
    <tr>
      <td align="center">Antrian</td>
      <td align="center">Pembayaran</td>
      <td align="center">Penjualan</td>
    </tr>
  </table>
</nav>

<!-- Ini pilihan untuk ngubah tanggal. Default tanggal hari ini. Tabel di bawah menampilkan data antrian pada tanggal yg disini -->
<br><br>
<div style="text-align: center;">
Tanggal antrian: <input type="date">
</div>

<br><br>
<div style="text-align: center;">
  <button>Tambah Antrian Baru</button>
</div>
<br><br>
<div>
<!-- ini tabel antrian, pakai datatable -->
<table align=center border=1 cellpadding=5 cellspacing=5>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jam</th>
      <th>Dokter</th>
      <th>&nbsp;</th>
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

</body>

<html>