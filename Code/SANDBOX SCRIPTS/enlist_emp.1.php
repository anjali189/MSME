<?php
session_start();
//echo "{$_SESSION["emp_countt"]}";

echo $_SESSION["emp_countt_old"] ; echo $_SESSION["emp_countt"];
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<form action=enlist_emp.php method=POST>

Number of employees to enlist<input type=number name="howmany" id ="howmany" >
Employee Mobile Numbers (Comma Seperated) <input type=text name="mn" id ="mn" >
<button type=submit >Submit Entry</button>
</form>
<!-- ?php echo "{$_SESSION["howmanye"]}"; ?>  -->
<p><br>OR<br></p>
<form action=delist_emp.php method=POST>

Number of employees to delist<input type=number name="howmany" id ="howmany" >
Employee Mobile Numbers (Comma Seperated) <input type=text name="mn" id ="mn" >
<button type=submit >Submit Entry</button>
</form>
</body>
</html>