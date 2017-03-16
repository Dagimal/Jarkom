<?php

function cek_data($nama, $pass){
  mysqli_real_escape_string($nama);
  mysqli_real_escape_string($pass);

  $query = "SELECT * FROM users WHERE username='$nama' AND password='$pass'";
  global $link;

  if($result= mysqli_query($link, $query)){
    if(mysqli_num_rows($result) != 0)return true;
    else return false;
  }
}

function cek_status($username){
  mysqli_real_escape_string($username);

  $query = "SELECT status FROM users WHERE username='$username'";
  global $link;

  if($result= mysqli_query($link, $query)){
    while($row = mysqli_fetch_assoc($result)){
      $status = $row['status'];
    }

    return $status;

  }
}

 ?>
