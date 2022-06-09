<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homestay Agency | Homestay</title>
  <?php include 'header.php';
        include 'connect.php';

        $idHomestay = $_POST["id_homestay"];
        $query ="SELECT * FROM ((homestay t1 INNER JOIN fasilitas t2 ON t1.id_homestay=t2.id_homestay) INNER JOIN lokasi t3 ON t1.id_homestay=t3.id_homestay) WHERE t1.id_homestay=".$idHomestay;
        $result = mysqli_query($conn,$query);
        ?>
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
  <?php
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single"><?php echo $row["nama_homestay"] ?></h1>
            <span class="color-text-a"><?php echo $row["alamat1"]." ".$row["kode_pos"] ?></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="property-grid.php">Homestays</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <?php echo $row["nama_homestay"] ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Homestay Single Start /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <img src="<?php echo $row['gbr_dpn'] ?>" alt="" class="property-single-gbr">
            </div>
            <div class="carousel-item-b">
              <img src="<?php echo $row['gbr_tgh'] ?>" alt="gbr_tgh" class="property-single-gbr">
            </div>
            <div class="carousel-item-b">
              <img src="<?php echo $row['gbr_blkg'] ?>" alt="gbr_blkg" class="property-single-gbr">
            </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">Rp</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c"><?php echo $row["harga"] ?></h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Quick Summary</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Homestay ID:</strong>
                      <span><?= $row["id_homestay"] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Homestay Type:</strong>
                      <span>House</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Bedrooms:</strong>
                      <span><?= $row["kamar_tidur"] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Beds:</strong>
                      <span><?= $row["tempat_tidur"] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Baths:</strong>
                      <span><?= $row["kamar_mandi"] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Garage:</strong>
                      <span><?php if ($row["tempat_parkir"]==1) {
                        echo "Yes"; } else { echo "No"; } ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Homestay Description</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
                  neque, auctor sit amet
                  aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta.
                  Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt
                  nibh pulvinar quam id dui posuere blandit.
                </p>
                <p class="description color-text-a no-margin">
                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget
                  malesuada. Quisque velit nisi,
                  pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                </p>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Amenities</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="list-a no-margin">
                  <li>Balcony</li>
                  <li>Outdoor Kitchen</li>
                  <li>Cable Tv</li>
                  <li>Deck</li>
                  <li>Tennis Courts</li>
                  <li>Internet</li>
                  <li>Parking</li>
                  <li>Sun Room</li>
                  <li>Concrete Flooring</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10 offset-md-1">
          <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                aria-controls="pills-video" aria-selected="true">Video</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans"
                aria-selected="false">Floor Plans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
                aria-selected="false">Location</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
              <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
              <img src="img/plan2.jpg" alt="" class="img-fluid">
            </div>
            <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
              <iframe src="http://maps.google.com/maps?q=<?= $row['lintang'] ?>,<?= $row['bujur'] ?>&z=17&output=embed"
                width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Homestay Owner</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <img src="img/agents/agent-4.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="property-agent">
                <h4 class="title-agent">Anabella Geller</h4>
                <p class="color-text-a">
                  Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                  dui. Quisque velit nisi,
                  pretium ut lacinia in, elementum id enim.
                </p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <strong>Phone:</strong>
                    <span class="color-text-a">(222) 4568932</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Mobile:</strong>
                    <span class="color-text-a">777 287 378 737</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Email:</strong>
                    <span class="color-text-a">annabella@example.com</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Skype:</strong>
                    <span class="color-text-a">Annabela.ge</span>
                  </li>
                </ul>
                <div class="socials-a">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <div class="property-contact">
                <div class="row">
                  <div class="col-md-12 mb-1">
                    <center>
                      <button type="button" class="btn btn-b tombol" onclick="openSewa()"c>Sewa Homestay</button>
                    </center>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                    <div class="form-popup" id="myForm">
                      <form class="form-container" action="feedback.php" method="post">
                        <center><h3>Give Feedback</h3></center>
                        <label for="idSewa"><b>ID Sewa</b></label>
                        <input type="text" name="idSewa" placeholder="ID Sewa">
                        <label for="fasilitas"><b>Fasilitas</b></label>
                        <input type="number" name="feedfasilitas" placeholder="Nilai Fasilitas: 0-10" step="0.1" min="0" max="10">
                        <label for="aksesJalan"><b>Akses Jalan</b></label>
                        <input type="number" name="feedAJ" placeholder="Nilai Akses Jalan: 0-10" step="0.1" min="0" max="10">
                        <label for="totalRating"><b>Total Rating</b></label>
                        <input type="number" name="feedRating" placeholder="Total Rating Homestay: 0-10" step="0.1" min="0" max="10">
                        <input type="hidden" name="homid" value="<?= $row["id_homestay"]; ?>">
                        <center>
                          <button type="submit" class="btn">Send Feedback</button>
                          <button type="reset" class="btn cancel" onclick="closeForm()">Close</button>
                        </center>
                      </form>
                    </div>
                    <center>
                      <button type="button" class="btn btn-b tombol" onclick="openForm()">Give Feedback</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col-md-12" id="sewaHomestay" style="display:none;">
          <div class="row">
            <div class="col-md-12 center">
              <div class="property-contact">
                <form class="form-a" action="sewa.php" method="post">
                  <div class="row">
                    <div class="col-md-4 mb-1 reservation">
                      <div class="form-group">
                        <h6>&nbsp;</h6>
                        <label for="nameUser">Name<span class="required">*</span></label>
                        <input type="text" class="form-control form-control-lg form-control-a reservation" id="inputName"
                          placeholder="Name" name="nameUser" required>
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                        <h6>&nbsp;</h6>
                          <label for="noHP">Nomor HP<span class="required">*</span></label>
                          <input type="tel" class="form-control form-control-lg form-control-a" id="inputPhone"
                            placeholder="Nomor HP *" name="hpUser"  required>
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                          <h6>Guest and Room</h6>
                          <label for="adult">Adult (>= 17 yo)</label>
                          <input type="number" class="form-control form-control-lg form-control-a" name="adult" value="1" min="1">
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                        <label for="email">email<span class="required">*</span></label>
                        <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1"
                          placeholder="Email *" name="emailUser" required>
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                        <label for="CheckIn">Check In<span class="required">*</span></label>
                        <input type="date" class="form-control form-control-lg form-control-a" id="inputCheckIn"
                          name="checkIn" required>
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                        <label for="children">Children (< 17 yo)</label>
                        <input type="number" class="form-control form-control-lg form-control-a" name="children" value="0" min="0">
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                        <label for="identitas">Nomor Identitas<span class="required">*</span></label>
                        <input type="text" class="form-control form-control-lg form-control-a" id="inputIdentitas"
                          placeholder="Nomor Identitas *" name="idenUser" required>
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                        <label for="CheckOut">Check Out<span class="required">*</span></label>
                        <input type="date" class="form-control form-control-lg form-control-a" id="inputCheckOut"
                          name="checkOut" required>
                      </div>
                    </div>
                    <div class="col-md-4 mb-1">
                      <div class="form-group">
                        <label for="rooms">Room</label>
                        <input type="number" class="form-control form-control-lg form-control-a" name="rooms" value="1" min="1">
                      </div>
                    </div>
                    <div class="col-md-6 mb-1">
                      <center>
                        <button type="submit" class="btn btn-b tekan">Pesan Homestay</button>
                      </center>
                      <input type="hidden" name="homid" value="<?php echo $row["id_homestay"] ?>">
                    </div>
                    <div class="col-md-6">
                      <center>
                        <button type="button" class="btn btn-b tekan cancel" name="send" onclick="closeSewa()">Close</button>
                      </center>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php  } ?>
  <!--/ Homestay Single End /-->
  <?php include 'footer.php'; ?>
