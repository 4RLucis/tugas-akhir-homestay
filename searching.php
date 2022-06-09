<?php
include 'connect.php';
//Harga
$result = mysqli_query($conn, "SELECT MIN(harga),MAX(harga),MIN(fasilitas),
          MAX(fasilitas),MIN(jarak),MAX(jarak),MIN(akses_jalan),
          MAX(akses_jalan),MIN(rating),MAX(rating) FROM homestay");
while ($row = mysqli_fetch_array($result)) {
  $minMurah = $row['MIN(harga)'];       $maxMahal   = $row['MAX(harga)'];
  $minDekat = $row['MIN(jarak)'];       $maxJauh    = $row['MAX(jarak)'];
  $minMinim = $row['MIN(fasilitas)'];   $maxLengkap = $row['MAX(fasilitas)'];
  $minSulit = $row['MIN(akses_jalan)']; $maxMudah   = $row['MAX(akses_jalan)'];
  $minRendah = $row['MIN(rating)'];     $maxTinggi  = $row['MAX(rating)'];
}
//harga
$midSedang  = ($minMurah+$maxMahal)/2;   $minSedang = $midSedang/4;
$maxSedang  = $midSedang+($midSedang/4); $maxMurah  = $midSedang*3/4;
$minMahal   = $maxMahal-($maxMahal/4);
//jarak
$midMiddle  = ($minDekat+$maxJauh)/2;    $maxMidlle  = ($midMiddle+$maxJauh)/2;
$minMiddle  = ($minDekat+$midMiddle)/2;  $maxDekat   = $midMiddle*3/4;
$minJauh    = $midMiddle+($midMiddle/4);
//fasilitas
$midStand   = ($minMinim+$maxLengkap)/2;  $minStand   = ($minMinim+$midStand)/2;
$maxStand   = ($midStand+$maxLengkap)/2;  $minLengkap = ($midStand+$maxStand)/2;
$MinimStand = $midStand*3/4;              $maxMinim = ($midStand+$MinimStand)/2;
//Akses_Jalan
$AJtengah = ($minSulit+$maxMudah)/2;
$minMudah = $AJtengah*3/4;                $maxSulit = $AJtengah+($AJtengah/4);
//rating
$midSdg     = ($minRendah+$maxTinggi)/2;  $minSdg     = ($minRendah+$midSdg)/2;
$maxSdg     = ($midSdg+$maxTinggi)/2;     $maxRendah  = $midSdg;
$minTinggi  = ($midSdg+$maxSdg)/2;

$lowHarga   = NULL; $highHarga  = NULL; $lowJarak   = NULL; $highJarak  = NULL;
$lowFasili  = NULL; $highFasili = NULL; $lowAkses   = NULL; $highAkses  = NULL;

$lowHarga=$_POST["low_price"];  $highHarga=$_POST["high_price"];
$lowJarak=$_POST["low_dist"];   $highJarak=$_POST["high_dist"];
$lowFasili=$_POST["low_facil"]; $highFasili=$_POST["high_facil"];
$lowAkses=$_POST["low_access"]; $highAkses=$_POST["high_access"];

if ($lowHarga == NULL) {
  $lowHarga = $minMurah;
}
if ($lowJarak == NULL) {
  $lowJarak = $minDekat;
}
if ($lowFasili == NULL) {
  $lowFasili = $minMinim;
}
if ($lowAkses == NULL) {
  $lowAkses = $minSulit;
}

$as = $lowHarga;
$li = $highHarga;

$temp = $lowHarga;
$lowHarga = $highHarga;
$highHarga = $temp;

//miuLowHarga
if ($lowHarga<=$minMurah) {
    $miu_min_Murah = 1;
} elseif ($minSedang<=$lowHarga && $lowHarga<=$maxMurah) {
    $miu_min_Murah = ($maxMurah-$lowHarga)/($maxMurah-$minMurah);
} else  {
    $miu_min_Murah = 0;
}
if ($lowHarga<=$minSedang || $lowHarga>=$maxSedang) {
    $miu_min_Sedang = 0;
} elseif ($minSedang<=$lowHarga && $lowHarga<=$midSedang) {
    $miu_min_Sedang = ($lowHarga-$minSedang)/($midSedang-$minSedang);
} else {
    $miu_min_Sedang = ($maxSedang-$lowHarga)/($maxSedang-$midSedang);
}
if ($lowHarga<=$minMahal) {
    $miu_min_Mahal = 0;
} elseif ($minMahal<=$lowHarga && $lowHarga<=$maxMahal) {
    $miu_min_Mahal = ($lowHarga-$minMahal)/($maxMahal-$minMahal);
} else {
    $miu_min_Mahal = 1;
}
//miuLowJarak
if ($lowJarak<=$minDekat) {
    $miu_min_Dekat = 1;
} elseif ($minDekat<=$lowJarak && $lowJarak<=$maxDekat) {
    $miu_min_Dekat = ($maxDekat-$lowJarak)/($maxDekat-$minDekat);
} else {
    $miu_min_Dekat = 0;
}
if ($lowJarak<=$minMiddle || $lowJarak>=$maxMidlle) {
    $miu_min_Middle = 0;
} elseif ($minMiddle<=$lowJarak && $lowJarak<=$midMiddle) {
    $miu_min_Middle = ($lowJarak-$minMiddle)/($midMiddle-$minMiddle);
} else {
    $miu_min_Middle = ($maxMidlle-$lowJarak)/($maxMidlle-$midMiddle);
}
if ($lowJarak<=$minJauh) {
    $miu_min_Jauh = 0;
} elseif ($minJauh<=$lowJarak && $lowJarak<=$maxJauh) {
    $miu_min_Jauh = ($lowJarak-$minJauh)/($maxJauh-$minJauh);
} else {
    $miu_min_Jauh = 1;  }
//miuLowFasilitas
if ($lowFasili<=$minMinim) {
    $miu_min_Minim = 1;
} elseif ($minMinim<=$lowFasili && $lowFasili<=$maxMinim) {
    $miu_min_Minim = ($maxMinim-$lowFasili)/($maxMinim-$minMinim);
} else {
    $miu_min_Minim = 0; }
if ($lowFasili<=$minStand || $lowFasili>=$maxStand) {
    $miu_min_Stand = 0;
} elseif ($minStand<=$lowFasili && $lowFasili<=$midStand) {
    $miu_min_Stand = ($lowFasili-$minStand)/($midStand-$minStand);
} else {
    $miu_min_Stand = ($maxStand-$lowFasili)/($maxStand-$midStand);  }
if ($lowFasili<=$minLengkap) {
    $miu_min_Lengkap = 0;
} elseif ($minLengkap<=$lowFasili && $lowFasili<=$maxLengkap) {
    $miu_min_Lengkap = ($lowFasili-$minLengkap)/($maxLengkap-$minLengkap);
} else {
    $miu_min_Lengkap = 1; }
//miuLowAkses
if ($lowAkses<=$minSulit) {
    $miu_min_Sulit = 1;
} elseif ($minSulit<=$lowAkses && $lowAkses<=$maxSulit) {
    $miu_min_Sulit = ($maxSulit-$lowAkses)/($maxSulit-$minSulit);
} else {
    $miu_min_Sulit = 0; }
if ($lowAkses<=$minMudah) {
    $miu_min_Mudah = 0;
} elseif ($minMudah<=$lowAkses && $lowAkses<=$maxMudah) {
    $miu_min_Mudah = ($lowAkses-$minMudah)/($maxMudah-$minMudah);
} else {
    $miu_min_Mudah = 1; }

//miuHighHarga
if ($highHarga<=$minMurah) {
    $miu_max_Murah = 1;
} elseif ($minSedang<=$highHarga && $highHarga<=$maxMurah) {
    $miu_max_Murah = ($maxMurah-$highHarga)/($maxMurah-$minMurah);
} else  {
    $miu_max_Murah = 0; }
if ($highHarga<=$minSedang || $highHarga>=$maxSedang) {
    $miu_max_Sedang = 0;
} elseif ($minSedang<=$highHarga && $highHarga<=$midSedang) {
    $miu_max_Sedang = ($highHarga-$minSedang)/($midSedang-$minSedang);
} else {
    $miu_max_Sedang = ($maxSedang-$highHarga)/($maxSedang-$midSedang);  }
if ($highHarga<=$minMahal) {
    $miu_max_Mahal = 0;
} elseif ($minMahal<=$highHarga && $highHarga<=$maxMahal) {
    $miu_max_Mahal = ($highHarga-$minMahal)/($maxMahal-$minMahal);
} else {
    $miu_max_Mahal = 1; }
//miuHighJarak
if ($highJarak<=$minDekat) {
    $miu_max_Dekat = 1;
} elseif ($minDekat<=$highJarak && $highJarak<=$maxDekat) {
    $miu_max_Dekat = ($maxDekat-$highJarak)/($maxDekat-$minDekat);
} else {
    $miu_max_Dekat = 0; }
if ($highJarak<=$minMiddle || $highJarak>=$maxMidlle) {
    $miu_max_Middle = 0;
} elseif ($minMiddle<=$highJarak && $highJarak<=$midMiddle) {
    $miu_max_Middle = ($highJarak-$minMiddle)/($midMiddle-$minMiddle);
} else {
    $miu_max_Middle = ($maxMidlle-$highJarak)/($maxMidlle-$midMiddle);  }
if ($highJarak<=$minJauh) {
    $miu_max_Jauh = 0;
} elseif ($minJauh<=$highJarak && $highJarak<=$maxJauh) {
    $miu_max_Jauh = ($highJarak-$minJauh)/($maxJauh-$minJauh);
} else {
    $miu_max_Jauh = 1;  }
//miuHighFasilitas
if ($highFasili<=$minMinim) {
    $miu_max_Minim = 1;
} elseif ($minMinim<=$highFasili && $highFasili<=$maxMinim) {
    $miu_max_Minim = ($maxMinim-$highFasili)/($maxMinim-$minMinim);
} else {
    $miu_max_Minim = 0; }
if ($highFasili<=$minStand || $highFasili>=$maxStand) {
    $miu_max_Stand = 0;
} elseif ($minStand<=$highFasili && $highFasili<=$midStand) {
    $miu_max_Stand = ($highFasili-$minStand)/($midStand-$minStand);
} else {
    $miu_max_Stand = ($maxStand-$highFasili)/($maxStand-$midStand); }
if ($highFasili<=$minLengkap) {
    $miu_max_Lengkap = 0;
} elseif ($minLengkap<=$highFasili && $highFasili<=$maxLengkap) {
    $miu_max_Lengkap = ($highFasili-$minLengkap)/($maxLengkap-$minLengkap);
} else {
    $miu_max_Lengkap = 1; }
//miuHighAkses
if ($highAkses<=$minSulit) {
    $miu_max_Sulit = 1;
} elseif ($minSulit<=$highAkses && $highAkses<=$maxSulit) {
    $miu_max_Sulit = ($maxSulit-$highAkses)/($maxSulit-$minSulit);
} else {
    $miu_max_Sulit = 0; }
if ($highAkses<=$minMudah) {
    $miu_max_Mudah = 0;
} elseif ($minMudah<=$highAkses && $highAkses<=$maxMudah) {
    $miu_max_Mudah = ($highAkses-$minMudah)/($maxMudah-$minMudah);
} else {
    $miu_max_Mudah = 1; }

//Implikasi bawah
$low[0]  = min($miu_min_Murah,$miu_min_Dekat,$miu_min_Lengkap,$miu_min_Mudah);
$low[1]  = min($miu_min_Murah,$miu_min_Dekat,$miu_min_Lengkap,$miu_min_Sulit);
$low[2]  = min($miu_min_Murah,$miu_min_Dekat,$miu_min_Stand,$miu_min_Mudah);
$low[3]  = min($miu_min_Murah,$miu_min_Dekat,$miu_min_Stand,$miu_min_Sulit);
$low[4]  = min($miu_min_Murah,$miu_min_Dekat,$miu_min_Minim,$miu_min_Mudah);
$low[5]  = min($miu_min_Murah,$miu_min_Dekat,$miu_min_Minim,$miu_min_Sulit);
$low[6]  = min($miu_min_Murah,$miu_min_Middle,$miu_min_Lengkap,$miu_min_Mudah);
$low[7]  = min($miu_min_Murah,$miu_min_Middle,$miu_min_Lengkap,$miu_min_Sulit);
$low[8]  = min($miu_min_Murah,$miu_min_Middle,$miu_min_Stand,$miu_min_Mudah);
$low[9]  = min($miu_min_Murah,$miu_min_Middle,$miu_min_Stand,$miu_min_Sulit);
$low[10] = min($miu_min_Murah,$miu_min_Middle,$miu_min_Minim,$miu_min_Mudah);
$low[11] = min($miu_min_Murah,$miu_min_Middle,$miu_min_Minim,$miu_min_Sulit);
$low[12] = min($miu_min_Murah,$miu_min_Jauh,$miu_min_Lengkap,$miu_min_Mudah);
$low[13] = min($miu_min_Murah,$miu_min_Jauh,$miu_min_Lengkap,$miu_min_Sulit);
$low[14] = min($miu_min_Murah,$miu_min_Jauh,$miu_min_Stand,$miu_min_Mudah);
$low[15] = min($miu_min_Murah,$miu_min_Jauh,$miu_min_Stand,$miu_min_Sulit);
$low[16] = min($miu_min_Murah,$miu_min_Jauh,$miu_min_Minim,$miu_min_Mudah);
$low[17] = min($miu_min_Murah,$miu_min_Jauh,$miu_min_Minim,$miu_min_Sulit);
$low[18] = min($miu_min_Sedang,$miu_min_Dekat,$miu_min_Lengkap,$miu_min_Mudah);
$low[19] = min($miu_min_Sedang,$miu_min_Dekat,$miu_min_Lengkap,$miu_min_Sulit);
$low[20] = min($miu_min_Sedang,$miu_min_Dekat,$miu_min_Stand,$miu_min_Mudah);
$low[21] = min($miu_min_Sedang,$miu_min_Dekat,$miu_min_Stand,$miu_min_Sulit);
$low[22] = min($miu_min_Sedang,$miu_min_Dekat,$miu_min_Minim,$miu_min_Mudah);
$low[23] = min($miu_min_Sedang,$miu_min_Dekat,$miu_min_Minim,$miu_min_Sulit);
$low[24] = min($miu_min_Sedang,$miu_min_Middle,$miu_min_Lengkap,$miu_min_Mudah);
$low[25] = min($miu_min_Sedang,$miu_min_Middle,$miu_min_Lengkap,$miu_min_Sulit);
$low[26] = min($miu_min_Sedang,$miu_min_Middle,$miu_min_Stand,$miu_min_Mudah);
$low[27] = min($miu_min_Sedang,$miu_min_Middle,$miu_min_Stand,$miu_min_Sulit);
$low[28] = min($miu_min_Sedang,$miu_min_Middle,$miu_min_Minim,$miu_min_Mudah);
$low[29] = min($miu_min_Sedang,$miu_min_Middle,$miu_min_Minim,$miu_min_Sulit);
$low[30] = min($miu_min_Sedang,$miu_min_Jauh,$miu_min_Lengkap,$miu_min_Mudah);
$low[31] = min($miu_min_Sedang,$miu_min_Jauh,$miu_min_Lengkap,$miu_min_Sulit);
$low[32] = min($miu_min_Sedang,$miu_min_Jauh,$miu_min_Stand,$miu_min_Mudah);
$low[33] = min($miu_min_Sedang,$miu_min_Jauh,$miu_min_Stand,$miu_min_Sulit);
$low[34] = min($miu_min_Sedang,$miu_min_Jauh,$miu_min_Minim,$miu_min_Mudah);
$low[35] = min($miu_min_Sedang,$miu_min_Jauh,$miu_min_Minim,$miu_min_Sulit);
$low[36] = min($miu_min_Mahal,$miu_min_Dekat,$miu_min_Lengkap,$miu_min_Mudah);
$low[37] = min($miu_min_Mahal,$miu_min_Dekat,$miu_min_Lengkap,$miu_min_Sulit);
$low[38] = min($miu_min_Mahal,$miu_min_Dekat,$miu_min_Stand,$miu_min_Mudah);
$low[39] = min($miu_min_Mahal,$miu_min_Dekat,$miu_min_Stand,$miu_min_Sulit);
$low[40] = min($miu_min_Mahal,$miu_min_Dekat,$miu_min_Minim,$miu_min_Mudah);
$low[41] = min($miu_min_Mahal,$miu_min_Dekat,$miu_min_Minim,$miu_min_Sulit);
$low[42] = min($miu_min_Mahal,$miu_min_Middle,$miu_min_Lengkap,$miu_min_Mudah);
$low[43] = min($miu_min_Mahal,$miu_min_Middle,$miu_min_Lengkap,$miu_min_Sulit);
$low[44] = min($miu_min_Mahal,$miu_min_Middle,$miu_min_Stand,$miu_min_Mudah);
$low[45] = min($miu_min_Mahal,$miu_min_Middle,$miu_min_Stand,$miu_min_Sulit);
$low[46] = min($miu_min_Mahal,$miu_min_Middle,$miu_min_Minim,$miu_min_Mudah);
$low[47] = min($miu_min_Mahal,$miu_min_Middle,$miu_min_Minim,$miu_min_Sulit);
$low[48] = min($miu_min_Mahal,$miu_min_Jauh,$miu_min_Lengkap,$miu_min_Mudah);
$low[49] = min($miu_min_Mahal,$miu_min_Jauh,$miu_min_Lengkap,$miu_min_Sulit);
$low[50] = min($miu_min_Mahal,$miu_min_Jauh,$miu_min_Stand,$miu_min_Mudah);
$low[51] = min($miu_min_Mahal,$miu_min_Jauh,$miu_min_Stand,$miu_min_Sulit);
$low[52] = min($miu_min_Mahal,$miu_min_Jauh,$miu_min_Minim,$miu_min_Mudah);
$low[53] = min($miu_min_Mahal,$miu_min_Jauh,$miu_min_Minim,$miu_min_Sulit);

//Implikasi atas
$high[0]  = min($miu_max_Murah,$miu_max_Dekat,$miu_max_Lengkap,$miu_max_Mudah);
$high[1]  = min($miu_max_Murah,$miu_max_Dekat,$miu_max_Lengkap,$miu_max_Sulit);
$high[2]  = min($miu_max_Murah,$miu_max_Dekat,$miu_max_Stand,$miu_max_Mudah);
$high[3]  = min($miu_max_Murah,$miu_max_Dekat,$miu_max_Stand,$miu_max_Sulit);
$high[4]  = min($miu_max_Murah,$miu_max_Dekat,$miu_max_Minim,$miu_max_Mudah);
$high[5]  = min($miu_max_Murah,$miu_max_Dekat,$miu_max_Minim,$miu_max_Sulit);
$high[6]  = min($miu_max_Murah,$miu_max_Middle,$miu_max_Lengkap,$miu_max_Mudah);
$high[7]  = min($miu_max_Murah,$miu_max_Middle,$miu_max_Lengkap,$miu_max_Sulit);
$high[8]  = min($miu_max_Murah,$miu_max_Middle,$miu_max_Stand,$miu_max_Mudah);
$high[9]  = min($miu_max_Murah,$miu_max_Middle,$miu_max_Stand,$miu_max_Sulit);
$high[10] = min($miu_max_Murah,$miu_max_Middle,$miu_max_Minim,$miu_max_Mudah);
$high[11] = min($miu_max_Murah,$miu_max_Middle,$miu_max_Minim,$miu_max_Sulit);
$high[12] = min($miu_max_Murah,$miu_max_Jauh,$miu_max_Lengkap,$miu_max_Mudah);
$high[13] = min($miu_max_Murah,$miu_max_Jauh,$miu_max_Lengkap,$miu_max_Sulit);
$high[14] = min($miu_max_Murah,$miu_max_Jauh,$miu_max_Stand,$miu_max_Mudah);
$high[15] = min($miu_max_Murah,$miu_max_Jauh,$miu_max_Stand,$miu_max_Sulit);
$high[16] = min($miu_max_Murah,$miu_max_Jauh,$miu_max_Minim,$miu_max_Mudah);
$high[17] = min($miu_max_Murah,$miu_max_Jauh,$miu_max_Minim,$miu_max_Sulit);
$high[18] = min($miu_max_Sedang,$miu_max_Dekat,$miu_max_Lengkap,$miu_max_Mudah);
$high[19] = min($miu_max_Sedang,$miu_max_Dekat,$miu_max_Lengkap,$miu_max_Sulit);
$high[20] = min($miu_max_Sedang,$miu_max_Dekat,$miu_max_Stand,$miu_max_Mudah);
$high[21] = min($miu_max_Sedang,$miu_max_Dekat,$miu_max_Stand,$miu_max_Sulit);
$high[22] = min($miu_max_Sedang,$miu_max_Dekat,$miu_max_Minim,$miu_max_Mudah);
$high[23] = min($miu_max_Sedang,$miu_max_Dekat,$miu_max_Minim,$miu_max_Sulit);
$high[24] = min($miu_max_Sedang,$miu_max_Middle,$miu_max_Lengkap,$miu_max_Mudah);
$high[25] = min($miu_max_Sedang,$miu_max_Middle,$miu_max_Lengkap,$miu_max_Sulit);
$high[26] = min($miu_max_Sedang,$miu_max_Middle,$miu_max_Stand,$miu_max_Mudah);
$high[27] = min($miu_max_Sedang,$miu_max_Middle,$miu_max_Stand,$miu_max_Sulit);
$high[28] = min($miu_max_Sedang,$miu_max_Middle,$miu_max_Minim,$miu_max_Mudah);
$high[29] = min($miu_max_Sedang,$miu_max_Middle,$miu_max_Minim,$miu_max_Sulit);
$high[30] = min($miu_max_Sedang,$miu_max_Jauh,$miu_max_Lengkap,$miu_max_Mudah);
$high[31] = min($miu_max_Sedang,$miu_max_Jauh,$miu_max_Lengkap,$miu_max_Sulit);
$high[32] = min($miu_max_Sedang,$miu_max_Jauh,$miu_max_Stand,$miu_max_Mudah);
$high[33] = min($miu_max_Sedang,$miu_max_Jauh,$miu_max_Stand,$miu_max_Sulit);
$high[34] = min($miu_max_Sedang,$miu_max_Jauh,$miu_max_Minim,$miu_max_Mudah);
$high[35] = min($miu_max_Sedang,$miu_max_Jauh,$miu_max_Minim,$miu_max_Sulit);
$high[36] = min($miu_max_Mahal,$miu_max_Dekat,$miu_max_Lengkap,$miu_max_Mudah);
$high[37] = min($miu_max_Mahal,$miu_max_Dekat,$miu_max_Lengkap,$miu_max_Sulit);
$high[38] = min($miu_max_Mahal,$miu_max_Dekat,$miu_max_Stand,$miu_max_Mudah);
$high[39] = min($miu_max_Mahal,$miu_max_Dekat,$miu_max_Stand,$miu_max_Sulit);
$high[40] = min($miu_max_Mahal,$miu_max_Dekat,$miu_max_Minim,$miu_max_Mudah);
$high[41] = min($miu_max_Mahal,$miu_max_Dekat,$miu_max_Minim,$miu_max_Sulit);
$high[42] = min($miu_max_Mahal,$miu_max_Middle,$miu_max_Lengkap,$miu_max_Mudah);
$high[43] = min($miu_max_Mahal,$miu_max_Middle,$miu_max_Lengkap,$miu_max_Sulit);
$high[44] = min($miu_max_Mahal,$miu_max_Middle,$miu_max_Stand,$miu_max_Mudah);
$high[45] = min($miu_max_Mahal,$miu_max_Middle,$miu_max_Stand,$miu_max_Sulit);
$high[46] = min($miu_max_Mahal,$miu_max_Middle,$miu_max_Minim,$miu_max_Mudah);
$high[47] = min($miu_max_Mahal,$miu_max_Middle,$miu_max_Minim,$miu_max_Sulit);
$high[48] = min($miu_max_Mahal,$miu_max_Jauh,$miu_max_Lengkap,$miu_max_Mudah);
$high[49] = min($miu_max_Mahal,$miu_max_Jauh,$miu_max_Lengkap,$miu_max_Sulit);
$high[50] = min($miu_max_Mahal,$miu_max_Jauh,$miu_max_Stand,$miu_max_Mudah);
$high[51] = min($miu_max_Mahal,$miu_max_Jauh,$miu_max_Stand,$miu_max_Sulit);
$high[52] = min($miu_max_Mahal,$miu_max_Jauh,$miu_max_Minim,$miu_max_Mudah);
$high[53] = min($miu_max_Mahal,$miu_max_Jauh,$miu_max_Minim,$miu_max_Sulit);

//Min_Aggregation
$min_low_Aggre  = max($low[17],$low[35],$low[41],$low[45],$low[52],$low[53]);
$min_mid_Aggre  = max($low[5],$low[10],$low[11],$low[15],$low[16],$low[21],
                  $low[22],$low[23],$low[27],$low[28],$low[29],$low[31],
                  $low[33],$low[34],$low[37],$low[39],$low[40],$low[42],
                  $low[43],$low[44],$low[46],$low[47],$low[48],$low[51]);
$min_high_Aggre = max($low[0],$low[1],$low[2],$low[3],$low[4],$low[6],$low[7],
                  $low[8],$low[9],$low[12],$low[13],$low[14],$low[18],$low[19],
                  $low[20],$low[24],$low[25],$low[26],$low[30],$low[32],
                  $low[36],$low[38],$low[49],$low[50]);
//Max_Aggregation
$max_low_Aggre  = max($high[17],$high[35],$high[41],$high[45],$high[52],
                  $high[53]);
$max_mid_Aggre  = max($high[5],$high[10],$high[11],$high[15],$high[16],
                  $high[21],$high[22],$high[23],$high[27],$high[28],$high[29],
                  $high[31],$high[33],$high[34],$high[37],$high[39],$high[40],
                  $high[42],$high[43],$high[44],$high[46],$high[47],$high[48],
                  $high[51]);
$max_high_Aggre = max($high[0],$high[1],$high[2],$high[3],$high[4],$high[6],
                  $high[7],$high[8],$high[9],$high[12],$high[13],$high[14],
                  $high[18],$high[19],$high[20],$high[24],$high[25],$high[26],
                  $high[30],$high[32],$high[36],$high[38],$high[49],$high[50]);

//Titik Potong Bawah
//Titik Potong Rating Rendah-Sedang
if ($min_low_Aggre >= $min_mid_Aggre) {
  $BawahRendahSedang1 = $maxRendah-($min_low_Aggre*($maxRendah-$minRendah));
  $BawahRendahSedang2 = $maxRendah-($min_mid_Aggre*($maxRendah-$minRendah));
} else {
  $BawahRendahSedang1 = ($min_low_Aggre*($midSdg-$minSdg))+$minSdg;
  $BawahRendahSedang2 = ($min_mid_Aggre*($midSdg-$minSdg))+$minSdg;  }
//Titik Potong Rating Sedang-Tinggi
if ($min_mid_Aggre >= $min_high_Aggre) {
  $BawahSedangTinggi1 = $maxSdg-($min_mid_Aggre*($maxSdg-$midSdg));
  $BawahSedangTinggi2 = $maxSdg-($min_high_Aggre*($maxSdg-$midSdg));
} else {
  $BawahSedangTinggi1 = ($min_mid_Aggre*($maxTinggi-$minTinggi))+$minTinggi;
  $BawahSedangTinggi2 = ($min_high_Aggre*($maxTinggi-$minTinggi))+$minTinggi;  }
$BawahRendah  = $min_low_Aggre;
$BawahSedang  = $min_mid_Aggre;
$BawahTinggi  = $min_high_Aggre;
//Titik Potong Atas
//Titik Potong Rating Rendah-Sedang
if ($max_low_Aggre > $max_mid_Aggre) {
  $AtasRendahSedang1 = $maxRendah-($max_low_Aggre*($maxRendah-$minRendah));
  $AtasRendahSedang2 = $maxRendah-($max_mid_Aggre*($maxRendah-$minRendah));
} else {
  $AtasRendahSedang1 = ($max_low_Aggre*($midSdg-$minSdg))+$minSdg;
  $AtasRendahSedang2 = ($max_mid_Aggre*($midSdg-$minSdg))+$minSdg;  }
//Titik Potong Rating Sedang-Tinggi
if ($max_mid_Aggre > $max_high_Aggre) {
  $AtasSedangTinggi1  = $maxSdg-($max_mid_Aggre*($maxSdg-$midSdg));
  $AtasSedangTinggi2  = $maxSdg-($max_high_Aggre*($maxSdg-$midSdg));
} else {
  $AtasSedangTinggi1  = ($max_mid_Aggre*($maxTinggi-$minTinggi))+$minTinggi;
  $AtasSedangTinggi2  = ($max_high_Aggre*($maxTinggi-$minTinggi))+$minTinggi; }
$AtasRendah = $max_low_Aggre;
$AtasSedang = $max_mid_Aggre;
$AtasTinggi = $max_high_Aggre;

//Menghitung Luas
//Luas Bawah
$totalLuasBawah = 0;
$luasBawah[0] = ($BawahRendahSedang1-$minRendah)*$BawahRendah;
$luasBawah[1] = (($BawahSedang+$BawahRendah)*($BawahRendahSedang2-$BawahRendahSedang1))/2;
$luasBawah[2] = ($BawahSedangTinggi1-$BawahRendahSedang2)*$BawahSedang;
$luasBawah[3] = (($BawahTinggi+$BawahSedang)*($BawahSedangTinggi2-$BawahSedangTinggi1))/2;
$luasBawah[4] = ($maxTinggi-$BawahSedangTinggi2)*$BawahTinggi;
for ($k=0; $k < 5; $k++) { $totalLuasBawah = $totalLuasBawah + $luasBawah[$k]; }
//Luas Atas
$totalLuasAtas  = 0;
$luasAtas[0] = ($AtasRendahSedang1-$minRendah)*$AtasRendah;
$luasAtas[1] = (($AtasSedang+$AtasRendah)*($AtasRendahSedang2-$AtasRendahSedang1))/2;
$luasAtas[2] = ($AtasSedangTinggi1-$AtasRendahSedang2)*$AtasSedang;
$luasAtas[3] = (($AtasTinggi+$AtasSedang)*($AtasSedangTinggi2-$AtasSedangTinggi1))/2;
$luasAtas[4] = ($maxTinggi-$AtasSedangTinggi2)*$AtasTinggi;
for ($y=0; $y < 5; $y++) { $totalLuasAtas = $totalLuasAtas + $luasAtas[$y];  }
//Menghitung Moment
//Moment Bawah
$total_M_bawah = 0;
$M_bawah[0] = (($BawahRendah/2)*($BawahRendahSedang1**2))-(($BawahRendah/2)*($minRendah)**2);
if ($min_low_Aggre >= $min_mid_Aggre) {
  $M_bawah[1] = ((($BawahRendahSedang2**2)/2)-((0.4*($BawahRendahSedang2**3))/3))-((($BawahRendahSedang1**2)/2)-((0.4*($BawahRendahSedang1**3))/3));
} elseif ($min_low_Aggre <= $min_mid_Aggre) {
  $M_bawah[1] = ((($BawahRendahSedang2**3)/3)-((1.5*($BawahRendahSedang2**2))/2))-((($BawahRendahSedang1**3)/3)-((1.5*($BawahRendahSedang1**2))/2));  }
$M_bawah[2] = (($BawahSedang/2)*($BawahSedangTinggi1**2))-(($BawahSedang/2)*($BawahRendahSedang2**2));
if ($min_mid_Aggre >= $min_high_Aggre) {
  $M_bawah[3] = (((3*($BawahSedangTinggi2**2))/2)-((0.8*($BawahSedangTinggi2**3))/3))-(((3*($BawahSedangTinggi1**2))/2)-((0.8*($BawahSedangTinggi1**3))/3));
} elseif ($min_mid_Aggre <= $min_high_Aggre) {
  $M_bawah[3] = (((0.5*($BawahSedangTinggi2**3))/3)-((1.5*($BawahSedangTinggi2**2))/2))-(((0.5*($BawahSedangTinggi1**3))/3)-((1.5*($BawahSedangTinggi1**2))/2));  }
$M_bawah[4] = (($BawahTinggi/2)*($maxTinggi)**2)-(($BawahTinggi/2)*($BawahSedangTinggi2**2));
for ($i=0; $i < 5; $i++) {
  $total_M_bawah  = $total_M_bawah + $M_bawah[$i];  }
//Moment Atas
$total_M_atas = 0;
$M_atas[0] = (($AtasRendah/2)*($AtasRendahSedang1**2))-(($AtasRendah/2)*($minRendah)**2);
if ($max_low_Aggre >= $max_mid_Aggre) {
  $M_atas[1] = ((($AtasRendahSedang2**2)/2)-((0.4*($AtasRendahSedang2**3))/3))-((($AtasRendahSedang1**2)/2)-((0.4*($AtasRendahSedang1**3))/3));
} elseif ($max_low_Aggre <= $max_mid_Aggre) {
  $M_atas[1] = ((($AtasRendahSedang2**3)/3)-((1.5*($AtasRendahSedang2**2))/2))-((($AtasRendahSedang1**3)/3)-((1.5*($AtasRendahSedang1**2))/2));
}
$M_atas[2] = (($AtasSedang/2)*($AtasSedangTinggi1**2))-(($AtasSedang/2)*($AtasRendahSedang2**2));
if ($max_mid_Aggre >= $max_high_Aggre) {
  $M_atas[3] = (((3*($AtasSedangTinggi2**2))/2)-((0.8*($AtasSedangTinggi2**3))/3))-(((3*($AtasSedangTinggi1**2))/2)-((0.8*($AtasSedangTinggi1**3))/3));
} elseif ($max_mid_Aggre <= $max_high_Aggre) {
  $M_atas[3] = (((0.5*($AtasSedangTinggi2**3))/3)-((1.5*($AtasSedangTinggi2**2))/2))-(((0.5*($AtasSedangTinggi1**3))/3)-((1.5*($AtasSedangTinggi1**2))/2));
}
$M_atas[4] = (($AtasTinggi/2)*($maxTinggi)**2)-(($AtasTinggi/2)*($AtasSedangTinggi2**2));
for ($i=0; $i < 5; $i++) {  $total_M_atas = $total_M_atas + $M_atas[$i];  }

$HasilBawah = ($total_M_bawah/$totalLuasBawah)*2;
$HasilAtas  = ($total_M_atas/$totalLuasAtas)*2;
?>
