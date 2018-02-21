<?php
  //DO NOT PUT A LINK TO THE CALLER.PHP IN CONFIG.PHP! 
  require_once("config.php");
  if(isset($_GET["caller_id"])){
    $dir = $_GET["caller_id"];
    if($dir == "Logout") {
      logged_out();
    }else{
      echo "Caller id was passed incorrectly.";
    }
  }
?>
