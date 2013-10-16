<?php  
	session_start();
	$uid=$_SESSION[id];
//	$uid="conankun";
// 세션 니가 알아서 집어 넣어라
// 참고로 아이디는 $uid에 들어가야된다는거 명심
?>
<?php  include("header.php");?>
		<?php  
		$type = $_GET["type"];
		if($type==null) $type=0;
		?>
		
		<?php   
		if($uid==null) {
			return;
		}
		if($type==3) {
			$dbconnection = new dbConnect;
			$dbconnection->dbConnection();
			$teachcer_num = $_GET["teacher"];
			$query = "delete from teacher_student_pair where student_id='$uid'&&teacher_id='$teachcer_num'";
			$result = $dbconnection->dbQuery($query);
			if($result) {
				?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<b>짠자잔~!</b> 과외 신청 취소가 완료 되었습니다.
			</div>
				<?php  
			} else {
				?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<b>헉!</b> 알 수 없는 이유로 과외를 취소 할 수 없습니다. 현상이 계속 되면 관리자에게 문의 하세요.
				</div>
				<?php  
			}
		}?>
		<ul class="nav nav-tabs">
  			<li <?php  if($type==0 || $type==3) echo "class='active'"?>>
   		 		<a href="?type=0">내가 신청한 선생님</a>
  			</li>
  			<li <?php  if($type==1 || $type==4) echo "class='active'"?>><a href="?type=1">나를 신청한 학생</a></li>
			<li <?php  if($type==2 ) echo "class='active'"?>><a href="?type=2">내 과외 정보 수정</a></li>
		</ul><br />
		<?php  
		if($type==0 || $type == 3) {
			// extract all lists of teacher he or she requested to tutor.
			$dbconnection = new dbConnect;
			if(!$dbconnection) die("unable to connect to DB. Contact to ADMIN");
			$dbconnection->dbConnection();
			$query = "select * from teacher_student_pair where student_id='$uid'";
			$result=$dbconnection->dbQuery($query);
			$dbconnection->dbClose();
			$rows = mysql_num_rows($result);
			for($i=0;$i<$rows;$i++) {
				$teachcer_id = (int)mysql_result($result,$i,"teacher_id");
				$dbconnection2 = new dbConnect;
				$dbconnection2->dbConnection();
				$result2 = $dbconnection2->dbQuery("select * from teacher_add_find where name=$teachcer_id");
				$dbconnection2->dbClose();
				?>
				<div style="position:relative;margin:0 auto;margin-left:1%;margin-right:1%;margin-top:10px;margin-bottom:10px;height:auto;border:1px solid rgba(0,0,0,0.5);overflow:hidden;">
					<div style="float:left;margin:0 auto;margin-top:1%;margin-left:1%;margin-bottom:1%;margin-right:1%;width:30%;height:auto;overflow:hidden;">
						<?php   
							$img_file_name = mysql_result($result2,0,"image_name");
							echo "<img src=\"teacher_image/$img_file_name\" class=img-circle style=\"width:100%;height:100%;\">";
						?>
					</div>
					<div style="border:1px solid rgba(0,0,0,0.5);float:left;margin:0 auto;margin-top:1%;margin-right:1%;margin-bottom:1%;width:64%;padding:1%;height:380px;overflow:hidden;">
				<?php   
				$sex_icon;
				$result_sex = mysql_result($result2,0,"sex");
				if($result_sex==0) { //male
					$sex_icon = "<font color=\"blue\"> ♂</font>";
				} else { //female
					$sex_icon = "<font color=\"red\"> ♀</font>";
				}
				$num_of_teacher = mysql_result($result,$i,"num");
			
				echo "이름 : ".mysql_result($result2,0,"name").$sex_icon."<br /><br />";
				
				echo "학교 : ".mysql_result($result2,0,"school")."<br /><br />";
				echo "거주지 : ".mysql_result($result2,0,"inhabit")."<br /><br />";
				$now_year = (int)date("Y");
				$born_year = (int)mysql_result($result2,0,"born_year");
				$age_now = $now_year-$born_year+1;
				echo "나이 : ".$age_now."세($born_year 년 생)<br /><br />";
				echo "가르치는 과목 : ".mysql_result($result2,0,"subject")."<br /><br />";
				echo "E-mail 주소 : ".mysql_result($result2,0,"email")."<br /><br />";
				echo "핸드폰 번호: ".mysql_result($result2,0,"phone_number")."<br /><br />";
				
				?>
				<button class="btn btn-mini" type="button">쪽지 보내기</button>
				<button class="btn btn-mini" type="button" onClick="isCancel('<?php  echo mysql_result($result2,0,"name");?>')">과외 신청 취소하기</button>
				<script>
					function isCancel(x) {
						if(confirm("정말로 과외 신청을 취소 하시겠습니까??") == true) {
						location.href="?type=3&teacher="+x;
						} else return;
					}
				</script>
				</div>
				</div>
				<?php  
			}
		} else if($type==1 || $type==4) {
			// extract all lists of students he or she is requested to tutor.
			$dbconnection = new dbConnect;
			if(!$dbconnection) die("unable to connect to DB. Contact to ADMIN");
			$dbconnection->dbConnection();
			$query = "select * from teacher_student_pair where teacher_id='$uid'";
			$result=$dbconnection->dbQuery($query);
			$dbconnection->dbClose();
			$rows = mysql_num_rows($result);
			for($i=0;$i<$rows;$i++) {
				$student_id = (int)mysql_result($result,$i,"student_id");
				$dbconnection2 = new dbConnect;
				$dbconnection2->dbConnection();
				$result2 = $dbconnection2->dbQuery("select * from withstudy_accounts where user_id=$student_id");
				$dbconnection2->dbClose();
				?>
				<div style="position:relative;margin:0 auto;padding:1%;margin-left:1%;margin-right:1%;margin-top:10px;margin-bottom:10px;height:auto;border:1px solid rgba(0,0,0,0.5);overflow:hidden;">
				<?php   
				$sex_icon="";
				/*$result_sex = mysql_result($result2,0,"sex");
				if($result_sex==0) { //male
					$sex_icon = "<font color=\"blue\"> ♂</font>";
				} else { //female
					$sex_icon = "<font color=\"red\"> ♀</font>";
				}
				$num_of_teacher = mysql_result($result,$i,"num");*/
			
				echo "이름 : ".mysql_result($result2,0,"user_name").$sex_icon."<br /><br />";
				
				//echo "학교 : ".mysql_result($result2,0,"user_school")."<br /><br />";
				//echo "거주지 : ".mysql_result($result2,0,"user_inhabit")."<br /><br />";
				/*$now_year = (int)date("Y");
				$born_year = (int)mysql_result($result2,0,"born_year");
				$age_now = $now_year-$born_year+1;
				echo "나이 : ".$age_now."세($born_year 년 생)<br /><br />";*/
			//	echo "teaching 받고 싶은 과목 : ".mysql_result($result2,0,"subject")."<br /><br />"; --> 구현할것
				echo "E-mail 주소 : ".mysql_result($result2,0,"user_email")."<br /><br />";
			//	echo "핸드폰 번호: ".mysql_result($result2,0,"phone_number")."<br /><br />"; -->구현 할 것
				
				?>
				<button class="btn btn-mini" type="button">쪽지 보내기</button>
				<button class="btn btn-mini" type="button" onClick="isCancel(<?php  echo $student_id;?>)">과외 신청 요청 취소하기</button>
				<script>
					function isCancel(x) {
						if(confirm("정말로 과외 신청을 취소 하시겠습니까??") == true) {
						location.href="?type=4&student="+x;
						} else return;
					}
				</script>
				</div>
<?php  
			}
		} else if($type==2)  {
			$dbconnection = new dbConnect;
			$dbconnection->dbConnection();
			$query = "select * from teacher_add_find where id='$uid'";
			$result = $dbconnection->dbQuery($query);
			$dbconnection->dbClose();
			if(mysql_num_rows($result)==0) {
				//등록된 과외가 없습니다
			} else {
				$name = mysql_result($result,0,"name");
				$school = mysql_result($result,0,"school");
				$subject = mysql_result($result,0,"subject");
				$description = mysql_result($result,0,"description");
				$born_year = mysql_result($result,0,"born_year");
				$inhabit = mysql_result($result,0,"inhabit");
				$email = mysql_result($result,0,"email");
				$phone_number=mysql_result($result,0,"phone_number");
				$tutoring_cost = mysql_result($result,0,"tutoring_cost");
				?>
				<form action="teacher_add.php?action=9" method="POST" class="form-horizontal">
		<div class="container">
		<div class="row">
		<div class="col-md-12"><input type="text" value="<?php echo $name;?>" style="width:100%;" name="name" placeholder="이름" required><br />
		</div></div><br /><div class="row"><div class="col-md-12">
		<input type="text" style="width:100%;" value="<?php echo $school;?>" id="inputPassword" name="school" placeholder="학교 혹은 학력" required>
    	</div></div><br />	
  		<div class="row"><div class="col-md-12">
  		<input type="text" value="<?php echo $subject;?>" style="width:100%;" id="inputPassword" name="subject" placeholder="가르치고 싶은 과목" required>
    </div></div>
    	<br /><div class="row">
    	<div class="col-md-12">
  		<textarea style="width:100%;" name="description" rows=10 placeholder="자기 자신에 대해서 설명하세요(300자 이내)" required><?php echo $description;?></textarea>
  		</div></div><br />
  		<div class="row">
  		<div class="col-md-12">
  		출생년도<br />
  		<select name="born_year" style="width:100%;">
      				<?php  
      				$current_year = (int)Date("Y");
      				for($year=$current_year;$year>=1900;$year--) {
      					if($year==$born_year) {
      						echo "<option value=\"$year\" selected>$year</option>";
      					} else {
      						echo "<option value=\"$year\">$year</option>";
						}
      				}
      				?>
    </select></div></div><br />
    <div class="row">
   	 <div class="col-md-12">
      	<input type="text" style="width:100%;" value="<?php echo $inhabit;?>" name="inhabit" placeholder="거주지" required><br />
     </div></div><br />
     <div class="row">
		<div class="col-md-12">
			<input type="radio" name="sex" value="0" <?php if(mysql_result($result,0,"sex")==0) echo "checked"?>>남자
		<input type="radio" name="sex" value="1" <?php if(mysql_result($result,0,"sex")==1) echo "checked"?>>여자
		</div></div><br />
		<div class="row">
		<div class="col-md-12"><input type="email"  style="width:100%;" type="email" value="<?php echo $email;?>" name="email" placeholder="E-mail 주소" required><br />
		</div></div><br /><div class="row"><div class="col-md-12"><input type="tel" value="<?php echo $phone_number;?>" style="width:100%;" name="phone_number" placeholder="핸드폰 번호" required><br />
		</div></div><br /><div class="row"><div class="col-md-12"><input type="number" value="<?php echo $tutoring_cost;?>" style="width:100%;" name="tutoring_cost" placeholder="희망 과외비(1달)" required>
		</div></div><br /><div class="row"><div class="col-md-12"><button type="submit" class="btn">과외 등록하기</button>
   		</div></div>
		</div>
		</form>
				<?php 
			}
			
		}
?>
</div>
		</body>
</html>