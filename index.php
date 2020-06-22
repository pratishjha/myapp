<?php
session_start();

include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM userDetails WHERE username = '".$myusername."' and password = '".$mypassword."'";


      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) { 
        header("Location:profile.php");
        $_SESSION['userlogin']=$myusername;
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>MY APP</title>
<style type="text/css">
  body {
  background: #72b694;
}
</style>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-page">
  <div class="container"><h1>PWA</h1>
    <h2>Catchphrase</h2></div>
  <div class="form">
    <form class="login-form" action="" method="post">
      <input type="text" name="username" placeholder="Login ID"/>
      <input type="password" name="password" placeholder="Password"/>
      <button><b>Log IN</b></button>
<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    </form>
  </div>
</div>
</body>
</html>
