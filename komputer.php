<?php
require_once "init.php";
require_once "view/header.php";
//awal pagination
$perPage = 9; //per halaman
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$articles = "SELECT * FROM blog WHERE tag LIKE 'Komputer' LIMIT $start, $perPage";

$result2 = mysqli_query($link, $articles);
$result = mysqli_query($link, "SELECT * FROM blog");

$total = mysqli_num_rows($result);

$pages = ceil($total/$perPage);
//akhir pagination

$super_user = $login = false;

if($_SESSION['user']){
  $login = true;
  if(cek_status($_SESSION['user']) == 1){
    $super_user = true;
  }
}

if(isset($_GET['cari'])){
  $cari     = $_GET['cari'];
  $result2 = hasil_cari($cari);
}

?>
<script src="sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

<script type="text/javascript">
  swal("Halo!", "Selamat datang pada tag Komputer JarKom!", "success")
</script>
<br>
 <body>
   <span class="glyphicon glyphicon-tags" aria-hidden="true" style="color:rgba(84, 178, 204, 1); margin-left:20px"><h1 class="kategori">Komputer</h1></span>
 </body>
 <form class="navbar-form navbar-right pencarian" role="search" method="get">
   <div class="form-group">
       <input type="search" class="form-control" placeholder="Cari disini gan!" name="cari">
   </div>
   <button type="submit" class="btn btn-primary">Cari</button>
   <br>
   <a href="komputer.php">Muat Ulang</a>
 </form>
<!-- pagination -->
 <nav aria-label="Page navigation">
     <ul class="pagination">
       <li>
         <a href="?halaman=<?=$_GET['halaman']-1?>" aria-label="Previous">
           <span aria-hidden="true">&laquo;</span>
         </a>
       </li>
       <?php for($i=1; $i<=$pages; $i++){ ?>
         <li><a href="?halaman=<? echo $i?>"><? echo $i?></a></li>
       <?php } ?>
       <li>
         <a href="?halaman=<?=$_GET['halaman']+1?>" aria-label="Next">
           <span aria-hidden="true">&raquo;</span>
         </a>
       </li>
     </ul>
 </nav>
<!-- akhir pagination -->
<div class="ukuran">
<div id="kontainer">
 <?php
 $blog = mysqli_query($link, "SELECT * FROM blog");
 while($row= mysqli_fetch_assoc($result2)):
  ?>

  <div class="table-row-equal">
          <div class="col-md-6 col-md-4" style="height:400px; margin-top:20px;">
          <div class="thumbnail">

       <img class="img-responsive zoom" src="upload/<?php echo $row['gambar']; ?>" style="width:100%; height:200px;">

           <div class="caption">
          <h3><?= $row['judul']; ?></h3>
         <div id="menu_thumb">
           <p class="waktu"> <span class="glyphicon glyphicon-time" aria-hidden="true"> : </span> <?= $row['waktu']; ?> </p>
          <p class="tag"> <span class="glyphicon glyphicon-tags" aria-hidden="true"> : </span> <?= $row['tag']; ?> </p>
        <?php if($login == true): ?>
          <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary"> Edit </a>
          <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger"> Hapus </a>
        <?php endif; ?>
          <a href="single.php?id=<?= $row['id']; ?>" class="btn btn-info"> Baca artikel </a>
        </div>
      </div>
      </div>
    </div>
  </div><!--akhir thumbnail row-->
<?php endwhile; ?>
</div>
</div>

<style>
  .kategori{
    color: rgba(84, 178, 204, 1);
    margin-left: 20px;
  }
  .kategori:hover{
    color: rgba(84, 178, 204, 0.5);
  }
  .ukuran{
    padding-left: 10px;
    padding-right: 230px;
  }
  #kontainer{
    padding-bottom: 1300px;
  }
</style>


 <?php
 require_once "view/footer.php"
 ?>
