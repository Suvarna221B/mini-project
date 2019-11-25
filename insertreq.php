<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inserted</title>
</head>
	<body>
	</body>
</html>
<?php
$supname = $_POST['supname'];
$quantity = $_POST['quantity'];
$class = $_POST['clas'];
if (!empty($supname) || !empty($class) || !empty($quantity)) {
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbname = "supply";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
//     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT into place ( supply_name, quantity, classroom) values(?, ?, ?)";
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
      $stmt->bind_param("sssss", $supname, $quantity, $class);
      $stmt->execute();
      echo "New record inserted sucessfully<br>";
	  echo '<button><a href="index.html">Go to home</a></button>';
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