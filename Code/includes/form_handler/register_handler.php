<?php

$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = ""; // Signup date
$error_array = array(); // Holds error messages

if(isset($_POST['register_button'])){ //if something is submitted

	//Registration from values

	//first name
	$fname = strip_tags($_POST['reg_fname']); //if strip_tags = <a>hh</a> => hh, This is for security
	$fname = str_replace(' ', '', $fname); //if $fname='tt ' is submitted => 'tt'
	$fname = ucfirst(strtolower($fname)); //strtolower is that if $fname is TT => tt, ucfirst is that if $fname trr => Trrtt

	//Last name
	$lname = strip_tags($_POST['reg_lname']); 
	$lname = str_replace(' ', '', $lname); 
	$lname = ucfirst(strtolower($lname)); 

	//email
	$em = strip_tags($_POST['reg_email']); 
	$em = str_replace(' ', '', $em); 
	$em = ucfirst(strtolower($em)); 

	//email2
	$em2 = strip_tags($_POST['reg_email2']); 
	$em2 = str_replace(' ', '', $em2); 
	$em2 = ucfirst(strtolower($em2)); 

	//password
	$password = strip_tags($_POST['reg_password']);

	//password2
	$password2 = strip_tags($_POST['reg_password2']);

	$date = date("Y-m-d"); // Current-date

	//store session value
	$_SESSION['reg_fname'] = $fname; //Stores first name into session variable
	$_SESSION['reg_lname'] = $lname; 
	$_SESSION['reg_email'] = $em; 
	$_SESSION['reg_email2'] = $em2;

	if($em == $em2){
		if(filter_var($em, FILTER_VALIDATE_EMAIL)){ 
			// if it is email type == return true & value, if not just return false;
			$em =filter_var($em, FILTER_VALIDATE_EMAIL); // value, did it for doublecheck

			//check if email already exists
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0){
				array_push($error_array, "Email already in use<br/>");
			} 

		} else{
			array_push($error_array, "Invalid Email format<br/>"); // if it is not email type
		}
	} else{
		array_push($error_array, "Email do not match<br/>");
	}

	if(strlen($fname) > 25 || strlen($fname) < 2){ // check length of string
		array_push($error_array, "Your first name must be between 2 and 25 characters<br/>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2){
		array_push($error_array, "Your last name must be between 2 and 25 characters<br/>");
	}

	if($password != $password2){
		array_push($error_array, "Your passwords do not match<br/>");
	} else{
		if(preg_match('/[^A-Za-z0-9]/', $password)){ // check using regex
			array_push($error_array, "Your password only contain english characters or numbers<br/>");
		}
	}

	//profile picture assignment
	if(empty($_FILES['profilePicture']['name'])){
		$rand = rand(1, 2); // Random number between 1 and 2

		if ($rand == 1){
			$profile_pic = "assets/images/profile_pics/default/image_1.jpg";
		} else if($rand == 2){
			$profile_pic = "assets/images/profile_pics/default/image_2.jpg";
		}
	}

	else{
		$uploadOk = 1;

		$profile_pic = $_FILES['profilePicture']['name']; 

		if($profile_pic != ""){
			$targetDir = "assets/images/profile_pics/";
			$profile_pic = $targetDir.uniqid().basename($profile_pic);
			$imageFileType = pathinfo($profile_pic, PATHINFO_EXTENSION);

			if($_FILES['profilePicture']['size'] > 10000000){
				array_push($error_array, "Sorry your file is too large<br/>");
				$uploadOk = 0;
			}

			if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg"){
				array_push($error_array, "Sorry, only jpeg, jpg and png files are allowed.<br/>");
				$uploadOk = 0;
			}

			if($uploadOk){
				if(move_uploaded_file($_FILES['profilePicture']['tmp_name'], $profile_pic)){
					$uploadOk = 1;
				}
				else{
					array_push($error_array, "Sorry, We failed to move file to folder<br/>");
				}
			}
		}

	}
	



	if (strlen($password) > 30 || strlen($password) < 5){
		array_push($error_array, "Your password must be between 5 and 30 characters<br/>");
	}

	if(empty($error_array)){
		$password = md5($password); //encrypt password, can't even see in database

		//Generate username by concatenating first name and last name
		$username = strtolower($fname."_".$lname);
		//Check samename existing
		$check_username_query = mysqli_query($con, "SELECT username from users WHERE username='$username'"); 
		
		$i=0;
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0){
			$i++; //Add 1 to i
			$username = $username."_".$i;
			$check_username_query = mysqli_query($con, "SELECT username from users WHERE username ='$username'"); 
		}

		//INSERT INTO database
		$query = mysqli_query($con, "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

		$date_added = date("Y-m-d H:i:s");
		$image = '';
		$query = mysqli_query($con, "INSERT INTO posts VALUES(NULL, 'Welcome to swirlfeed. I\'m an administrator of this website.<br/> If you have any questions feel free to message to me', 
			'captain_america', '$username', '$date_added', 'no', 'no', '0', '')");
		$query = mysqli_query($con, "INSERT INTO posts VALUES(NULL, 'Welcome to swirlfeed!', 
			'$username', 'none', '$date_added', 'no', 'no', '0', '')");	

		array_push($error_array, "<span style='color: #14C800;'>You're all set! Goahead and login!</span><br/>");

		

		//Clear session variables
		$_SESSION['reg_fname'] = ""; 
		$_SESSION['reg_lname'] = ""; 
		$_SESSION['reg_email'] = ""; 
		$_SESSION['reg_email2'] = "";
	}
};

?>