<?php
require_once 'view/header.php';?>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<script src="sweetalert/dist/sweetalert.min.js"></script>


<?php
if( isset($_POST['submit']) ){
  $email    = $_POST['email'];
  $to       = 'jarkomb@gmail.com';
  $subject  = 'Kritik dan saran';
  $headers  = "Pengirim: " . $email . "\r\n"
              ."Pesan: ".$pesan;
  $pesan    =  $_POST['pesan'];


  if( mail($to, $headers, $pesan, $subject) ){
    echo "<script>
  swal('Mantap djiwa!', 'Email berhasil dikirim!', 'success')
  </script>";
  }else{
     echo "<script>
  swal('Oops...', 'Email gagal dikirim!', 'error')
  </script>";
  }
}
 ?>
<style media="screen">
  #kritiksaran{
    margin-left: 10px;
  }
</style>

 <script src="sweetalert/dist/sweetalert.min.js"></script>
 <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

 <script type="text/javascript">
   swal("Selamat datang pada form Kritik & saran JarKom!", "Silahkan tulis kritik dan saran anda agar jarkom bisa berkembang dengan baik")
 </script>
<br><br><br>
<h1 class="kategori" id="kritiksaran">Berikan Kritik & saran anda untuk JarKom</h1>
<br><br>
<div id="kontainer">
 <form action="" method="post" id="kritiksaran">
  <textarea name="pesan" rows="8" cols="80" placeholder="tulis Kritik dan saran anda..."></textarea>
  <br>
  <input type="email" name="email" placeholder="masukkan email anda">
  <br>
  <br>
  <input type="submit" name="submit" value="Kirim">
 </form>
</div>
<?php
require_once 'view/footer.php';
 ?>
