<?php
  function logIn($username, $password, $ip, $failedLogin) {
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
    $user_set = mysqli_query($link, $loginstring);
    if(mysqli_num_rows($user_set)){
      $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
      $id = $found_user['user_id'];
      $_SESSION['user_id'] = $id; //Side note : When sending data around, DO NOT USE COOKIES. Use Sessions, but do not abuse them.
      $_SESSION['user_name'] = $found_user['user_fname'];
      $_SESSION['user_date'] = $found_user['user_date']; //Grabs the date from the database
      date_default_timezone_set('America/Toronto'); //Sets the timezone to Toronto
      $currentDate = date("Y-m-d h:i:s"); //Records the current date and time
      if(mysqli_query($link, $loginstring)){
        $updatestring = "UPDATE tbl_user SET user_ip = '$ip', user_date = '$currentDate' WHERE user_id = {$id};"; //updates the date in the database.
        $updatequery = mysqli_query($link, $updatestring);
      }
      redirect_to("admin_index.php");
    }else{
      if($failedLogin >= 3){
        $message = "<h3>You have failed too many attempts to login. Please try again later.</h3>";
        return $message;
        //This is as far as I got with the Account Lockout feature. What I was trying to do is when $failedLogin hit 3,
        //the form would prevent the user from submiting anymore logins. After 3 minutes or so, $failedLogin would be
        // reset back to 0 so the user could try again. However, I was unable to find the code that would allow me to do so.
      }else{
        ++$failedLogin;
        $message = "<h3>Username and/or password is incorrect.<br>Please make sure your capslock key is turned off.</h3>";
        return $message;
      }
    }
    mysqli_close($link);
  }
?>
