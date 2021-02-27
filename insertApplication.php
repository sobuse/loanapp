<?php
require 'User.php';
require 'helpers.php';
$obj = new User;
$cus_id = 1;

$loanAmount = extractPostValue('loanAmount');

$purposeOfLoan = extractPostValue('purposeOfLoan');

$loanType = extractPostValue('loanType');

$loanDuration = extractPostValue('loanDuration');

if (!empty($loanAmount) && !empty($purposeOfLoan) && !empty($loanType) && !empty($loanDuration)) {

	$obj->loanApplication($cus_id, $loanAmount, $purposeOfLoan, $loanType, $loanDuration);
	header('location:index.php?msg=waiting for approval');

} else {
	header('loaction:loanapplication.php?msg=please complete the field');
}

?>