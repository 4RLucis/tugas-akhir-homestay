<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homestay Agency | Agents</title>
  <?php include 'header.php'; include 'connect.php'; ?>

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
              <a class="dropdown-item active" href="agents-grid.php">Agents Grid</a>
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
            <h1 class="title-single">Our Amazing Agents</h1>
            <span class="color-text-a">Grid Agents</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Agents Grid
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Agents Grid Star /-->
  <section class="agents-grid grid">
    <div class="container">
      <div class="row">
        <?php
        $result_per_page = 6;

        $query    = "SELECT * FROM akun";
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
        $query = "SELECT id_akun, nama_pemilik, email FROM akun LIMIT ".$page_first_result.','.$result_per_page;

        $data_owner = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_array($data_owner,MYSQLI_ASSOC)) {
        ?>
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/agents/agent-4.jpg" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <form class="" action="agent-single.php" method="get">
                      <input type="hidden" name="id_owner" value="<?php echo $row['id_akun'] ?>">
                      <input type="submit" name="" value="<?php echo $row['nama_pemilik'] ?>" class="test">
                    </form>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                  Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +54 356 945234</p>
                  <p>
                    <strong>Email: </strong> <?php echo $row['email'] ?></p>
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
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
                <a class="page-link" href="<?php if ($page>1) { echo "agents-grid.php?page=".$previous;} ?>">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <?php
              for ($x=1; $x <=$number_of_page ; $x++) {
              if ($x==$page): ?>
              <li class="page-item active">
              <?php else: ?>
              <li class="page-item">
              <?php endif; ?>
                <a class="page-link" href="agents-grid.php?page=<?php echo $x; ?>"><?php echo $x; ?></a>
              </li>
              <?php  } ?>
              <?php if ($page == $number_of_page): ?>
              <li class="page-item next disabled">
              <?php else: ?>
              <li class="page-item next">
              <?php endif; ?>
                <a class="page-link" href="<?php if ($page <= $number_of_page) { echo "agents-grid.php?page=".$next;} ?>">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Agents Grid End /-->
  <?php include 'footer.php'; ?>
