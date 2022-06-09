<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homestay Agency | Sign Up</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style_form.css">
    <style>
      .main {
        padding-top: 65px;
        padding-bottom: 0px;
        margin-bottom: -100px; }
      .animate {
        transition: .5s;  }
      .hyper{
        text-decoration: underline; }
        .hyper:visited {
          color: inherit; }
        .hyper:hover {
          color: #2eca6a; }
      .back:link {
        text-decoration: none;  }
      .back:visited {
        color: #000;  }
      .back:hover {
        color: #2eca6a;
      }
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
      <!-- Sign up form -->
      <section class="signup">
          <div class="container">
              <div class="signup-content" style="padding: 65px 0px;">
                  <div class="signup-form">
                      <center>
                        <h2 class="form-title" style="font-size: 2.1rem;"><a href="index.php" class="back animate">Home</a> / Sign up</h2>
                      </center>
                      <form method="POST" class="register-form" id="register-form" action="signup-insert.php">
                          <div class="form-group">
                              <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                              <input type="text" name="name" id="name" placeholder="Your Name" required/>
                          </div>
                          <div class="form-group">
                              <label for="email"><i class="zmdi zmdi-email"></i></label>
                              <input type="email" name="email" id="email" placeholder="Your Email" required/>
                          </div>
                          <div class="form-group">
                              <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                              <input type="tel" name="phone" id="phone" placeholder="Your Phone" required/>
                          </div>
                          <div class="form-group">
                              <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                              <input type="password" name="pass" id="pass" placeholder="Password" required/>
                              <i class="toggle fa fa-eye" id="togglePass" aria-hidden="true" title="show Password" onclick="showPass()"></i>
                          </div>
                          <div class="form-group">
                              <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                              <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                              <i class="toggle fa fa-eye" id="toggleRePass" aria-hidden="true" onclick="showRePass()"></i>
                          </div>
                          <div class="form-group">
                              <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                              <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="hyper animate rm-service" onclick="tos()">Terms of service</a></label>
                          </div>
                          <div class="form-group form-button">
                              <center>
                                <button type="submit" name="signup" id="signup" class="form-submit animate" style="letter-spacing: .05rem;" onclick="return valid()">Register</button>
                              </center>
                          </div>
                      </form>
                  </div>
                  <div class="signup-image">
                      <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                      <a href="login.php" class="hyper animate signup-image-link">I am already member</a>
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
