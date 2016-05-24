<html>
  <head>
  <title>Dokter Gigi</title>
  </head>

  <?php loadAsset("css/style_basic.css"); ?>  
  <?php loadAsset("css/style_login.css"); ?>  
  <body>
  <div style=" width:400px; margin: 30vh auto auto;" >
  <div id="login_title">Login</div>
  <?php echo form_open("Cont_login/authenticate");?>
    <table id="login_table" cellpadding="5px">
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input style="width:100%" type="text" id="username" name="username" placeholder="Masukkan Username" /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
       <td><input style="width:100%" type="password" id="password" name="password" placeholder="Masukkan Password" /></td>
      </tr>
      <tr>
        <td colspan=3 align=center><button class="btn_1" type="submit" id="submit" name="submit" />Submit</button></td>
      </tr>
    </table>
	  
  <?php echo form_close();?>
  </div>
  <br><br>
  <div style="color: gray; margin: auto; text-align: center; padding: 10px; border: 1px solid gray; width: 700px;">
    Untuk masuk sebagai Resepsionis, masukkan "kasir" sebagai username<br>
<!--    Untuk masuk sebagai dokter, masukkan "dokter" sebagai username<br>-->
<!--    Untuk masuk sebagai Admin, masukkan "admin" sebagai username<br>-->
  </div>
  
  </body>

<html>