<?php
$username = $_POST['username'];
$password = $_POST['password'];
if (!empty($username) || !empty($password)) {
  $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "supply";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
	  $sql = "SELECT id FROM admin WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		 if($username == 'senate'){
			header("location: senate.html"); 
		 }
         else if($username == 'admin'){
			header("location: cards.html"); 
		 }
      }else {
         $error = "Your Login Name or Password is invalid";
      }
	}
}
?>