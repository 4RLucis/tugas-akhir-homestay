<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homestay Agency | Homestays</title>
  <?php include 'header.php'; include 'connect.php';  ?>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="property-grid.php">Homestay</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="blog-grid.php">Blog Grid</a>
              <a class="dropdown-item" href="blog-single.php">Blog Single</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Agents
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="agents-grid.php">Agents Grid</a>
              <a class="dropdown-item" href="agent-single.php">Agent Single</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-b tombol" href="#Owner" id="toRegister">Owner?</a>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <?php if (!isset($_POST['high_price']) && !isset($_POST['high_dist']) && !isset($_POST['high_facil']) && !isset($_POST['high_access'])): ?>
              <h1 class="title-single">Our Amazing Homestays</h1>
            <?php else: ?>
              <h1 class="title-single">Your Homestays Search Results</h1>
            <?php endif; ?>
            <span class="color-text-a">Grid Homestays </span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Homestays Grid
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Homestay Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select class="custom-select">
                <option selected>All</option>
                <option value="1">New to Old</option>
                <option value="2">For Rent</option>
                <option value="3">For Sale</option>
              </select>
            </form>
          </div>
        </div>
        <?php
        $result_per_page = 6;

        $query    = "SELECT * FROM homestay";
        $result   = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);

        $number_of_page   = ceil($number_of_result/$result_per_page);

        if (isset($_GET["page"])) {
          $page = $_GET["page"];
        } else {
          $page = 1;
        }
        $previous = $page-1;
        $next     = $page+1;

        $page_first_result  = ($page-1)*$result_per_page;

        if (!isset($_POST['high_price']) && !isset($_POST['high_dist']) && !isset($_POST['high_facil']) && !isset($_POST['high_access'])) {
          $query  = "SELECT t1.id_homestay, t1.nama_homestay, t1.harga,
                  t2.id_homestay, t2.kamar_tidur, t2.tempat_tidur,
                  t2.kamar_mandi, t2.tempat_parkir, t3.gbr_dpn  FROM
                  ((homestay t1 INNER JOIN fasilitas t2
                  ON t1.id_homestay = t2.id_homestay) INNER JOIN lokasi t3
                  ON t1.id_homestay=t3.id_homestay)
                  LIMIT ".$page_first_result.','.$result_per_page;

          $data_home = mysqli_query($conn,$query);
        } else {
          include 'searching.php';
          $query  = "SELECT t1.id_homestay, t1.nama_homestay, t1.harga,
                  t2.id_homestay, t2.kamar_tidur, t2.tempat_tidur,
                  t2.kamar_mandi, t2.tempat_parkir, t3.gbr_dpn FROM
                  ((homestay t1 INNER JOIN fasilitas t2
                  ON t1.id_homestay = t2.id_homestay) INNER JOIN lokasi t3
                  ON t1.id_homestay=t3.id_homestay) WHERE t1.rating
                  BETWEEN ".$HasilBawah." AND ".$HasilAtas.
                  " LIMIT ".$page_first_result.",".$result_per_page;
          $data_home = mysqli_query($conn,$query);
          $number_of_result = mysqli_num_rows($data_home);
          $number_of_page   = ceil($number_of_result/$result_per_page);
        }
        while ($row = mysqli_fetch_array($data_home,MYSQLI_ASSOC)) {
        ?>
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="<?= $row['gbr_dpn'] ?>" alt="" class="img-a img-fluid gbr-home">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a"><?= $row["nama_homestay"]; ?></h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | Rp <?= $row["harga"]; ?></span>
                  </div>
                  <form action="property-single.php" method="post">
                    <input type="hidden" name="id_homestay" value="<?= $row["id_homestay"]; ?>">
                    <input type="submit" value="Click here to view" class="link-a">
                    <span class="ion-ios-arrow-forward link-a"></span>
                  </form>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Bedrooms</h4>
                      <span><?= $row["kamar_tidur"]; ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span><?= $row["tempat_tidur"]; ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span><?= $row["kamar_mandi"] ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span><?php if ($row["tempat_parkir"]==1) {
                        echo "Yes";
                      } else {
                        echo "No";
                      }
                       ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <?php if ($page==1): ?>
              <li class="page-item disabled">
              <?php else: ?>
              <li class="page-item">
              <?php endif; ?>
                <a class="page-link" href="<?php if ($page>1) { echo "property-grid.php?page=".$previous;} ?>">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <?php
              for ($x=1; $x <=$number_of_page ; $x++) {
              ?>
              <?php if ($x==$page): ?>
              <li class="page-item active">
              <?php else: ?>
              <li class="page-item">
              <?php endif; ?>
                <a class="page-link" href="property-grid.php?page=<?= $x; ?>"><?= $x; ?></a>
              </li>
              <?php
              } ?>
              <?php if ($page == $number_of_page): ?>
              <li class="page-item next disabled">
              <?php else: ?>
              <li class="page-item next">
              <?php endif; ?>
                <a class="page-link" href="<?php if ($page <= $number_of_page) { echo "property-grid.php?page=".$next;} ?>">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Homestay Grid End /-->
  <?php include 'footer.php'; ?>
