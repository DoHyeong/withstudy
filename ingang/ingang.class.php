<?php

include_once "withstudy.class.php";

$withstudyclass = new withstudy();
	class ingang{





		public function getIngangQuestionByID($id){

			$query = "SELECT * FROM `withstudy_ingang` WHERE id = $id;";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) 
			{
				echo $row[question];
			}

		}


		public function getIngangSolutionByID($id){

			$query = "SELECT * FROM `withstudy_ingang` WHERE id = $id;";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) 
			{
				echo $row[solution];
			}

		}




		public function getMyBookList($user_id){

			$query = "SELECT * FROM  `withstudy_user_book` INNER JOIN  `withstudy_book` ON withstudy_user_book.book_id = withstudy_book.id WHERE withstudy_user_book.user_id = $user_id";
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {

				//echo '<p><a href="/lecture/LectureDetailView.do?pflag=main&amp;service=pop&amp;group=lecture&amp;std_tar_cd=D300&amp;sbjt_id=S20130000825">
					          // <em class="title"></em>'.$row[book_title].'
							//	</a></p>';


				echo '	<tr>

									<td>'.$row[id].'</td>
									<td>'.$row[book_title].'</td>
									<td><input type = "button" value ="듣기" onclick="location.href=\'ingang_add_view.php?ingangid=\'6\';" ></td>
									<td><input type = "button" value ="추가" onclick="location.href=\'ingang_add_view.php?bookid='.$row[id].'\';" ></td>
									





								</tr>';
						


			}
		
		}


		public function getBookBigIndex($bookid){


			$query = "SELECT * FROM `withstudy_book_index` WHERE book_id = $bookid";
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {
					if($row[small_id] == 0){

						echo "<option value = ".$row[big_id].">".$row[title]."</option>";

					}
			}



		}

		public function getBookSmallIndex($bookid){


			$query = "SELECT * FROM `withstudy_book_index` WHERE book_id = $bookid";
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {
					if($row[small_id] != 0){

						echo "<option  value = ".$row[small_id].">".$row[title]."</option>";

					}
			}



		}



















}



?>