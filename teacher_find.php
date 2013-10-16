<?php  
	session_start();
	$uid=$_SESSION[id];
// 세션 니가 알아서 집어 넣어라
// 참고로 아이디는 $uid에 들어가야된다는거 명심
?>
<?php  include("header.php");?>
		<?php   
		$action = $_POST["action"];
		$teacher = $_POST["teacher"];
		$message = $_POST["message"];
		if($message=="") $message="학생이 남긴 하고 싶은 말이 없습니다.";
		if($action=="reg") {
			$dbconnection3 = new dbConnect;
			if(!$dbconnection3) {
				die("Unable to Connect to DB. Contact to ADMIN.");
			}
			$dbconnection3->dbConnection();
			$query3 = "select * from teacher_student_pair where student_id='$uid'&&teacher_id='$teacher'";
			$result2=$dbconnection3->dbQuery($query3);
			$dbconnection3->dbClose();
			$isAlreadyJoined=mysql_num_rows($result2);
			if($isAlreadyJoined) {
				
				?>
				<div class="alert alert-danger">
					<b>헉!</b> 이미 과외 신청이 이 분께 되어있어서 더 이상 이 분께 신청 할 수 없습니다.
					<a href="#" class="close" data-dismiss="alert">&times</a>
				</div>
				<?php   
			} else {
			$dbconnection2 = new dbConnect;
			if(!$dbconnection2) {
				die("Unable to Connect to DB. Contact to ADMIN.");
			}
			$dbconnection2->dbConnection();
			$date_ = date('Y-m-d h::i::s');
			$query2 = "insert into teacher_student_pair values(null,'$uid','$teacher','$date_','$message')";
			$dbconnection2->dbQuery($query2);
			$dbconnection2->dbClose();
			?>
			<div class="alert alert-success">
				<b>짠짜잔~!</b> 과외 신청이 정상적으로 완료 되었습니다.
				<a href="#" class="close" data-dismiss="alert">&times</a>
			</div> 
			<?php   
			}
		}
		?>
		<div style="position:relative;margin:0 auto;margin-top:10px;margin-left:1%;margin-right:1%;height:30px;">
		<div class="btn-group">
  		<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
   			Sort by
  		  <span class="caret"></span>
  		</button>
			<ul class="dropdown-menu" role="menu">
	 			<li><a tabindex="-1" href="teacher_find.php">전체 보기</a></li>
	 			<li class="divider"></li>
	 			<li><a tabindex="0" href="teacher_find.php?orderby=name">이름</a></li>
	  			<li><a tabindex="1" href="teacher_find.php?orderby=location">위치</a></li>
	  			<li><a tabindex="2" href="teacher_find.php?orderby=rate">만족도</a></li>
	  			<li class="divider"></li>
	  			<li><a tabindex="3" href="teacher_find.php?orderby=age_increasing_order">오름차순</a></li>
	  			<li><a tabindex="4" href="teacher_find.php?orderby=age_decreasing_order">내림차순</a></li>
	  			<li class="divider"></li>
	  			<li><a tabindex="5" href="teacher_find.php?orderby=male">남자</a></li>
	  			<li><a tabindex="6" href="teacher_find.php?orderby=female">여자</a></li>
	  			
			</ul>
		</div>

		<div class="btn-group" style="float:right;">
  		<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
   			과외 선생님
  		  <col-md- class="caret"></col-md->
  		</button>
			<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu">
	 			<li><a tabindex="-1" href="teacher_add.php">과외 등록</a></li>
	  			<li><a tabindex="-1" href="teacher_manage.php">과외 관리</a></li>
	  		</ul>
		</div>
		<div style="both:clear;"></div>
		
		</div>
		<!-- 
		초등부 / 중등부 내신 초급 / 중등부 내신 중급 / 중등부 내신 고급 / 중등부 경시 / 고등부 내신 / 고등부 수능 / 고등부 경시 / TOEFL / IELTS / TEPS / TOEIC / SAT/ AP / 기타 	
		-->
		<br />
		<?php   
			$query="select * from teacher_add_find";
			$orderby=$_GET["orderby"];
			//SQL Injection avoid
			$orderby = str_replace("'","",$orderby);
			if($orderby=="location") {
				//특수케이스
			}
			else if($orderby=="rate") {
				//특수 케이스
				$query=$query." order by rate_sum/number_of_people_evaluated";
			}
			else if($orderby=="name") {
				$query=$query." order by name";
			} else if($orderby=="age_increasing_order") {
				$query=$query." order by born_year desc";
			} else if($orderby=="age_decreasing_order") {
				$query=$query." order by born_year";
			} else if($orderby=="male") {
				
				
				$query=$query." where sex=0";
			}
			else if($orderby=="female") {
				$query=$query." where sex=1";
			}
				$dbconnection = new dbConnect;
				if(!$dbconnection) {
					die("Unable to Connect to DB. Contact to ADMIN.");
				}
				$dbconnection->dbConnection();
				$result=$dbconnection->dbQuery($query);
				$row = mysql_num_rows($result);
				$dbconnection->dbClose();
			?>
			<table class="table table-bordered table-hover">
			
			<?php 
				for($i=0;$i<$row;$i++) {
		?><tr><td>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-4 hidden-sm" align="center">
					<?php   
						$img_file_name = mysql_result($result,$i,"image_name");
						echo "<img src=\"teacher_image/$img_file_name\" class=img-circle style=\"width:300px;height:300px;\" />"
					?>
				</div>
				<div class="col-md-12 visible-sm" align="center">
					<?php   
						$img_file_name = mysql_result($result,$i,"image_name");
						echo "<img src=\"teacher_image/$img_file_name\" class=img-circle style=\"width:300px;height:300px;\" />"
					?>
				</div>
				<div class="col-md-8 col-lg-8 hidden-sm" align="center">
					<?php   
				$sex_icon;
				$result_sex = mysql_result($result,$i,"sex");
				if($result_sex==0) { //male
					$sex_icon = "<font color=\"blue\"> ♂</font>";
				} else { //female
					$sex_icon = "<font color=\"red\"> ♀</font>";
				}
				$num_of_teacher = mysql_result($result,$i,"num");
				
			$dbconnection4 = new dbConnect;
			if(!$dbconnection4) {
				die("Unable to Connect to DB. Contact to ADMIN.");
			}
			$dbconnection4->dbConnection();
			$i_tmp = mysql_result($result,$i,"id");
			$query4 = "select * from teacher_student_pair where student_id='$uid'&&teacher_id='$i_tmp'";
			$result3=$dbconnection4->dbQuery($query4);
			$dbconnection4->dbClose();
			$isAlreadyJoined2=mysql_num_rows($result3);
				$temp;
				if($isAlreadyJoined2 || mysql_result($result,$i,"id")==$uid) {
					$temp="<br /><br />";
				} else {
					$temp = "<a data-toggle='modal' href='#myModal$num_of_teacher' class='btn btn-primary btn-xs'>과외신청하기</a><br />";
				}
				echo "이름 : ".mysql_result($result,$i,"name").$sex_icon.$temp;
				
				echo "학교 : ".mysql_result($result,$i,"school")."<br /><br />";
				echo "거주지 : ".mysql_result($result,$i,"inhabit")."<br /><br />";
				$now_year = (int)date("Y");
				$born_year = (int)mysql_result($result,$i,"born_year");
				$age_now = $now_year-$born_year+1;
				echo "나이 : ".$age_now."세($born_year 년 생)<br /><br />";
				echo "가르치는 과목 : ".str_replace("\n","<br />",mysql_result($result,$i,"subject"))."<br /><br />";
				echo "희망 과외비 : ".mysql_result($result,$i,"tutoring_cost")."원/1달<br /><br />";
				echo "소개 : ".mysql_result($result,$i,"description")."<br /><br />";
				
				?>	
				</div>
				<div class="col-md-12 visible-sm" align="center">
				<?php 
				echo "이름 : ".mysql_result($result,$i,"name").$sex_icon.$temp;
				
				echo "학교 : ".mysql_result($result,$i,"school")."<br /><br />";
				echo "거주지 : ".mysql_result($result,$i,"inhabit")."<br /><br />";
				echo "나이 : ".$age_now."세($born_year 년 생)<br /><br />";
				echo "가르치는 과목 : ".mysql_result($result,$i,"subject")."<br /><br />";
				echo "희망 과외비 : ".mysql_result($result,$i,"tutoring_cost")."원/1달<br /><br />";
				echo "소개 : ".mysql_result($result,$i,"description")."<br /><br />";
				?>
				</div>
			</div>
		</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $num_of_teacher?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   			<h3 id="myModalLabel">정말로 이 분께 과외 신청을 하시겠습니까?</h3>
        </div>
        <div class="modal-body">
           <?php   
							
							echo "이름 : ".mysql_result($result,$i,"name").$sex_icon."<br /><br />";
							echo "학교 : ".mysql_result($result,$i,"school")."<br /><br />";
							echo "거주지 : ".mysql_result($result,$i,"inhabit")."<br /><br />";
							echo "태어난 연도 : ".mysql_result($result,$i,"born_year")."<br /><br />";
							echo "가르치는 과목 : ".mysql_result($result,$i,"subject")."<br /><br />";
							echo "소개 : ".mysql_result($result,$i,"description")."<br /><br />";
							
							?>
							
   						 </p>
   						 <form name="frm_<?php   echo $i;?>" action="teacher_find.php" method="POST">
   						 	<input type="hidden" name="action" value="reg">
   						 	<input type="hidden" name="teacher" value="<?php    echo mysql_result($result,$i,"id");?>">
   						 	<input type="text" style="width:80%;" name="message" placeholder="하고 싶은 말(한 줄 이내)"> 
   						 </form>
        </div>
        <div class="modal-footer">
         	<button class="btn" data-dismiss="modal" aria-hidden="true">취소</button>
    		<button class="btn btn-primary" onClick="document.forms['frm_<?php echo $i;?>'].submit();">신청</button> </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
			<div style="clear:both;"></div>
		</td></tr>
		<?php   
				}
		?></table>
		<script>
			function showModal(name) {
				$(name).modal('show');
			}
		</script>
		</div>
	</body>
</html>