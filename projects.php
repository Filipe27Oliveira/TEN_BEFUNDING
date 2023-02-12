<?php
session_start();

// Connect to the database
// $conn = mysqli_connect('localhost', 'user', 'password', 'database');
require 'connect.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}


// Check if the user is creating a new campaign
if (isset($_POST['create'])) {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $goal = mysqli_real_escape_string($conn, $_POST['goal']);
  $user_id = $_SESSION['user_id'];

  // Insert the campaign into the database
  $query = "INSERT INTO campaigns (title, description, goal, user_id) VALUES ('$title', '$description', '$goal', '$user_id')";
  mysqli_query($conn, $query);
  header('location: dashboard.php');
}

// Check if the user is editing a campaign
if (isset($_POST['edit'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $goal = mysqli_real_escape_string($conn, $_POST['goal']);

  // Update the campaign in the database
  $query = "UPDATE campaigns SET title='$title', description='$description', goal='$goal' WHERE id='$id'";
  mysqli_query($conn, $query);
  header('location: dashboard.php');
}

// Check if the user is deleting a campaign
if (isset($_GET['delete'])) {
  $id = mysqli_real_escape_string($conn, $_GET['delete']);

  // Delete the campaign from the database
  $query = "DELETE FROM campaigns WHERE id='$id'";
  mysqli_query($conn, $query);
  header('location: dashboard.php');
}

// Get the user's campaigns from the database
$user_id = $_SESSION['id'];
$query = "SELECT * FROM campaigns WHERE user_id='$user_id'";
$campaigns = mysqli_query($conn, $query);
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
      <a href="login.php" class="get-started-btn scrollto">LOGOUT</a>

    </div>
  </header><!-- End Header -->

   <!-- ======= Dashboard Section ======= -->
   <section class="services">
      <div class="container">

      <div class="row">
  <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
    <div class="icon-box icon-box-pink">
      <div class="icon"><i class="bx bxl-dribbble"></i></div>
      <h4 class="title"><a href="#" id="createProject">Create a project</a></h4>
    </div>
  </div>

  <form method="post" id="form" style="display:none;">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="goal">Goal</label>
    <input type="text" class="form-control" id="goal" name="goal">
  </div>
  <button type="submit" class="btn btn-primary" name="create">Create</button>
</form>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">View Project</a></h4>
              
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Remove Project</a></h4>
              
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Update Project</a></h4>
              
            </div>
          </div>

        </div>

      </div>
    </section>

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
        &copy; Copyright <strong><span>GRUPO 2 - BEFunding</span></strong>. All Rights Reserved
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

