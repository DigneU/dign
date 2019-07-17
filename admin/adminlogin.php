<?php
session_start();
include '../connect.php';
$conn=mysqli_connect("localhost","root","","editionbakame");
$username = $_POST['uname'];
$password = $_POST['pass'];
if ($_POST['submit']) {
			
			if(!empty($_POST['uname']) && !empty($_POST['pass'])){
				//include'../connect.php';
				$sel=$conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
				 
				if ($sel->num_rows==1) {
					$_SESSION['login_admin'] = 1;
					$_SESSION['admin'] = $sel->fetch_array();
					header("LOCATION:operation.php");			
					}
					else{
						header("LOCATION:./?lo=2");
					}
					}
					}
?>