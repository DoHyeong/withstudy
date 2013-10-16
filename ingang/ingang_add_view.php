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

	
	</style>


	</head>



	<form method = "post" action = "ingang_add_controller.php" enctype='multipart/form-data'>


	
		<input type="hidden" name="book_id" value='<?php echo $bookid;  ?>' />


		<div id = "big-image">

				<img src = " <?php echo $withstudyclass -> getBookImageById($bookid); ?> " style="width:100%; height: 25%; filter:alpha(opacity=100, style=2, finishopacity=0)" />

			</div>
			<div id = "book-title"><?php echo $withstudyclass -> getBookTitleById($bookid); ?></div>
			<div id = "book-info" ><?php echo $withstudyclass -> getBookDateById($bookid); ?>,<?php echo $withstudyclass -> getBookPublisherById($bookid); ?>(<?php echo $withstudyclass -> getBookAuthorById($bookid); ?>)</div>
			

			<select name = "big_title" >

			<?php  $ingang->getBookBigIndex($bookid); ?>

		</select>


		<select name = "small_id" style = "margin-top: 5px;">

			<?php  $ingang->getBookSmallIndex($bookid);   ?>

		</select>

		<textarea name="question" style="width:100%; height: 130px; margin-top: 15px; "  placeholder ="문제 제목을 입력해 주세요">  </textarea>
		<textarea name="sol" style="width:100%; height: 100px; margin-top: 15px; "  placeholder ="주요 공식을 입력하시오~.">  </textarea>

		<div id ="ingang-file">
		<input type="file" name="upfile" size="400" placeholder = "인강 동영상 파일 "style = "width:100%;" >
		</div>

		<div id = "ingang-cover">

				<input type="file" name="cover
				" size="400" style = "width:100%;" >

		</div>

		<div id = "ingang-submit">
			<input type = "submit" value ="등록하기"style="width:100%; background-color: blue; "> </div>

	</form>














</div>
	</body>


</html>