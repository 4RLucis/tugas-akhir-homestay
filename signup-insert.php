<?php
  include 'connect.php';
  $name   = $_POST["name"];
  $email  = $_POST["email"];
  $phone  = $_POST["phone"];
  $pass   = $_POST["pass"];
  $hashed = password_hash($pass, PASSWORD_DEFAULT);
  //$pass_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
  $sql = "INSERT INTO akun (nama_pemilik, email, phone, password) VALUE ('$name', '$email', '$phone', '$hashed')";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  
  header("Location: http://localhost/homestay/login.php", true, 301);
?>
