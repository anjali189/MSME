<?php

session_start();

?>

<?php
// Connecting to database
include 'config_mcp_database.php';

if(isset($_SESSION["sent_otp"]))  
{
		function test_input($data) 		//Making input clean
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$otp_entered = test_input('{$_POST["emp_signup_otp"]}');  // emp_reg_otp is name and id of the Enter OTP input field
	$sent_otp = $_SESSION["sent_otp"];



	
	if(empty($otp_entered) OR (!($otp_entered>=100000 && $otp_entered<=999999)))
	{
		echo "<span>Please enter 6-digit Authentication Pin correctly</span>";
	}
	else			
	//Comes here when otp is sent and a 6 digit otp is entered 
	{
		if($otp_entered == $sent_otp)			//checking if otp is correct or not
		{
		//Employee is now authenticated successfully, we can give it an mcp_id
		//Inserting new row in mcp_member table

		$emp_reg_mob_num = $_SESSION["emp_reg_mob_num"];

		$sql = "INSERT INTO mcp_member (member)
		VALUES ($emp_reg_mob_num)";

		if ($conn->query($sql) === TRUE) 
		{
			//new mcp_member is added successfully
			
		
			
			//Putting mcp_member.mcp_id just created, into a Session Variable
		$sql = "SELECT * FROM mcp_member WHERE member='{$emp_reg_mob_num}'";
			$result = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) > 0)
			{
				if (mysqli_num_rows($result) == 1)
				{
					$_SESSION["mcp_id"] = $row["mcp_id"];

					session_unset($sent_otp);
				session_destroy();
				}
			}
			else
			{
				//Something wrong
			}
			
			//LOAD TO STEP 2 of Employee Signup Process
		} 
		else 
		{
			echo "Something Went Wrong!";
		}
		
		}
	else
		{
			//OTP do not match
			/////
			/////
			/////
			/////
			echo "<span>Incorrect Authentication Pin entered.</span>";
			
		}
	}
	 
}
else
{
	echo "<span>Generate Authentication Pin first!</span>";

	header('location : emp_signup.php/#f2');
}

//Disconnecting from database
mysqli_close($conn);



?>

