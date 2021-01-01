<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Track Your Shipment</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v2.2.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="index.html">SwiftConveys Limited</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class=""><a href="index.html">Home</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="services.html">Services</a></li>
          <li class="active"><a href="tracking.php">Tracking</a></li>
          <li><a href="locations.html">Locations</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>

      </nav><!-- .nav-menu -->

      <a href="contact.html" class="get-started-btn ml-auto">Get Started</a>
    </div>


  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Tracking</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Tracking</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Tracking Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Tracking</h2>
          <p>TRACKING TECHNOLOGY</p>
        </div>
        <div>
          <center>
            <h2 class="animate__animated animate__fadeInDown my-5" class="align-"> TRACK YOUR SHIPMENT</h2>
            <div class="col-7">

              <form action="#" method="get">
                <div class="form-group">
                  <input class="form-control" placeholder="Enter your tracking code" type="text" id="" name="trackcode">

                </div>
                <button class="btn btn-danger m-auto" type="submit">Track</button>
              </form>


              <div id="trackInfo" class="my-5 text-muted">



                <?php

                $msg = " Parcel information will be displayed.";

                if (isset($_GET['trackcode'])) {

                  include 'inc/dbcon.php';
                  $trackCode = mysqli_real_escape_string($conn, $_GET['trackcode']);
                  if (empty($trackCode)) {
                ?> <p class="">Please Enter the Tracking code given to you!.</p> <?php
                                                                                } else {
                                                                                  $sql = "SELECT trackCode FROM TrackInfo WHERE trackCode =?";
                                                                                  $stmt = mysqli_stmt_init($conn);

                                                                                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                  ?><p>An unkwon error has occured!. Contact support for your tracking information</p><?php
                                                                                                                                                                    } else {
                                                                                                                                                                      mysqli_stmt_bind_param($stmt, 's', $trackCode);
                                                                                                                                                                      mysqli_stmt_execute($stmt);


                                                                                                                                                                      mysqli_stmt_store_result($stmt);
                                                                                                                                                                      $resultCheck = mysqli_stmt_num_rows($stmt);
                                                                                                                                                                      if ($resultCheck === 0) {
                                                                                                                                                                      ?><p>GPS tracking signal Lost. Track Code is incorrect. Try again or Contact customer support.</p><?php
                                                                                                                                                                                                                                                                        mysqli_stmt_close($stmt);
                                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                  }
                                                                                                                                                                                                                                                                  $sql = "SELECT * FROM TrackInfo WHERE trackCode=?";
                                                                                                                                                                                                                                                                  $stmt = mysqli_stmt_init($conn);
                                                                                                                                                                                                                                                                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                                                                                                                                                                                                                                        ?><p>An unkwon error has occured!. Contact support for your tracking informatio2n</p><?php
                                                                                                                                                                                                                                                                                                                                                            } else {

                                                                                                                                                                                                                                                                                                                                                              mysqli_stmt_bind_param($stmt, 's', $trackCode);
                                                                                                                                                                                                                                                                                                                                                              mysqli_stmt_execute($stmt);
                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                            $result = mysqli_stmt_get_result($stmt);
                                                                                                                                                                                                                                                                                                                                                              ?><table class='table table-striped table-inverse table-responsive'>
                    <thead class='thead-inverse'>
                      <tr>
                        <th>TrackCode</th>
                        <th>ShipperName</th>
                        <th>ShipperAddress</th>
                        <th>ShipperEmail</th>
                        <th>ShipperPhone</th>
                        <th>ReceiverName</th>
                        <th>ReceiverAddress</th>
                        <th>ReceiverEmail</th>
                        <th>ReceiverPhone</th>
                        <th>PercelType</th>
                        <th>PercelQuantity</th>
                        <th>PercelWeight</th>
                        <th>PercelHeight</th>
                        <th>PercelLenght</th>
                        <th>DateRegistered</th>
                      </tr>
                    </thead>
                    <tbody><?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <tr>
                          <td> <?= $row['trackCode']; ?> </td>
                          <td> <?= $row['shipperName']; ?> </td>
                          <td> <?= $row['shipperAddress']; ?> </td>
                          <td> <?= $row['shipperEmail']; ?> </td>
                          <td> <?= $row['shipperPhone']; ?> </td>
                          <td> <?= $row['receiverName']; ?> </td>
                          <td> <?= $row['receiverAddress']; ?> </td>
                          <td> <?= $row['receiverEmail']; ?> </td>
                          <td> <?= $row['receiverPhone']; ?> </td>
                          <td> <?= $row['percelType']; ?> </td>
                          <td> <?= $row['percelQuantity']; ?> </td>
                          <td> <?= $row['percelWeight']; ?> </td>
                          <td> <?= $row['percelHeight']; ?> </td>
                          <td> <?= $row['percelLenght']; ?> </td>
                          <td> <?= $row['dateRegistered']; ?> </td>
                        </tr>

                      <?php
                            }
                      ?></tbody>
                  </table><?php?><?php
                                } else {
                                  echo $msg;
                                } ?>
              </div>




            </div>
          </center>
        </div>
      </div>

    </section><!-- End Tracking Section -->

    <hr>

    <div class="shipment">
      <h1>
        Create A Shipment?
      </h1>

      <p>Email Us - <a href="mailto:info@swiftconveyslimited.com">info@swiftconveyslimited.com</a>

      </p>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>SwiftConveys Limited</h3>
              <p>
                <strong>Main Address:</strong> <br>
                A108 Adam Street, <br>
                New York, NY 535022 <br>
                <br>
                35 Layout Burj <br>
                #1 Khalifa Street, <br>
                Dubai, UAE.
                <br>

                <strong>Phone:</strong> +1 (323) 968-4755 (Whatsapp) <br>
                <strong>Email:</strong> swiftconveyslimited@gmail.com <br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy Policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Delivery </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Trasnportation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Employment</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Satisfaction</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Subscribe To Our Newsletter</h4>
            <p>Subscribe to our newsletter and we will inform you about newest projects and promotions. </p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; <strong><span>SwiftConveys Limited</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>
