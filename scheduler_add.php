<?php
session_start();
$uid = $_SESSION[id];

if($uid==NULL) {
	alert("부적절한 접근입니다. <br />Improper Approach. <br />해킹 시도로 감지되어 회원님의 정보가 데이터베이스에 저장되었습니다.<br /> Because of your attempt to hack the system, your information is stored in our database.");
	return;
}
$plan_name = $_POST["name"];

$des = $_POST["des"];

$time_start_h = $_POST["time_start_h"];

$time_start_m = $_POST["time_start_m"];

$time_end_h = $_POST["time_end_h"];

$time_end_m = $_POST["time_end_m"];

$input_date = $_POST["date"];

$color = $_POST["color"];

$d = split("-",$input_date);

$t_s = ((int)$time_start_h)*60 + (int)$time_start_m;

$t_e = ((int)$time_end_h)*60 + (int)$time_end_m;

$dbconnection  = mysqli_connect("ohdumak.cafe24.com","admin","ohdumak","withstudy");
mysqli_set_charset("utf8");
$query = "insert into withstudy_time_scheduler values(null,$uid,$d[0],$d[1],$d[2],$t_s,$t_e,'$color','$plan_name','$des')";
mysqli_query($dbconnection,$query);
echo $query;
return;
echo "<script>top.location.href='scheduler.php';</script>";

?>

<!doctype html>
	<head>
		<title>WithStudy :: 스케쥴</title>
	</head>
	<body>

	</body>
</html>