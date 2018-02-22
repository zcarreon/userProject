<?php
  function createUser($fname, $username, $password, $email, $userLV){
    include("connect.php");
    $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', DEFAULT, '{$userLV}', 'no')";
    $userQuery = mysqli_query($link, $userString);
    if($userQuery){
      redirect_to("admin_index.php");
    }else{
      $message = "<h3>There was a problem registering this user. Please contact Emergency Services.</h3>";
      return $message;
    }
    mysqli_close($link);
  }
?>
