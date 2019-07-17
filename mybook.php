<?php
session_start();
include 'connect.php';
if ($_SESSION['user_login'] == 1) {
  $user_id = $_SESSION['user_id'];
  $conn=mysqli_connect("localhost","root","","editionbakame");
	$select = $conn->query("SELECT *FROM `customer` WHERE `user_id` = '$user_id' ")or die(mysql_error());
	$fetch = $select->fetch_assoc();
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>FRULEP SUPERMARKET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="shortcut icon" href="images/demo/download.png" width='100%' height='100%'/>
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.script.form.js"></script>
<script type="text/javascript" src="scripts/jQueryUI.js"></script>
<script type="text/javascript" src="scripts/jquery.script.js"></script>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
       <h2>LOGIN TO HAVE MORE INFO</h2>
        <p>here is where a customer must login in odrer to do his/her own cart .</p>
      </div>
      <div class="topbox">
        <h2>customer login</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>customers Login Form</legend>
            <label for="customername">Username:
              <input type="text" name="user"  value="" />
            </label>
            <label for="customerpass">Password:
              <input type="password" name="pass" value="" />
            </label>
            <label for="customercheck">
              <input class="checkbox" type="checkbox" name="check"checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="sub"  value="Login" />
              &nbsp;
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>LOGIN TO HAVE MORE INFO</h2>
        <p>here is where a customer must login in odrer to do his/her own cart .</p>
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">Log In Here &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">customers login</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="lg"><img src="images/demo/bakame.png"></div>
    <div id="logo">
      <h1><a href="#">FRULEP <span>SUPERMARKET</span></a></h1>
      <p></p>
    </div>
    <div id="topnav">
      <ul>
              <li><a href="oncart.php">Shopping Cart</a></li>
        <li class="active"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#"><?php echo $fetch['firstname']." ".$fetch['lastname'];?></a></li>
      <li>&#187;</li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
<?php
$id = $_SESSION['user_id'];
//	$my_books=mysql_query('SELECT * FROM sold_books LEFT JOIN books ON sold_books.book=books.inventory_id WHERE customer='.$_SESSION['user_id'].' GROUP BY inventory_id') OR die('ERROR GETTING THE CUSTOMER BOOKS'.mysql_error());
$my_books = $conn->query("SELECT `books`.`book_title`,`books`.`price`,`books`.`detaills`,`sold_books`.*FROM `books`,`customer`,`sold_books` WHERE `sold_books`.`book` = `books`.`inventory_id` AND `sold_books`.`customer` = '$id' AND `sold_books`.`customer` = `customer`.`user_id` ORDER BY `sold_id` DESC ");
  if($my_books->num_rows == 0){
		echo $fetch['firstname']." ".$fetch['lastname']." You have never purchased any product <a href='oncart.php'>Purchase now?</a>";
	}
	else{
    ?>
     <div id='white-space'></div>
    <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>PRODUCTNAME</th>
            <th>QUANTITY</th>
            <th>PRICE(s)</th>
            <th>Date</th>
            <th>VIEW</th>

          </tr>
        </thead>
        <?php
        $i=1;
		while($get_books=$my_books->fetch_assoc()){
      ?>
       <tbody>
          <tr class="light">
            <td><?php echo $i;?></td>
			      <td><?php echo $get_books['book_title']?></td>
            <td><?php echo $get_books['qty']?></td>
            <td><?php echo $get_books['price']." Rwf";?></td>
            <td><?php echo date("D-M-Y H-I-sA ",$get_books['date']);?></td>
            <td><?php echo '<a target="_blank" href="admin/books/details/'.$get_books['detaills'].'">View your Product</a>'?></td>
          </tr>
          <?php
          $i++;
		}
    ?>
    </tbody>
    </table>
    <?php
	}
  ?>
</div>
</div>
<div id='white-space'></div>
<div id='white-space'></div>
<div id='white-space'></div>
<div class="wrapper col5">
 <div id="copyright">
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved to <a href="#">Digne</a></p>
    <p class="fl_right">Designed by <a href="#" title="FRULEP SUPERMARKET">Digne</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
<?php
}
else{
	header("LOCATION:logout.php");
}
?>