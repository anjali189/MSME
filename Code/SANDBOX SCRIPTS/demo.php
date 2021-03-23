<?php 
require 'config_mcp_database.php';

$sq = "INSERT INTO mcp_organization (emp_count) VALUES (5) WHERE mcp_id=1";
			//$conn->query("$sq");
		
			$result3 = mysqli_query($conn , $sq);
		
		$sqll = "SELECT * FROM mcp_organization WHERE mcp_id=1";
		$resultl = mysqli_query($conn, $sqll);
		$rowl = mysqli_fetch_assoc($resultl);
			
		echo $rowl["emp_count"];