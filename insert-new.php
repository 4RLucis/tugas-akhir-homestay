<?php
  include 'connect.php';
  $new_name       = $_POST["new_homestay_name"];
  $new_lokasi     = $_POST["new_lokasi"];
  $new_kodePos    = $_POST["new_kodePos"];
  $new_address    = $_POST["new_address"];

  $new_price      = $_POST["new_price"];
  $new_bedrooms   = $_POST["new_bedrooms"];
  $new_beds       = $_POST["new_beds"];
  $new_baths      = $_POST["new_baths"];
  $new_garage     = $_POST["new_garage"];
  $new_dist       = $_POST["new_dist"];

  $new_latitude   = $_POST["new_latitude"];
  $new_longitude  = $_POST["new_longitude"];

  $query = "INSERT INTO homestay (nama_homestay, alamat, alamat1, kode_pos, harga, fasilitas, jarak, akses_jalan, rating)
            VALUES ('".$new_name."', '".$new_address."', '".$new_lokasi."', '".$new_kodePos."', ".$new_price.", 5.0,
            ".$new_dist.", 5.0, 5.0)";
  mysqli_query($conn, $query);
  header("Location: http://localhost/homestay/agents-grid.php", true, 301);
?>
