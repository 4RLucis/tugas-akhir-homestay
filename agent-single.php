<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homestay Agency | Agent</title>
  <?php include 'header.php';
      include 'connect.php';
        $id_akun  = $_GET["id_owner"];
        $query = "SELECT * FROM akun WHERE id_akun=".$id_akun;
        $result_owner = mysqli_query($conn,$query);
        while ($list = mysqli_fetch_assoc($result_owner)) {
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
            <a class="nav-link" href="property-grid.php">Homestay</a>
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
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Agents
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="agents-grid.php">Agents Grid</a>
              <a class="dropdown-item active" href="agent-single.php">Agent Single</a>
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
            <h1 class="title-single"><?php echo $list['nama_pemilik'] ?></h1>
            <span class="color-text-a">Agent Immobiliari</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="agents-grid.php">Agents</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <?php echo $list['nama_pemilik'] ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Agent Single Star /-->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-6">
              <div class="agent-avatar-box">
                <img src="img/agents/agent-7.jpg" alt="" class="agent-avatar img-fluid">
              </div>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">

                    <h3 class="title-d"><?php echo $list['nama_pemilik'] ?></h3>
                  </div>
                </div>
                <div class="agent-content mb-3">
                  <p class="content-d color-text-a">
                    Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
                    Vivamus suscipit tortor
                    eget felis porttitor volutpat. Vivamus suscipit tortor eget felis porttitor volutpat.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong>
                      <span class="color-text-a"> +54 356 945234 </span>
                    </p>
                    <p>
                      <strong>Mobile: </strong>
                      <span class="color-text-a"> 999 123 456 789</span>
                    </p>
                    <p>
                      <strong>Email: </strong>
                      <span class="color-text-a"> <?php echo $list['email'] ?>
                    </p>
                    <p>
                      <strong>skype: </strong>
                      <span class="color-text-a"> Margaret.Es</span>
                    </p>
                    <p>
                      <strong>Email: </strong>
                      <span class="color-text-a"> agents@example.com</span>
                    </p>
                  </div>
                </div>
                <div class="socials-footer">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 section-t8">
          <div class="title-box-d">
            <?php
            $query    = "SELECT * FROM homestay";
            $result   = mysqli_query($conn, $query);
            $number_of_result = mysqli_num_rows($result);
            ?>
            <h3 class="title-d">My Homestays (<?php echo $number_of_result ?>)</h3>
          </div>
        </div>
        <div class="row property-grid grid">
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



          $number_of_page   = ceil($number_of_result/$result_per_page);

          if (isset($_GET["page"])) {
            $page = $_GET["page"];
          } else {
            $page = 1;
          }
          $previous = $page-1;
          $next     = $page+1;

          $page_first_result  = ($page-1)*$result_per_page;
          $query  = "SELECT t1.id_homestay, t1.nama_homestay, t1.harga,
                    t2.id_homestay, t2.kamar_tidur, t2.tempat_tidur,
                    t2.kamar_mandi, t2.tempat_parkir, t3.gbr_dpn  FROM
                    ((homestay t1 INNER JOIN fasilitas t2
                  ON t1.id_homestay = t2.id_homestay) INNER JOIN lokasi t3
                  ON t1.id_homestay=t3.id_homestay)
                  LIMIT ".$page_first_result.','.$result_per_page;

          $data_home = mysqli_query($conn,$query);
          while ($row = mysqli_fetch_array($data_home,MYSQLI_ASSOC)) {
          ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="<?php echo $row['gbr_dpn'] ?>" alt="" class="img-a img-fluid gbr-home">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <?php echo $row["nama_homestay"]; ?>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | Rp <?php echo $row["harga"]; ?></span>
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
                        <span><?php echo $row["kamar_tidur"]; ?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span><?php echo $row["tempat_tidur"]; ?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span><?php echo $row["kamar_mandi"] ?></span>
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
          <?php } ?>
        </div>
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <?php if ($page==1): ?>
              <li class="page-item disabled">
              <?php else: ?>
              <li class="page-item">
              <?php endif; ?>
                <a class="page-link" href="<?php if ($page>1) { echo "agent-single.php?id_owner=".$id_akun."&page=".$previous;} ?>">
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
                <a class="page-link" href="agent-single.php?id_owner=<?php echo $id_akun."&page=".$x; ?>"><?php echo $x; ?></a>
              </li>
              <?php
              } ?>
              <?php if ($page == $number_of_page): ?>
              <li class="page-item next disabled">
              <?php else: ?>
              <li class="page-item next">
              <?php endif; ?>
                <a class="page-link" href="<?php if ($page <= $number_of_page) { echo "agent-single.php?id_owner=".$id_akun."&page=".$next;} ?>">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Agent Single End /-->
  <?php
  }
  include 'footer.php'; ?>
