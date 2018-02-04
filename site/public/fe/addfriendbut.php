<?php
$amigo = $todoOK = $usersession = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $amigo = test_input($_POST["amigo"]);
  $todoOK = "si";
}

$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$result = explode('/', end($c));

$usersession = $result[0];

include '../be/apis/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO amigos (iduser, idfriend)
VALUES ('" . $usersession . "', '" . $amigo . "')";
if ($todoOK == "si") {
  $result = $conn->query($sql);
  header('Location: friends.php?id=' . $usersession);
} else {
    echo $conn->error;
}
?>
