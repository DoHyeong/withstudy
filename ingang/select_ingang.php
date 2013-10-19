<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
include_once "ingang.class.php";
$withstudyclass = new withstudy();
$ingang = new ingang();
$bookid = $_REQUEST['bookid'];
?>

<html>


<?php include("header.php");?>


	<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0. user-scalable=no," />
	<meta charset = "utf8" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="swipe.js"></script>

	<script type = "text/javascript">


	</script>


	<style type = "text/css">

	#book-title{font-size: 21px; text-align: center; margin-top: 10px;}
	#book-info{font-size: 15px; text-align: center; margin-top: 5px; color: #ccc;}
	#book-star{font-size: 20px; text-align: center; margin-top: 5px; color: gold;}
	#ingang-file{border: 2px solid #ccc; margin-top: 10px;}
	#ingang-submit{width:100%; margin-top: 10px;}
	#ingang-cover{width: 100%; margin - top: 10px;}
	#sliderWrap ul{-webkit-padding-start:0px; -webkit-margin-before:0px; }
	#sliderWrap li {display:none; width:100%;  }
	#sliderWrap li:first-child {display:block;}
	#sliderWrap li img {width:100%;}

	
	</style>


	</head>



	
<form action="add_book.php" method="POST">
   <select name = "big_title" >

			<?php  $ingang->getBookBigIndex($bookid); ?>

		</select>


		<input type ="text" name= "q" />
</form>

	
	
			

			
		

		


		

		
















</div>


	<script>
		$(function(){
			var sliderWrap=document.getElementById('sliderWrap');
			sliderObj=new Swipe(sliderWrap);
			$('.arrowBox a').eq(0).click(function(){
				sliderObj.next();
			})
			$('.arrowBox a').eq(1).click(function(){
				sliderObj.prev();
			})
		})

	</script>
	</body>


</html>