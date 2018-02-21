<?php
  //ini_set('display_errors',1); //for MAC
  //error_reporting(E_ALL);
  require_once('phpscripts/config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/main.css" rel="stylesheet">
<title>CMS Portal Login</title>
</head>
<body>
  <h1>Welcome to the admin page.</h1>
  <?php
    date_default_timezone_set('America/Toronto');
    $time = date("H");
    if($time < "12"){
      echo "<h2>Good Morning, {$_SESSION['user_name']}</h2>";
    }elseif($time < "18"){
      echo "<h2>Good Afternoon, {$_SESSION['user_name']}</h2>";
    }else{
      echo "<h2>Good Evening, {$_SESSION['user_name']}</h2>";
    }
    echo "<h3>Last login was on {$_SESSION['user_date']}</h3>";
  ?>
</body>
</html>
