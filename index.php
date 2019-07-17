<?php
session_start();
include'connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>FRULEP SUPERMARKET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="shortcut icon" href="images/demo/download.png" width='100%' height='100%'/>
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.script.js"></script>
<script type="text/javascript" src="scripts/jquery.script.form.js"></script>
<script type="text/javascript" src="scripts/jQueryUI.js"></script>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>LOGIN TO HAVE MORE INFO</h2>
        <p>here is where a customer must login in odrer to do his/her own cart </p>
      </div>
            <div class="topbox">
        <h2>CUSTOMER LOGIN</h2>
        <!--<form action="#" method="post">-->
          <fieldset>
            <legend>customers Login Form</legend>
            <label for="customername">Username:
              <input type="text" name="user"  value="" id="username" />
            </label>
            <label for="customerpass">Password:
              <input type="password" name="pass" value="" id="password" />
            </label>
            <p>
              <input type="submit" name="sub"  value="Login" id="login"/>
              &nbsp;  
            </p>
          </fieldset>
        <!--</form>-->
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
    <input type='hidden' id='out' value="<?php 
      if (isset($_GET['d'])) {
        echo "1";
      }
      else{
        echo "";
      }
    ?>">
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <?php 
        if (@$_SESSION['user_login'] == 1) {
        ?>
        <li class='shopping'><a href="#">PRODUCT details</a></li>
        <?php
          }
      else{
          ?>
      <li class='shopping'><a href="#">product details</a></li>  
      <?php
        }
      ?>
<li><a href="registration.php">Registration</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="featured_slide">
    <div class="featured_box"><a href="#"><img src="images/demo/download (1).jpg" alt="" /></a>
      <div class="floater">
        <h2>1. WHAT WE HAVE</h2>
        <p>We have many kind of products where there are perishable products and non perishable products</p>
      </div>
    </div>
    <div class="featured_box"><a href="#"><img src="images/demo/download.jpg" alt="" /></a>
      <div class="floater">
        <h2>2.WHAT WE DO FOR YOU</h2>
        <p>We bought to you new volume of product  when you're interested in a certain  product. Also we  sell product at low price according to other companies bwowse what you want and add to your cart </p>
      </div>
    </div>
    <div class="featured_box"><a href="#"><img src="images/demo/imagesy.jpeg" alt="" /></a>
      <div class="floater">
        <h2>3. OUR STORE</h2>
        <p>In our store we have many products you can choose according to what you like browse your favorite one </p>
      </div>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_left">
      <div class="column2">
        <ul>
          <li>
            <h2>New product</h2>
            <div class="imgholder"><img src="images/demo/index.jfif" alt="" /></div>
            <p>Our products are fresh and selected. Come and Get one</p>
         </li>
          
        </ul>
        <br class="clear" />
      </div>
    </div>
    <div class="fl_right">
      <h2> TOP BOUGHT</h2>
      <ul>
        <li>
          <div class="imgholder"><a href="#"><img src="images/demo/index1.jfif" alt="" /></a></div>
          <p><strong><a href="#">FRUITS</a></strong></p>
          <p>Fruits are mostly needed by our customers. These fruits are fresh and sweet.</p>
        
        <li>
          <div class="imgholder"><a href="#"><img src="images/demo/index11.jfif" alt="" /></a></div>
          <p><strong><a href="#">LEGUMES</a></strong></p>
          <p>Our legumes are mostly selected. A Good supplier always provide good stock.</p>
        </li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
 
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved to <a href="#">Digne</a></p>
    <p class="fl_right">Designed by <a href="#" title="FRULEP SUPERMARKET">DIGNE</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
