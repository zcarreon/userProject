<?php
  function createUser($fname, $username, $email, $userLV){ //$password,
    include("connect.php");
    function randomPass(){
      $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; //List of characters that the random password can use
      $pass = array(); //declares $pass as an array
      $charLength = strlen($characters); //$charLength is equal to the string length of $characters
      for($i = 0; $i < 8; $i++){
        $n = rand(0, $charLength);
        $pass[] = $characters[$n];
      }
      return implode($pass); //Turns $pass into a string
    }
    $password = randomPass(); //passes on the random password to the password variable
    $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', DEFAULT, '{$userLV}', 'no')";
    $userQuery = mysqli_query($link, $userString);
    if($userQuery){
      mail("{$email}","Your new login","Username : {$username}\nPassword : {$password}\nURL : localhost/admin/admin_login.php"); //This is what I have for the email function. After lots of research, I found that email functions don't work on a localhost server. Because of that, I have no way of testing whether or not this works without putting it on a live server.
      redirect_to("admin_index.php");
    }else{
      $message = "<h3>There was a problem registering this user. Please contact Emergency Services.</h3>";
      return $message;
    }
    mysqli_close($link);
  }
?>
