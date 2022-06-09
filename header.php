<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<!-- Favicons -->
<link href="img/favicon.png" rel="icon">
<link href="img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Main Stylesheet File -->
<link href="css/style.css" rel="stylesheet">
<style>
  html{
    scroll-behavior: smooth;  }
  .section-t8, .property-single, .news-single {
    padding-bottom: 3rem; }
  a.reply:hover { color: #2eca6a;}
  .section-t8 {
    padding-top: 2rem;
    padding-bottom: 0rem;
  }
  .tombol {
    background: #2eca6a;
    color: #000;
    cursor: pointer;
    padding: 12px;
    font-size: 16px; }
  .tombol:hover {
    background: #000;
    color: #fff;  }
  .link-a {
    background-color: transparent;
    border: 0;
    cursor: pointer;  }
  .test {
    background-color: transparent;
    border: 0;
    font-size: 2rem;
    font-weight: 600;
    cursor: pointer;
  }
  .test:hover{
    text-decoration: underline;
  }
  .link-a:hover{
    text-decoration: underline; }
  .hover{
    background-color: transparent;
    cursor: pointer;  }
  .hover:hover{
    color: white;
    text-decoration: underline; }
  .required {
    color: red;
    padding-left: 5px;  }
  .form-popup{
    display: none;
    position: absolute;
    top: -120px;
    left: 50px;
    border: 3px solid #f1f1f1;
    z-index: 9;  }
  .form-container{
    max-width: 280px;
    padding: 10px;
    background-color: white;  }
  .form-container input[type=text], .form-container input[type=number] {
    width: 100%;
    padding: 15px;
    margin: 0px 0 5px 0;
    border: none;
    background: #f1f1f1;  }
  .form-container .btn, .col-md-6 .tekan{
    letter-spacing: .05rem;
    background-color: #2eca6a;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 75%;
    margin-top: 5px;
    margin-bottom: 10px;
    opacity: 0.8;  }
  .form-container .cancel, .col-md-6 .cancel{
    background-color: red;  }
  .form-container .btn:hover, .col-md-6 .tekan{
    opacity: 1; }
  /* Chrome, Safari, Edge, Opera */
  .form-container input::-webkit-outer-spin-button,
  .form-container input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0; }
  /* Firefox */
  .form-container input[type=number] {
    -moz-appearance: textfield; }
  /* Chrome, Safari, Edge, Opera */
  .input input::-webkit-outer-spin-button,
  .input input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0; }
  /* Firefox */
  .input input[type=number] {
    -moz-appearance: textfield; }
  .new-price .btn {
    letter-spacing: .05rem;
    background-color: #2eca6a;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 75%;
    margin-top: 5px;
    margin-bottom: 10px;
    opacity: 0.8;
    display: ;
  }
  .new-price .cancel {
    background-color: red;
  }
  .new-price .btn:hover .cancel:hover {
    opacity: 1;
  }
  .new-price input::-webkit-outer-spin-button,
  .new-price input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    margin-left: -40px;
    font-weight: 600;
    font-size: 2.5rem;}
  /* Firefox */
  .new-price input[type=number] {
    -moz-appearance: textfield; }
  .gbr-home{
    height: 467px;
    object-fit: cover;  }
  .index-gbr{
    object-fit: cover;  }
  .property-single-gbr{
    max-height: 555px;
    object-fit: cover;  }
</style>

<!-- =======================================================
  Theme Name: EstateAgency
  Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  Author: BootstrapMade.com
  License: https://bootstrapmade.com/license/
======================================================= -->
</head>

<body>
<?php include 'connect.php';
$result = mysqli_query($conn, "SELECT MIN(harga),MAX(harga),MIN(fasilitas),
          MAX(fasilitas),MIN(jarak),MAX(jarak),MIN(akses_jalan),
          MAX(akses_jalan) FROM homestay");
while ($row = mysqli_fetch_array($result)) {
?>
<div class="click-closed"></div>
<!--/ Form Search Start /-->
<div class="box-collapse">
  <div class="title-box-d">
    <h3 class="title-d">Search Homestay</h3>
  </div>
  <span class="close-box-collapse right-boxed ion-ios-close"></span>
  <div class="box-collapse-wrap form">
    <form class="form-a input" action="property-grid.php" method="post">
      <span class="required">* Required</span>
      <div class="row">
        <div class="col-md-12 mb-2">

        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="low_price">Min Price (Rp)</label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="min <?php echo $row['MIN(harga)']; ?>" name="low_price" min="<?php echo $row['MIN(harga)'] ?>" max="<?php echo $row['MAX(harga)']; ?>">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="high_price">Max Price (Rp)<span class="required">*</span></label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="max <?php echo $row['MAX(harga)']; ?>" name="high_price" required min="<?php echo $row['MIN(harga)'] ?>" max="<?php echo $row['MAX(harga)']; ?>">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="low_dist">Min Distance (Homestay-Prambanan Temple (Km))</label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="min <?php echo $row['MIN(jarak)']; ?>" name="low_dist" step="0.1" min="<?php echo $row['MIN(jarak)']; ?>" max="<?php echo $row['MAX(jarak)']; ?>">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="high_dist">Max Distance (Homestay-Prambanan Temple (Km))<span class="required">*</span></label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="max <?php echo $row['MAX(jarak)']; ?>" name="high_dist" required step="0.1" min="<?php echo $row['MIN(jarak)']; ?>" max="<?php echo $row['MAX(jarak)']; ?>">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="low_facil">Min Facility Rating</label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="min <?php echo $row['MIN(fasilitas)']; ?>" name="low_facil" step="0.1" min="<?= $row['MIN(fasilitas)'];?>" max="<?= $row['MAX(fasilitas)'];?>">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="high_facil">Max Facility Rating<span class="required">*</span></label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="max <?php echo $row['MAX(fasilitas)']; ?>" name="high_facil" required step="0.1" min="<?= $row['MIN(fasilitas)'];?>" max="<?= $row['MAX(fasilitas)'];?>">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="low_access">Min Access Road Rating</label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="min <?php echo $row['MIN(akses_jalan)']; ?>" name="low_access" step="0.1" min="<?= $row['MIN(akses_jalan)']?>">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="high_access">Max Access Road Rating<span class="required">*</span></label>
            <input type="number" class="form-control form-control-lg form-control-a" placeholder="max <?php echo $row['MAX(akses_jalan)']; ?>" name="high_access" required step="0.1">
          </div>
        </div>
        <div class="col-md-12">
          <center>
            <button type="submit" class="btn btn-b">Search Homestay</button>
          </center>
        </div>
      </div>
    </form>
  </div>
</div>
<!--/ Form Search End /-->
<?php } ?>

<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
  <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
      aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <a class="navbar-brand text-brand" href="index.php">Home<span class="color-b">Stay</span></a>
    <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
      data-target="#navbarTogglerDemo01" aria-expanded="false">
      <span class="fa fa-search" aria-hidden="true"></span>
    </button>
