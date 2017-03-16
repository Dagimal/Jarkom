<?php
require_once "init.php";
require_once "view/header.php";

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
<br><br>

<div class="container">
  <div class="jumbotron">
  <h1>Selamat Datang di JarKom!</h1>
  <p>Selamat Datang di situs JarKom ! Sebuah website artikel sederhana. Disini kalian bisa melihat
    artikel tentang perkembangan teknologi, Tips & trik seputar teknologi, dsb.</p>
  <a href="selengkapnya.php" class="btn btn-info btn-lg" role="button"> Lihat Selengkapnya </a>
</div>

<br>

<form class="navbar-form navbar-right pencarian" role="search" method="get">
  <div class="form-group">
      <input type="search" class="form-control" placeholder="Cari disini gan!" name="cari">
  </div>
  <button type="submit" class="btn btn-primary">Cari</button>
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


<?php
 $blog = mysqli_query($link, "SELECT * FROM blog");
 while($row= mysqli_fetch_assoc($result2)):
   ?>
   <div class="table-row-equal">
           <div class="col-md-4 col-sm-6" style="height:400px; margin-top:20px;">
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

<style media="screen">
  .container{
    padding-bottom: 20px;
  }
  .kontainer{
    padding: 8px;
    background-color: #85dfdd;
    width: 5%;
    position: fixed;
    bottom: 310;
    left: 0;
    border-radius: 0px 10px 0px 0px;
  }
  .surat{
    padding: 8px;
    background-color: #97dd96;
    width: 5%;
    position: fixed;
    bottom: 245;
    left: 0;
    border-radius: 0px 0px 10px 0px;
  }
  @media only screen and (max-width : 1300px){
    .surat{
      display: none;
    }
    .kontainer{
      display: none;
    }
  }
  
</style>

<!-- sidebar -->
<div class="kontainer">
  <a href="https://www.facebook.com/indojarkom/" target="_blank">
    <img src="img/facebook.png" width="50px">
  </a>
</div>
<div class="surat">
<a href="kritikdansaran.php" target="_blank">
  <img src="img/surat.png" width="50px">
</a>
</div>
<br>
<?php
require_once "view/footer.php"
?>
