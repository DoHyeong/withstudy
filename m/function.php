<?php

include('db_conn.php');

class Notice{

public function GetNotice(){



$query = "SELECT * FROM `notice`";
$result = mysql_query($query);

echo '<li>';
echo '<div id ="notice-view" onclick = "tested(this)">';
echo '<ul>';



echo '<li>';
  echo '<dd id ="" name = "notice1" href="#" >';
  echo '공지';
  echo '</dd>';
  echo '</li>';
					

while ($row = mysql_fetch_assoc($result)) { 
 

  echo '<li>';
  echo '<dd id ="" name = "notice1" href="#" >';
  echo $row['title'];
  echo '</dd>';
  echo '</li>';
							

   
} 






}












}






?>