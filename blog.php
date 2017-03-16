<?php

function tech(){
  global $link;

  $query  = "SELECT * FROM blog WHERE tag LIKE 'Tech News'";
  $result = mysqli_query($link, $query) or die('gagal menampilkan data');

  return $result;
}

function tips(){
  global $link;

  $query  = "SELECT * FROM blog WHERE tag LIKE 'Tips & trik'";
  $result = mysqli_query($link, $query) or die('gagal menampilkan data');

  return $result;
}

function komputer(){
  global $link;

  $query  = "SELECT * FROM blog WHERE tag LIKE 'komputer'";
  $result = mysqli_query($link, $query) or die('gagal menampilkan data');

  return $result;
}

function tampilkan(){
  global $link;

  $query  = "SELECT * FROM blog";
  $result = mysqli_query($link, $query) or die('gagal menampilkan data');

  return $result;
}

function tampilkan_per_id($id){
  global $link;

  $query  = "SELECT * FROM blog WHERE id=$id";
  $result = mysqli_query($link, $query) or die('gagal menampilkan data');

  return $result;
}


function tambah_data($judul, $konten, $tag, $nama){
  $query = "INSERT INTO blog (judul, isi, tag, gambar) VALUES ('$judul', '$konten', '$tag', '$nama')";
  return run($query);
}

function edit_data($judul, $konten, $tag, $nama, $id){
  $query = "UPDATE blog SET judul='$judul', isi='$konten', judul='$judul', tag='$tag', gambar='$nama'
            WHERE id=$id";
  return run($query);
}

function hapus_data($id){
  $query = "DELETE FROM blog WHERE id=$id";
  return run($query);
}

function run($query){
  global $link;

  if(mysqli_query($link, $query)) return true;
  else return false;
}

function hasil_cari($cari){
    $query  = "SELECT * FROM blog WHERE judul LIKE '%$cari%'";
    return result($query);
}

function result($query){
  global $link;
  if($result = mysqli_query($link, $query) or die('gagal menampilkan data')){
    return $result;
  }
}
 ?>
