<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
include_once "ingang.class.php";
$withstudyclass = new withstudy();
$ingang = new ingang();

?>

<!doctype html><html><head><meta charset="UTF-8"><meta name="description" content=""><meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0. user-scalable=no," />
	<link rel="stylesheet" href="../../scripts/bootstrap-3.0.0/dist/css/bootstrap.css" type="text/css" />
	<style>#sliderWrap2 ul{-webkit-padding-start:0px; -webkit-margin-before:0px; border-left-width: 0px; }#sliderWrap2 li {display:none; width:100%; }#sliderWrap2 li:first-child {display:block;}#sliderWrap2 li img {width:100%;}</style>
	<link rel="stylesheet" href="../../scripts/navbar-fixed-top.css" /><script src="../swipe.js"></script>
	
	<style type = "text/css">


img {border: 0;}
#content{width:90%; margin: 0 auto; }

#book-title{font-size: 21px; text-align: center; margin-top: 10px;}
</style>
</head><body>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<button id="bt_st" data-toggle="modal" href="#myModal" style="margin-top:8px;margin-right:15px;margin-bottom:8px;" class="navbar-toggle pull-right"  type="button" data-toggle="collapse">
<span>+</span>
</button>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="../home.php">홈으로</a></li>
<li><a href="../my_book.php">내 책</a></li>
<li class="divider"></li>
<li><a href="index.php">내 인강</a></li>
<li><a href="../teacher_find.php">과외</a></li>
<li><a href="../scheduler.php">내 스케줄</a></li>
<li><a id="bt_st" class="hidden-xs" data-toggle="modal" href="#myModal" href="scheduler.php">스케줄 추가</a></li>
</ul>
</div>
</div>
</div> 
<div class="container">
<table style="width:100%;" class="table-bordered table-condesned table-hover"> 

	<tr>

		<th>번호</th>
									<th>책명</th>
									<th>듣기</th>
									<th>추가</th>

								</tr>


								<?php $ingang -> getMyBookList($_SESSION["id"]);  ?>






						</table>	


		</div>

 
		<a href="/withstudy/ingang/ingang_add_view.php?bookid=2" value ="책등록"> asdf </a>
</body>
</html>