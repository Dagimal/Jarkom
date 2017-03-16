<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db   = 'blog';

$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

$perPage = 9; //per halaman
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$articles = "SELECT * FROM blog LIMIT $start, $perPage";

$result2 = mysqli_query($link, $articles);
$result = mysqli_query($link, "SELECT * FROM blog");


$total = mysqli_num_rows($result);

$pages = ceil($total/$perPage);
?>
