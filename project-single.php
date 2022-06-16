<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=epit_website', 'root', '');
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
   <div class="navigation-sm bg-white position-relative">
     <div class="container">
       <nav class="navbar navbar-expand-lg navbar-light bg-white">
         <a class="navbar-brand" href="index.html">
         <img class="img-fluid" src="NewImages/logo1.png" width="180px" height="55px" >
</a>
           
         <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation"
           aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
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
           <!-- <div class="search px-4 pb-3 pb-lg-0">
             <button id="searchOpen" class="search-btn"><i class="fa fa-search text-dark"></i></button>
             <div class="search-wrapper">
               <form action="#">
                 <input class="search-box form-control" id="search" type="search" placeholder="Type & Hit Enter...">
               </form>
               <button id="searchClose" class="search-close"><i class="fa fa-close text-dark"></i></button>
             </div>
           </div> -->
           <!-- get start btn -->
           <a href="service.html" class="btn btn-info hover-ripple ml-5">get started</a>
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
      <div class="col-12">
        <h2 class="text-white mb-3">Project Details</h2>
        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="index.html">Home</a></li>
            <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">Project Details</li>
          </ol>
        </nav>
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
        <div class="row no-gutters bg-secondary p-sm-5 p-4 mb-5">
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="border-md-right border-muted ml-4">
              <h5 class="text-white text-uppercase">CLIENT</h5>
              <span class="text-light">Australia</span>
            </div>
          </div>
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="border-md-right border-muted ml-4">
              <h5 class="text-white text-uppercase">Category</h5>
              <span class="text-light">Investment</span>
            </div>
          </div>
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="border-md-right border-muted ml-4">
              <h5 class="text-white text-uppercase">DATE</h5>
              <span class="text-light">16 April, 2018</span>
            </div>
          </div>
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="ml-4">
              <h5 class="text-white text-uppercase">status</h5>
              <span class="text-light">In Process</span>
            </div>
          </div>
        </div>




        <!-- project image -->
        <!-- <img class="img-fluid w-100 mb-5" src="NewImages/Products/developmentkit.jpg" alt="project image"> -->
        <?php 
				$fileDir = "file:///C:/xampp/htdocs/epit_website/public/uploads/";
        // $fileDir = "https://epit.electropotentinfotech.in/uploads/";
				$filename = $product['pro_image'];
				$file = $fileDir . $filename;
				$b64image = base64_encode(file_get_contents($file));
			?>	
			<?php echo "<img src = 'data:image/jpg;base64,$b64image' alt='project image' class='img-fluid w-100 mb-5'>";?>

        <p class="mb-5"><?= $product['name'] ?></p>

        <div class="row mb-5">
          <div class="col-md-6 mb-4 mb-md-0">
            <div class="p-4 bg-white box-shadow">
              <h3>The Challenge</h3>
              <p>The global marketplace is constantly evolving. No other industry experiences more change than electronics. New technology becomes available at an alarming rate. </p>
              <p>It’s becoming more and more important for us to produce smaller products that last longer and consume less power </p>
              <ul class="list-styled style-circle">
                <li class="mb-1">Smart Electronics Devices.</li>
                <li class="mb-1">Eco-Accommodating Procedures</li>
                <li class="mb-1">Energy Efficient</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-4 bg-white box-shadow">
              <h3 class="mt-2">The Strategy</h3>
              <p>Digital electronics marketing can be overwhelming for managers and even C-suite executives. From the beginning, identify your audience and solidify your brand’s story.</p>
              <!-- chart -->
<canvas id="profit" class="mt-4"></canvas>

<!-- script -->
<script>
  let profit = document.getElementById('profit').getContext('2d');
  let profitChart = new Chart(profit, {
    type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'jul'],
      datasets: [{
        label: 'Profit',
        data: [
          230,
          400,
          500,
          380,
          350,
          450,
          601
        ],
        backgroundColor: 'transparent',
        borderWidth: 3,
        borderColor: '#62caf3'
      }]
    },
    options: {
      title: {
        display: false,
        text: 'Sales: 1 Sep, 2017 - 2 Aug, 2018',
        fontSize: 15
      },
      legend: {
        display: false,
        position: 'right',
        padding: 5,
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          bottom: 0,
          top: 0
        }
      },
      tooltips: {
        enabled: true
      }
    }
  });
</script>
            </div>
          </div>
        </div>
        <!-- Analyze your business -->
        
        <!-- accordion -->
       
      </div>
      <!-- sidebar -->
     
      
      <aside class="col-lg-4 align-item-center top-50">
        <!-- quick contact -->
        <div class="bg-white px-4 py-5 box-shadow mb-5">
          <h4 class="mb-4">Quick Contact</h4>
          <form class="contact__form" method="post" action="mail.php">
          <div class="alert alert-success contact__msg" style="display: none" role="alert">
            Your message was sent successfully.
        </div>
            <input type="text" name="name" id="name" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Name">
            <input type="email" name="mail" id="mail" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Email">
            <input type="text" name="phone" id="phone" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Phone">
            <input type="text" name="subject" id="subject" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Subject">
            <textarea name="message" id="message" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3 py-3 px-4"
              placeholder="Your Message"></textarea>
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
  <div class="section bg-secondary">
    <div class="container">
      <div class="row justify-content-between">
        <!-- footer content -->
        <div class="col-lg-5 mb-5 mb-lg-0">
              <!-- logo -->
              <a class="mb-4 d-inline-block" href="index.html">  <img class="img-fluid" src="NewImages/logo1.png" width="180px" height="55px" ></a>
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
<script src="js/contact.js"></script>

</body>
</html>