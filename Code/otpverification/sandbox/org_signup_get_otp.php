<?php

session_start();

?>
  
<?php
// Connecting to database
require 'config_mcp_database.php';

//Getting value of udyog_aadhaar from organization signup authentication form via POST
function test_input($data) 		//Making input clean
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$udyog_aadhaar = test_input($_POST["u_aadhaar"]); // u_aadhaar is the name and id attribute of first input field


if(empty($udyog_aadhaar) or (!($udyog_aadhaar >= 100000000000 and $udyog_aadhaar <= 999999999999)))
{
	echo "<span>Please fill 12-digit Udyog Aadhaar of MSME Enterprise</span>";
}

else
{
	// Checking if it already have an msme collaboration account
	$sql_c = "SELECT  FROM mcp_member WHERE member='{$udyog_aadhaar}'";
	$result_c = mysqli_query($conn, $sql_c);		
	if (mysqli_num_rows($result_c) == 1)
	{
		echo "This MSME Enterprise is already registered on MSME Collaboration Platform";
	}
	else
	{
	//Now we can send otp to create new account since all checks are done
		$sql_ua = "SELECT * FROM registered_organization WHERE udyog_aadhaar='{$udyog_aadhaar}'";
		$result_ua = mysqli_query($conn, $sql_ua);

		if (mysqli_num_rows($result_ua) > 0) 
		{
			//If this is true it means udyog_aadhaar entered belongs to an actual MSME Enterprise
   			 //data of each row is in $row["coloumn_name"]
    		while($row = mysqli_fetch_assoc($result_ua))
			{


				//Send OTP to to below

				//
				//$row["signatory_mob_num"];
				$otp = 999999;
				
		
		
		
		
				//Creating session variable
				$_SESSION["org_otp"] = $otp; 
				$_SESSION["udyog_aadhaar"] = $row["udyog_aadhaar"]; 
				//$_SESSION["organization_name"] = $[""];

				session_destroy();
			}
		}
	}
}
mysqli_close($conn);

?>

