<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/login.css")?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/jquery.dataTables.min.css")?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/bootstrap/css/bootstrap.min.css")?>">


<script src="<?php echo base_url("Assets/js/jquery-2.2.3.min.js")?>"></script>
<script src="<?php echo base_url("Assets/js/jquery.dataTables.min.js")?>"></script>
<script src="<?php echo base_url("Assets/bootstrap/js/bootstrap.min.js")?>"></script>

<title> Hello Guys</title>

<script>
	$(document).ready(function()
	{	
		var selectedData;
		createTableCustomer(<?php echo $DataRow;?>);
		$('#Table1 tbody').on( 'click', 'tr', function () {
			var table = $("#Table1").DataTable();
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
				
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				selectedData=table.row(this).data()[0];
			}
			
		} );
		
		$('#deletebutton').click( function () {
			
			if(confirm("Yakin mau di delete?"))
			{
				$.ajax({
					url:"<?php echo site_url("Cont_admin/DeleteDataTable")?>",
					type:"post",
					data:{userID:selectedData},
					success:function(result)
					{
						var table = $("#Table1").DataTable();
						table.row('.selected').remove().draw( false );
					}
				});
			}
		} );
		
		$("#insertbutton").click(function()
		{	
			if($("#insert").val())
			{
				
			}
			else
			{
				var newBtn=$('<input type="button" style="float:left;" id="insert" value="Insert" />');
				$("#update").remove();
				$("#bawahInsert").append(newBtn);
			}
			$("#Screen").fadeIn("fast",function()
			{
				$("#formInsert").slideDown("normal");
			});
		});
		$("#cancel").click(function()
		{
			$("#formInsert").slideUp("fast",function()
			{
				$("#Screen").fadeOut("fast");
			});
		});
		
		$("#updatebutton").click(function()
		{
			var data = $("#Table1").DataTable().row('.selected').data();
			$("#username").val(data[1]);
			$("#user_username").val(data[2]);
			$("#user_password").val(data[3]);
			$("#user_alamat").val(data[4]);
			$("#user_hp").val(data[5]);
			$("#user_email").val(data[6]);
			$("#user_type").val(data[7]);
			$("#role_id").val(data[8]);
			$("#user_status").val(data[9]);
			
			if($("#update").val())
			{
				
			}
			else
			{
				var newBtn=$('<input type="button" style="float:left;" id="update" value="Update" />');
				$("#insert").remove();
				$("#bawahInsert").append(newBtn);
			}
			
			$("#Screen").fadeIn("fast",function()
			{
				$("#formInsert").slideDown("normal");
			});
		});
		
		$("#bawahInsert").on("click","#update",function()
		{
			var username = $("#username").val();
			var user_username= $("#user_username").val();
			var user_password= $("#user_password").val();
			var user_alamat= $("#user_alamat").val();
			var user_hp= $("#user_hp").val();
			var user_email= $("#user_email").val();
			var user_type= $("#user_type").val();
			var role_id= $("#role_id").val();
			var user_status= $("#user_status").val();
			
			$.ajax({
				url:"<?php echo site_url("Cont_admin/updateDataUser")?>",
				type:"post",
				datatype:'json',
				data:{user_ID:selectedData,username:username,user_username:user_username,user_password:user_password,user_alamat:user_alamat,user_hp:user_hp,user_email:user_email,user_type:user_type,role_id:role_id,user_status:user_status},
				success:function(result)
				{
					$("#Table1").DataTable().destroy();
					createTableCustomer(JSON.parse(result));
					$("#formInsert").slideUp("fast",function()
					{
						$("#Screen").fadeOut("fast");
					});
				}
			});
		})
		
		$("#bawahInsert").on("click","#insert",function()
		{
			var username = $("#username").val();
			var user_username= $("#user_username").val();
			var user_password= $("#user_password").val();
			var user_alamat= $("#user_alamat").val();
			var user_hp= $("#user_hp").val();
			var user_email= $("#user_email").val();
			var user_type= $("#user_type").val();
			var role_id= $("#role_id").val();
			var user_status= $("#user_status").val();
			
			$.ajax({
				url:"<?php echo site_url("Cont_admin/insertDataUser")?>",
				type:"post",
				datatype:'json',
				data:{username:username,user_username:user_username,user_password:user_password,user_alamat:user_alamat,user_hp:user_hp,user_email:user_email,user_type:user_type,role_id:role_id,user_status:user_status},
				success:function(result)
				{
					//alert(JSON.parse(result));
					$("#Table1").DataTable().destroy();
					createTableCustomer(JSON.parse(result));
					$("#formInsert").slideUp("fast",function()
					{
						$("#Screen").fadeOut("fast");
					});
				}
			});
			
		});
		
		function createTableCustomer(DataRow)
		{
			$("#Table1").DataTable(
			{
				data: DataRow,
				columns:
				[
				{title:"User Id"},
				{title:"User Name"},
				{title:"User Username"},
				{title:"User Password."},
				{title:"User Alamat"},
				{title:"User Hp"},
				{title:"User email"},
				{title:"User Tipe"},
				{title:"Role Id"},
				{title:"User Status"}
				],
				"Destroy":true
			});
		}
		$("#Mcust").click(function()
		{
			$(this).addClass('active1');
			$("#Mdokter").removeClass('active1');
			$("#Mbarang").removeClass('active1');
			$("#MasterCustomer").slideDown("Fast");
			$("#MasterDokter").slideUp("Fast");
			$("#MasterBarang").slideUp("fast");
			selectedData=null;
		})
		
		//Dokter//***************************************************************************************************************************
		
		
		createTableDokter(<?php echo $DataRowDokter?>);
		$('#TableDokter tbody').on( 'click', 'tr', function () {
			var table = $("#TableDokter").DataTable();
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
				
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				selectedData=table.row(this).data()[0];
			}
			
		} );
		
		$("#Mdokter").click(function()
		{
			$("#MasterBarang").slideUp("fast");
			$("#Mcust").removeClass('active1');
			$("#Mbarang").removeClass('active1');
			$(this).addClass('active1');
			$("#MasterDokter").slideDown("Fast");
			$("#MasterCustomer").slideUp("Fast");
			selectedData=null;
		})
		$("#Dupdate").click(function()
		{
			var data = $("#TableDokter").DataTable().row('.selected').data();

			$("#kodeDokter").val(data[0]);
			$("#namaDokter").val(data[1]);
			$("#alamatDokter").val(data[2]);
			$("#hpdokter").val(data[3]);
			$("#statusdokter").val(data[4]);
			$("#saveButton").val("Update");
			$("#myModal").modal("show");
		});
		$("#saveButton").click(function()
		{
			if($("#saveButton").val() == "Update")
			{
				$.ajax({
					url:"<?php echo site_url("Cont_admin/updateDataDokter")?>",
					type:"post",
					datatype:"json",
					data:{kode_dokter:$("#kodeDokter").val(),nama_dokter:$("#namaDokter").val(),alamat_dokter:$("#alamatDokter").val(),hp_dokter:$("#hpdokter").val(),status_dokter:$("#statusdokter").val()},
					success:function(result)
					{
						$("#TableDokter").DataTable().destroy();
						createTableDokter(JSON.parse(result));
						$("#myModal").modal("hide");
					}
				})
			}
			else if($("#saveButton").val() == "Insert")
			{
				$.ajax({
					url:"<?php echo site_url("Cont_admin/insertDataDokter")?>",
					type:"post",
					datatype:"json",
					data:{kode_dokter:$("#kodeDokter").val(),nama_dokter:$("#namaDokter").val(),alamat_dokter:$("#alamatDokter").val(),hp_dokter:$("#hpdokter").val(),status_dokter:$("#statusdokter").val()},
					success:function(result)
					{
						$("#TableDokter").DataTable().destroy();
						createTableDokter(JSON.parse(result));
						$("#myModal").modal("hide");
					}
				})
			}
			
		})
		$("#Dinsert").click(function()
		{
			$("#saveButton").val("Insert");
			$("#kodeDokter").val("");
			$("#namaDokter").val("");
			$("#alamatDokter").val("");
			$("#hpdokter").val("");
			$("#statusdokter").val("");
			$("#myModal").modal("show");
		});
		$("#Ddelete").click(function()
		{
			if(confirm("Apakah data Tersebut mau di hapus?"))
			{
				$.ajax({
					url:"<?php echo site_url("Cont_admin/DeleteDataDokter")?>",
					type:"post",
					datatype:"json",
					data:{kode:selectedData},
					success:function(result)
					{
						var table = $("#TableDokter").DataTable();
						table.row('.selected').remove().draw( false );
					}
					
				})
			}
		})
		function createTableDokter(DataRow)
		{
			$("#TableDokter").DataTable(
			{
				data: DataRow,
				columns:
				[
				{title:"Kode Dokter"},
				{title:"Nama Dokter"},
				{title:"Alamat Dokter"},
				{title:"HP Dokter"},
				{title:"Status Dokter"}
				],
				"Destroy":true
			});
		}
		//******************************************************** MASTER BARANG *********************************************************//
		
		createTableBarang(<?php echo $rowBarang;?>);
		$('#TableBarang tbody').on( 'click', 'tr', function () {
			var table = $("#TableBarang").DataTable();
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
				
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				selectedData=table.row(this).data()[0];
			}
			
		} );
		$("#Mbarang").click(function()
		{
			selectedData=null;
			$("#MasterCustomer").slideUp("fast");
			$("#MasterDokter").slideUp("fast");
			$("#MasterBarang").slideDown("fast");
			$("#Mbarang").addClass("active1");
			$("#Mdokter").removeClass("active1");
			$("#Mcust").removeClass("active1");
		})
		$("#Binsert").click(function()
		{
			$("#saveButtonBarang").val("Insert");
			$("#myModalBarang").modal("show");
		});
		$("#Bupdate").click(function()
		{
			var data = $("#TableBarang").DataTable().row('.selected').data();
			$("#kodeBarang").val(data[0]);$("#namaBarang").val(data[1]);
			$("#hargaBarang").val(data[2]);$("#stokBarang").val(data[3]);$("#statusBarang").val(data[4]);
			
			$("#saveButtonBarang").val("Update");
			$("#myModalBarang").modal("show");
		});
		$("#Bdelete").click(function()
		{
			if(confirm("Apakah data ini mau di hapus?"))
			{
				var data = $("#TableBarang").DataTable().row('.selected').data();
				$.ajax({
					url:"<?php echo site_url("Cont_admin/DeleteDataBarang")?>",
					type:"post",
					datatype:"json",
					data:{kode_barang:data[0]},
					success:function(result)
					{
						var table = $("#TableBarang").DataTable();
						table.row('.selected').remove().draw( false )
					}				
				})
			}
		})
		function createTableBarang(DataRow)
		{
			$("#TableBarang").DataTable({
				data: DataRow,
				columns:
				[
				{title:"kode Barang"},
				{title:"Nama Barang"},
				{title:"Harga Barang"},
				{title:"Stok Barang"},
				{title:"Status Barang"}
				],
				destroy:true
			});
		}
		$("#saveButtonBarang").click(function()
		{
			if($(this).val() =="Insert")
			{
				$.ajax
				({
					url:"<?php echo site_url("Cont_admin/insertDataBarang")?>",
					type:"post",
					datatype:"json",
					data:{kode_barang:$("#kodeDokter").val(),nama_barang:$("#namaDokter").val(),harga_barang:$("#alamatDokter").val(),stok_barang:$("#hpdokter").val(),status_barang:$("#statusdokter").val()},
					success:function(result)
					{
						$("#TableBarang").DataTable().destroy();
						createTableBarang(JSON.parse(result));
						$("#myModal").modal("hide");
					}
				})
			}
			else if($(this).val() == "Update")
			{		
				$.ajax
				({
					url:"<?php echo site_url("Cont_admin/updateDataBarang")?>",
					type:"post",
					datatype:"json",
					data:{kode_barang:$("#kodeDokter").val(),nama_barang:$("#namaDokter").val(),harga_barang:$("#alamatDokter").val(),stok_barang:$("#hpdokter").val(),status_barang:$("#statusdokter").val()},
					success:function(result)
					{
						$("#TableBarang").DataTable().destroy();
						createTableBarang(JSON.parse(result));
						$("#myModal").modal("hide");
					}
				})
			}
		});
	});
