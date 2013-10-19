<?php
session_start();
//echo $_SESSION["id"];
include_once "user.class.php";
include_once "withstudy.class.php";
$user = new User();
$withstudy = new withstudy();
// if($_SESSION["id"] == null){
// $withstudy->replace_site("index.php");

// }
?>

<?php include("header.php");
?>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0. user-scalable=no," />
	<meta charset = "utf8" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="swipe.js"></script>

	<script type = "text/javascript">




	</script>
 
<style type = "text/css">

ul,li {list-style:none;}
img {border: 0;}

#main{width: 100%;}
#content{width:90%; margin: 0 auto; }
#info-text{color:#87898c;font-size: 14px; font-weight: bold; text-shadow:1px 1px 1px #fbfcfd; margin-top: 20px;}
#user-box{width: 97%; height: 100px; border: 2px solid #ccc; margin-top: 10px;  -webkit-border-radius: 4px;}
#user-box-text{font-size: 20px; color: red; font-weight: bold; margin-top: 10px; cursor: pointer; }
#user-book-box{width:100%;  margin-top: 20px; height: 125px;}
#user-box-image{width: 10%; border: 2px solid #000000;}

#user-book-box ul {
    list-style:none;
    margin:0;
    padding:0;
}
 
#user-book-box li {
    margin: 0 0 0 0;
    padding: 0 0 0 0;
    border : 0;
    float: left;
    width: 30%;
    margin-right: 1%;
    border: 1px solid #000000; 
}

#test{}

		#sliderWrap ul{-webkit-padding-start:0px; -webkit-margin-before:0px; }
		#sliderWrap li {display:none; width:100%;  }
		#sliderWrap li:first-child {display:block;}
		#sliderWrap li img {width:100%;}

		#sliderWrap2 ul{-webkit-padding-start:0px; -webkit-margin-before:0px; border-left-width: 0px; }
		#sliderWrap2 li {display:none; width:100%;  }
		#sliderWrap2 li:first-child {display:block;}
		#sliderWrap2 li img {width:100%;}



		#eng-word{width: 100%;  margin: 0 auto; font-size: 3em; color: red; text-align: center; }
		#kor-word{width: 100%;  margin: 0 auto; font-size: 1em; color: #000000; text-align: center; margin-top: 15px; }
		#eng_phonetic{width: 100%;  margin: 0 auto; font-size: 1em; color: #ccc; text-align: center; }
		#eng_sen{width: 100%;  margin: 0 auto; font-size: 1em; color: blue; text-align: center; }
		#ko_sen{width: 100%;  margin: 0 auto; font-size: 1em; color: blue; text-align: center; }



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
    width: 30%;
    margin-right: 1%;
    border: 1px solid #000000; 
}


#test33{width:40%; border: 2px solid #000000; position: absolute;}



</style>


</head>



	<div id="sliderWrap">
		<ul>
			<li><img src="images/s1.jpg" alt="" /></li>
			<li><img src="images/s2.jpg" alt="" /></li>
			<li><img src="images/s3.jpg" alt="" /></li>
			<li><img src="images/s4.jpg" alt="" /></li>
			<li><img src="images/s5.jpg" alt="" /></li>
			<li><img src="images/s6.jpg" alt="" /></li>
			<li><img src="images/s7.jpg" alt="" /></li>
		</ul>
	</div>
	<ul class="pager hidden-xs hidden-sm">
	  <li id="prev1" class="previous"><a href="javascript:prevswipe();">&larr; 이전</a></li>
	  <li id="next1" class="next"><a href="javascript:nextswipe();">다음 &rarr;</a></li>
	</ul>
	<div id = "main" style="font-family: '나눔바른고딕' ">

	



		<div id = "content">

		

			

		
		
			<div id = "user-box-text">오늘의 과제 달성률</div>
			<br />
			<div class="progress"> <div class="progress-bar progress-bar-success" style="width:70%;"></div> <div class="progress-bar progress-bar-warning" style="width:30%;"></div></div>
			<div id = "user-box-text"><a href = "/withstudy/my_book.php">학습중인 책</a></div>

			<div id = "user-book-box">
				<ul>
					<!-- <li><div align ="center"><img src = "/withstudy/book/1.jpg" style = "width: 84px; height:124px; "></div></li>
					<li><a href = "">a</a></li>
					<li><a href = "">a</a></li> -->

					<?php  $withstudy->mainBookShow($_SESSION["id"]);   ?>
				</ul>
			</div>

	

			<div id="sliderWrap2" style = "margin-top: 10px;">
				<ul style = "border: 2px solid #000000; border-left-width:0px;">
			<!-- <li>

					<div id = "eng-word">magical</div>
					<div id = "eng_phonetic">[|mӕdƷɪkl] </div>
					<div id = "kor-word">마력이 있는; 마법에 쓰이는; 황홀한; 아주 멋진;</div>
					<div id = "eng_sen">a truly magical feeling</div>

					<div id = "ko_sen">정말 황홀한 기분</div>
			</li>

			<li><img src="images/s1.jpg" alt="" /></li>
			<li><img src="images/s2.jpg" alt="" /></li>
			<li><img src="images/s3.jpg" alt="" /></li>
			<li><img src="images/s4.jpg" alt="" /></li>
			<li><img src="images/s5.jpg" alt="" /></li>
			<li><img src="images/s6.jpg" alt="" /></li>
			<li><img src="images/s7.jpg" alt="" /></li> -->

			<?php echo $withstudy->getWordData();?>
			
		</ul>
	</div>
	<ul class="pager hidden-xs hidden-sm">
	  		<li id="prev2" class="previous"><a href="#">&larr; 이전</a></li>
	  		<li id="next2" class="next"><a href="#">다음 &rarr;</a></li>
		</ul>
	


		</div>

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
		
		function prevswipe() {
			var sliderWrap=document.getElementById('sliderWrap');
			sliderObj=new Swipe(sliderWrap);
			sliderObj.prev();
		}
		function nextswipe() {
			var sliderWrap=document.getElementById('sliderWrap');
			sliderObj=new Swipe(sliderWrap);
			sliderobj.next();
		}
		$(function(){
			var sliderWrap=document.getElementById('sliderWrap2');
			sliderObj=new Swipe(sliderWrap);
			$('.arrowBox a').eq(0).click(function(){
				sliderObj.next();
			})
			$('.arrowBox a').eq(1).click(function(){
				sliderObj.prev();
			})
		})
	</script>
</div>

</body>





</html>