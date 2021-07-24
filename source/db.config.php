<?php

ob_start();
session_start();

$servername = "ec2-54-155-208-5.eu-west-1.compute.amazonaws.com";
$username = "nleqlzqkrtkews";
$password = "71d4758c4df7d85cdb0b675c954127665732c156636394bf834d8e9e76b81c0e";
$port     = 5432;

try 
{
  $conn = new PDO("pgsql:host=$servername;dbname=d4aiumim8ubo56", $username, $password,$port);

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) 
{
  echo "Connection failed: " . $e->getMessage();
}





?>
