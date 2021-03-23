<?php

session_start();

?>

<?php

if(isset($_SESSION["mcp_id"]))
{
    //echo $_SESSION["mcp_id"];
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
        $sql = "INSERT INTO registered_employee (reg_mob_num, employed_by_ua )
        VALUES ('{$reg_mob_num[$i]}' ,  '{$_SESSION["mcp_id"]}')";
        if ($conn->query($sql) === TRUE)
        {
            
        $succ[$i] = 1; //Inserted
        }
    }
    $sql = "UPDATE mcp_organization SET emp_count='{$howmany}' WHERE mcp_id={$_SESSION["mcp_id"]}";
        $conn->query($sql);
    $_SESSION["emp_countt"] += $howmany;
    echo "";
    echo "$howmany Employees Enlisted";
    //$_SESSION["howmanye"] = $howmany .  "Employees Enlisted";
   // header('location: enlist_emp.1.php');
    
    

    $conn->close();
}

?>
<html>
<body>
<a href="change_emp.php">Go to Homepage<a>
</body>

</html>