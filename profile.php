<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>MY APP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-page">
  
  <div class="form" >
    <form method="post" action="" >
      <h3>What's your name ?</h3>
      <input type="text" placeholder="First Name" required="required" name="firstName"/>
      <input type="text" placeholder="Last Name"required="required" name="lastName"/>
      <br/>
      <h3>And your gender ?</h3>
     <div class="radio-toolbar">
    <input type="radio" id="radioMale" name="radiogender" value="Male" checked>
    <label for="radioMale">Male</label>

    <input type="radio" id="radioFemale" name="radiogender" value="Female">
    <label for="radioFemale">Female</label>
</div>
<p>&nbsp;</p>
      
      <h3>What's your date of birth</h3>
      <p>This can't be changed later</p>
      <input type="date" required="required" name="dob">
      <input type="submit" value="Submit">
    </form>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST['firstName']))
{
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['radiogender'];
$dob = $_POST['dob'];
$username = $_SESSION['userlogin'];

if($updatequery = mysqli_query($conn,"UPDATE userDetails SET firstName = '". $firstName ."', lastName = '". $lastName ."', gender = '". $gender ."', dob = '". $dob ."'  WHERE username='" . $username . "'"))
{

header("Location:welcome.php");
}
else
{
  echo "No query run";
}
}
?>
