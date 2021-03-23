<?php
session_start();
?>

<?php 

$reg_mob_num = $_POST["reg_mob_num"];
$password = ("{$_POST["password"]}");


//Checking if it have an mcp account against it
$sql = "SELECT * FROM mcp_member WHERE member='{$reg_mob_num}'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1)
{
	//Yes account exist
	if($password == $row["password"])
	{
		//Login is correct
		$_SESSION["mcp_id"] = $row["mcp_id"];
		//Redirect to user feed
	}
	else
	{
		echo "Incorrect Password";
	}
}
else
{
	echo "Invalid Login Credentials";
}
?>