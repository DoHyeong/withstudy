<?php
include_once "withstudy.class.php";
		$withstudyclass = new withstudy();
		$withstudyclass->db_conn(); // db접속 

require_once("facebook2.php");
$facebook = new Facebook(array('appId'  => '478124398953071', 'secret' => '5cdc0499956368a113eedfd92a17e5b8'));  
$user_fb = $facebook->getUser();


if($user_fb == 0)
{
    $user_fb = $facebook->getUser();
}

if ($user_fb) // 체크를 눌러서 넘어 왔을 경우 .
{   
    $user_profile = $facebook->api('/me'); 

    $logoutUrl = $facebook->getLogoutUrl(); 

   // var_dump($user_profile['email']);


     $sql = "SELECT * FROM withstudy_accounts WHERE facebook_id = $user_fb";
    $result = mysql_query($sql);
     $num = mysql_num_rows($result);
	 

    if($num == 0 ){ // 회원 정보에 없다면 
echo 'none';
    
    echo $user_image = "https://graph.facebook.com/$user_fb/picture";
    echo $gomsu = md5($user_image);
    echo $name = $user_profile['first_name'].$user_profile['last_name'];
    echo $email = $user_profile['email'];
    echo $birth = $user_profile['birthday'];
   // $year = split("/", $birth);
  // $grade = (2013 - $year) - 6 ;
   
   echo $query2 = "INSERT INTO `withstudy`.`withstudy_accounts` (
 `id` ,
`facebook_id` ,
`user_id` ,
`password` ,
`user_image` ,
`user_grade` ,
`user_name` ,
`user_email` ,
`user_email_allowed` ,
`join_ip` 
)
VALUES (
 NULL , '$user_fb', '$gomsu', '$gomsu', '$user_image','33','$name', '$email','1', '127.0.0.1'
)
";

$result = mysql_query($query2);
echo mysql_result($result);

    }
	
	 else{

        $query = "SELECT * FROM withstudy_accounts WHERE facebook_id = $user_fb";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
         $_SESSION["id"] = $row[id];

                         echo "<script> top.location.href='/withstudy/home.php'</script>";   


    }
    

 }

else // user's FB user ID has not getting load login url with email permission
{     
     $perms = array('scope' => 'email,user_birthday');
     $loginUrl = $facebook-> getLoginUrl($perms);        
     echo "<script> top.location.href='" . $loginUrl . "'</script>";       
     
}
?>