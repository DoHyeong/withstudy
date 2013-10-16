<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
$withstudyclass = new withstudy();
$bookid = $_REQUEST['book_id'];
$bigid = $_REQUEST['big_id'];
$smallid = $_REQUEST['small_id'];
echo $user_id = $_SESSION["id"];


$sql = "INSERT INTO `withstudy`.`withstudy_user_book_index` (`id`, `user_id`, `book_id`, `book_big_index`, `book_small_index`, `finshed_date`) VALUES (NULL, $user_id, $bookid, $bigid ,$smallid,NULL);";
echo $sql;

 $result33 = mysql_query($sql);


 //echo mysql_result($result33);






























?>