<?php
  //ini_set('display_errors',1); //for MAC
  error_reporting(E_ALL);
  require_once("phpscripts/config.php");
  if(isset($_POST["submit"])){
    $fname = trim($_POST["fname"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $userLV = $_POST["userLV"];
    if(empty($userLV)){
      $message = "Please select a user level.";
    }else{
      $result = createUser($fname, $username, $password, $email, $userLV);
      $message = $result;
    }
  }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link href="css/main.css" rel="stylesheet">
</head>
<body>
  <h1>Welcome, Admin</h1>
  <?php
    if(!empty($message)){
      echo $message;
    }
  ?>
  <form action="admin_createuser.php" method="post">
    <input type="text" name="fname" placeholder="First Name" value="<?php if(!empty($fname)){echo $fname;}?>">
    <input type="text" name="username" placeholder="Username" value="<?php if(!empty($username)){echo $username;}?>">
    <input type="text" name="password" placeholder="Password" value="<?php if(!empty($password)){echo $password;}?>">
    <input type="text" name="email" placeholder="Email" value="<?php if(!empty($email)){echo $email;}?>">
    <select name="userLV">
      <option value="">Please Select a User Level.</option>
      <option value="1">Web Admin</option>
      <option value="2">Web Master</option>
    </select>
    <input type="submit" name="submit" value="Create User">
  </form>
</body>
</html>
