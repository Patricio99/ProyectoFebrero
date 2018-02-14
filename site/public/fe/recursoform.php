<?php
  include "./indexlogged.php";
?>
<?php
$Nombre = $prodid = "";
$booleano = NULL;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Nombre = test_input($_POST["Nombre"]);
  $prodid = test_input($_POST["Unid"]);
  $booleano = "si";
}

include '../be/apis/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

      $sql = "INSERT INTO recursos (nombre, userid, recursoid) VALUES ('" . $Nombre . "', '" . $_SESSION["session"] . "', '". $prodid . "')";
      if ($booleano == "si") {
        $result = $conn->query($sql);
        $booleano = TRUE;
      }
      else {
        echo $conn->error;
      }
$conn->close();
if ($booleano && isset($Nombre)) {
  header('Location: recursos.php');

}
?>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputNombre" class="col-sm-2 col-form-label">Nombre del recurso</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Nombre" id="inputNombre" placeholder="Nombre del recurso" required/>
    </div>
  </div>
  <div class="form-group row">
    <label for="idRecurso" class="col-sm-2 col-form-label">Id del recurso</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo uniqid();?>" class="form-control" id="idRecurso" name="Unid" placeholder="Product ID" readonly>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Agregar recurso</button>
      <button type="button" onclick="window.location.href='recursos.php';" class="btn btn-primary">Regresar</button>
    </div>
  </div>
</form>
<?php
  include "./indexdown.php";
?>
