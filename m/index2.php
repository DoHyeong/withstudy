<?php
include('function.php');
$test = new Notice();

?>
<!DOCTYPE HTML>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0"/>
	<title>swipeGallery</title>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="swipe.js"></script>
	<style type="text/css">
		* {margin:0; padding:0;}
		ul,li {list-style:none;}
		img {border:0;}
		#sliderWrap li {display:none; width:90%; margin:5px auto;}
		#sliderWrap li:first-child {display:block;}
		#sliderWrap li img {width:100%;}
		.arrowBox a {display:block; width:46px; height:46px; background:url(images/arrow-btn.png) no-repeat; text-indent:-999px;}
		.arrowBox a:last-child {background-position:0 0;}
		.arrowBox a:first-child {background-position:-46px 0; float:right;}
		
		#bar{width: 100%; height: 70px; background-color: #b7e33b;}
		
		#tttt ul{
	list-style-type:none;	
}

/* li 엘리먼트가 가로로 표시되도록 바꿈 */
#tttt li{
	display:inline;	
}
#tttt a:link, a:visited{
	background-color:#cbccd3;
	color:#FFFFFF;
	text-decoration:none;
	float:left;
	text-align:center;
	width:24%;
	border-right-style:solid;
	border-right-width:1px;
	border-right-color:#FFFFFF;
	padding-top:0.5em;
	padding-bottom:0.5em;
}
/*터치, 후버 시 색상 바꿈*/
#tttt a:hover, a:active{
	background-color:#FFFFFF;
	color:#FF0000;	
}

#notice-view{}

#notice-view ul{
	list-style-type:none;	
}

/* li 엘리먼트가 가로로 표시되도록 바꿈 */
#notice-view li{
	display:inline;	
}
 #dddd{
	background-color: white;
	color:black;
	text-decoration:none;
	float:left;
	text-align:center;
	width:100%;
	border-right-style:solid;
	border-right-width:1px;
	border-right-color:#FFFFFF;
	padding-top:0.5em;
	padding-bottom:0.5em;
	border-bottom: 2px solid #ccc;
}

	</style>
</head>
<body>
	<div id ="bar">d</div>
	
	<div id="sliderWrap">
		<ul>
			<!--
			<li><img src="images/s1.jpg" alt="" /></li>
			<li><div id ="notice-view" onclick = "tested(this)"><ul><li><dd id ="" name = "notice1" href="#" >공지--</dd></li><li><dd id ="dddd" name = "notice1" href="#">[공지] 서버점검이 진행중입니다.</dd></li><li><dd id ="dddd"  name = "notice1"href="#">[공지]디미고 랑께요 랑께</dd></li><li><dd id ="dddd" name = "notice1" href="#">[공지]으아앙아아아아아아</dd></li>  </ul>   </div></li>
			<li><img src="images/s3.jpg" alt="" /></li>
			<li><img src="images/s4.jpg" alt="" /></li>
			<li><img src="images/s5.jpg" alt="" /></li>
			<li><img src="images/s6.jpg" alt="" /></li>
			<li><img src="images/s7.jpg" alt="" /></li>
		
-->
<li><img src="images/s7.jpg" alt="" /></li>
<?php $test->GetNotice();  ?>
		</ul>
	</div>
	<div class="arrowBox">
		<a href="#">다음</a>
		<a href="#">이전</a>
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