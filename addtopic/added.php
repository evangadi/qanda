<?php 
  require_once('../helpers/init.php');

  print "<pre>";
  print_r($_POST);

  $topicName = ""; 

  // Grab values 
  if(isset($_POST['topicName'])){
    $topicName = $_POST['topicName'];
  } 

  // Add topic 
  if(!empty($topicName)){
    addTopic($topicName);
  }