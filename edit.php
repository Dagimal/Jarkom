<script src="sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<?php

require_once "init.php";
require_once "view/header.php";

$error = '';
$id = $_GET['id'];
if(isset($_GET['id'])){
  $article = tampilkan_per_id($id);
  while($row= mysqli_fetch_assoc($article)){
    $judul_awal = $row['judul'];
    $konten_awal = $row['isi'];
    $tag_awal = $row['tag'];
    $gambar_awal = $row['gambar'];
  }
}
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
    if(edit_data($judul, $konten, $tag, $nama, $id)){
      header("location: index.php");
    }else{
      echo "<script>
            swal('Waduh!...', 'Konten gagal di edit gan!', 'error')
            </script>";

    }
  }else{
    echo "<script>
          swal('Waduh!...', 'Judul dan Konten harus diisi gan!', 'error')
          </script>";
  }
}
 ?>

<style media="screen">
  .edit{
    margin-left: 10px;
  }
</style>

<h1 class="edit">Silahkan Edit datanya gan!</h1>

 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
 <form action="" method="post" enctype="multipart/form-data" class="edit">
   <label for="judul">Judul</label><br>
   <input type="text" name="judul" value="<?=$judul_awal; ?>"><br><br>

   <label for="konten">Isi</label><br>
   <textarea class="ckeditor" id="ckedtor" name="konten"> <?=$konten_awal; ?> </textarea><br><br>

   <label for="tag">Tag</label><br>
   <input type="text" name="tag" value="<?=$tag_awal; ?>"><br><br>

   <label for="gambar">Tambah thumbnail</label>
   <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
   <input type="file" name="gambar" value="<?=$gambar_awal; ?>">

   <br>

   <div id="error"><?=$error ?></div>
<br>
   <input type="submit" name="submit" value="Edit" id="edit">
 </form>

 <br>


 <?php
 require_once "view/footer.php"
 ?>
