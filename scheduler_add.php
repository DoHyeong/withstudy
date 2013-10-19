<?php
session_start();
$uid = $_SESSION[id];

$plan_name = $_POST["name"];

$des = $_POST["des"];

$time_start_h = $_POST["time_start_h"];

$time_start_m = $_POST["time_start_m"];

$time_end_h = $_POST["time_end_h"];

$time_end_m = $_POST["time_end_m"];

$input_date = $_POST["date"];

$color = $_POST["color"];

$d = split("-",$input_date);

echo $d[0];


?>

<!doctype html>
	<head>
		<title>WithStudy :: 스케쥴</title>
	</head>
	<body>

	</body>
</html>