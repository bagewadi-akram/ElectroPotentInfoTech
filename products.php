<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=epit_website', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("select * from products where status like 'published' order by created_at desc");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>ElectroPotentInfoTech</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="plugins/fontawesome/font-awesome.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- chart js -->
  <script src="plugins/chart/Chart.bundle.js"></script>

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
  <!-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon"> -->
  <script src="plugins/fontawesome/fontaesomelogo.min.css" crossorigin="anonymous"></script></head>

<body>
  <!-- preloader start -->
  <div class="preloader">
    <div class="spin"></div>
  </div>
  <!-- preloader end -->
  <!-- header -->
  <header>
    <!-- navigation -->
    <div class="navigation bg-white position-relative">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <a class="navbar-brand" href="index.html">          <img class="img-fluid" src="NewImages/logo1.png" width="180px" height="55px" >
</a>
          <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse text-center pb-lg-0" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link " href="index.html">
                  Home
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="about.html">
                  About us
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="products.php">
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">Services</a>
              </li>
              
            </ul>
            <!-- search -->
            <div class="search px-4 pb-3 pb-lg-0">
              <button id="searchOpen" class="search-btn"><i class="fa fa-search text-dark"></i></button>
              <div class="search-wrapper">
                <form action="#">
                  <input class="search-box form-control" id="search" type="search" placeholder="Type & Hit Enter...">
                </form>
                <button id="searchClose" class="search-close"><i class="fa fa-close text-dark"></i></button>
              </div>
            </div>
            <!-- get start btn -->
            <a href="service.html" class="btn btn-info hover-ripple">get started</a>
          </div>
        </nav>
      </div>
    </div>
    <!-- /navigation -->
  </header>
  <!-- /header -->


  <!-- page title -->
  <section class="section bg-cover overlay" data-background="NewImages/aboutus.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="text-white mb-3">Products</h2>
          <!-- breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0">
              <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="index.html">Home</a></li>
              <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">Products</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- case study -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="list-inline text-center mb-4 filter-controls">
            <li class="list-inline-item h5 p-2 font-secondary text-dark active" data-filter="all">ALL</li>
            <li class="list-inline-item h5 p-2 font-secondary text-dark" data-filter="art">ART DIRECTION</li>
            <li class="list-inline-item h5 p-2 font-secondary text-dark" data-filter="concept">CONCEPT</li>
            <li class="list-inline-item h5 p-2 font-secondary text-dark" data-filter="portfolio">DARK PORTFOLIO</li>
            <li class="list-inline-item h5 p-2 font-secondary text-dark" data-filter="illustration">ILLUSTRATION</li>
          </ul>
        </div>
      </div>
      <div class="row filtr-container">



      <?php
			// $counter = 0;
			foreach ($products as $product) { 

				// if($counter % 2 === 0){ ?>
				
				<?php 
					$fileDir = "file:///C:/xampp/htdocs/epit_website/public/uploads/";
          // $fileDir = "https://epit.electropotentinfotech.in/uploads/";
					$filename = $product['pro_image'];
					$file = $fileDir . $filename;
					$b64image = base64_encode(file_get_contents($file));
				?>

        <!-- project-item -->
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="art, illustration">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <!-- <img src="NewImages/Products/developmentkit.jpg" alt="project thumb" class="img-fluid w-100"> -->
              <?php echo "<img src = 'data:image/jpg;base64,$b64image' alt='project thumb' class='img-fluid w-100'>";	?>
              <div class="hover-overlay">
                <!-- <a href="NewImages/Products/developmentkit.jpg" class="venobox"><i class="uni-plus"></i></a> -->
                <?php echo "<a href= 'data:image/jpg;base64,$b64image' class='venobox'><i class='uni-plus'></i></a> ";	?>
              </div>
            </div>
            <!-- project-info -->
            <div>
              <!-- <h6 class="text-primary">Business Solution</h6> -->
              <!-- <h4><a href="project-single.html" class="text-dark">8051 development kit</a></h4> -->
              <h4><a href="project-single.php?name=<?php echo $product['name'] ?>" class="text-dark"><?= $product['name'] ?></a></h4>
            </div>
          </div>
        </div>

        <?php }  // $counter += 1; ?>



