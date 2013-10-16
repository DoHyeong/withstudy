<?php

$con = mysql_connect("ohdumak.cafe24.com","admin","ohdumak");
if(!$con)
{
exit('DB접속에 실패하였습니다.');
}
mysql_select_db('withstudy',$con);
mysql_query('SET NAMES utf8');
?>