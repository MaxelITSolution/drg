<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/login.css")?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("Assets/css/jquery.dataTables.min.css")?>">
<script src="<?php echo base_url("Assets/js/jquery-2.2.3.min.js")?>"></script>
<script src="<?php echo base_url("Assets/js/jquery.dataTables.min.js")?>"></script>
<title> Hello Guys</title>

<script>
	$(document).ready(function()
	{	
		//alert(<?php echo $DataRow;?>);
		var selectedData;
		createTable(<?php echo $DataRow;?>);
		
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
			else
			{
				
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
		
		function createTable(DataRow)
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
		var prev;
		$("#Mcust").click(function()
		{
			$(this).addClass('active');
			prev = $(this);
			$("#MasterCustomer").slideDown("Fast");
		})
	});
</script>
</head>

<body>
<div class="Header">
	<ul>
		<li class="LIUL"><a href="<?php echo site_url("Cont_login/index")?>">Logout</a></li>
		<li ><a>Hello Admin</a></li>
		<li id="Mcust" style="float:right;"><a href="#">Master Customer</a></li>
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
</body>
<html>