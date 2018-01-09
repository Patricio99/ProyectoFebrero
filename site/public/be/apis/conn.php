<?php
header("Access-Control-Allow-Origin: *");

$HostName = "localhost";
$HostUser = "root";
$HostPass = "";
$DatabaseName = "dbproyectofebrero";

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
?>
