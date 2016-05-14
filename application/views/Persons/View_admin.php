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
		createTableDokter(<?php echo $DataRowDokter?>);
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
			alert(data);
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
					createTable(JSON.parse(result));
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
					createTable(JSON.parse(result));
					$("#formInsert").slideUp("fast",function()
					{
						$("#Screen").fadeOut("fast");
					});
				}
			});
			
		});
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
			$("#MasterCustomer").slideDown("Fast");
			$("#MasterDokter").slideUp("Fast");
			
		})
		$("#Mdokter").click(function()
		{
			$("#Mcust").removeClass('active1');
			$(this).addClass('active1');
			prev = $(this);
			$("#MasterDokter").slideDown("Fast");
			$("#MasterCustomer").slideUp("Fast");
		})
		$("#Dinsert").click(function()
		{
			$("#myModal").modal("show");
		});
	});
</script>
</head>

<body>
<div class="Header">
	<ul>
		<li class="LIUL"><a href="<?php echo site_url("Cont_login/index")?>">Logout</a></li>
		<li ><a>Hello Admin</a></li>
		<li id="Mcust" style="float:right;"><a href="#">Master Customer</a></li>
		<li id="Mdokter" style="float:right;"><a href="#">Master Dokter</a></li>
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
				<li>Usename:</li>
				<li>User Username</li>
				<li>User Password</li>
				<li>User Alamat</li>
				<li>User Hp</li>
				<li>User Email</li>
				<li>User Type</li>
				<li>Role ID</li>
				<li>User Status</li>
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
				<button type="button" class="btn btn-primary" value="insert">Update</button>
				<button type="button" class="btn btn-primary" value="insert">Delete</button>
			</div>
		</div>
	</div>

	<div id="Footer">

	</div>
</div>


</body>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none">
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
					<label class="control-label col-sm-3" for="usr">Kode Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="Nama">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 " for="usr">Nama Dokter</label>
					<div class="col-sm-7">
						<input type="text" data-default="20:48" class="form-control clockpicker" id="datetimepicker4">
					</div>
				</div>
				<div class="form-group ui-widget">
					<label class="control-label col-sm-3" for="usr">Alamat Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="Dokter">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="usr">Handphone Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="Nama">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="usr">Status Dokter</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="Nama">
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

<html>