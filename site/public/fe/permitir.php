<?php
$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$urlid = explode('/', end($c));

include '../be/apis/conn.php';

$permitido = "Permitido";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE solicitudes SET respuesta='". $permitido ."' WHERE id='$urlid[0]'";
$result = $conn->query($sql);

$conn->close();

header('Location: dashboard.php');


?>
