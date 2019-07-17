<?php
$conn=mysqli_connect("localhost","root","","editionbakame");
if(isset($_POST['submit']))
{
$username=$_POST['username'];
 $password=$_POST['password'];
 $copassword=$_POST['confirm'];
 $fname=$_POST['fname'];
 $lastname=$_POST['lname'];
 $id=$_POST['idn'];
 $address="address";
 $city=$_POST['city'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $qry=$conn->query("INSERT INTO CUSTOMER (username,password,firstname,lastname,id_number,address,email,phone) VALUES ('$username','$password','$fname','$lastname','$id','$address','$email','$phone')");
 if($qry)
 {
   echo "success";
 }
 else{
   echo "fail";
 }
}

 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>FRULEP SUPERMARKET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<link rel="shortcut icon" href="images/demo/download.png" width='100%' height='100%'/>
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
          <fieldset>
            <legend>customers Login Form</legend>
            <label for="customername">Username:
              <input type="text" name="user"  value="" id="username" />
            </label>
            <label for="customerpass">Password:
              <input type="password" name="pass" value="" id="password" />
            </label>
            <label for="customercheck">
              <input class="checkbox" type="checkbox" name="check"checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="sub"  value="Login" id="login"/>
              &nbsp;
            </p>
          </fieldset>    
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
      <h1><a href="">FRULEP SUPERMARKET</a></h1>

    </div>
    <div id="topnav">
      <ul>
        <li><a href="./">Home</a></li>
        <?php 
if (@$_SESSION['user_login'] == 1) {
        ?>
        <li class='shopping'><a href="shoppingcart.php">Shopping Cart</a></li>
<?php
}
?>
        <li class="active"><a href="">Registration</a></li>
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
      <li><a href="#">for</a></li>
      <li>&#187;</li>
      <li><a href="#">customer</a></li>
      <li>&#187;</li>
      <li><a href="#">registration</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <h1>REGISTRATION</h1>
<div class='result'></div>
  <div id="div">
    <div for="userid" class='iner'>Username:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner' ><input type="text" name="uname" id='usernames' required/></div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner msg uname' ><label class='username'>Your Username Must Not Be The Same As Your Name.</label></div>
  </div>

  <div id="div">
    <div for="password" class='iner'>Password:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="password" name="pass" id='passwords' required/></div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner msg pss' ><label class='password'>Your Password Must Not Be Lees Than 8 Characters.</label></div>
  </div>

  <div id="div">
    <div for="confirm" class='iner'>Confirm Password:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="password" name="confirm" id="confirm" required></div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner msg rps' ><label class='confirm'><!---results------></label></div>
  </div>
  <div id="div">
    <div for="fname" class='iner'>FirstName:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="fname" id="firstname" required/></div>
  </div>

  <div id="div">
    <div for="lname" class='iner'>LastName:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="lname" id="lastname" required/></div>
  </div>

   <div id="div">
    <div for="lname" class='iner'>ID Number:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="idn" id="idn" maxlength='16' required/></div>
  </div>

  <div id="div">
    <div for="address" class='iner'>Address:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="address" id="address" required/></div>
  </div>

  <div id="div"> 
    <div for="city" class='iner'>City:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="city" id="city" required/></div>
  </div>

  <div id="div">
    <div for="email" class='iner'>Email:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="email" id="email" required/></div>
  </div>

  <div id="div">
    <div for="phone" class='iner'>Phone Number:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="phone" id="phone" maxlength='10'  required/></div>
  </div>

  <div id="div">
    <div class="iner submit" id=""><input type="submit" name="submit" value='Submit' id='sub'/></div>
  </div>
<div id='white-space'></div>
<div id='white-space'></div>
  
  </div>
</div>
<div id='white-space'></div>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved to <a href="#">Digne</a></p>
    <p class="fl_right">Designed by <a href="#" title="FRULEP SUPERMARKET">Digne</a></p>
    <br class="clear" />
  </div>

</div>
</body>
</html>
