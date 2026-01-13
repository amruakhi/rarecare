<?php
session_start();
    if (!isset($_SESSION['email'])) {
      
      echo "<script>alert('Session Expired. Login Again!');</script>";
      echo "<script>location.href='login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>Rare Care - Medical Center HTML5 Template</title>
  <link rel="stylesheet" href="assets/css/maicons.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="assets/css/theme.css">
</head>
<body>
  <div class="back-to-top"></div>
  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Rare</span>-Care</a>
        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="dhome.php">Home</a>
            </li>
            
            <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Bookings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a class="dropdown-item" href="dappo.php">Today's Appointment</a>
            <a class="dropdown-item" href="dappo2.php">Booking Schedule</a>
        </div>
    </div>
    <li class="nav-item">
              <a class="nav-link" href="dadd.php">Add Doctors</a>
            </li>
    <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Donation Requests
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item" href="dnewdonation.php">Donation Requests</a>
            <a class="dropdown-item" href="dappdonation.php">Approved Donation</a>
            <a class="dropdown-item" href="drejdonation.php">Rejected Donation</a>
        </div>
    </div>
            <li class="nav-item">
              <a class="nav-link" href="dprofile.php">Update Profile</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="logout.php">LogOut</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  <div class="page-hero bg-image overlay-dark" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
      <script>
  
  document.querySelectorAll('.dropdown-toggle').forEach(function(dropToggle) {
    dropToggle.addEventListener('click', function() {
      this.nextElementSibling.classList.toggle('show');
    });
  });
</script>