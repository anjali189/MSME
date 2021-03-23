<?php
session_start();
?>
<?php 

$udyog_aadhaar = $_POST["udyog_aadhaar"];  // name = id === udyog_aadhaar
$pass = $_POST["password"];  //name = id === password
//echo $password;
require 'config_mcp_database.php';
//Checking if it have an mcp account against it
$sql = "SELECT * FROM mcp_member WHERE member='{$udyog_aadhaar}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($pass == $row["password"])
	{
		//echo "Hi";
		$_SESSION["mcp_id"] = $row["mcp_id"];







		$sql2 = "SELECT * FROM registered_employee WHERE employed_by_ua='{$row["mcp_id"]}'";
		$result2 = mysqli_query($conn, $sql2);
		$n = mysqli_num_rows($result2);
		
	
		
			$sq = "UPDATE mcp_organization SET emp_count ='{$n}' WHERE mcp_id='{$row["mcp_id"]}'";
			//$conn->query("$sq");
		
			$result3 = mysqli_query($conn , $sq);
		
		$sqll = "SELECT * FROM mcp_organization WHERE mcp_id='{$row["mcp_id"]}'";
		$resultl = mysqli_query($conn, $sqll);
		$rowl = mysqli_fetch_assoc($resultl);
			
		
		$_SESSION["emp_countt_old"] = $rowl["emp_count"];
		$_SESSION["emp_countt"] = $rowl["emp_count"];

		
			//echo $row["password"];
			//echo "Hey"."$pass". "Hey";







		header("location:enlist_emp.1.php");
		//Redirect to user feed
	}
	else
	{
		echo "Incorrect Password";
	}


	//Yes account exist
	//echo "hi";
	


	


?>