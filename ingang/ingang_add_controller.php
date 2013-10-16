<?php
include_once "withstudy.class.php";
include_once "user.class.php";


?>

<html>

<head>

<meta charset = 'utf-8' >

</head>

<?php
// 4.1.0 이전의 PHP에서는, $_FILES 대신에 $HTTP_POST_FILES를
// 사용해야 합니다.




$user_id = $_SESSION["id"];
$book_id = $_REQUEST['book_id'];
$big_id = $_REQUEST['big_title'];
$small_id = $_REQUEST['small_id'];
$question = $_REQUEST['question'];
$sol = $_REQUEST['sol'];

















 $split_string = $_FILES["upfile"]["name"];
 
 
$ext = substr(strrchr($split_string,"."),1);	//확장자앞 .을 제거하기 위하여 substr()함수를 이용
$ext = strtolower($ext);			//확장자를 소문자로 변환

if (file_exists("upload/" . $_FILES["upfile"]["name"])) { // 같은 이름의 파일이 존재하는지 체크를 함
echo $_FILES["upfile"]["name"] . " 동일한 파일이 있습니다. "; // 같은 파일이 있다면 "동일한 파일이 있습니다"를 출력
} else { // 동일한 파일이 없다면
	$file = hash('md5',$_FILES["upfile"]["name"]);
	//echo $_FILES["upfile"]["tmp_name"];
move_uploaded_file($_FILES["upfile"]["tmp_name"], "video/" . $file.".".$ext);
}

$link = 'video/'.$file.".".$ext;

echo $link;

$query = "INSERT INTO `withstudy`.`withstudy_ingang` (
 `id` ,
`user_id` ,
`book_id` ,
`book_index_big` ,
`book_index_small` ,
`question` ,
`solution` ,
`cover` ,
`video` 
)
VALUES (
 NULL , '$user_id', '$book_id', '$big_id', '$small_id', '$question', '$sol','1', '$link'
);
";

$result = mysql_query($query);

echo $query;





?> 




<!-- ///////저장된것 확장자 "video/" . $file.".".$ext -->