<?php 

session_start();

?>

<?php

//if(isset($_SESSION["mcp_id"]))
{
    require 'config_mcp_database.php';

    $howmany = $_POST["howmany"];  // name = id =howmany numeric only!
    $mn = $_POST["mn"];  

    
//print_r($myArray)
    $reg_mob_num[] = array_fill(0, $howmany, '\0');
    $reg_mob_num = explode(',', $mn);

    for($i = 0 ; $i < $howmany ; $i++)
    {
        $reg_mob_num[$i] = trim($reg_mob_num[$i]);
    }

    $succ[] = array_fill(0, $howmany, 0);
    
    for($i = 0 ; $i < $howmany ; $i++)
    {
        $sql = "DELETE FROM registered_employee WHERE reg_mob_num = '{$reg_mob_num[$i]}' ";
        if ($conn->query($sql) === TRUE)
        {
        $succ[$i] = 1; //deleted 
        }
    }
    $sql = "UPDATE registered_organization SET emp_count='{$howmany}'"; mysqli_query($conn, $sql) ;
$_SESSION["emp_countt"] -= $howmany;
    echo "$howmany Employees Delisted";

    <a href="change_emp.php">Go to Homepage<a>
    $conn->close();
}

?>
