<?php
session_start();
include_once "withstudy.class.php";
include_once "user.class.php";
$withstudyclass = new withstudy();
$bookid = $_REQUEST['bookid'];
$uid = $_SESSION["id"];
// if($_SESSION["id"] == null){
// $withstudy->replace_site("index.php");
// }
?>

<?php

	class withstudy{


		public function withstudy(){


		}



		public function mainBookShow($user_id){ //home.php에서의 북 정보 


			$sql = "SELECT * FROM `withstudy_user_book` INNER jOIN `withstudy_book` ON withstudy_user_book.book_id = withstudy_book.id WHERE withstudy_user_book.user_id = $user_id  ";
			//echo $sql;
			$result = mysql_query($sql);

			

		$count = 0;

			while ($row = mysql_fetch_array($result) ) {


				
				if($count == 3){

					break;
				}


				
				if($row[id] != null){

					echo '<li><a href = "/withstudy/my_book_info.php?bookid='.$row[book_id].'"><div align ="center"><img src = "'.$row[book_image].'" style = "width: 84px; height:124px;  "></div></a></li>';




				}else{

					echo '<li><a href = "">a</a></li>';

				}
				
					


					
				

					$count ++;
				
			}

				

					


		}






		
		public function getMyBookRowData($user_id){

			//getSmallIndexNum($book_id)

$test = 0;

			$num_query = "";

			$query = "SELECT * FROM  `withstudy_user_book` INNER JOIN  `withstudy_book` ON withstudy_user_book.book_id = withstudy_book.id WHERE withstudy_user_book.user_id = $user_id";
			
			//$query = "SELECT * FROM  `withstudy_user_book` INNER JOIN  `withstudy_book` WHERE withstudy_user_book.user_id = $user_id";
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {

				// $num_query = "SELECT * FROM withstudy_user_book_index WHERE book_id = $row[book_id] AND user_id = $user_id AND finshed_date != null";
				// $result = mysql_query($num_query);
				// $result = mysql_num_rows($result);

				// $mount =  $this-> getSmallIndexNum($row[book_id]);

				
				// $fuck = ($result/$mount) * 100;

				echo '<div id = "book-box">
				<div id = "book-box-image">
					<div align = "center">
					<img src="'.$row[book_image].'" style="width: 64px; height:124px;">
				</div>

				</div>
				<a href = "/withstudy/my_book_info.php?bookid='.$row[book_id].'" > <div id = "book-box-title">'.$row[book_title].'</div> </a>
				<div id = "book-box-date">'.$row[add_date].' 등록	</div>
				<div id = "book-box-ratio">
					<div id = "book-inner-ratio" style = "width:'.$fuck.'%">d</div>

				</div>		
				

			</div>';


	

			}




		}



public function getMyBookRowData2($user_id){

			//getSmallIndexNum($book_id)

$test = 0;

			$num_query = "";

			$query = "SELECT * FROM  `withstudy_user_book` INNER JOIN  `withstudy_book` ON withstudy_user_book.book_id = withstudy_book.id WHERE withstudy_user_book.user_id = $user_id";
			
			//$query = "SELECT * FROM  `withstudy_user_book` INNER JOIN  `withstudy_book` WHERE withstudy_user_book.user_id = $user_id";
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {

				// $num_query = "SELECT * FROM withstudy_user_book_index WHERE book_id = $row[book_id] AND user_id = $user_id AND finshed_date != null";
				// $result = mysql_query($num_query);
				// $result = mysql_num_rows($result);

				// $mount =  $this-> getSmallIndexNum($row[book_id]);

				
				// $fuck = ($result/$mount) * 100;

				echo '<div id = "book-box">
				<div id = "book-box-image">
					<div align = "center">
					<img src="'.$row[book_image].'" style="width: 64px; height:124px;">
				</div>

				</div>
				<a href = "/withstudy/my_book_info.php?bookid='.$row[book_id].'" > <div id = "book-box-title">'.$row[book_title].'</div> </a>
				<div id = "book-box-date">'.$row[add_date].' 등록	</div>
				<div id = "book-box-ratio">
					<div id = "book-inner-ratio" style = "width:'.$fuck.'%">d</div>

				</div>		
				

			</div>';


	

			}




		}




		public function getBigIndexNum($book_id){ //큰제목 갯수 

			$query = "SELECT * FROM withstudy_book_index WHERE book_id = $book_id AND small_id = 0";
			$result = mysql_query($query);
			$num = mysql_num_rows($result);

			return $num;

		}

		public function getSmallIndexNum($book_id){ //큰제목 갯수 

			$query = "SELECT * FROM withstudy_book_index WHERE book_id = $book_id AND big_id != 0";
			$result = mysql_query($query);
			$num = mysql_num_rows($result);

			return $num;

		}




		public function getBigIndexById($book_id){//책의 큰제목 

				$query = "SELECT * FROM withstudy_book_index WHERE book_id = $book_id";
				$result = mysql_query($query);

				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {

					if($row[small_id] == 0){

						echo "<div id = \"index-title\">".$row[title]."</div>";

					}


					
					echo "▶".$row[title]."<br />";
					



				}

				


		}





		public function getBigMyIndexById($book_id,$uid){//책의 큰제목 

				$query = "SELECT * FROM withstudy_book_index WHERE book_id = $book_id";
				$result = mysql_query($query);

				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {

					if($row[small_id] == 0){

						echo "<div id = \"index-title\">".$row[title]."</div>";
						//echo "<input type = 'button' value = '".$row[title]."' />";

					}


					$query2 = "SELECT * FROM withstudy_user_book_index WHERE book_id = $book_id AND book_big_index = $row[big_id] AND book_small_index = $row[small_id] AND user_id = $uid ";
					//echo $query2;
					$result2 = mysql_query($query2);
					$num = mysql_num_rows($result2);

					if($num != 0){

						echo "<input type = 'button' style = 'width: 100%; height: 35px; margin-top: 20px; background-color: green;' onclick = 'add(".$book_id.",".$row[big_id].",".$row[small_id].")' value = '".$row[title]."' /> <br />";
					
					}

					else{

						echo "<input type = 'button' style = 'width: 100%; height: 35px; margin-top: 20px; background-color: red;' onclick = 'add(".$book_id.",".$row[big_id].",".$row[small_id].")' value = '".$row[title]."' /> <br />";

					}



					
				
				
				
			//}



				}

				


		}




		public function getRow($table_name){

			
			$query = "SELECT * FROM ".$table_name;
			$result = mysql_query($query);
			$rows = mysql_num_rows($result);

			return $rows;




		}

		public function getWordData(){

			
			echo $num = $this->getRow('withstudy_word');
			
			
			$rand = mt_rand(0,$num-10);

			for(;;){

			if($rand < $num-5){

			$rand = mt_rand(0,$num);
			
			}
			else{

				break;
			}


		}

			
			$rand2 = $rand;
			$rand = $rand-10;
			$query = "SELECT * FROM withstudy_word LIMIT $rand, $rand2";
			$result = mysql_query($query);
			//echo $query;

			 mysql_num_rows($result);
			//echo $query;

			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {

					echo "<li><div id = 'eng-word'>".$row[eng_word]."</div>";
					echo "<div id = 'eng_phonetic'>".$row[eng_phonetic]."</div>";
					echo "<div id = 'kor-word'>".$row[ko_word]."</div>";
					// echo "<div id = 'eng_sen'>".$row[eng_sen]."</div>";
					// echo "<div id = 'ko_sen'>".$row[ko_sen]."</div>
					// 	</li>";
						}			
			

		}

		public function getBookBigIndexCountById($id){

				$query = "SELECT * FROM withstudy_book_index WHERE big_id = 0 AND book_id = $id";
				$result = mysql_query($query);
				$row = mysql_num_rows($result);

				return $row;
		}

		public function getBookUserCountById($id){
				$query = "SELECT * FROM withstudy_user_book WHERE  book_id = $id";
				$result = mysql_query($query);
				$row = mysql_num_rows($result);

				return $row;

		}

		public function getBookTitleById($id){

			$query = "SELECT book_title FROM withstudy_book WHERE id = $id";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);

			return $row[0];



		}

		public function getBookImageById($id){

			$query = "SELECT book_image FROM withstudy_book WHERE id = $id";

			$result = mysql_query($query);
			$row = mysql_fetch_array($result);

			return $row[0];
			
		}

		public function getBookAuthorById($id){

			$query = "SELECT book_author FROM withstudy_book WHERE id = $id";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);

			return $row[0];
			
		}

		public function getBookPublisherById($id){

			$query = "SELECT book_publisher FROM withstudy_book WHERE id = $id";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);

			return $row[0];


		}

		public function getBookDateById($id){

			$query = "SELECT book_published_date FROM withstudy_book WHERE id = $id";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);

			return $row[0];
		}


		public function getBookDataByKey($key,$criterion) {
			/*if($key != "book_title" || $key != "book_autor" || $key != "book_publisher") {
				echo "잘못된 접근입니다. 잘못된 접근이 여러번 발생할 시 제제를 당할 수 있습니다."
				return;
			}*/
			$query = "SELECT image,snumber FROM book WHERE $key LIKE '%$criterion%'";
			
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
    			//printf ("<li><div align ='center'><img src = '$s' /></div></li>", $row[0]);
    			

    			// echo "<li><div align ='center'><img src = '".$row[0]."' style = 'width: 64px; height:104px;' /></div></li>";
				$cnt++;

    			// echo "<li><div align ='center'><img src = '".$row[0]."' style = 'width: 64px; height:104px;' /></div></li>";
    			if($cnt%4==0) {
    				echo "<a href = '/withstudy/book_info.php?bookid=".$row[id]."'><li><div align ='center'><img src = '".$row[0]."' style = 'width: 64px; height:104px;' /></div></li></a>";
    			} else
    			 echo "<a href = '/withstudy/book_info.php?bookid=".$row[id]."'><li style='margin-right:1%;'><div align ='center'><img src = '".$row[0]."' style = 'width: 64px; height:104px;' /></div></li></a>";

    			
			}
		}

		public function getBookData(){
		

			$query = "SELECT image,snumber FROM book";
			$result = mysql_query($query);
			$cnt=0;
			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
    			//printf ("<li><div align ='center'><img src = '$s' /></div></li>", $row[0]);
    			$cnt++;

    			// echo "<li><div align ='center'><img src = '".$row[0]."' style = 'width: 64px; height:104px;' /></div></li>";
    			if($cnt%4==0) {
    				echo "<a href = '/withstudy/book_info.php?bookid=".$row[id]."'><li><div align ='center'><img src = '".$row[0]."' style = 'width: 64px; height:104px;' /></div></li></a>";
    			} else
    			 echo "<a href = '/withstudy/book_info.php?bookid=".$row[id]."'><li style='margin-right:1%;'><div align ='center'><img src = '".$row[0]."' style = 'width: 64px; height:104px;' /></div></li></a>";

    			
			}
		}



		public function db_conn(){

			$con = mysql_connect("ohdumak.cafe24.com","admin","ohdumak");

			//$con = mysql_connect($host,$id,$pw);

			if(!$con)
			{
				exit('DB접속에 실패하였습니다.');
			}
			mysql_select_db("withstudy",$con);
			mysql_query('SET NAMES utf8');


		}

		public function replace_site($url){

			echo "<script>location.replace('$url')</script>";


		}






	}






?>