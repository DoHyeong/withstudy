<?php
	session_start();
	include_once "user.class.php";
	include_once "withstudy.class.php";

	$id = $_REQUEST['sid'];
	$pw = $_REQUEST['spw'];

	$user = new User();
	$withstudy = new withstudy();

	$judge = $user -> CheckUser($id,$pw);

	
	if($judge == null){

		// $user->CreateIdSession($judge);
		//echo '<script> location.replace("home.php") </script>';
		//$withstudy->replace_site("home.php");



						$query = "SELECT * 
				FROM  `withstudy_accounts` 
				WHERE  `user_id` LIKE  '$id'";
				$result = mysql_query($query);

				$row = mysql_fetch_array($result);

						  $_SESSION["id"] = $row[id];

						  $withstudy->replace_site("home.php");					


		

	}
	else{

		echo $judge.'h';


	}






?>