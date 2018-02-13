<?php
$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$urlid = explode('/', end($c));

include '../be/apis/conn.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM amigos WHERE id= '".$urlid[0]."'";
$result = $conn->query($sql);

header('Location: friends.php');
?>
