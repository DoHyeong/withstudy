<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
$withstudyclass = new withstudy();
$uid = $_SESSION["id"];

$get = $_REQUEST['bookid'];

$query2 = "SELECT * FROM withstudy_user_book WHERE user_id = $uid AND book_id = $get ";
$result2 = mysql_query($query2);
$num = mysql_num_rows($result2);

echo $query2;


if($num == 0){

	$query = "INSERT INTO `withstudy`.`withstudy_user_book`(`id`,`user_id`,`book_id`,`add_date`)VALUES(NULL,$uid,$get,CURRENT_TIMESTAMP);";
	$result = mysql_query($query);
	echo "<script>location.replace('/withstudy/my_book.php')</script>";

}

else{

echo '실패';

}





?>