


<?php

require_once("facebook2.php");



$config = array();
$config['appId'] = '478124398953071';
$config['secret'] = '5cdc0499956368a113eedfd92a17e5b8';

$facebook = new Facebook($config);
  
  $user_id = $facebook->getUser();
?>
<html>
  <head></head>
  <body>

   <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['birthday'];

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.ㅗㅗㅗㅗㅗ</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  ?>


  </body>
</html>