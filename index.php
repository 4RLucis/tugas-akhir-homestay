<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homestay Agency | Home</title>
  <?php include 'header.php';
    $sql = "SELECT t1.id_homestay, t1.nama_homestay, t1.alamat1, t1.kode_pos, t1.harga, t2.gbr_dpn FROM homestay t1 INNER JOIN lokasi t2 ON t1.id_homestay = t2.id_homestay ORDER BY t1.rating DESC";
    $result = mysqli_query($conn, $sql);
  ?>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="property-grid.php">Homestays</a>
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
  <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
    <?php
      $itemShown = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        if ($itemShown >= 3) {
          break;  }
      echo '<div class="carousel-item-a intro-item bg-image index-gbr" style="background-image: url('.$row['gbr_dpn'].')">';
    ?>
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?php echo $row["alamat1"]; ?>
                      <br> <?php echo $row["kode_pos"]; ?></p>
                    <h1 class="intro-title mb-4">
                      <?php echo $row["nama_homestay"];?></h1>
                    <div class="intro-subtitle intro-price">
                      <form action="property-single.php" method="post">
                          <input type="hidden" name="id_homestay" value="<?php echo $row["id_homestay"]; ?>">
                          <input type="submit" class="price-a hover" value="rent | Rp <?php echo $row["harga"] ?>">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    $itemShown++; } ?>
    </div>
  </div>
  <!--/ Carousel end /-->
  <!--/ Homestay Start /-->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest Homestays</h2>
            </div>
            <div class="title-link">
              <a href="property-grid.php">All Homestay
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="property-carousel" class="owl-carousel owl-theme">
        <?php
        $sql = "SELECT t1.id_homestay, t1.nama_homestay, t1.harga,
                t2.id_homestay, t2.kamar_tidur, t2.tempat_tidur, t2.kamar_mandi,
                t2.tempat_parkir, t3.gbr_dpn FROM ((homestay t1 INNER JOIN fasilitas t2
                ON t1.id_homestay = t2.id_homestay) INNER JOIN lokasi t3 ON t1.id_homestay = t3.id_homestay) ORDER BY t1.id_homestay
                DESC";
        $result = mysqli_query($conn, $sql);
        $itemShown = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          if ($itemShown >= 4) {
            break;  }
        ?>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="<?php echo $row['gbr_dpn'] ?>" alt="" class="img-a img-fluid gbr-home">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.php"><?php echo $row['nama_homestay'] ?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | Rp <?php echo $row['harga']; ?></span>
                  </div>
                  <form action="property-single.php" method="post">
                    <input type="hidden" name="id_homestay" value="<?php echo $row["id_homestay"]; ?>">
                    <input type="submit" value="Click here to view" class="link-a">
                    <span class="ion-ios-arrow-forward link-a"></span>
                  </form>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Bedrooms</h4>
                      <span><?php echo $row['kamar_tidur'] ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span><?php echo $row['tempat_tidur'] ?></span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span><?php echo $row['tempat_parkir'] ?></span>
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
        $itemShown++; } ?>
      </div>
    </div>
  </section>
  <!--/ Homestay End /-->

  <!--/ News Start /-->
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest News</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.php">All News
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="new-carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-2.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">House</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.php">House is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-5.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.php">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-7.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Park</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.php">Park is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-3.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="#">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ News End /-->

  <!--/ Testimonials Start /-->
  <section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Testimonials</h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="img/testimonial-1.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                    debitis hic ber quibusdam
                    voluptatibus officia expedita corpori.
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Albert & Erika</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="img/testimonial-2.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                    debitis hic ber quibusdam
                    voluptatibus officia expedita corpori.
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Pablo & Emma</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Testimonials End /-->
  <?php include 'footer.php'; ?>
