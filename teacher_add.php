<?php  
	session_start();
	$uid=$_SESSION[id];
// 세션 니가 알아서 집어 넣어라
// 참고로 아이디는 $uid에 들어가야된다는거 명심
?>
<?php  include("header.php");?>
		<?php  
		$action = $_GET["action"];
		if($action=="1" || $action=="9") {
			if($action == "1") {
			$dbx = new dbConnect;
			$dbx->dbConnection();
			$qx = "select * from teacher_add_find where id='$uid'";
			$dbxx=$dbx->dbQuery($qx);
			$nx = mysql_num_rows($dbxx);
			if($nx > 0) {?>
			<div class="alert alert-danger">
				<b>어머!</b>이미 과외가 등록되어 있습니다.<a href="javascript:history.back(-1);">뒤로가기</a>
			</div>
			<?php 
				return;
			}
			} else if($action=="9") {
				$dbx = new dbConnect;
				$dbx->dbConnection();
				$qx = "delete from teacher_add_find where id='$uid'";
				$dbxx=$dbx->dbQuery($qx);
			}
			$name=$_POST["name"];
			$school=$_POST["school"];
			$subject=$_POST["subject"];
			$description=$_POST["description"];
			$born_year=$_POST["born_year"];
			$inhabits=$_POST["inhabit"];
			$sex=$_POST["sex"];
			$email=$_POST["email"];
			$image_name="yet_available.png";
			$phone_number=$_POST["phone_number"];
			$cost = $_POST["tutoring_cost"];
			$dbconnection = new dbConnect;
			if($name == "" || $school =="" || $subject =="" || $description=="" 
			|| $inhabit="" || $email =="" || $phone_number =="") {
				return;
			}
			if(!$dbconnection) {
				die("Unable to Connect to DB. Contact to ADMIN.");
			}
			$dbconnection->dbConnection();
			$query = "insert into teacher_add_find values(null,'$name','$school','$subject','$description',$born_year,'$inhabits','$image_name',0,0,0,$sex,0,0,'$uid','$email','$phone_number',$cost)";
			$dbconnection->dbQuery($query);
			?>
			<div class="alert alert-success">
				<b>짠자잔~!</b>과외 등록에 성공하셨습니다.<a href="teacher_find.php">과외 선생님들 리스트로</a>
			</div>
			<?php  
			$dbconnection->dbClose();
			return;
		}
		if($uid==NULL){
		?>
		<div class="alert alert-danger">
  			<b>어머!</b> 로그인을 아직 하지 않으셨어요. 로그인을 먼저 해주세요. <a href="index.php">로그인 하기</a>
		</div>
		<?php   return;} ?>
		
		<form action="teacher_add.php?action=1" method="POST" class="form-horizontal">
		<div class="container">
		<div class="row">
		<div class="col-md-12"><input type="text" style="width:100%;" name="name" placeholder="이름" required><br />
		</div></div><br /><div class="row"><div class="col-md-12">
		<input type="text" style="width:100%;" id="inputPassword" name="school" placeholder="학교 혹은 학력" required>
    	</div></div><br />	
  		<div class="row"><div class="col-md-12">
  		<input type="text" style="width:100%;" id="inputPassword" name="subject" placeholder="가르치고 싶은 과목" required>
    </div></div>
    	<br /><div class="row">
    	<div class="col-md-12">
  		<textarea style="width:100%;" name="description" rows=10 placeholder="자기 자신에 대해서 설명하세요(300자 이내)" required></textarea>
  		</div></div><br />
  		<div class="row">
  		<div class="col-md-12">
  		출생년도<br />
  		<select name="born_year" style="width:100%;">
      				<?php  
      				$current_year = (int)Date("Y");
      				for($year=$current_year;$year>=1900;$year--) {
      					/*
						 if($year==db에저장된 회원의 연도) {
						 		echo "<option value=\"$year\ selected">$year</option>";
						 }
						 * 
						 */
      					echo "<option value=\"$year\">$year</option>";
      				}
      				?>
    </select></div></div><br />
    <div class="row">
   	 <div class="col-md-12">
      	<input type="text" style="width:100%;" name="inhabit" placeholder="거주지" required><br />
     </div></div><br />
     <div class="row">
		<div class="col-md-12">
			<input type="radio" name="sex" value="0" checked>남자
			<input type="radio" name="sex" value="1">여자
		</div></div><br />
		<div class="row">
		<div class="col-md-12"><input type="email"  style="width:100%;" type="email" name="email" placeholder="E-mail 주소" required><br />
		</div></div><br /><div class="row"><div class="col-md-12"><input type="tel" style="width:100%;" name="phone_number" placeholder="핸드폰 번호" required><br />
		</div></div><br /><div class="row"><div class="col-md-12"><input type="number" style="width:100%;" name="tutoring_cost" placeholder="희망 과외비(1달)" required>
		</div></div><br />
   		<div class="row">
   			<div class="col-md-12">
   				결제 수단(과외 등록 수수료 3000원이 결제 됩니다)<br />
   				<input type="radio" name="card_type" value="visa"  checked>Visa
   				<input type="radio" name="card_type" value="mastercard">Mastercard
   			</div></div>
   			<br /><div class="row">
   				<div class="col-md-9">
   					<input type="text" name="card_num" style="width:100%;" placeholder="카드 번호를 입력하세요"  required>
   					 
   				</div>
   				<div class="col-md-3">
   					<input style="width:100%;" type="text" name="card_cvc" placeholder="CVC" required> 
   				</div>
   			</div><br />
   			<div class="row"><div class="col-md-12"><button type="submit" class="btn">과외 등록하기</button>
   		</div></div>
   		<br />
   		</div>
   	</div>
		</form>
		</body>
</html>