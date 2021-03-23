<?php

//Include this file to connect to mcp_database in XAMPP MySQL, metion correct relative address in require 

// To include: copy :: require 'config_mcp_database.php';

$servername = "localhost:3306";			//XAMPP MySQL MySQL Server TCP/IP
$username = "root";		//XAMPP MySQL default username is root
$password = "";			//XAMPP MySQL Password is empty string
$databasename = "mcp_user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
