<?php
session_start();
$uid = $_SESSION[id];
?>
<!doctype html><html><head><meta charset="UTF-8"><meta name="description" content=""><meta name="author" content=""><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0. user-scalable=no," /><link rel="stylesheet" href="../scripts/bootstrap-3.0.0/dist/css/bootstrap.css" type="text/css" /><style>#sliderWrap2 ul{-webkit-padding-start:0px; -webkit-margin-before:0px; border-left-width: 0px; }#sliderWrap2 li {display:none; width:100%; }#sliderWrap2 li:first-child {display:block;}#sliderWrap2 li img {width:100%;}</style><link rel="stylesheet" href="../scripts/navbar-fixed-top.css" /><script src="swipe.js"></script></head><body>
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
<li><a href="home.php">홈으로</a></li>
<li><a href="my_book.php">내 책</a></li>
<li class="divider"></li>
<li><a href="ingang/index.php">내 인강</a></li>
<li><a href="teacher_find.php">과외</a></li>
<li><a href="scheduler.php">내 스케줄</a></li>
<li><a id="bt_st" class="hidden-xs" data-toggle="modal" href="#myModal" href="scheduler.php">스케줄 추가</a></li>
</ul>
</div>
</div>
</div> 
<form action="scheduler_add.php" method="POST">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Modal title</h4>
</div>
<div class="modal-body">
<div class="container">
<input type="text"  style="width:100%;" placeholder="계획 명" name="name" required>
<textarea style="width:100%;" rows=10 name="des" placeholder="계획 상세 내용" required></textarea>
<div style="width:50%;float:left">시작 시간</div><div style="width:50%;float:left;">시작 분</div><div style="float:clear;"></div><select style="width:50%;float:left;" name="time_start_h">
<?php for($i=0;$i<24;$i++) {echo "<option value='$i'>'$i'시</option>";}?></select><select style="width:50%;float:left;" name="time_start_m">
<?php for($i=0;$i<60;$i+=5) {echo "<option value='$i'>'$i'분</option>";}?></select><div style="float:clear;"></div><div style="width:50%;float:left">끝 시간</div>
<div style="width:50%;float:left;">끝 분</div><div style="float:clear;"></div>
<select style="width:50%;float:left;" name="time_end_h">
<?php for($i=0;$i<24;$i++) {echo "<option value='$i'>'$i'시</option>";}?></select>
<select style="width:50%;float:left;" name="time_end_m">
<?php for($i=0;$i<60;$i+=5) { echo "<option value='$i'>'$i'분</option>";}?>
</select>
<div style="float:clear;"></div>
날짜<br />
<input style="width:100%;" type="date" name="date" required>
색상<br />
<input type="radio" name="color" value="255,0,0" checked>Red
<input type="radio" name="color" value="29,219,22">Green
<input type="radio" name="color" value="1,0,255">Blue
</div></div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">추가하기</button>
</div>
</div>
</div>
</div>
</form> 
<div id="sliderWrap2" style = "margin-top: 10px;"><ul><li><div><table class="table table-bordered table-hover table-condesned pull-right" style="width:100%;"><tr style="height:40px;"><td style="width:30%;height:40px;">시간</td><td style="width:70%;height:40px;">스케줄</td></tr>
	<?php
						$dbconnection  = mysqli_connect("ohdumak.cafe24.com","admin","ohdumak","withstudy");
						mysqli_set_charset("utf8");
						$query = "select time_start,time_end,color,schedule_name,schedule_des from withstudy_time_scheduler where id='$uid'";
						$result = mysqli_query($dbconnection,$query);
						$row  =mysqli_fetch_array($result,MYSQLI_BOTH);
						$cnt = 0;
						for($t=0;$t<1440;$t+=5) {echo "<tr style='height:40px;'>"; 
						if($t % 30 == 0){
							 $sda = $row[0]; 
							 echo"<td style='width:30%;' rowspan='6'>"; echo ((int)($t/60))."시".($t-((int)($t/60))*60)."분 ~ ".((int)(($t+30)/60))."시".(($t+30)-((int)(($t+30)/60))*60)."분 ";	}
							 echo "</td>";$s = (int)$row[0];$e = (int)$row[1];
							 if($t==$e) {
							 $row = mysqli_fetch_array($result,MYSQLI_BOTH);
							 $s = (int)$row[0];
							 $e = (int)$row[1];}
							 $cc = (int)($e-$s)/5;
							 if($s==$t) {$c = $row[2];$ccc = $cc*40;$cccc = $ccc."px";
							 echo "<td style='width=30%;height:$cccc;background-color:rgba($c,0.5);' ";
							 if($cc >= 2) echo "rowspan='$cc'>";else echo ">";
							 echo $row[3];
							 echo "</td>";
							} else {
								if(!($s <= $t && $t <= $e)) {
								echo "<td style='height:40px;'></td>";
								}
							}
						}echo "</tr>";mysqli_free_result($result);mysqli_close($dbconnection);
						?>
</table></div>
</li><li>
<div style="width:100%;">화요일</div></li></ul></div></div>
<script src="../scripts/bootstrap-3.0.0/assets/js/jquery.js"></script>
<script src="../scripts/bootstrap-3.0.0/assets/js/respond.min.js"></script>
<script src="../scripts/bootstrap-3.0.0/dist/js/bootstrap.js"></script>
<script src="../scripts/bootstrap-3.0.0/js/alert.js"></script>
<script src="../scripts/bootstrap-3.0.0/js/button.js"></script>
<script src="../scripts/bootstrap-3.0.0/js/collapse.js"></script>
<script src="../scripts/bootstrap-3.0.0/js/dropdown.js"></script>
<script src="../scripts/bootstrap-3.0.0/js/modal.js"></script>
<script>
$(function(){
var sliderWrap=document.getElementById('sliderWrap2');
sliderObj=new Swipe(sliderWrap);
$('.arrowBox a').eq(0).click(function(){
sliderObj.next();
})
$('.arrowBox a').eq(1).click(function(){
sliderObj.prev();
})
});
</script>
</body>
</html>