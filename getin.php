<?php
session_start();
include 'connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$id_n=$_POST['idn'];
	$conn=mysqli_connect("localhost","root","","editionbakame");
	$sel = $conn->query("SELECT *FROM `customer`  WHERE `username` = '$username'");
	$out =$sel->num_rows;
		if (empty($address) OR empty($phone) OR empty($email) OR empty($username) OR empty($lastname) OR empty($firstname) OR empty($id_n)) {
			echo "Some Field Is Empty!";
		}
		else{
				$valid='/^07[8,2,3,]{1}[0-9]{7}/';
				$valid_id='/^11[9]{1}[0-9]{13}/';
				$email_='/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
				if (!preg_match($valid, $phone)) {
					echo "invalid phone number!!!!";
				}
				elseif (!preg_match($valid_id,$id_n )) {
					echo "invalid IDNumber address";
				}
				elseif (!preg_match($email_,$email)) {
					echo "invalid email address!!!!!!!!!";
				}
				else{
			if ($out>0) {
				echo "Username Already Exist!";	
			}
			else{
				if ($conn->query(" INSERT INTO `customer` SET username = '$username',password = '$password',email = '$email',firstname = '$firstname',id_number='$id_n',lastname = '$lastname',address = '$address',phone = '$phone'")) {
					//echo "Congratution $firstname $lastname";
					$sel = $conn->query("SELECT `user_id` FROM `customer` WHERE `username` = '$username' AND `password` = '$password' ");
					$user_id = $sel->fetch_assoc()['user_id'];
					#echo "$user_id";
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_login'] = 1;
					echo "1";
				}
				else{
					echo "Try Again Not Done !";
				}
			}
		}
		}
?>