<?php
    require_once 'connect.php';
    if (isset($_POST['signin'])) {
      $useremail  = $_POST["email"];
      $userpass   = $_POST["your_pass"];
      $sql = mysqli_query($conn, "SELECT email, password FROM akun WHERE email = '$useremail'");

      if (mysqli_num_rows($sql)>0) {
        while ($row = mysqli_fetch_assoc($sql)) {
          if (password_verify($userpass, $row["password"])) {

            header("Location: index.php", true, 301);
            break;
          }
        }
      } else {
        echo '
          <script language = "javascript">
            windows.alert("Login Gagal! Silakan coba lagi");
            windows.location.href="./";
          </script>
        ';
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homestay Agency | Login Form</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style_form.css">
    <style>
      button {
        font-family: 'Poppins', sans-serif;
      }
      .main {
        padding-top: 64px;
        padding-bottom: 60px; }
      .animate {
        transition: .5s;  }
      .hyper{
        text-decoration: underline; }
        .hyper:hover {
          color: #2eca6a; }
      .back:link {
        text-decoration: none;  }
      .back:visited {
        color: #000;  }
      .back:hover{
        color: #2eca6a; }
      h2 {
        color: #6c757d; }
      .form-submit {
        border: 1px solid #2eca6a;
        background: #2eca6a;  }
        .form-submit:hover {
          background: #fff;
          color: #000;  }
        .form-group .toggle {
          float: right;
          margin-left: -30px;
            margin-top: -25px;
          cursor: pointer;  }
    </style>
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="hyper animate signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <center>
                          <h2 class="form-title" style="font-size: 2.1rem;"><a href="index.php" class="back animate">Home</a> / Login</h2>
                        </center>
                        <form method="POST" class="register-form" id="login-form" action="login.php">
                            <div class="form-group">
                              <label for="email"><i class="zmdi zmdi-email"></i></label>
                              <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="pass" placeholder="Password"/>
                                <i class="toggle fa fa-eye" id="togglePass" aria-hidden="true" title="show Password" onclick="showPass()"></i>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <center>
                                  <button type="submit" name="signin" id="signin" class="form-submit animate" style="letter-spacing: .05rem;">Log in</button>
                                </center>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main_form.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
