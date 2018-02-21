<?php
  //ini_set('display_errors',1); //for MAC
  //error_reporting(E_ALL);

  require_once('phpscripts/config.php');

  $ip = $_SERVER['REMOTE_ADDR']; //Gets the IP Address
  //echo $ip;
  $failedLogin = 0;
  if(isset($_POST['submit'])) {
    $username = trim($_POST['username']); //trim removes spaces at the beginning and end
    $password = trim($_POST['password']);
    if($username !== "" && $password !== "") {
      $result = logIn($username, $password, $ip, $failedLogin);
      $message = $result;
    }else{
      $message = "<h3>Please fill in the required fields.</h3>";
    }
  }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
<link href="css/main.css" rel="stylesheet">
</head>
<body>
  <h1>Welcome, Admin</h1>
  <?php
    if(!empty($message)){
      echo $message;
    }
  ?>
  <form action="admin_login.php" method="post">
    <input type="text" name="username" value="" placeholder="Username">
    <input type="text" name="password" value="" placeholder="Password">
    <br>
    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
