<?php 
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  require_once($root."/config.php"); 

  // Connect to SQL Server
  $sqlConnect   = mysqli_connect($sql_db_host, $sql_db_user, $sql_db_pass, $sql_db_name);
  

  if($sqlConnect){
    // echo "Connected!!";
  }else{
    // echo "Not connected";
  }