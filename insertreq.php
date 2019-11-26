<!doctype html>
<head>
    <title>Handyman &mdash; Free Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html"><strong>Student</strong>Portal<span class="text-primary">.</span> </a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="senate.html" class="nav-link">Home</a></li>
                  
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>


      <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <h1 class="line-bottom">Record Inserted</h1>
            </div>
            <div class="col-lg-5 ml-auto">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

<?php
$supname = $_POST['supname'];
$quantity = $_POST['quantity'];
$class = $_POST['clas'];
if (!empty($supname) || !empty($class) || !empty($quantity)) {
  $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "supply";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
//     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT into requirement_req ( supply_name, quantity, classroom) values(?, ?, ?)";
     //Prepare statement
/*     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();*/
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param('sss',$supname,$quantity,$class);
      $stmt->execute();
      
    
/*     } else {
      echo "Someone already register using this email";
     }*/
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>


<br>
<h2 class="line-bottom" style="text-align:center">requirements</h2>
<?php
  
    $host = "localhost";
      $dbUsername = "root";
    $dbPassword = "";
      $dbname = "supply";
      //create connection
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error()) {
      die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      } else {
      
        $SELECT = "SELECT  supply_name, quantity, classroom from requirement_req";
        
      $records = mysqli_query($conn,$SELECT);
    }

?>   <div style="text-align:center">
    <table  text-align:"center" width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>
      
      <th>Name</th>
      <th>Quantity</th>
      <th>Class</th>
<?php
      
      while($place=mysqli_fetch_assoc($records)) {
        
        echo "<tr>";
        echo "<td>".$place['supply_name']."</td>";
        echo "<td>".$place['quantity']."</td>";
        echo "<td>".$place['classroom']."</td>";
        echo "</tr>";
      }
?>      
      </tr></table></div>
 

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>
