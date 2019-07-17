<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>FRULEP SUPERMARKET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../styles/operation.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/admin.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.script.js"></script>
<script type="text/javascript" src="scripts/jquery.script.form.js"></script>
<script type="text/javascript" src="scripts/jQueryUI.js"></script>
</head>
<body>
<div class="form">
  <input id='msg' type='hidden' value="<?php echo @$_GET['lo']=='h'?"o":"p";?>">
  <div id="container">
  <h2>admin login</h2>
<div class='result'></div>
  <form action="adminlogin.php" method="POST">
  <div id="div">
    <div for="userid" class='iner'>Username:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner' ><input type="text" name="uname" id='usernames' required placeholder='Username' /></div>
    <div class='space iner'>&nbsp;</div>
   </div>
  <div id="div">
    <div for="password" class='iner'>Password:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="password" name="pass" id='passwords' required placeholder='****************'/></div>
    <div class='space iner'>&nbsp;</div>
  </div>
  <div id="div">
    <div class="iner submit" id=""><input type="submit" name="submit" value='login' id='log'/></div>
  </div>
</form>
  </div>
</div>
</body>
</html>
