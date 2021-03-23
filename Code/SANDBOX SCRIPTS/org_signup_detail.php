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
	
	$mcp_id= test_input($_SESSION["mcp_id"]);
	$udyog_aadhaar= test_input($_SESSION["udyog_aadhaar"]);
	$organization_name= test_input($_SESSION["organization_name"]);
	$signatory_name = test_input($_SESSION["signatory_name"]);
	$signatory_mob_num = test_input($_SESSION["signatory_mob_num"]);
	$signatory_aadhaar = test_input($_SESSION["signatory_name"]);
	$major_activity = test_input($_POST["major_activity"]);   //SET name and id of Major Activity to = major_activity
	$organization_type = test_input($_POST["organization_type"]);   //SET name and id of Organization Name to = organization_type
	$password = $_POST["password"];

	//Inserting form data into mcp_employee table against $_SESSION["mcp_id"]
	
	$sql = "INSERT INTO mcp_organization (mcp_id, organization_name, udyog_aadhaar , signatory_name, signatory_mob_num, signatory_aadhaar, major_activity, organization_type)
	VALUES ('{$mcp_id}' , '{$organization_name}' , '{$udyog_aadhaar}' , '{$signatory_name}' , '{$signatory_mob_num}' , '{$signatory_aadhaar}' , '{$major_activity}' , '{$organization_type}' )";
$sql = "INSERT INTO mcp_member (password)
	VALUES ($password)";

	if ($conn->query($sql) === TRUE)   //If Inserted
	{
		//Now load login organization page
	}
	else
	{
		//Something went wrong
		
		//Delete row in mcp_member against $_SESSION["mcp_id"]
		
		$sql_d = "DELETE FROM mcp_member WHERE mcp_id='{$mcp_id}'";

		if ($conn->query($sql_d) === TRUE) 
		{
			//Deleted Successfully	
		} 
		else 
		{
			//There is a fatal database error
		}
				$sql_d = "DELETE FROM mcp_organization WHERE mcp_id='{$mcp_id}'";

		if ($conn->query($sql_d) === TRUE) 
		{
			//deleted
			//reload to signup organization page
			
			
			
			
			
			
			
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

