<?php
// session_start();

include('head.php');
    if($_POST){
        include('user.php');
        $user_object=new User();
        $loggedinuser=$user_object->login($_POST['email'],$_POST['password']);
        if(!$loggedinuser){
           $report= "<div class='alert alert-danger'>Invalid Login. Please retry</div>";
        }else{
            $_SESSION['user_email']=$loggedinuser['email'];
            $_SESSION['user_name']=$loggedinuser['name'];
            $_SESSION['user_id']=$loggedinuser['id'];
            header("Location: profile.php?msg=Successfully logged in");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login loanapp</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class='container'>
    <div class="row mt-5">
    <div class="col-md-4 offset-md-4">
    <?php if(!empty($report)){
        echo $report;
    }?>
   <div class="card">
   <?php if(!empty($_GET['msg'])){
       $msg=$_GET['msg'];
       echo "<h5>$msg</h5>";
   }
   ?>
    <div class="card-header">
        <h5 class="card-title">Login</h5>
    </div>
    <div class="card-body">
    <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Login</button>
            </div>
        </form>
        <h5>Don't have account? <a href="register.php" class="btn btn-outline-dark">Register</a></h5>
    </div>
    
   </div>        
    </div>
    </div>
    </div>
</body>
</html>
<?php
include('footer.php');
?>