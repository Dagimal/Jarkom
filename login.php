<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Halaman Login JarKom</title>
    <link rel="icon" href="../img/komputer.ico">
  </head>

</html>
<?php
require_once "init.php";


if($_SESSION['user']){
  header('Location: add.php');
}else{

$error = '';

if(isset($_POST['submit'])){

  $nama     = $_POST['nama'];
  $pass      = $_POST['password'];


  if(!empty(trim($nama)) && !empty(trim($pass))){
    if(cek_data($nama, $pass)){
      $_SESSION['user'] = $nama;
      header('Location: add.php');
    }else{
      $error = 'ada masalah saat login';

    }
  }else{
    $error = 'user dan password wajib diisi!';
  }
}

require_once "view/header.php";

 ?>
<style media="screen">
  .login{
  margin-left: 20px;
  }
</style>

<div class="kontainer">
<h1 class="kategori">Silahkan Login untuk Melanjutkan menambah data!</h1>

<form action="" method="post" class="login">
  <label for="nama">Username</label><br>
  <input type="text" name="nama" value="" placeholder="Masukkan username anda" class="userpass"><br><br>

  <label for="password">Password</label><br>
  <input type="password" name="password" value="" placeholder="Masukkan Password anda" class="userpass"><br><br>
  <input type="checkbox" class="form-checkbox"> Show password </input>

  <div id="error"><?=$error ?></div>

  <input type="submit" name="submit" value="submit" class="submit">
</form>

<script type="text/javascript">
	$(document).ready(function(){
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.userpass').attr('type','text');
			}else{
				$('.userpass').attr('type','password');
			}
		});
	});
</script>

<br>
</div>
<br>

 <?php
 require_once "view/footer.php"
 ?>
<?php } ?>

<style media="screen">
  .footer{
    position: fixed;
    width: 100%;
    bottom: 0;
  }
  .kontainer{
    margin-top: 5%;
    background-color: #99cfa8;
    text-align: center;
  }
  .kategori{
    color: white;
  }
  .submit{
    padding: 5px 10px;
    background: transparent;
    border: 2px solid #fff;
    color: #fff;
    font-size: 12pt;
  }
</style>
