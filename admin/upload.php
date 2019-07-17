<?php
include '../connect.php';

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
#var_dump($_FILES); die;
if (@$_POST['upload'] != 'Update' and $cover_error > 0 AND $details_error > 0 ) {
	header("LOCATION:operation.php?fileerror=1");
	exit();
	//echo "$cover_error<br>";
	//echo "$details_error<br>";
}
elseif ($cover_size > 3) {
	header("LOCATION:operation.php?sizecerror=1");
	exit();
	//echo "size cover error<br>";
}
elseif ($details_size > 15 ) {
	header("LOCATION:operation.php?sizederror=1");
	//echo "size details error<br>";
}
elseif (@$_POST['upload'] != 'Update' && $cover_type != "gif" && $cover_type != "jpg" && $cover_type != "png"  && $cover_type != "GIF" && $cover_type != "JPG" && $cover_type != "PNG") {
	header("LOCATION:operation.php?typecerror=1");
	//echo "type cover error<br>";
	//echo $cover_type;
}
elseif ( @$_POST['upload'] != 'Update' && $details_type != "pdf" && $details_type != "txt" && $details_type != "PDF" && $details_type != "TXT") {
	header("LOCATION:operation.php?typederror=1");
	//echo "type details error<br>";
	//echo $details_type;
}
else{
	if (isset($_POST['submit'])) {
		$title = htmlspecialchars(trim($_POST['bookname']));
		$author = htmlspecialchars(trim($_POST['author']));
		$copy = htmlspecialchars(trim($_POST['copy']));
		$time = htmlspecialchars(trim($_POST['time']));
		$price = htmlspecialchars(trim($_POST['price']));
		$conn=mysqli_connect("localhost","root","","editionbakame");
		$check = $conn->query(" SELECT `book_title` FROM `books` WHERE `book_title` = '$title'");
			$num = $check->num_rows;
			if ($num > 0) {
				header("LOCATION:operation.php?titleerror=1");
			}
			else{

				if (move_uploaded_file($cover_tmp,$cpath.$cover_name) AND move_uploaded_file($details_tmp,$dpath.$details_name)) {
					$query = $conn->query(" INSERT INTO `books` SET `time`='$time',`book_title`='$title',`author`='$author',`price`='$price',`cover`='$cover_name',`detaills`='$details_name',`copy`='$copy' ");
					if ($query) {
					  echo "<script>
						alert('$title Successfuly Inserted !');
						window.location='operation.php';
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
	elseif (isset($_POST['upload'])) {
	$title = htmlspecialchars(trim($_POST['bookname']));
	$author = htmlspecialchars(trim($_POST['author']));
	$copy = htmlspecialchars(trim($_POST['copy']));
	$time = htmlspecialchars(trim($_POST['time']));
	$price = htmlspecialchars(trim($_POST['price']));
	$bk_id = htmlspecialchars(trim($_POST['bkid']));
	$newcover = null;
	$newdetails = null;
	if ((@$_FILES['cover']['name'] || @$_FILES['details']['name']) && (move_uploaded_file($cover_tmp,$cpath.$cover_name) || move_uploaded_file($details_tmp,$dpath.$details_name))) {
		$newcover = $cover_name;
		$newdetails =$details_name;
	}
	$conn=mysqli_connect("localhost","root","","editionbakame");
	$query = $conn->query(" UPDATE `books` SET `book_title`='$title',`author`='$author',`price`='$price',".($newcover?"`cover`='$cover_name',":"")."".($newdetails?"`detaills`='$details_name',":"")."`copy`='$copy',`time`='$time' WHERE `inventory_id` = '$bk_id' ");
	if ($query) {
      echo "<script>
        alert('Successfuly Updated !');
        window.location='operation.php';
      </script>";
		}	
		else{
		header("LOCATION:operation.php?systmerror=1");
		}
	}

}
?>