</script>
</head>

<body>
<div class="Header">
	<ul>
		<li class="LIUL"><a href="<?php echo site_url("Cont_login/index")?>">Logout</a></li>
		<li ><a>Hello Admin</a></li>
		
		<li id="Mcust" style="float:right;font-size:10pt;"><a href="#"><span style="font-size:25px;" class="glyphicon glyphicon-user"></span>Master Customer</a></li>
		<li id="Mdokter" style="float:right;"><a href="#"><span style="font-size:25px;" class="glyphicon glyphicon-user"></span>Master Dokter</a></li>
		<li id="Mbarang" style="float:right;font-size:10pt;"><a href="#"><span style="font-size:25px;" class="glyphicon glyphicon-oil"></span>Master Barang</a></li>
		<li id="Mbarang" style="float:right;font-size:10pt;"><a href="#"><span style="font-size:25px;" class="glyphicon glyphicon-tag"></span>Transaksi</a></li>
		<li id="Mbarang" style="float:right;font-size:10pt;"><a href="#"><span style="font-size:25px;" class="glyphicon glyphicon-pencil"></span>Accounting</a></li> 
		<li id="Mbarang" style="float:right;font-size:10pt;"><a href="<?php echo site_url("Admin/Cont_laporan")?>"><span style="font-size:25px;" class="glyphicon glyphicon-list-alt"></span>Laporan</a></li>
	</ul>
