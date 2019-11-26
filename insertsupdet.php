<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supply Details</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util1.css">
  <link rel="stylesheet" type="text/css" href="css/main1.css">
<!--===============================================================================================-->
</head>
<body>
<?php
$sid = $_POST['sid'];
$sirid = $_POST['sirid'];
$supname = $_POST['supname'];
$sqty = $_POST['sqty'];
$qty = $_POST['qty'];
if (!empty($supname) || !empty($sirid) || !empty($sid)) {
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
     $INSERT = "INSERT into supply_det (supid,supplierid,supname,stockid,supqty) values(?,?,?,?,?)";
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
      $stmt->bind_param('sssss',$sid,$sirid,$supname,$sqty,$qty);
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

<div class="container-contact100">
<h2 style="text-align:center color:white">supply details</h2>

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
      
        $SELECT = "SELECT  supid,supplierid,supname,stockid,supqty from supply_det";
        
      $records = mysqli_query($conn,$SELECT);
    }

?>   <div style="text-align:center color:white">
    <table  text-align:"center" width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>
      
      <th>Supply id</th>
      <th>Supplierid</th>
      <th>Name</th>
      <th>Stock id</th>
      <th>Quantity</th>
<?php
      
      while($place=mysqli_fetch_assoc($records)) {
        
        echo "<tr>";
        echo "<td>".$place['supid']."</td>";
        echo "<td>".$place['supplierid']."</td>";
        echo "<td>".$place['supname']."</td>";
        echo "<td>".$place['stockid']."</td>";
        echo "<td>".$place['supqty']."</td>";
        echo "</tr>";
      }
?>      
      </tr></table></div>
  </div>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <script>
    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>