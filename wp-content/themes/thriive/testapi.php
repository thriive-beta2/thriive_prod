<?php
/* Template Name: API page */ 
//print_r($_REQUEST);
global $wpdb;
$phone = $_REQUEST['phone'];
$txnid = $_REQUEST['txnid'];
$payuid = $_REQUEST['payuid'];
$status = $_REQUEST['status'];
$amount = $_REQUEST['amount'];
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$productinfo = $_REQUEST['productinfo'];
$udf1 = $_REQUEST['udf1'];
$udf2 = $_REQUEST['udf2'];
$udf3 = $_REQUEST['udf3'];
$udf4 = $_REQUEST['udf4'];
$udf5 = $_REQUEST['udf5'];
$bank_ref_no = $_REQUEST['bank_ref_no'];
$addedon = $_REQUEST['addedon'];
$uemail = $_REQUEST['email'];    


$wpdb->query("INSERT INTO transaction_info (txnid,payuid,payment_status,firstname,lastname,uemail,amount,phone,productinfo,udf1,udf2,udf3,bank_ref_no,created_date) VALUES ('".$txnid."','".$payuid."','".$status."','".$firstname."','".$lastname."','".$uemail."','".$amount."','".$phone."','".$productinfo."','".$udf1."','".$udf2."','".$udf3."','".$bank_ref_no."','".$addedon."')");