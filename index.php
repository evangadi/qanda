<?php 
  require_once('helpers/init.php');

  // $_SESSION['test'] = 'example';
  // print "<pre>";
  // print_r($_POST);
  // print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <h1>Home page</h1>

  <?php if(isset($_SESSION['uhash'])): ?>
    <h2>Visible only when logged in</h2>
  <?php endif; ?>

  <?php if(!isset($_SESSION['uhash'])): ?>
    <h2>Visible only when logged out</h2>
  <?php endif; ?>
  

</body>
</html>