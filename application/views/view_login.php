<html>
  <head>
  <title> Hello Guys</title>
  </head>

  <body>
  <div style="margin-top:40vh">
  <?php echo form_open("Cont_login/submitReq");?>
    <table style="margin:auto; border: 1px solid black;">
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input type="text" id="username" name="username"/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" id="password" name="password"/></td>
      </tr>
      <tr>
        <td colspan=3 align=center><input type="submit" id="submit" name="submit" value="Submit"/></td>
      </tr>
    </table>
	  
  <?php echo form_close();?>
  </div>
  </body>

<html>