<?php 

  // Clean up
  function cleanUp($data){
    // A good article on how to sanitize user input 
      // https://dev.to/anastasionico/good-practices-how-to-sanitize-validate-and-escape-in-php-3-methods-139b 
    //  htmlspecialchars()
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
  }

  // Register
  function registerUser($fname, $lname, $email, $password) {
    global $sqlConnect;
    $fname = cleanUp($fname);
    $lname = cleanUp($lname);
    $email = cleanUp($email);
    $password = md5($password);
    $joined_date = date("Y-m-d H:i:s");
    $uHash = md5($email);


    $query_text = "INSERT INTO Users (fName, lName, email, pass, joined_date, uHash) VALUES ('$fname','$lname', '$email','$password','$joined_date','$uHash')"; 

    $query = mysqli_query($sqlConnect, $query_text);

    // Handle if there is error 
    if($query){
      // If there is anything you want to do after the user is registered 
    }else{
      // Handle error here 
    }


  }

  // log in 
  function loginUser($email, $password) {
    global $sqlConnect;
    $email = cleanUp($email);
    $password = md5($password);

    $fetched_data = array();
    
    $query_text   = "SELECT * FROM Users WHERE email = '$email' AND pass = '$password' ";
    
    $query        = mysqli_query($sqlConnect, $query_text);

    if($query ){
      while($row = mysqli_fetch_assoc($query)){
        $fetched_data = $row;
      }  	
    }

    return $fetched_data;
  }

  // Add topic 
  function addTopic($topic){
    global $sqlConnect;
    $topic = cleanUp($topic);
  
    // Insert data
    $query_text = "INSERT INTO Topics (topicName) VALUES ('$topic')";  
    $query        = mysqli_query($sqlConnect, $query_text);
    // Handle if there is error 
    if($query ){
      // If there is anything you want to do after the user is registered 
    }else{
      // Handle error here 
    }    
  }

  // Get topics 
  function getTopics(){
    global $sqlConnect;
    $fetched_data = array();
  
    $query_text   = "SELECT * FROM Topics";
    $query = mysqli_query($sqlConnect, $query_text);
    if($query ){
      while($row = mysqli_fetch_assoc($query)){
        $fetched_data[] = $row;
      }  	
    }
    return $fetched_data;     
  }

  // Get user info from uhash 
// User info from user hash 
  function getUserInforFromHash($userHash){
    global $sqlConnect;
    $userHash = cleanUp($userHash);

    $fetched_data = array();

    $query_text   = "SELECT * FROM Users WHERE uHash = '$userHash'";
    $query = mysqli_query($sqlConnect, $query_text);
    if($query ){
      while($row = mysqli_fetch_assoc($query)){
        $fetched_data = $row;
      }  	
    }
    return $fetched_data;   
  }

// Add question 
function addQuestion($uid, $tid, $question, $explanation) {
  global $sqlConnect;
  $uid = cleanUp($uid);  
  $tid = cleanUp($tid);  
  $question = cleanUp($question);  
  $explanation = cleanUp($explanation); 
  $askedDate =  date("Y-m-d H:i:s");
  $qHash = md5($question.$askedDate);

  // Insert data
  $query_text = "INSERT INTO Question (uid, tid, question, explanation, askedDate, qHash) VALUES ($uid,$tid,'$question', '$explanation','$askedDate','$qHash')";  
  $query        = mysqli_query($sqlConnect, $query_text);
  // Handle if there is error 
  if($query ){
    // If there is anything you want to do after the user is registered 
  }else{
    // Handle error here 
  }
}

// Get questions 
function getQuestions($limit){
  global $sqlConnect;
  $limit = cleanUp($limit);

  $fetched_data = array();

  $query_text   = "SELECT * FROM Question LIMIT $limit";
  $query = mysqli_query($sqlConnect, $query_text);
  if($query ){
    while($row = mysqli_fetch_assoc($query)){
      $fetched_data[] = $row;
    }  	
  }
  return $fetched_data;     
}