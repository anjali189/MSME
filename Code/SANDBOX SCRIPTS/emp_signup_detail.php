<?php

session_start();

?>

<?php
// Connecting to database
include 'config_mcp_database.php';

if(isset($_SESSION["mcp_id"]))   
{
		function test_input($data) 		//Making input clean
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	
	$mcp_id = $_SESSION["mcp_id"];
	$emp_reg_mob_num = $_SESSION["emp_reg_mob_num"];
	$employed_by_ua = $_SESSION["employed_by_ua"];
	$firstname = test_input($_POST["f_name"]);
	$lastname = test_input($_POST["l_name"]);
	$employee_email = test_input($_POST["e_email"]);
	$designation = test_input($_POST["e_designation"]);
	$employee_id = $_SESSION["employee_id"];
	$password = $_POST["password"];
	

	
	//Inserting form data into mcp_employee table against $_SESSION["mcp_id"]
	
	$sql = "INSERT INTO mcp_employee (mcp_id, employed_by_ua, reg_mob_num, first_name, last_name, employee_email, employee_id)
	VALUES ($mcp_id , $employed_by_ua, $emp_reg_mob_num , $firstname , $lastname , $employee_email , $designation , $employee_id )";
$sql = "INSERT INTO mcp_member (password)
	VALUES ($password)";


	if ($conn->query($sql) === TRUE)   //If Inserted
	{
		//Now load login employee page
	}
	else
	{
		//Something wrong
		
		//Delete row in mcp_member against $_SESSION["mcp_id"]
		
		$sql_d = "DELETE FROM mcp_member WHERE mcp_id={$_POST["mcp_id"]}";

		if ($conn->query($sql_d) === TRUE) 
		{
			//deleted from mcp_member table
			//reload to signup employee page
			
			
			
			
			
			
			
		} 
		else 
		{
			//There is a fatal database error
		}
		
		// delete from mcp_employee table 
		$sql_d = "DELETE FROM mcp_employee WHERE reg_mob_num=$emp_reg_mob_num";

		if ($conn->query($sql_d) === TRUE) 
		{
			//deleted from mcp_member table
			//reload to signup employee page
			
			
			
			
			
			
			
		} 
		else 
		{
			//There is a fatal database error
		}
	}
	
}
else
{
	//Unauthorized access to this .php file
}

//Disconnecting from database
mysqli_close($conn);

// Remove all session variables
session_unset(); 

// Destroy the session 
session_destroy(); 

?>

