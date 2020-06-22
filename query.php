<?php
session_start();
if(isset($_POST['username']))
{
$firstName = $_POST['username'];
$lastName = $_POST['lastName'];
$gender = $_POST['radiogender'];
$dob = $_POST['dob'];
$username = $_SESSION['userlogin'];

$updatequery = mysqli_query($conn,"UPDATE userDetails SET firstName = '". $firstName ."', lastName = '". $lastName ."', gender = '". $gender ."', dob = '". $dob ."'  WHERE username='" . $username . "'");

header("Location:welcome.php");
}
?>