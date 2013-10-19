<?php
session_start();
include_once "user.class.php";
include_once "withstudy.class.php";
$user = new User();
$withstudy = new withstudy();

						

	?>
<!DOCTYPE html>
<html>
<head>


	<script src="../scripts/bootstrap-3.0.0/assets/js/application.js"></script>
    	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    	
	<script type="text/javascript">

		var angle = 0;
		var i=0;
setInterval(function(){
	
     if(angle<16){

     }
     else{
      angle+=4;
     $("#image").rotate(angle);}
},4);

</script>

	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta charset = "utf8">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="swipe.js"></script>


	<style type = "text/css">

	
	@font-face {
     font-family:1HoonGothicgulim R;
 src: url('/withstudy/hoon.ttf');
 
}

	html,body {background-color : #ABF200; width:100%;height: 100%;margin:0;padding:0; overflow-x:hidden; overflow: hidden; font-family:'1훈고딕굴림 R'; }


	#bar-top{width:100%; height: 43px; background-color: #ff8c00;}
	#bar-top-text{font-size: 30px; color: white; line-height: 43px; font-weight: bold; text-align: center; cursor: pointer;}
	#main{width: 100%;}
	#content{width:90%; text-align: center; margin: 0 auto;}
	#info-text{text-align: center; margin-bottom: 10%; color: white; font-size: 17px;  }
	#info-text2{text-align: center;margin-bottom: 5%; color: white; font-size: 15px;  }
	#info-text3{text-align: center; margin-bottom: 2%; color: white; font-size: 3px;  }
	#login-button{}
	#member-count{color:red; font-size: 30px; margin-top: 20px; width: 10%; border: 2px solid #000000;}
	.submit{font-size: 25px; border: 2px solid #53e400;width:100%; background-color: #53e400; margin-top: 7%; -webkit-border-radius: 8px; border-radius: 5px; height: 50px; color: white; }
	.button{border: 2px solid #53e400; width:100%; background-color: #ff8c00; margin-top: 20px; -webkit-border-radius: 8px; border-radius: 8px; height: 50px; color: white; font-weight: bold;}
#image{
  margin:100px 100px;
  
}
	


	#sliderWrap ul{-webkit-padding-start:0px; -webkit-margin-before:0px; }
		#sliderWrap li {display:none; width:100%;  }
		#sliderWrap li:first-child {display:block;}
		#sliderWrap li img {width:100%;}

		#pen-image{ position: relative;}
		#login-box{margin-top: 6%;}

		#tetest{margin-top: 3%;}


</style>
</head>	
<body>
	

	<div id = "main">
		<div id = "content">
			<div id="sliderWrap">
		<ul>
			<li>

					<script type="text/javascript" src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>
<!-- <img src="/withstudy/images/Loading.png" style = "width:14.5px; height: 45.25px; position: absolute;"id="image"> -->

				
				<div id = "pen-image"><img src = "/withstudy/images/logo_main.png" style = "position:absolute; width: 23%; margin: 0 auto; margin-top: 24%; position: relative; " id="image" /> </div>

				
			<form name="login" method= "post" action="login_check.php">
				<div id = "login-box"> 
					<input type = "text"  name = "sid"  placeholder="이메일" style =" border-top-left-radius: 5px; border-top-right-radius: 5px;  background-color :#f8ffed; border: 0px none; width: 100%; height: 50px; border-bottom:2px solid #ccc; ">
					<input type = "password" name="spw" placeholder="비밀번호" style =" border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; border: 0px none; width: 100%; height: 50px; ">

				</div>

				<div id ="login-button">
						<input type = "submit" value = "로그인" class = "submit">
				</div>

				
						<a href = "/withstudy/signup/select.php" > asdf </a>
				


			</form>
			



			</li>
			<li><img src="images/s2.jpg" alt="" /></li>
			<li><img src="images/s3.jpg" alt="" /></li>
			<li><img src="images/s4.jpg" alt="" /></li>
			<li><img src="images/s5.jpg" alt="" /></li>
			<li><img src="images/s6.jpg" alt="" /></li>
			<li><img src="images/s7.jpg" alt="" /></li>
		</ul>

		
<div id = "tetest"> 
		<div id ="info-text" style = "position: absolute; bottom: 0px; width:90%;"> Withstudy에 가입하기</div>

		<div id ="info-text2" style = "position: absolute; bottom: 0px; width:90%;"> 고객 센터</div>
		<div id ="info-text3" style = " position: absolute; bottom: 0px; width:90%;"> <img src = "/withstudy/images/bottom_jomu.png" style= "width: 33px;" /></div>

	</div>
	</div>



			
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


</body>
</html>