<?php
require_once 'register_handler.php';

if(isset($_POST['login_button'])){

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // Remove all illegal characters from an email address
	$password = md5($_POST['log_password']); // Get Password

	$_SESSION['log_email'] = $email; // Store email into session variable

	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	// check user who has same email and password
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1){
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['username'];

		$user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
		if(mysqli_num_rows($user_closed_query) == 1){
			$reopen_accout = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email'");
		}

		$_SESSION['username'] = $username;
		header("Location: index1.php");
		exit();
	} else{
		array_push($error_array, "Email or password was incorrect<br/>");
	}
}
?>
