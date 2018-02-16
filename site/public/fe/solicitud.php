<?php
  include "./indexlogged.php";

$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$urlid = explode('/', end($c));

echo "string" . $urlid[0] . $urlid[1];

$idsolicitado = $finicio = $ffin = $hinicio = $hfin = "";

if (!empty($_POST))
{
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $finicio = test_input($_POST["Nombre"]);
    $ffin = test_input($_POST["Unid"]);
    $hinicio = test_input($_POST["Unid"]);
    $finicio = test_input($_POST["Unid"]);
  }


  include '../be/apis/conn.php';

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql= "INSERT INTO solicitudes (idsolicitante, idrecurso, idsolicitado, fInicio, fFin, hInicio, hFin)
  VALUES ('" .$_SESSION["session"] ."','". $urlid[0] ."', '" . $urlid[1] . "', '". $finicio ."','". $ffin ."', '". $hinicio ."', '". $hfin ."')";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  }
  $conn->close();
}
?>
<form>
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
