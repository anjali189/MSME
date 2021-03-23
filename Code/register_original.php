<?php
require_once 'config/config.php';
require_once 'includes/form_handler/login_handler.php';
require_once 'includes/form_handler/register_handler.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>MSME!</title>

	<script src='assets/js/jquery-3.3.1.min.js'></script>
	<script src='assets/js/register.js'></script>
	<link rel="stylesheet" href="./css/style.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css?sd">
</head>
<body>
	<div id="wrapper">
	        <header class="header">

	            <div style="background-color: #fff; text-align: center">
	                 <div class="row">
	                     <div class="col-sm-3 col-md-3 pt-5">

	                          <img alt="logo" src="./images/p1.png" hspace="5" vspace="5" />

	                     </div>
	                     <div class="col-sm-6   col-md-6 col-xs-6 hidden-xs">
	                         <div align="center" class="header-div"  style="padding-top: 3em;  ">



	                             <font size="4" style="font-weight:bold">भारत सरकार</font>
	                             <br />
	                             <font size="4" style="color: red; font-weight:bold"> सूक्ष्म , लघु  और मध्यम उद्यम मंत्रालय </font>
	                             <br />
	                             <font size="4"  style="font-weight:bold  ;letter-spacing: 3px;">
	                             Government Of India<br />
	                             Ministry of Micro, Small & Medium Enterprises</font>
	                             <br />
	                         </div>
	                     </div>

	                   <div id="right-logo"  class="col-sm-3 col-md-3 col-xs-3  d-none d-md-block">
	                      <img alt="MSME" src="./images/p2.png" hspace="5" vspace="5" />
	                  </div>
	                 </div>
	             </div>

	         </header>

	         <nav class="navbar navbar-expand-md navbar-light bg-light" style=width:100%;>


	<a class="navbar-brand" href="index.php"  ></a>  <font size="4"  style="font-weight: 500 ;letter-spacing: 3px;">
	National Platform for collaboration among Micro, Small & Medium Enterprises</font></a>


	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"  style="float: right;"></span>
	    </button>

	    <div class="collapse navbar-collapse " style="float:right" id="navbarTogglerDemo02">




	<ul class="navbar-nav ml-auto mr-5 mt-3 mt-lg-0" >
		<li class="nav-item">
			<a class="nav-link " href="./index.php" style="float: right;color:black; "  >Home</a>
		</li>

	<li id="support" class="nav-item">
	          <div class="dropdown" style="float:right;margin-top:9px; margin-left:2px;">
	            <a class="dropbtn">Support</a>
	            <div class="dropdown-content" style="width:190px;">
	              <a  class="nav-link" href="./reg_guide.php"> Registration Guidelines</a>
	              <a class="nav-link" href="#">Search an Account</a>

	            </div>
	          </div>
	        </li>



	      </ul>

	    </div>

	  </nav>

	<?php
	if(isset($_POST['register_button'])){
		echo '
		<script>

		$(document).ready(function(){
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}
	?>

	<div class='wrapper' style="margin-top: 50px;">

		<div class='login_box' >
		<div class="login_header">
			<h1>MSME</h1>
			Login or sign up below!
		</div>

		<div id="first">
			<form action="register.php" method="POST">
				<input style="margin-top: 20px;" type="email" name="log_email" placeholder="Email Address" value="<?php
				if(isset($_SESSION['log_email'])){
					echo $_SESSION['log_email'];
				}
				?>" required />
				<br/>
				<input type="password" name="log_password" placeholder="Password">
				<br/>
				<input type='submit' name='login_button' value="Login">
				<br/>
				<a href='#' id='signup' class="signup">Need and account? Register here<br/></a>
				<?php if(in_array("Email or password was incorrect<br/>", $error_array)) echo "Email or password was incorrect<br/>"; ?>
			</form>
		</div>

		<div id='second'>
			<form action="register.php" method='POST' enctype="multipart/form-data">
				<input type='text' name='reg_fname' placeholder="First Name" value="<?php
				if(isset($_SESSION['reg_fname'])){
					echo $_SESSION['reg_fname'];
				}
				?>" required />
				<?php if(in_array("Your first name must be between 2 and 25 characters<br/>", $error_array)){echo"Your first name must be between 2 and 25 characters<br/>";}?>
				<br>
				<input type='text' name='reg_lname' placeholder="Last Name" value="<?php
				if(isset($_SESSION['reg_lname'])){
					echo $_SESSION['reg_lname'];
				}
				?>"required />
				<br>
				<?php if(in_array("Your last name must be between 2 and 25 characters<br/>", $error_array)){echo"Your last name must be between 2 and 25 characters<br/>";}?>

				<input type='email' name='reg_email' placeholder="Email" value="<?php
				if(isset($_SESSION['reg_email'])){
					echo $_SESSION['reg_email'];
				}
				?>"required />
				<br>
				<input type='email' name='reg_email2' placeholder="Confirm Email" value="<?php
				if(isset($_SESSION['reg_email2'])){
					echo $_SESSION['reg_email2'];
				}
				?>"required />
				<br>
				<?php if(in_array("Invalid Email format<br/>", $error_array)){echo"Invalid Email format<br/>";}
				else if(in_array("Email already in use<br/>", $error_array)){echo"Email already in use<br/>";}
				else if(in_array("Email do not match<br/>", $error_array)){echo"Email do not match<br/>";}?>


				<input type='password' name='reg_password' placeholder="Password" required />
				<br>
				<input type='password' name='reg_password2' placeholder="Confirm Password" required />
				<br>
				<?php if(in_array("Your passwords do not match<br/>", $error_array)){echo"Your passwords do not match<br/>";}
				else if(in_array("Your password only contain english characters or numbers<br/>", $error_array)){echo"Your password only contain english characters or numbers<br/>";}
				else if(in_array("Your password must be between 5 and 30 characters<br/>", $error_array)){echo"Your password must be between 5 and 30 characters<br/>";}?>

				<div class="profile_box">
					<label for="profilePicture">Profile picture: </label>
					<input type="file" name="profilePicture" placeholder="Please Put image" />
				</div>
				<br>
				<?php if(in_array("Sorry your file is too large<br/>", $error_array)){echo"Sorry your file is too large<br/>";}
				else if(in_array("Sorry, only jpeg, jpg and png files are allowed.<br/>", $error_array)){echo"Sorry, only jpeg, jpg and png files are allowed.<br/>";}
				else if(in_array("Sorry, We failed to move file to folder<br/>", $error_array)){echo"Sorry, We failed to move file to folder<br/>";}?>
				<input type='submit' name='register_button' value="Register">
				<br>
				<a href='#' id='signin' class="signin">Already have an account? Sign in here!<br/></a>
				<?php if(in_array("<span style='color: #14C800;'>You're all set! Goahead and login!</span><br/>", $error_array)){echo"<span style='color: #14C800;'>You're all set! Goahead and login!</span><br/>";} ?>
			</form>
		</div>
		</div>
	</div>
</body>
</html>
