<?php
$conn=mysqli_connect("localhost","root","","editionbakame");
if(isset($_POST['send']))
{
$email=$_POST['emaill'];
$qry1=$conn->query("SELECT * FROM customer where email='$email'");
$fet=mysqli_fetch_assoc($qry1);
$userid=$fet['user_id'];
$content=$_POST['contentt'];
$qry=$conn->query("INSERT INTO messade (user_id,email,subjects) VALUES ('$userid','$email','$content')");
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>frulep supermarket</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" href="styles/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/admin.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<link rel="shortcut icon" href="images/demo/bakame.png" width='100%' height='100%'/>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<script src="scripts/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("table tr:even").css({
      'background' : 'rgba(0,0,0,.7)',
      'color' : 'white',
      'font-weight':'bold',
    });
    $("table tr:odd").css({
      'background' : 'rgba(0,0,0,.2)',
      'color' : 'black',
      'font-weight':'bold'
    });
    $( "#time" ).datepicker();
    $( "#format" ).change(function() {
      $( "#time" ).datepicker( "option", "dateFormat", $("#format").val() );
    });
  });
</script>
</head>
<body>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    
    <div id="logo">
      <h1><a href="#">FRULEP SUPERMARKET</a></h1>
      
    </div>
    <div id="topnav">
      <ul>
        <li class=""><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li class="last"><a href="#"></a></li>
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
      <li>FRULEP SUPERMARKET Manager</li>
      <li>&#187;</li><li>&#187;</li>
      <li><a href="user.php">VIEW REGISTERED USERS</a></li>
      <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li><a href="purchasehistory.php">PURCHASE HISTORY</a></li>
          <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li><a href="stockin.php">STOCK IN</a></li>
          <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li><a href="email.php">Email</a></li>
          <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li class="current" style="margin-left:55px;"><a href="logout.php">logout</a></li>


    </ul>
  </div>
</div>
<br><br>
<div class="emaill" style="padding-left: 40%";>
<form action="email.php" method="POST">
    <input type="text" name="emaill" placeholder="please enter address" required> <br><br>
    <textarea name="contentt" placeholder="enter yout message" required></textarea><br><br>
    <input type="submit" name="send" value="send">

    
</form>
</div>