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
        <h5 class="card-title">Apply For your loan</h5>
    </div>
    <div class="card-body">
    <?php if(!empty($error_msg))
    {
        echo "<div class='alert alert-danger'>$error_msg</div>";
    }?>
    <form action="insertApplication.php" method="post" autocomplete="off">
    <div class="form-group">
                <label class="control-label">Loan Amount</label>
                <input type="text" name="loanAmount" class="form-control" placeholder="Amount">
            </div>
            <div class="form-group">
                <label class="control-label">Purpose Of Loan</label>
                <input type="text" name="purposeOfLoan" class="form-control" placeholder="Business,School fees,Health">
            </div>
            <div class="form-group">
                <label class="control-label">Loan Type</label>
                <input type="text" name="loanType" class="form-control" placeholder="Daily,Weekly,Monthly">
            </div>
             <div class="form-group">
                <label class="control-label">Loan Duration</label>
                <input type="text" name="loanDuration" class="form-control" placeholder="Duration">
            </div>
            
            <div class="form-group">
                <button class="btn btn-success">Apply</button>
            </div>
        </form>
        
    </div>
   </div>        
    </div>
    </div>
    </div>
</body>
</html>