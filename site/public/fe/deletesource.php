<?php
  include "./indexlogged.php";

$id1 = $id2 = "";


if(isset($_GET['id']) && isset($_GET['nomRec'])){
$id1 = $_GET['id'];
$id2 = $_GET['nomRec'];
}

include '../be/apis/conn.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM recursos WHERE idrecurso= '".$id1."'";
$result = $conn->query($sql);

$sql = "DELETE FROM solicitudes WHERE idsolicitado= '". $_SESSION["session"] ."' AND idrecurso= '". $id1 ."' AND nombreRec='". $id2 ."'";
$result1 = $conn->query($sql);


header('Location: recursos.php');
?>
