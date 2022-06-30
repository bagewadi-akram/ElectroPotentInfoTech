<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=epit_website', 'root', '');
// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=wuwcraik_epit', 'wuwcraik_epituser', 'kPUGH1oGn[z');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$name = $_GET['name'] ?? null;

if($name){
    $statement = $pdo->prepare('select * from products where name like :name');
    $statement->bindValue(':name', $name);
}
else{
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 0, 1');
}

$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>



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
  <link rel="shortcut icon" href="NewImages/logo.png" type="image/x-icon">
  <link rel="icon" href="NewImages/logo.png" type="image/x-icon">
  <script src="plugins/fontawesome/fontaesomelogo.min.css" crossorigin="anonymous"></script>
</head>

<body>
  <!-- preloader start -->
  <!-- <div class="preloader">
    <div class="spin"></div>
  </div> -->
  <!-- preloader end -->
<!-- header -->
<header>
 <!-- navigation -->
  <div class="navigation bg-white position-relative pl-5 pr-5">
    <div class="container-fluid ml-5 mr-5">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="index.html">
          <img class="img-fluid" src="NewImages/logo1.png" width="200px" height="150px">
                  </a>
          
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center pb-lg-0" id="navigation">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.html">
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
              <a class="nav-link" href="service.html">Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="career.php">Career   </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
                        </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- /navigation -->
</header>
<!-- /header -->

<!-- page title -->
<section class="section bg-cover overlay" data-background="./NewImages/aboutus.jpg">
  <div class="container">
    <div class="row">
      <div class="col-13">
        <h2 class="text-white mb-3">Project Details</h2>
       
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- project details -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2><?= $product['name'] ?></h2>
        <p class="mb-5"><?= $product['description'] ?></p>
       
        <?php 
				$fileDir = "file:///C:/xampp/htdocs/epit_website_server/public_html/uploads/";
        // $fileDir = "https://electropotentinfotech.com/adminpanel/uploads/";
				$filename = $product['pro_image'];
				$file = $fileDir . $filename;
				$b64image = base64_encode(file_get_contents($file));
			?>	
			<?php echo "<img src = 'data:image/jpg;base64,$b64image' alt='project image' class='img-fluid w-100 mb-5'>";?>

        <p class="mb-5"><?= $product['name'] ?></p>

       
        <!-- Analyze your business -->
        
        <!-- accordion -->
       
      </div>
      <!-- sidebar -->
     
      
      <aside class="col-lg-4 align-item-center">
        <!-- quick contact -->
        <div class="bg-white px-4 py-5 box-shadow mb-5">
          <h4 class="mb-4">Quick Contact</h4>
          <form class="contact__form" method="post" action="mail.php">
          <div class="alert alert-success contact__msg" style="display: none" role="alert">
            Your message was sent successfully.
        </div>
            <input type="text" name="name" id="name" required class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Name">
            <input type="email" name="mail" id="mail" required class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Email">
            <input type="text" name="phone" id="phone" required class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Phone">
            <input type="text" name="subject" id="subject" required class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Subject">
            <textarea name="message" id="message" required class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3 py-3 px-4"
              placeholder="Your Message"></textarea>
              <div class="g-recaptcha mb-4" data-sitekey="6LfHSKMgAAAAALd8xhttO5kMvmySIbZILI3sDer9"></div>    
            <button type="submit" value="send" class="btn btn-primary">send message</button>
          </form>
        </div>
        <!-- pdf download -->
        
      </aside>
    </div>
  </div>
</section>
<!-- /project details -->

<!-- footer -->
<footer>
  <!-- main footer -->
  <div class="section bg-secondary p-5 mb-0 pb-0">
    <div class="container-fluid pl-5 pr-5 mb-0">
      <div class="row justify-content-between">
        <!-- footer content -->
        <div class="col-lg-5">
          <!-- logo -->
          <a class="mb-4 d-inline-block p-1" href="index.html"><img src="NewImages/logo1.png" width="220px" height="100px"></a>
          <p class="text-light">Our company is committed to serve the industry by producing high precision and advanced technology products of global standards. Our uniqueness lives in anticipating the market needs in advance and developing products to meet those needs.</p>
          <p class="text-light mb-5">Due to our continuous efforts for up gradation of quality and workmanship, we assure the best quality products, timely delivery and better after sales service</p>
          <h4 class="text-white mb-2">Follow Us On</h4>
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
              <h4 class="text-white mb-4 mt-5">Services</h4>
              <ul class="list-styled">
                <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">Company History</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">About Us</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="contact.html">Contact Us</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="service.html">Services</a></li>
                              </ul>
            </div>
              <!-- contact info -->
              <div class="col-6 mb-5 mt-5">
                <h4 class="text-white mb-4">Contact Info</h4>
                <ul class="list-unstyled">
                  <li class="text-light mb-2">682/B, ShivaRatna Housing Society, Swami Vivekanand road, near Sayadri Hospital, Pune MH-411037</li>
                  <li class="text-light mb-2">+918080919227</li>
                  <li class="text-light mb-3">info@electropotentinfotech.com</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright -->
  <div class="bg-secondary-darken p-1">
    <div class="container-fluid">
          <p class="mb-0 text-white text-right"><a href="index.html"><span class="text-danger">Electro Potent InfoTech</span></a> &copy; <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script> All Right Reserved</p>
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
<script src="js/contact.js"></script>

<!-- For recaptcha V2  -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>
</html>