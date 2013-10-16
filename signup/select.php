<?php
require_once("facebook2.php");

$config = array();
$config['appId'] = '478124398953071';
$config['secret'] = '5cdc0499956368a113eedfd92a17e5b8';

$facebook = new Facebook($config);

?>


<!DOCTYPE html>
<html>
<head>


	
    	


	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta charset = "utf8">


	<style type = "text/css">

	

	html,body { width:100%;height: 100%;margin:0;padding:0; overflow-x:hidden; overflow: hidden; }


	#bar-top{width:100%; height: 43px; background-color: #ff8c00;}
	#bar-top-text{font-size: 30px; color: white; line-height: 43px; font-weight: bold; text-align: center; cursor: pointer;}
	#main{width: 100%; height: 100%;}
	#content{width:100%; height: 100%; text-align: center; margin: 0 auto;}
	
	#facebook-box{width: 100%; min-height: 50%; background-color: #3B5998;}
	#gen-box{width: 100%; min-height: 50%;  background-color: orange;}
	
	#facebook-box-image{margin-top: 10px; width: 160px; height: 160px; margin: 0 auto; border: 2px solid #000000;}
	#facebook-box-text{margin-top: 15px; color: white; font-size: 25px;}


	

</style>
</head>	
<body>
	

	<div id = "main">
		<div id = "content">
			
			
			<div id = "gen-box">
				<div id = "facebook-box-image">a</div>
				<div id = "facebook-box-text">간편한 이메일 계정으로 가입하기 </div>
			</div>

 <?php
 		$login_url = $facebook->getLoginUrl();
   	  echo '<a href="' . $login_url . '">';

   	  ?>
			<div id = "facebook-box">
				<div id = "facebook-box-image">a</div>
				<div id = "facebook-box-text"><?php $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['name'];  ?></div>
			</div>

		</a>
		
			
	</div>


	


</body>
</html>