<?php 
require('user.php');
include('head.php');
$obj =new User;
if(!empty($_GET['msg'])){
    $error_msg=$_GET['msg'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loan app</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class='container'>
    <div class="row mt-5">
    <div class="col-md-6 offset-md-3">
   <div class="card">
    <div class="card-header">
        <h5 class="card-title">Sign Up</h5>
    </div>
    <div class="card-body">
    <?php if(!empty($error_msg))
    {
        echo "<div class='alert alert-danger'>$error_msg</div>";
    }?>
    <form action="insert_signup.php" method="post" autocomplete="off">
    <div class="form-group">
                <label class="control-label">First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <label class="control-label">Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label class="control-label">BVN</label>
                <input type="number" name="BVN" class="form-control" placeholder="BVN">
            </div>
            <div class="form-group">
                <label class="control-label">Gender</label><br />
                <label><input type="radio" name="gender" value="m" id="gender-male"> Male</label><br>
                <label>
                <input type="radio" name="gender" value="f" id="gender-female"> Female
                </label>
            </div>
            <div class="form-group">
                <label class="control-label">Date of birth</label>
                <input type="date" name="dob" class="form-control" placeholder="DOB">
            </div>
            <div class="form-group">
                <label class="control-label"> Address</label>
                <input type="Address" name="address" class="form-control" placeholder="Address">
            </div>
            
            
            <div class="form-group">
                <label class="control-label">Create a Username</label>
                <input type="text" name="username" class="form-control" placeholder="userName">
            </div>
          
           
            <div class="form-group">
            <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Create a password">
            </div>
            
            <div class="form-group">
            <label class="control-label">Confirm Password</label>
                <input type="password" name="password2" class="form-control" placeholder="Confirm your password">
            </div>
            
            <div class="form-group">
                <label class="control-label">Phone Number</label>
                <input type="number" name="phonenumber" class="form-control" placeholder="Phone number">
            </div>
            <div class="form-group">
            <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Register</button>
            </div>
        </form>
        <h5>Already registered? <a href="login.php" class="btn btn-outline-dark">Login</a></h5>
    </div>
   </div>        
    </div>
    </div>
    </div>
</body>
</html>