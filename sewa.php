<?php
  include 'connect.php';
  $homid      = $_POST["homid"];      $nameUser   = $_POST["nameUser"];
  $emailUser  = $_POST["emailUser"];  $idenUser   = $_POST["idenUser"];
  $hpUser     = $_POST["hpUser"];     $checkIn    = $_POST["checkIn"];
  $checkOut   = $_POST["checkOut"];   $adult      = $_POST["adult"];
  $children   = $_POST["children"];   $rooms      = $_POST["rooms"];

  echo "Homestay ID: ".$homid."<br>nama Penyewa: ".$nameUser."<br>
        email Penyewa: ".$emailUser."<br>Nomor Identitas: ".$idenUser."<br>
        HP Penyewa: ".$hpUser."<br>Check In: ".$checkIn."<br>Check Out: "
        .$checkOut."<br>Jumlah Orang Dewasa: ".$adult."<br>Jumlah Anak Kecil: "
        .$children."<br>Jumlah Ruangan: ".$rooms."<br>";

  $sql = "INSERT INTO sewa (id_homestay, nama_penyewa, id_penyewa, noHP,
          checkin, checkout, status_bayar) VALUES (".$homid.", '".$nameUser.
          "', '".$idenUser."', '".$hpUser."', ".$checkIn.", ".$checkOut.", 0)";
  if (mysqli_query($conn, $sql)) {
     $last_id = mysqli_insert_id($conn);
     echo "New record created successfully. Last inserted ID is: " . $last_id;
   } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

   if(isset($_POST["send"])){
     $subject   = 'Your homestay rental status';
     $messagae  = 'Name: '.
   }
?>