<!-- 
        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="concept">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/air-purifier.jpg" alt="project thumb" class="img-fluid w-100">
              <div class="hover-overlay">
                <a href="NewImages/Products/air-purifier.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Digital Marketing</h6>
              <h4><a href="project-single.html" class="text-dark">Air Purifier</a></h4>
            </div>
          </div>
        </div>



        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="portfolio">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/powersuply.jpg" alt="project thumb" class="img-fluid w-100">
              <div class="hover-overlay">
                <a href="NewImages/Products/powersuply.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Finacial Analytsis</h6>
              <h4><a href="project-single.html" class="text-dark">Power Supply</a></h4>
            </div>
          </div>
        </div>



        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="concept">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/UART.jpg" alt="project thumb" class="img-fluid w-100">
              <div class="hover-overlay">
                <a href="NewImages/Products/UART.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Marketing Strategy</h6>
              <h4><a href="project-single.html" class="text-dark">USB to UART</a></h4>
            </div>
          </div>
        </div>



        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="illustration">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/waterlevelcontrol.jpg" alt="project thumb" class="img-fluid w-100">
              <div class="hover-overlay">
                <a href="NewImages/Products/waterlevelcontrol.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Digital Marketing</h6>
              <h4><a href="project-single.html" class="text-dark">Water level Control</a></h4>
            </div>
          </div>
        </div>




        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="concept">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/freqgenerator.jpg" alt="project thumb" class="img-fluid w-100">
              <div class="hover-overlay">
                <a href="NewImages/Products/freqgenerator.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Marketing Strategy</h6>
              <h4><a href="project-single.html" class="text-dark">Frequency Generator</a></h4>
            </div>
          </div>
        </div>



        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="portfolio, art">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/autoswitch.jpg" alt="project thumb" class="img-fluid w-100">
              <div class="hover-overlay">
                <a href="NewImages/Products/autoswitch.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Finacial Analytsis</h6>
              <h4><a href="project-single.html" class="text-dark">Auto Switch</a></h4>
            </div>
          </div>
        </div>




        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="portfolio, art">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/realay.jpg" alt="project thumb" class="img-fluid w-100">
              <div class="hover-overlay">
                <a href="NewImages/Products/realay.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Finacial Analytsis</h6>
              <h4><a href="project-single.html" class="text-dark">Relay Modules</a></h4>
            </div>
          </div>
        </div>



        
        <div class="col-lg-4 col-sm-6 mb-4 filtr-item" data-category="illustration">
          <div class="project-item">
            <div class="position-relative overflow-hidden mb-4 m-2">
              <img src="NewImages/Products/remote.jpg" alt="project thumb" class="img-fluid ">
              <div class="hover-overlay">
                <a href="NewImages/Products/remote.jpg" class="venobox"><i class="uni-plus"></i></a>
              </div>
            </div>
            
            <div>
              <h6 class="text-primary">Digital Marketing</h6>
              <h4><a href="project-single.html" class="text-dark">Customize Remote Controller</a></h4>
            </div>
          </div>
        </div> -->




      </div>
    </div>
  </section>
  <!-- /case study -->

  <!-- footer -->
  <footer>
    <!-- main footer -->
    <div class="section bg-secondary">
      <div class="container">
        <div class="row justify-content-between">
          <!-- footer content -->
          <div class="col-lg-5 mb-5 mb-lg-0">
            <!-- logo -->
            <a class="mb-4 d-inline-block" href="index.html">          <img class="img-fluid" src="NewImages/logo1.png" width="180px" height="55px" >
</a>
            <p class="text-light">Our company is committed to serve the industry by producing high precision and advanced technology products of global standards. Our uniqueness lives in anticipating the market needs in advance and developing products to meet those needs.</p>
            <p class="text-light mb-5">Due to our continuous efforts for up gradation of quality and workmanship, we assure the best quality products, timely delivery and better after sales service</p>
            <h4 class="text-white mb-4">Follow Us On</h4>
            <!-- social links -->
            <ul class="list-inline social-icon-alt">
              <li class="list-inline-item">
                <a class="hover-ripple" href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a class="hover-ripple" href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a class="hover-ripple" target="_blank" href="https://www.linkedin.com/company/electropotent-infotech/"><i class="fa fa-linkedin"></i></a>
              </li>
              <li class="list-inline-item">
                <a class="hover-ripple" href="#"><i class="fa fa-pinterest"></i></a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <!-- service list -->
              <div class="col-6 mb-5">
                <h4 class="text-white mb-4">Services</h4>
                <ul class="list-styled">
                  <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">Company History</a></li>
                  <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">About Us</a></li>
                  <li class="mb-3 text-light"><a class="text-light d-block" href="contact.html">Contact Us</a></li>
                  <li class="mb-3 text-light"><a class="text-light d-block" href="service.html">Services</a></li>
                  <li class="mb-3 text-light"><a class="text-light d-block" href="privacy-policy.html">Privacy Policy</a></li>
                </ul>
              </div>
              <!-- contact info -->
              <div class="col-6 mb-5">
                <h4 class="text-white mb-4">Contact Info</h4>
                <ul class="list-unstyled">
                  <li class="text-light mb-3">682/B, ShivaRatna Housing Society, Swami Vivekanand road, near Sayadri Hospital, Pune MH-411037</li>
                  <li class="text-light mb-3">+918080919227</li>
                  <li class="text-light mb-3">info@electropotentinfotech.com</li>
                </ul>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- copyright -->
    <div class="bg-secondary-darken py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
            <p class="mb-0 text-white"><a href="index.html"><span class="text-primary">Electro Potent InfoTech</span></a> &copy; <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
              </script> All Right Reserved</p>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <ul class="list-inline">
              <li class="list-inline-item mx-0"><a class="d-inline-block px-3 text-white border-right" href="terms-conditions.html">Terms of Service</a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block px-3 text-white" href="privacy-policy.html">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

  <!-- jQuery -->
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <!-- slick slider -->
  <script src="plugins/slick/slick.min.js"></script>
  <!-- aos -->
  <script src="plugins/aos/aos.js"></script>
  <!-- venobox popup -->
  <script src="plugins/venobox/venobox.min.js"></script>
  <!-- Modernizer -->
  <script src="plugins/modernizer/modernizr.min.js"></script>
  <!-- filter -->
  <script src="plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
  <script src="plugins/google-map/gmap.js"></script>

  <!-- Main Script -->
  <script src="js/script.js"></script>

</body>

</html>