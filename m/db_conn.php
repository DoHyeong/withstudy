<?php

$con = mysql_connect("localhost","root","apmsetup");
if(!$con)
{
die('DB접속에 실패하였습니다.');
}
mysql_select_db('withstudy',$con);
mysql_query('SET NAMES utf8');

?>

