<?php
  include 'connect.php';
  $last_id        = $_POST["idSewa"];
  $fasilFeedback  = $_POST["feedfasilitas"];
  $AJFeedback     = $_POST["feedAJ"];
  $ratingFeedback = $_POST["feedRating"];
  $homid          = $_POST["homid"];

  echo "Fasilitas: ".$fasilFeedback."<br>";
  echo "AJ: ".$AJFeedback."<br>";
  echo "Rating: ".$ratingFeedback."<br><br>";

  $query = "SELECT * FROM homestay where id_homestay=".$homid;
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($result)) {
    echo "nama: ".$row["nama_homestay"]."<br>";
    echo "current Fasilitas: ".$row["fasilitas"]."<br>";
    echo "current Akses Jalan: ".$row["akses_jalan"]."<br>";
    echo "current Rating: ".$row["rating"]."<br><br>";

    $newFasil   = ($fasilFeedback+$row["fasilitas"])/2;
    $newAJ      = ($AJFeedback+$row["akses_jalan"])/2;
    $newRating  = ($ratingFeedback+$row["rating"])/2;
  }
  echo $newFasil."<br>";
  echo $newAJ."<br>";
  echo $newRating;

  $query = "UPDATE homestay SET fasilitas=".$fasilFeedback.", akses_jalan=".$AJFeedback.", rating=".$ratingFeedback." WHERE id_homestay=".$homid;
  mysqli_query($conn,$query);

  $query = "UPDATE sewa SET rating_fasilitas=".$fasilFeedback.", rating_AksesJalan=".$AJFeedback.", total_rating=".$ratingFeedback." WHERE id_sewa=".$last_id;
  mysqli_query($conn,$query);
?>
