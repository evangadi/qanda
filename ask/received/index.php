<?php 
  require_once('../../helpers/init.php');

  // A place to handle the the question form submission 
  print "<pre>";
  print_r($_POST);
  print_r($_SESSION);

  $uid = 0; // Get this from session   
  $tid = 0; 
  $question = "";
  $explanation = "";
  $userHash = "";
  $userInfo = array(); 

  // Grab values 
  if(isset($_SESSION['uhash'])){
    $userHash = $_SESSION['uhash']; 
    $userInfo = getUserInforFromHash($userHash);
    if(!empty($userInfo)) {
      if(isset($userInfo['uid'])){
        $uid = $userInfo['uid'];
      }
    }
  }
  if(isset($_POST['topic'])){
    $tid = $_POST['topic'];
  } 
  if(isset($_POST['explanation'])){
    $explanation = $_POST['explanation'];
  } 
  if(isset($_POST['question'])){
    $question = $_POST['question'];
  } 
  // Add question to DB 
  if($uid != 0 && $tid != 0 && !empty($question)){
    addQuestion($uid, $tid, $question, $explanation); 
  }

?>