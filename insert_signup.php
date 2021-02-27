<?php 
//session_start();
require('User.php'); //filename
$obj = new User;

$fname= strip_tags(trim($_POST['fname']));
$lname= strip_tags(trim($_POST['lname']));
$BVN= strip_tags(trim($_POST['BVN']));
$gender= strip_tags(trim($_POST['gender']));
$dob= strip_tags(trim($_POST['dob']));
$address = strip_tags(trim($_POST['address']));
$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));
$password2 = strip_tags(trim($_POST['password2']));
$phone = strip_tags(trim($_POST['phonenumber']));
$email = strip_tags(trim($_POST['email']));
$location = $_POST['cus_profile'];

if($password==$password2){
	$check =$obj->register($fname,$lname,$BVN,$gender,$dob,$address,$username,$password,$phone,$email);  

if($check){
	$_SESSION['userid'] = $check ;
	header('location:login.php');
}else{
	header('location:signup.php?msg=try again');
}


}else{
	header('location:signup.php?msg=your password did not match');
}


//$cus_profile,$email,$password,$location
// $fname,$lname,$BVN,$gender,$dob,$address,$username,$password,$phone_num,$email
?>