<?php

include "./indexlogged.php";

$id = "";
$idrec = $fIni = $fFIN = $hIni = $hFin = NULL;
$OFI = $OFF = $OHI = $OHF = $oldID = "";
$permitido = "Permitido";
$CompareNoma = False;


if(isset($_GET['id']) && isset($_GET['idRec']) && isset($_GET['fechaI']) && isset($_GET['fechaF']) && isset($_GET['horaI']) && isset($_GET['horaF'])){
  $id = $_GET['id'];
  $idrec = $_GET['idRec'];
  $fIni = $_GET['fechaI'];
  $fFin = $_GET['fechaF'];
  $hIni = $_GET['horaI'];
  $hFin = $_GET['horaF'];

}

include '../be/apis/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql= "SELECT id, fInicio, fFin, hInicio, hFin FROM solicitudes WHERE idsolicitado='" . $_SESSION["session"] . "' AND respuesta = '". "Permitido" ."' AND idrecurso= '". $idrec ."'";
$result2 = $conn->query($sql);
if ($result2->num_rows > 0) {
  while($row = $result2->fetch_assoc()) {
    $oldID = $row["id"];
    $OFI = $row["fInicio"];
    $OFF = $row["fFin"];
    $OHI = $row["hInicio"];
    $OHF = $row["hFin"];

    $oldEndTime = strtotime($OHF);
    $newBegTime = strtotime($hIni);
    $oldBegTime = strtotime($OHI);
    $newEndTime = strtotime($hFin);


    $oldEndDate = strtotime($OFF);
    $newBegDate = strtotime($fIni);
    $oldBegDate = strtotime($OFI);
    $newEndDate = strtotime($fFin);
    if (isset($OFI)) {

      $CompareNoma = TRUE;

      echo "cn entro";

    }
    else {
      $sql = "UPDATE solicitudes SET respuesta='". $permitido ."' WHERE id='" . $id . "'";
      $result1 = $conn->query($sql);
    }
    if ($newBegDate >= $oldEndDate && $CompareNoma == TRUE && $oldEndTime < $newEndTime) {

      $sql = "UPDATE solicitudes SET respuesta='". $permitido ."' WHERE id='" .$id. "'";
      $result3 = $conn->query($sql);

     }
     else if ($newEndDate < $oldBegDate && $CompareNoma == TRUE && $newEndTime < $oldBegTime) {
       $sql = "UPDATE solicitudes SET respuesta='". $permitido ."' WHERE id='" .$id. "'";
       $result4 = $conn->query($sql);
     }
     else {
       $sql = "DELETE FROM solicitudes WHERE id= '". $oldID ."'";
       $result5 = $conn->query($sql);

       $sql = "UPDATE solicitudes SET respuesta='". $permitido ."' WHERE id='" .$id. "'";
       $result6 = $conn->query($sql);
     }
  }
}
else {
  $sql = "UPDATE solicitudes SET respuesta='". $permitido ."' WHERE id='" .$id. "'";
  $result7 = $conn->query($sql);
}


$conn->close();

header('Location: peticiones.php');

?>
