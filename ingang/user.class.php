<?php

		include_once "withstudy.class.php";
		$withstudyclass = new withstudy();
		$withstudyclass->db_conn(); // db접속 


	Class User{

	  


		public function User(){


		}

		public function CountUser(){ //전체 회원 유저수를 가져옴

			$data = "SELECT * FROM `withstudy_accounts`";
			$data = mysql_query($data);
			$rows = mysql_num_rows($data);

			
			return $rows;


		}


		public function CheckUser($id,$pw){ //해당 유저가 존재 할경우 들어온 아이디 반환 


			$query = "SELECT * 
				FROM  `withstudy_accounts` 
				WHERE  `user_id` LIKE  '$id'
				AND  `password` LIKE  '$pw'";

				$data = mysql_query($query);
				$judge = mysql_num_rows($data);
				$row = @mysql_fetch_array($judge);

				// echo $query;
				 

				if($judge == 1){

					return $row[id];
				}
				else{

					return null;

				}

		}

		public function CreateIdSession($id){ // 파라미터로 들어온 아이디로 세션 생성 


						
					

						$query = "SELECT * 
				FROM  `withstudy_accounts` 
				WHERE  `user_id` LIKE  '$id'";
				$result = mysql_query($query);

				$row = mysql_fetch_array($result);

						  $_SESSION["id"] = $row[id];
						//ithstudyclass->replace_site("home.php");
					
					

		}















	}














?>