<?php

session_start();

?>

<?php
// Connecting to database
include 'config_mcp_database.php';

if(!empty($_SESSION["org_otp"]))  
{
		function test_input($data) 		//Making input clean
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$otp_entered = test_input("{$_POST["org_signup_otp"]}");  // emp_reg_otp is name and id of the Enter OTP input field
	



	
	if(empty($otp_entered) OR ($otp_entered>=100000 && $otp_entered<=999999)) 
	{
		echo "<span>Please enter 6-digit Authentication Pin correctly</span>";
	}
	else			
	{
	//Comes here when otp is sent and a 6 digit otp is entered 
	$sent_otp = $_SESSION["org_otp"];
	$udyog_aadhaar = $_SESSION["udyog_aadhaar"];


	if($otp_entered == $sent_otp)			//checking if otp is correct or not
		{
		//Organization is now authenticated successfully, we can give it an mcp_id
		//Inserting new row in mcp_member table

		$sql = "INSERT INTO mcp_member (member)
		VALUES ($udyog_aadhaar)";

		if ($conn->query($sql) === TRUE) 
		{
			//new mcp_member is added successfully
			//This must have generated a mcp_id 
			
		
			
			//Putting mcp_member.mcp_id just created, into a Session Variable
			$sql = "SELECT * FROM mcp_member WHERE member='{$udyog_aadhaar}'";
			$result = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) == 1)
			{
				$mcp_id_temp = $row["mcp_id"];
				$_SESSION["mcp_id"] = $mcp_id_temp;
			}
			else
			{
				//Something wrong
			}
			//Putting some more info into session variables

			$sql_ua = "SELECT * FROM registered_organization WHERE udyog_aadhaar='{$udyog_aadhaar}'";
			$result_ua = mysqli_query($conn, $sql_ua);

			if (mysqli_num_rows($result_ua) > 0) 
			{
   			 //data of each row is in $row["coloumn_name"]
    		while($row = mysqli_fetch_assoc($result_ua))
			{
				 
				$_SESSION["organization_name"] = $row["organization_name"];
				$_SESSION["sigantory_name"] = $row["sigantory_name"];
				$_SESSION["sigantory_aadhaar"] = $row["sigantory_aadhaar"];
				$_SESSION["signatory_mob_num"] = $row["signatory_mob_num"];

				session_unset($org_otp);
				session_destroy();
			}

			//LOAD TO STEP 2 of Organization Signup Process
		} 
		else 
		{
			echo "Something Went Wrong!";
		}
		
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
}

//Disconnecting from database
mysqli_close($conn);



?>