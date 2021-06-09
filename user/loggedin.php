<?php 
  require_once('../helpers/init.php');

  print "<pre>";
  print_r($_POST);
  print_r($_SESSION);


  $email = ""; 
  $password = ""; 
  $loggedInUser = array();

  // Grab values 
  if(isset($_POST['email'])){
    $email = $_POST['email'];
  } 
  if(isset($_POST['password'])){
    $password = $_POST['password'];
  } 

  // Check if user name and password is correct 
  if(!empty($email) && !empty($password)){
    $loggedInUser = loginUser($email, $password);
  }

  if(empty($loggedInUser)){
    echo "NOT Logged in";
  }else{
    print_r($loggedInUser);
    $_SESSION['uhash'] = $loggedInUser['uHash'];
  }