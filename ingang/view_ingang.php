<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
include_once "ingang.class.php";
$withstudyclass = new withstudy();
$ingangid = $_REQUEST['ingangid'];
// if($_SESSION["id"] == null){
// $withstudy->replace_site("index.php");
// }
$ingang = new ingang();
?>

<html>

<head>

	<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0. user-scalable=no," />
	<meta charset = "utf8" />
	<script src="swipe.js"></script>

<style type = "text/css">

html,body {width:100%;height: 100%;margin:0;padding:0; overflow-x:hidden;font-family: 나눔고딕; }
#bar-top{width:100%; height: 43px; background-color: #ff8c00;}
#bar-top-text{font-size: 30px; color: white; line-height: 43px; font-weight: bold; text-align: center; cursor: pointer;}
#main{width: 100%;}
#content{width:100%; margin: 0 auto;}
#big-image{width: 100%;}
#book-title{font-size: 21px; text-align: center; margin-top: 10px;}
#book-info{font-size: 15px; text-align: center; margin-top: 5px; color: #ccc;}
#book-star{font-size: 20px; text-align: center; margin-top: 5px; color: gold;}
#book-user{font-size: 20px; text-align: center; margin-top: 5px; color: gray; border: 2px solid #000000;}
#book-content{text-align: center; margin-top: 5px; border: 2px solid #000000;}

#index-title{font-size: 25px; color: orange;}

#add-button{width: 100%; height: 40px; background-color: orange; margin-top: 10px; margin-bottom: 10px; cursor: pointer;}



</style>



</head>

<body>

<div id = "bar-top">
		<div id ="bar-top-text">책 정보</div>
	</div>

	<div id = "main">
		<div id = "content">
				
			<div id = "big-image">
<video width = "100%">

<source src = "/withstudy/ingang/video/baaa2fdfabc089918f6113f9515c837b.wmv">
</video>

			</div>
			<div id = "book-title"><?php echo $ingang -> getIngangQuestionByID($ingangid); ?></div>
			<div id = "book-info"><?php $ingang -> getIngangSolutionByID($ingangid);?></div>
			

			


			
			


		</div>
	</div>


</body>




</html>