</div>
<div id="MasterCustomer" style="display:none;">
	<div id="content">
		<table id="Table1" class="display" cellspacing="0" width="100%">
		
		</table>
		<input type="button" id="deletebutton" value="delete"/> &nbsp
		<input type="button" id="insertbutton" value="Insert"/>	&nbsp 
		<input type="button" id="updatebutton" value="Update"/>	
	</div>

	<div id="Footer">

	</div>

	<div id="Screen" style="width:100%;height:100%;padding:0px;margin:0px;background:rgba(50,50,50,0.7);position:absolute;left:0px;top:0px;display:none;">

	</div>

	<div id="formInsert">
	<div id="contentInsert">
		<div id="kiriInsert">
			<ul id="ulInsertKiri" style="float:left;list-style:none;overflow:hidden;padding:0px;margin:0px;">
				<li>Usename:</li><li>User Username</li><li>User Password</li><li>User Alamat</li><li>User Hp</li><li>User Email</li><li>User Type</li><li>Role ID</li><li>User Status</li>
			</ul>
		</div>
		
		<div id="kananInsert">
		<ul style="float:left;list-style:none;overflow:hidden;padding:0px;margin:2px;">
				<li><input type="text" id="username" value=""></li>
				<li><input type="text" id="user_username" value=""></li>
				<li><input type="text" id="user_password" value=""></li>
				<li><input type="text" id="user_alamat" value=""></li>
				<li><input type="text" id="user_hp" value=""></li>
				<li><input type="text" id="user_email" value=""></li>
				<li><input type="text" id="user_type" value=""></li>
				<li><input type="text" id="role_id" value=""></li>
				<li><input type="text" id="user_status" value=""></li>,
			</ul>
		</div>
		<div id="bawahInsert" style="width:100%;height:20px;float:left;">
		<input style="float:left;" type="button" id="insert" value="insert">&nbsp <input type="button" id="cancel" value="Cancel">
		</div>
	</div>
	</div>
