


<!doctype html>
<html>
<head>
</head>
<body>

<!-- 
<form action="emp_signup_get_otp.php" method="POST" >
<span> Registered Mobile Number : <input type="text" name="emp_mob_num" id="emp_mob_num" > </span>
<span> Organization Name : <input type="text" name="organization" id="organization" >  </span>
<button type="Submit">Submit</button>
-->

<form id="f2" name ="f2" action="emp_signup_verify_otp.php" method="POST" >
<span> Enter Authentication Pin : <input type="text" name="emp_signup_otp" id="emp_signup_otp" > </span>; <p><?php session_start(); echo "{$_SESSION["sent_otp"]}" ?> </p>>
<button type="Submit">Submit</button>

</form>

</body>
</html>