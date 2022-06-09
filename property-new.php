<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homestay Agency | Homestay</title>
  <?php include 'header.php';
        include 'connect.php';
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
  <form class="new-price" action="insert-new.php" method="post" enctype="multipart/form-data">
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <input type="text" name="new_homestay_name" class="title-single" placeholder="Insert Nama Homestay"><br>
            <input type="text" name="new_lokasi" class="color-text-a" placeholder="Insert Lokasi">
            <input type="text" name="new_kodePos" class="color-text-a" placeholder="Insert kodePos"><br>
            <input type="text" name="new_address" class="color-text-a" placeholder="Insert Alamat">
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
                New Homestay
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
          <h4>Input New Image</h4>
          <input type="file" name="new_image" value="">
          <br><br>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">Rp</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">Harga Sewa?</h5>
                    <input type="number" name="new_price" placeholder="Harga Sewa?" style="margin-left: -40px; margin-top: 10px;">
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
                      <span>1134</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Homestay Type:</strong>
                      <span>House</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Bedrooms:</strong>
                      <input type="number" name="new_bedrooms">
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Beds:</strong>
                      <input type="number" name="new_beds">
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Baths:</strong>
                      <input type="number" name="new_baths">
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Garage:</strong>
                      <input type="number" name="new_garage">
                    </li>
                    <li style="color:red;" class="d-flex justify-content-between">1 = Have Garage <br>
                    0 = Don't have Garage</li>
                    <li class="d-flex justify-content-between">
                      <strong>Jarak (km)</strong>
                      <input type="number" name="new_dist" step="0.1">
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
              <table style="border:0;">
                <tr>
                  <td><label for="new_latitude">Latitude</label></td>
                  <td><input type="number" name="new_latitude"></td>
                </tr>
                <tr>
                  <td><label for="new_longitude">Longitude</label></td>
                  <td><input type="number" name="new_longitude"></td>
                </tr>
              </table>
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
          </div>
          <br>
        </div>
      </div>
    </div>
  </section>
  <center>
    <button type="submit" class="btn btn-b">Insert New Data</button>
    <button type="reset" class="btn btn-b cancel">Reset</button>
  </center>
  <!--/ Homestay Single End /-->
  </form>
  <?php include 'footer.php'; ?>
