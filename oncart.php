<?php
session_start();
include 'connect.php';
#echo "<pre>";var_dump($_SESSION);
if (@$_SESSION['user_login'] == 1) {
  $user_id = $_SESSION['user_id'];
  $conn=mysqli_connect("localhost","root","","editionbakame");
	$select = $conn->query("SELECT *FROM `customer` WHERE `user_id` = '$user_id' ")or die(mysql_error());
	#var_dump($user_id);
  $fetch = $select->fetch_assoc();
#	echo $fetch['firstname'];
#	echo "<br><a href='./logout.php'>Logout</a>";
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
<script type="text/javascript">
  $(function(){
    //alert('hello world');
$('#key_word').keyup(function(){
      var key = $(this).val();
      //var g = 1;
      //alert(g);
      //$(".div").text(g);
      var url = "<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>";
      $.post(
          'search.php',
          {key:key,url:url},
          function(hello){
            $('#container').html(hello);
            var g = $("#numB").val();
            //$(".div").text(g);
            url = "<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>";
            $.post('search.php',
              {key:key,div:g,url:url},
              function(back){
                $('#container').html(back);
              }
            );
          }
        );
    });
  });
</script>
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
    <div id="lg"><img src="images/demo/download.png"></div>
    <div id="logo">
      <h1><a href="#">FRULEP <span>SUPERMARKET</span></a></h1>
    
    </div>
    <div id="topnav">
      <ul>
        <li><a href="mybook.php">My products</a></li>
        <li><a href="email1.php">INBOX</a></li>
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
      <li><a href="logout.php">Logout</a>
      <input type='text' size='40' id='key_word' name='key_word' style="margin-left:300px;padding:7px;border-radius:3px;border:none;color:#000;font-weight:bold;font-size:12px;" placeholder="search here a book!!!!">
    </li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
      <?php include 'index2.php'; ?>
  </div>
</div>
<div id='white-space'></div>
<div id='white-space'></div>
<div id='white-space'></div>
</div>
</body>
</html>
<?php
}
else{
	header("LOCATION:logout.php");
}
?>