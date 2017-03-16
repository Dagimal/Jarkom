<?php

require_once "init.php";


if(!$_SESSION['user']){
  header('Location: login.php');
}else{

$error = '';

if(isset($_POST['submit'])){

  $nama   = $_FILES['gambar']['name'];
  $error  = $_FILES['gambar']['error'];
  $size   = $_FILES['gambar']['size'];
  $asal   = $_FILES['gambar']['tmp_name'];
  $format = $_FILES['gambar']['type'];
  $judul  = $_POST['judul'];
  $konten = $_POST['konten'];
  $tag    = $_POST['tag'];

  if($error == 0){
		  if($size < 1000000){
      $query = mysqli_query("INSERT INTO submit VALUES(NULL, '$nama')");
			move_uploaded_file($asal, 'upload/'.$nama);
			if($query){
				echo 'FILE BERHASIL DI UPLOAD';
			}else{
				echo 'GAGAL MENGUPLOAD GAMBAR';
			}
		    }else{
			echo 'UKURAN FILE TERLALU BESAR';
		    }

  }else{
    echo 'ada error';
  }



  if(!empty(trim($judul)) && !empty(trim($konten))){
    if(tambah_data($judul, $konten, $tag, $nama)){
      header('Location: index.php');
    }else{
      $error = 'ada masalah saat menambah data';

    }
  }else{
    $error = 'judul dan konten wajib diisi!';
  }
}

require_once "view/header.php";
 ?>

<style media="screen">
  .add{
    margin-left: 10px;
  }
</style>

 <script src="sweetalert/dist/sweetalert.min.js"></script>
 <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

 <script type="text/javascript">
   swal("Halo!", "Selamat datang pada form tambah data JarKom! Silahkan tambah datanya gan!", "success")
 </script>
<br><br>
<h1 class="add">Silahkan Menambah Artikel gan!</h1>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<form action="" method="post" enctype="multipart/form-data" class="add">
  <label for="judul">Judul</label><br>
  <input type="text" name="judul" value=""><br><br>

  <label for="konten">Isi</label><br>
  <textarea class="ckeditor" id="ckedtor" name="konten"></textarea><br><br>

  <label for="tag">Tag</label><br>
<select name="tag">
  <option value="Komputer">Komputer</option>
  <option value="Tech News">Tech News</option>
  <option value="Tips & trik">Tips & trik</option>
</select>
<br><br>
  <label for="gambar">Tambah thumbnail</label>
  <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
  <input type="file" name="gambar">

  <br>

  <div id="error"><?=$error ?></div>

  <input type="submit" name="submit" value="submit" id="submit">
</form>

<br>

 <?php
 require_once "view/footer.php"
 ?>
<?php } ?>
