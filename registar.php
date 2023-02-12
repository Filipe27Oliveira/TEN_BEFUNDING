<?php

require 'connect.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["register"])){
    $username = $_POST["username"];
    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $birthday = $_POST["birthday"];
    $date = date ('Y-m-d', strtotime($birthday));
    $genre = $_POST["genre"];
    $email = $_POST["email"];
    $password = $_POST["password_1"];
    $confirmpassword = $_POST["password_2"];
    // $age = date_diff(date_create($date),date_create($currentDate));
    /*$duplicateemail = mysqli_query($db, "SELECT * FROM users WHERE email = '$email'");
    $duplicateuser = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    function getToken($len=32){
        return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
    }
    $token = getToken(10);
    
    if(mysqli_num_rows($duplicateemail) > 0 OR mysqli_num_rows($duplicateuser) > 0){
        echo
        "<script> alert('O email ou username inserido já se encontra registado!'); </script>";
    } elseif($age->format("%y") < 18){
        echo
        "<script> alert('Tens de ter mais de 18 anos para te registares!'); </script>";
    }
    else{*/
        if($password == $confirmpassword){
            $query = mysqli_query ($conn,"INSERT INTO users (birthday,email,firstname,genre,lastname,password,username) VALUES ('$birthday','$email','$firstname','$genre','$lastname','$password','$username')");
            echo '<script>window.location.href = "http://localhost/ten_befunding/login.php";</script>';
                   
        }
        else{
            echo
            "<script> alert('As passwords não coincidem!'); </script>";
        }
    }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BEFunding</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0"><a href="index.php">BEFunding</span></a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">  
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="login.php" class="get-started-btn scrollto">LOGIN</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Register<span>!</span></h1>
          <h2>Your journey with us starts <span>now</span>, register here.</h2>
        </div>
      </div>

      
      <!-- REGISTER -->

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="row">
            <br>
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <form class="form-group" method="post" action="registar.php">
                <div class="row">
                  <div class="col-lg-6">
                    <label for="username">Username</label>         
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" autofocus required>
                  </div>
                  <div class="col-lg-6">
                    <label for="genre">Genre</label>         
                    <select name="genre" class="form-control" id="genre" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                  </div>  
                  <div class="col-lg-6">
                    <label for="firstName">First Name</label>         
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name" autofocus required>
                  </div>
                  <div class="col-lg-6">
                    <label for="lastName">Last Name</label>         
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last name" required>
                  </div>
                <div class="col-lg-6">
                  <label for="email">Email</label><br>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="col-lg-6">
                  <label for="birthday">Birthday Date</label><br>
                  <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Enter your birthday date" required>
                </div>
                  <div class="col-lg-6">
                    <label for="password">Password</label>         
                    <input type="password" class="form-control" name="password_1" id="password_1" placeholder="Enter your password" required>
                  </div>
                  <div class="col-lg-6">
                    <label for="password">Re-type Password</label>         
                    <input type="password" class="form-control" name="password_2" id="password_2" placeholder="Re-type your password" required> <br>
                  </div>
              <button type="submit" name="register" class="btn btn-warning">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

 

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>BE<span>Funding</span></h3>
              <p>
                Av. Vasco da Gama <br>
                VNG 4400, Portugal<br><br>
                <strong>Phone:</strong> +395 912 345 678<br>
                <strong>Email:</strong> admin@admin.pt<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="ri-twitter-fill"></i></a>
                <a href="#" class="facebook"><i class="ri-facebook-circle-fill"></i></a>
                <a href="#" class="instagram"><i class="ri-instagram-fill"></i></a>
                <a href="#" class="google-plus"><i class="ri-skype-fill"></i></a>
                <a href="#" class="linkedin"><i class="ri-linkedin-fill"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">HOME</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">ABOUT US</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">SERVICES</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">TERMS OF SERVICE</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">PRIVACY POLICY</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>GRUPO 2 - StartWithUs</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed with <a href="boostrap.com">Boostrap 5</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

  </body>
</html>
<?php
  mysqli_close($conn);
?>