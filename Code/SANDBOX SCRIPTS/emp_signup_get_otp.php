<?php

session_start();

?>

<?php
// Connecting to database
require 'config_mcp_database.php';

//Getting value of employee's registed mobile number and organization name from employee signup authentication form via POST

$employed_by = test_input($_POST["organization"]); // organization is the name and id attribute of first input field
$reg_mob_num = test_input($_POST["emp_mob_num"]); // emp_mob_num is the name and id attribute of second input field

function test_input($data) 		//Making input clean
{
  $data = trim($data);
  $data = stripslashes($data);
   $data = htmlspecialchars($data);
  return $data;
}
// echo "$employed_by"; echo "$reg_mob_num";


if(empty($employed_by))
{
	echo "<span>Please select Organization Name of Employee</span>";
}
if(empty($reg_mob_num))
{
	echo "<span>Please enter Registered Mobile Number of Employee</span>";
}

if(!empty($employed_by) && !empty($reg_mob_num))
{
//Checking if the mobile number entered already have an msme collaboration account
	$sql_c = "SELECT * FROM mcp_member WHERE member='{$reg_mob_num}'";
	$result_c = mysqli_query($conn, $sql_c);
			
	if (mysqli_num_rows($result_c) == 1)
		{
			echo "This Employee is already registered on MSME Collaboration Platform";
		}
	else
		{
			//Now we can create new account since all checks are done
		$sql = "SELECT * FROM registered_employee WHERE reg_mob_num='{$reg_mob_num}'";
			$result = mysqli_query($conn, $sql);
			
			
		$sql_o = "SELECT * FROM registered_organization WHERE organization_name='{$employed_by}'";
			$result_o = mysqli_query($conn, $sql_o);

			if ((mysqli_num_rows($result) > 0) and (mysqli_num_rows($result_o) > 0)  ) 
			{
				//If this is true it means mobile number entered belongs to an actual employee of some MSME
				//And also, organization name entered also exist as registered msme
    			//data of each row is in $row["coloumn_name"]
   				$row = mysqli_fetch_assoc($result);
   				$row2 = mysqli_fetch_assoc($result_o);
	
				//checking if the organization is correct or not
				if($row["employed_by_ua"] == $row2["udyog_aadhaar"] )
					{
					//If this is true it means, that the employee actually works in the oragnization name entered in the form
			
					//Generate random OTP to send
			
			
					include 'process.php'; /////OTP FUNCTION
					//send Generated otp to $reg_mob_num since it is confirmed to be valid employee of entered msme enterprise
			
			
					$otp =  sendOtp($reg_mob_num);   
					//$otp = 999999;
			
					//Saving otp in a session variable to later verify otp entered by receiver
					$_SESSION["sent_otp"] = $otp;
					$_SESSION["emp_reg_mob_num"] = $reg_mob_num;
					$_SESSION["emp_organization"] = $employed_by;
					$_SESSION["employee_id"] = $row["employee_id"];
					$_SESSION["employed_by_ua"] = $row2["udyog_aadhaar"];
			
					//Sent otp message echo-ed
					echo "Authorization Pin Sent to {$reg_mob_num}";

					

					}
				else
					{
					//employee exist but it do not work in the entered organization
					echo "<span>The mobile number entered do not belong to <?php $employed_by ?>.</span>";
					}
	
			}	
			else
			{	
    		//Registered mobile number entered is not found in the database provided by msme, i.e. the employee trying to make mcp 		account is fake or wrong info entered
			echo "<span>The mobile number entered do not belong to any MSME Enterprise</span>";
			}
		}
}
mysqli_close($conn);

?>



