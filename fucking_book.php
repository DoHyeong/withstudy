<!doctype html>
<meta charset="utf-8">
<?php
	include("mysql2_settings.php");
	$dbconnection  = mysqli_connect("ohdumak.cafe24.com","admin","ohdumak","withstudy");
	mysqli_set_charset("utf8");
	$query = "select * from book";
	$result = mysqli_query($dbconnection,$query);
	$row = mysqli_num_rows($result);
	//mysql improved
	while($rows = mysqli_fetch_array($result)) {
		$snumber = $rows[snumber];
		$title = $rows[title];
		$image = $rows[image];
		$author = $rows[author];
		$publisher = $rows[publisher];
		$published_date  = $rows[pubdate];
		$barcode = $rows[isbn];
		$description = $rows[description];
		mysqli_set_charset("utf8");
		$q2 = "insert into  withstudy_book values($snumber, '$title', '$image', '$author', '$publisher' , '$published_date', '$description', '$barcode', NULL)";
		echo $q2;
		echo "<br />";
		mysqli_query($dbconnection,$q2);
		echo "Successed to insert Query<br />";
		flush();
	}

	$dbconnection->dbClose();
?>
</html>