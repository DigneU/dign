<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("equity_bank");
	$account = $_POST['account'];
	$password = $_POST['password'];
	$id_number = $_POST['idN'];
	$phone = $_POST['pN'];
	$total = $_POST['total'];
	$sql = mysql_query(" SELECT `phone`,`id_number`,`amount`,`password` FROM `client` WHERE `account_number` = '$account' ");
	if (mysql_num_rows($sql) == 1) {
		$my  = mysql_fetch_assoc($sql);
		if ($my['password'] !== $password ) {
			echo "3";
		}
		elseif ($my['amount'] < $total) {
			echo "10";
		}
		elseif ($my['id_number'] !== $id_number OR $my['phone'] !== $phone ) {
			echo "25";
		}
		else{
			echo "$account";
		}
	}
	else{
		echo "0";
	}
?>