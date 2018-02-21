<?php
  function createUser($fname, $username, $password, $email, $userLV){
    include("connect.php");
    $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', {$userLV})";
    $userQuery = mysqli_query($link, $userString);
    if($userQuery){
      redirect_to("admin_index.php");
    }else{
      $message = "There was a problem registering this user. Please contact Emergency Services.";
      return $message;
    }
    mysqli_close($link);
  }
?>
