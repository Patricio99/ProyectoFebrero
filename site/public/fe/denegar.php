<?php
$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$urlid = explode('/', end($c));

include '../be/apis/conn.php';

$denegar = "Denegado";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE solicitudes SET respuesta='". $denegar ."' WHERE id='$urlid[0]'";
$result = $conn->query($sql);

$conn->close();


header('Location: dashboard.php');

?>
