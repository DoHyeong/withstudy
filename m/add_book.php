<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
$withstudyclass = new withstudy();
?>

<!doctype html>
<?php   include('mysql_settings2.php')?>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="description" content="">
  		<meta name="author" content="">
		<link rel="stylesheet" href="../scripts/bootstrap-3.0.0/dist/css/bootstrap.css" type="text/css" />
		<script src="swipe.js"></script>

		<style type = "text/css">

#user-uni-box{width:100%;  margin-top: 20px; height: 125px;}

#user-uni-box ul {
    list-style:none;
    margin:0;
    padding:0;
}
 
#user-uni-box li {
    margin: 0 0 0 0;
    padding: 0 0 0 0;
    border : 0;
    float: left;
    width: 23%;
    margin-right: 1%;
    margin-top: 10px;
    border: 1px solid #000000; 
}

#user-uni-box a{



}



#serch-box{width: 100%; border: 2px solid #000000;}



</style>


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
      	<a href="home.php" class="navbar-brand pull-right">Withstudy</a>
    </div>
   <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
                  <li><a href="home.php">홈으로</a></li>
      				<li class="divider"></li>
                  	<li><a href="my_book.php">내 책</a></li>
                  	<li><a href="ingang/index.php">내 인강</a></li>
                    <li><a href="teacher_find.php">과외</a></li>
<li><a href="scheduler.php">내 스케줄</a></li>
		</ul>
	</div>
    
  </div>
</div>
<div class="container">


				
				<div id = "serch-box">

					
					<input type = "text">

					//select * from `withstudy_book` WHERE book_title = afsd 

					모달로 뛰워 버렷!



				</div>

				<div id = "user-uni-box">
				<ul>
					<?php $withstudyclass->getBookData(); // db접속 ?>
					</ul>
			</div>


</body>




</html>