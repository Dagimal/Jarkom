
<?php

require_once "init.php";
require_once "view/header.php";


$error = '';
$id = $_GET['id'];
if(isset($_GET['id'])){
  $article = tampilkan_per_id($id);
  while($row= mysqli_fetch_assoc($article)){
    $judul_awal = $row['judul'];
    $gambar_awal = $row['gambar'];
    $konten_awal = $row['isi'];
    $tag_awal = $row['tag'];
  }
}
?>

<script src="jquery.js"></script>

<style>
hr{
  margin-left: 5px;
}

p{
  width: 100%;
  margin-left: 10px;
}
.wrap{
  border-radius: 5px;
  box-shadow: 10px 10px 5px #8f8a8a;
  background-color: rgb(214, 221, 219);
  width: 65%;
  margin-left: 10%;
  padding-right: 10px;
  min-height: 100%;
}
.wrap_image{
  padding-right: 10px;
}
.container{
  width: 65%;
  margin-left: 9%;
  padding-right: 10px;
}
.jarkomh1{
  text-align: center;
  color: white;
  text-shadow: 2px 2px #6b6b6b;
  background-color: #76c3e0;
  padding: 5px;
  border-radius: 10px;
}
@media screen and (max-width: 1000px){
  p{
    font-size: 75%;
  }
}
#disqus_thread{
  width: 65%;
  margin-left: 10%;
  padding-right: 10px;
  min-height: 100%;
  margin-bottom: 10px;
}
.share{
  margin-left: 10%;
  padding-right: 10px;
  min-height: 100%;
}
.interval{
  margin-left: 10%;
  background-color: #9cdba8;
  width: 65%;
  border-radius: 5px;
  padding: 5px;
  box-shadow: 10px 10px 5px #8f8a8a;
}
#button{
  text-decoration: none;
}
</style>

<!DOCTYPE html>
<br><br>
<div class="container">
  <h1 class="jarkomh1">www.djarkom.com</h1>
  <ul class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="#" style="text-decoration:none;"><?=$tag_awal?></a></li>
    <li><a href="#" style="text-decoration:none;"><?=$judul_awal?></a></li>
  </ul>
</div>

<div class="wrap">
<p id="judul_single" class="isi">
  <?= $judul_awal; ?>
</p>

<p id="isi_single" class="isi">
  <?= $konten_awal; ?>
</p>

<br><br><br><br><br>

<p id="tag_single" class="tag">
  <span style="font-style:normal">tag :</span> <?= $tag_awal; ?>
</p>

</div>

<!-- waktu interval -->
<div class="interval">
<?php

  $now = new DateTime();
  $content = new DateTime('');

  $interval = $content->diff($now);

  function checkDifference($time){
    if($time->y > 0)
      return $time->y . ' tahun ';
    if($time->m > 0)
      return $time->m . ' bulan ';
    if($time->d > 0)
      return $time->d . ' hari ';
    if($time->h > 0)
      return $time->h . ' jam ';
  }

  echo 'Diposting ' . checkDifference($interval) . ' yang lalu';
 ?>
</div>

<br>

<!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<h5 style="margin-left: 10%;"><b>Share this article</b></h5>
<a id="button" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)">
  <img src="img/facebook.png" width="40px;" class="share">
</a>
<br><br>
<!-- komentar -->
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://djarkom-16mb-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//djarkom-16mb-com.disqus.com/count.js" async></script>

<script type="text/javascript">
  $('img').css({
    'maxWidth':'100%',
    'height':'auto'
  });

  $("img").addClass("wrap_image");

</script>


 <?php
 require_once "view/footer.php"
 ?>
