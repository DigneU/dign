<?php
session_start();
if ($_SESSION['user_login'] == 1) {
	unset($_SESSION['user_login']);
	unset($_SESSION['user_id']);
	header("LOCATION:index.php?d=d");
}
else{
	unset($_SESSION['user_login']);
	unset($_SESSION['user_id']);
	header("LOCATION:index.php?d=d");
}
?>