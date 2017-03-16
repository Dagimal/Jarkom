<script src="sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<?php
require_once "init.php";

if(!$_SESSION['user']){
  header('Location: logindelete.php');
}else{
if(isset($_GET['id'])){
  if(hapus_data($_GET['id'])){
    header('Location: index.php');
  return true;
  }
  else echo 'gagal menghapus data';
  }
}
?>
