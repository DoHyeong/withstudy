<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
$withstudyclass = new withstudy();
// if($_SESSION["id"] == null){
// $withstudy->replace_site("index.php");

// }
?>

<html>


	<!doctype html>
<?php   include('mysql_settings2.php')?>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="description" content="">
  		<meta name="author" content="">
		<link rel="stylesheet" href="../scripts/bootstrap-3.0.0/dist/css/bootstrap.css" type="text/css" />
		
		<link rel="stylesheet" href="../scripts/navbar-fixed-top.css" />
		<script src="../scripts/bootstrap-3.0.0/assets/js/application.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/customizer.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/filesaver.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/holder.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/html5shiv.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/jquery.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/jszip.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/less.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/raw-files.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/respond.min.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/assets/js/uglify.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/dist/js/bootstrap.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/affix.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/alert.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/button.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/carousel.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/collapse.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/dropdown.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/modal.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/popover.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/scrollspy.js"></script>
    	<script src="../scripts/bootstrap-3.0.0/js/tab.js"></script>

	<style type = "text/css">

img {border: 0;}
#content{width:90%; margin: 0 auto; }


#book-box{width: 100%; height: 180px; border: 2px solid #000000; margin-top: 20px; }
#book-box-image{position: absolute; width:24%; border: 2px solid #000000; margin-left: 5%; margin-top: 15px;}
#book-box-title{position: absolute; margin-left: 31%; margin-top: 15px; width:57%;  font-size: 20px; font-weight: bold;}
#book-box-date{position: absolute; margin-left: 31%; margin-top: 85px; width: 57%; }
#book-box-ratio{position: absolute; margin-left: 31%; margin-top: 115px; width: 57%; border: 2px solid #000000; height: 40px;}
#book-inner-ratio{  width: 99%; height: 98%; border: 2px solid #000000;}
</style>
		
    <!--script 존나김 ^^ㅠㅠ -->
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
 	<div class="container">
   <div class="navbar-header">
      	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      	
	</button>
	<button style="margin-top:8px;margin-right:15px;margin-bottom:8px;" class="navbar-toggle pull-right" type="button" data-toggle="collapse" onClick="location.href='add_book.php'">
        <span>+</span>
	</button>

    </div>
   <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
			<li><a href="home.php">홈으로</a></li>
                  	<li><a href="my_book.php">내 책</a></li>
                  	<li class="divider"></li>
                  	<li><a href="ingang/index.php">내 인강</a></li>
                    <li><a href="teacher_find.php">과외</a></li>
			<li class="hidden-xs"><a href="add_book.php">책 추가</a></li>
		</ul>
	</div>
    
  </div>
</div>

<div class="container">



<body>

	
	<div id = "main">
		<div id = "content">
			<!-- <div id = "book-box">
				<div id = "book-box-image">
					<div align = "center">
					<img src="http://bookthumb.phinf.naver.net/cover/070/251/07025143.jpg" style="width: 64px; height:124px;">
				</div>

				</div>
				<div id = "book-box-title">제과제빵 기능사 1급 필기 무조건 백점서</div>
				<div id = "book-box-date">2013년 9월 10일 등록	</div>
				<div id = "book-box-ratio">
					<div id = "book-inner-ratio">d</div>

				</div>		
				

			</div> -->

			<?php echo $withstudyclass -> getMyBookRowData($_SESSION["id"]); ?>

		</div>
	</div>


</div>

</body>