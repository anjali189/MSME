<?php
session_start();
?>

<?php
include 'alert.php';
$old = $_SESSION["emp_countt_old"] ; 
$new = $_SESSION["emp_countt"];
if($new > $old) //increase 
{
	
	if((($new - $old)/$old)	> 0.1)
	{
		sendmess(8519046205, "Steep increase in number of Employees");
	}

	/*
	if($old > 0 and $old <= 19)
	if((($new - $old)/$old)	> 0.25)
	{

	}
	else if($old > 19 and $old <= 50)
	if((($new - $old)/$old)	> 0.25)
	{
		
	}
	else if($old > 50 and $old <= 79 )
	if((($new - $old)/$old)	> 0.25)
	{
		
	}else if($old > 79 and $old <= 100)
	if((($new - $old)/$old)	> 0.25)
	{
		
	}else if($old > 100 and $old <= 149)
	if((($new - $old)/$old)	> 0.25)
	{
		
	}
	else if($old > 149 and $old <= 200)
	if((($new - $old)/$old)	> 0.25)
	{
		
	}
	else if($old > 250 and $old <= 299)
	if((($new - $old)/$old)	> 0.)
	{
		
	}
	else if($old > 299 and $old <= 499)
	if((($new - $old)/$old)	> 0.10)
	{
		
	}

	*/
}
?>