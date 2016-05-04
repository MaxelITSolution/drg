<html>
<head>
<title> Hello Guys</title>
</head>

<body>
<?php echo form_open("Cont_login/submitReq");?>
	Username:<input type="text" id="username" name="username"/><br>
	Password:<input type="password" id="password" name="password"/><br>
	<input type="submit" id="submit" name="submit" value="Submit"/>
<?php echo form_close();?>
</body>

<html>