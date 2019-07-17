<?php
session_start();
include 'connect.php';
$username = $_POST['uname'];
$password = $_POST['pass'];
#echo $username." ".$password; 
$conn=mysqli_connect("localhost","root","","editionbakame");
$sel = $conn->query("SELECT *FROM `customer` WHERE `username` = '$username' AND `password` = '$password' ");
$num = $sel->num_rows;
if ($num == 1) {
	$fe = $sel->fetch_array();
	$usernamee = $fe['username'];
	$passwordd = $fe['password'];

	if ($username === $usernamee AND $password === $passwordd ) {
	    $_SESSION['user_id'] = $fe['user_id'];;
	    $_SESSION['user_login'] = 1;
	    echo "1";
	    #echo "welcome to my hood";
	}
	else{
		echo "Wrong Username or Password!";
	}
}
else{
  echo "Wrong Username or Password!";
}
?>