</div>
<div id="MasterDokter" style="display:none;">
	<div id="content" class="container-fluid">
		<table id="TableDokter" class="display" cellspacing="0" width="100%">
		
		</table>
		<div class="container-fluid">
			<div class="row">
				<button id="Dinsert" type="button" class="btn btn-primary" value="insert">Insert</button>
				<button id="Dupdate" type="button" class="btn btn-primary" value="insert">Update</button>
				<button id="Ddelete"type="button" class="btn btn-primary" value="insert">Delete</button>
			</div>
		</div>
	</div>
</div>

<div id="MasterBarang" style="display:none;">
	<div id="content" class="container-fluid">
		<table id="TableBarang" class="display" cellspacing="0" width="100%">
		
		</table>
		<div class="container-fluid">
			<div class="row">
				<button id="Binsert" type="button" class="btn btn-primary" value="insert">Insert</button>
				<button id="Bupdate" type="button" class="btn btn-primary" value="insert">Update</button>
				<button id="Bdelete"type="button" class="btn btn-primary" value="insert">Delete</button>
			</div>
		</div>
	</div>
</div>


</body>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Dokter</h4>
      </div>
      <div class="modal-body">	
		<div id="form1" >
			<form role="form" class="form-horizontal">
				<div class="form-group">
					<label id="labelKode" class="control-label col-sm-3" for="usr" >Kode Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="kodeDokter" disabled=true>
					</div>
				</div>
				<div class="form-group">
					<label id="labelNama" class="control-label col-sm-3 " for="usr">Nama Dokter</label>
					<div class="col-sm-7">
						<input type="text" data-default="20:48" class="form-control clockpicker" id="namaDokter">
					</div>
				</div>
				<div class="form-group ui-widget">
					<label  id="labelAlamat" class="control-label col-sm-3" for="usr">Alamat Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="alamatDokter">
					</div>
				</div>
				<div class="form-group">
					<label id="labelKeterangan" class="control-label col-sm-3" for="usr">Handphone Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="hpdokter">
					</div>
				</div>
				<div class="form-group">
					<label id="labelStatus" class="control-label col-sm-3" for="usr">Status Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="statusdokter">
					</div>
				</div>
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" id="saveButton" class="btn btn-primary" value="Insert">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModalBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
      </div>
      <div class="modal-body">	
		<div id="form1" >
			<form role="form" class="form-horizontal">
				<div class="form-group">
					<label  class="control-label col-sm-3" for="usr" >Kode Barang</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="kodeBarang">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 " for="usr">Nama Barang</label>
					<div class="col-sm-7">
						<input type="text" data-default="20:48" class="form-control clockpicker" id="namaBarang">
					</div>
				</div>
				<div class="form-group ui-widget">
					<label  class="control-label col-sm-3" for="usr">Harga Barang</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="hargaBarang">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="usr">Stok hara</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="stokBarang">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="usr">Status Barang</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="statusBarang">
					</div>
				</div>
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" id="saveButtonBarang" class="btn btn-primary" value="Insert">Save changes</button>
      </div>
    </div>
  </div>
  
</div>

<html>