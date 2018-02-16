<?php
  include "./indexlogged.php";

  $idsolicitado = $finicio = $ffin = $hinicio = $hfin = $id1 = $id2 = $show1 = $show2 = "";


if(isset($_GET['recursoId']) && isset($_GET['userId'])){
  $id1 = $_GET['recursoId'];
  $id2 = $_GET['userId'];

  echo "_" . $id1;
}



if (!empty($_POST))
{
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $finicio = test_input($_POST["fInicio"]);
    $ffin = test_input($_POST["fFin"]);
    $hinicio = test_input($_POST["hInicio"]);
    $hfin = test_input($_POST["hFin"]);
    $show1 = test_input($_POST["id1"]);
    $show2 = test_input($_POST["id2"]);
  }


  include '../be/apis/conn.php';

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql= "INSERT INTO solicitudes (idsolicitante, idrecurso, idsolicitado, fInicio, fFin, hInicio, hFin, respuesta)
  VALUES ('" .$_SESSION["session"] ."','". $show1 ."', '" . $show2 . "', '". $finicio ."','". $ffin ."', '". $hinicio ."', '". $hfin ."', '" ."". "')";
  $result = $conn->query($sql);

  $conn->close();
}
?>
<form method="post" action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <input type="text" value="<?php echo $id1; ?>" name="id1"/>
  <input type="text" value="<?php echo $id2; ?>" name="id2"/>

  <div class="form-group">
    <label for="exampleFormControlInput1">Seleccione fecha y hora para el uso del recurso</label></br>
    <input type="date" name="fInicio" min="<?php date('Y-m-d') ?>">
    <input type="date" name="fFin" max="<?php date('Y-m-d', strtotime(date('Y-m-d'). ' + 30 days')) ?>">
  </div>
  <div class="form-group">
    <input type="time" name="hInicio">
    <input type="time" name="hFin">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Solicitar recurso</button>
    <button type="button" onclick="window.location.href='friends.php';" class="btn btn-primary">Regresar</button>
  </div>
</form>
<?php
  include "./indexdown.php";
?>
