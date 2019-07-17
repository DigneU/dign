<?php
include 'connect.php';

$cover_name = $_FILES['cover']['name'];
$details_name = $_FILES['details']['name'];

$cover_size = $_FILES['cover']['size']/1014;
$details_size = $_FILES['details']['size']/1014;

$cover_size = round($cover_size/1024,3);
$details_size = round($details_size/1024,3);

$cover_error = $_FILES['cover']['error'];
$details_error = $_FILES['details']['error'];

$cover_tmp = $_FILES['cover']['tmp_name'];
$details_tmp = $_FILES['details']['tmp_name'];
/*--------------------------get type----------------------------*/
$c = explode('.', $cover_name);
$d = explode('.', $details_name);
$ccount = count($c) -1;
$dcount = count($d) -1;
$cover_type = $c[$ccount];
$details_type = $d[$dcount];
/*-----------------------------path-----------------------------*/
$cpath = "./books/covers/";
$dpath = "./books/details/";

if ($cover_error > 0 AND $details_error > 0 ) {
	header("LOCATION:operation.php?fileerror=1");
	//echo "$cover_error<br>";
	//echo "$details_error<br>";
}
elseif ($cover_size > 1 ) {
	header("LOCATION:operation.php?sizecerror=1");
	//echo "size cover error<br>";
}
elseif ($details_size > 10 ) {
	header("LOCATION:operation.php?sizederror=1");
	//echo "size details error<br>";
}
elseif ($cover_type != "jpg" && $cover_type != "png" && $cover_type != "JPG" && $cover_type != "PNG") {
	header("LOCATION:operation.php?typecerror=1");
	//echo "type cover error<br>";
	//echo $cover_type;
}
elseif ($details_type != "pdf" && $details_type != "txt" && $details_type != "PDF" && $details_type != "TXT") {
	header("LOCATION:operation.php?typederror=1");
	//echo "type details error<br>";
	//echo $details_type;
}
else{
	$title = htmlspecialchars(trim($_POST['bookname']));
	$author = htmlspecialchars(trim($_POST['author']));
	$copy = htmlspecialchars(trim($_POST['copy']));
	$time = htmlspecialchars(trim($_POST['time']));
	$price = htmlspecialchars(trim($_POST['price']));
$check = mysql_query(" SELECT `book_title` FROM `books` WHERE `book_title` = '$title'");
			$num = mysql_num_rows($check);
			if ($num > 0) {
				header("LOCATION:operation.php?titleerror=1");
			}
			else{

if (move_uploaded_file($cover_tmp,$cpath.$cover_name) AND move_uploaded_file($details_tmp,$dpath.$details_name)) {
	$query = mysql_query(" INSERT INTO `books` SET `book_title`='$title',`author`='$author',`price`='$price',`cover`='$cover_name',`detaills`='$details_name',`copy`='$copy' ");
	if ($query) {
      echo "<script>
        alert('$title Successfuly Inserted !');
        window.location='./operation.php';
      </script>";
		}	
		else{
		header("LOCATION:operation.php?systmerror=1");
		}
}
else{
	header("LOCATION:operation.php?moveerror=1");
}
}
}
?>