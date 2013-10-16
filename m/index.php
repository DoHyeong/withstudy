<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
<meta charset = "utf-8">
<script src="/withstudyswipe.js"></script>
<script type="text/javascript" language = "javascript"> 



window.addEventListener('load', function() {
    setTimeout(scrollTo, 0, 0, 1);
}, false);

   
var now = 0;


var StartX=0;
var StartY=0;
var EndX=0;
var EndY=0;
var abcdefg= 0;


function tested(){
var a = document.getElementById("menu1");
a.style.backgroundColor = "red";
}

function init(e){
eventType = document.getElementById("eventType");
    eventType.appendChild(document.createTextNode("")); // 이벤트 타입을 표시할 텍스트노드를 생성
    cx = document.getElementById("cx");
    cx.appendChild(document.createTextNode("")); // clientX를 표시할 텍스트노드를 생성
    cy = document.getElementById("cy");
    cy.appendChild(document.createTextNode("")); // clientY를 표시할 텍스트노드를 생성
document.addEventListener("touchstart",onTCStart,false);
document.addEventListener("touchmove",onTCMove,false);
document.addEventListener("touchend",onTCEnd,false);

}


function onTCStart(e){
 eventType.childNodes[0].nodeValue = "Touch Start!";
    var touch = e.touches[0];
    cx.childNodes[0].nodeValue = event.touches[0].clientX;
    cy.childNodes[0].nodeValue = event.touches[0].clientY;




  StartX = event.touches[0].clientX;

    

}

function onTCMove(e){

   eventType.childNodes[0].nodeValue = "Touch Move!";
    var touch = e.touches[0];
    cx.childNodes[0].nodeValue = event.touches[0].clientX;
    cy.childNodes[0].nodeValue = event.touches[0].clientY;

    EndX = touch.clientX;

    if(StartX  > event.touches[0].clientX-40){

now--;
           switch(now){

                 case 0:

                
var str = '<div id ="info-image"><img src ="/withstudy/m/image/info.png" width = "80%"></div>';    	
        
            
 
                 document.getElementById("view").innerHTML = str;
                 document.getElementById("menu1").style.backgroundColor = "#cbccd3";
                 document.getElementById("menu2").style.backgroundColor = "#cbccd3";
                 document.getElementById("menu3").style.backgroundColor = "#cbccd3";
                 document.getElementById("menu4").style.backgroundColor = "#cbccd3";
                 document.getElementById("menu5").style.backgroundColor = "#cbccd3";

           }


    }

    if(StartX + 40 < event.touches[0].clientX){

now++;
           switch(now){

                 case 1:

                
                  var str = '<div id ="notice-view" onclick = "tested(this)"><ul><li><dd id ="dddd" name = "notice1" href="#" >[공지]오두막에서 신입사원을 모집합니다.</dd></li><li><dd id ="dddd" name = "notice1" href="#">[공지] 서버점검이 진행중입니다.</dd></li><li><dd id ="dddd"  name = "notice1"href="#">[공지]디미고 랑께요 랑께</dd></li><li><dd id ="dddd" name = "notice1" href="#">[공지]으아앙아아아아아아</dd></li>  </ul>   </div>';
    	
                  
 
                 document.getElementById("view").innerHTML = str;
                 document.getElementById("menu1").style.backgroundColor = "red";
                 document.getElementById("menu2").style.backgroundColor = "#cbccd3";
                 document.getElementById("menu3").style.backgroundColor = "#cbccd3";
                 document.getElementById("menu4").style.backgroundColor = "#cbccd3";
                 document.getElementById("menu5").style.backgroundColor = "#cbccd3";

           }






abcdefg==0;

    	



    }

}

function onTCEnd(e){
 eventType.childNodes[0].nodeValue = "Touch End!";
    var touch = e.touches[0];
    cx.childNodes[0].nodeValue = event.touches[0].clientX;
    cy.childNodes[0].nodeValue = event.touches[0].clientY;

}



</script>


<style type="text/css">

*{	
	margin:0px;
	padding:0px;
	overflow-x: hidden;
}

/* 블릿 작은점 없앰 */
ul{
	list-style-type:none;	
}

/* li 엘리먼트가 가로로 표시되도록 바꿈 */
li{
	display:inline;	
}
a:link, a:visited{
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
a:hover, a:active{
	background-color:#FFFFFF;
	color:#FF0000;	
}


#bar{width: 100%; height: 70px; background-color: #b7e33b;}
#menu{height: 45px;}
#view{width: 100%; height: 450px; border: 2px solid #000000;}
#info-image{margin-top: 150px;}
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

#view li {display:none; width:90%; margin:5px auto;}
        #view li:first-child {display:block;}
        #view li img {width:100%;}
</style>


</head>


<body>

	<p>이벤트 타입: <span id="eventType"></span></p>
<p>터치하고 있는 X좌표: <span id="cx"></span></p>
<p>터치하고 있는 Y좌표: <span id="cy"></span></p>

	<div id ="bar">d</div>

	
<ul>
    	<li><a href="#" id = "menu1">공지사항</a></li>
        <li><a href="#" id = "menu2">입시정보</a></li>
        <li><a href="#" id = "menu3">커뮤니티</a></li>
        <li><a href="#" id = "menu4">플래너</a></li>

    </ul>
    

    <div id ="view" >
   	
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