<?php
  include "./indexlogged.php";
?>
<?php
$idCategoria = $Codigo = $Nombre = $Precio = $Destacado = $Descripcion = $Imagen = "";
$booleano = false;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $idCategoria = test_input($_POST["idCategoria"]);
  $Codigo = test_input($_POST["Codigo"]);
  $Nombre = test_input($_POST["Nombre"]);
  $Precio = test_input($_POST["Precio"]);
  $Descripcion = test_input($_POST["Descripcion"]);
  $ImagenName = $_FILES["Imagen"]["name"];
  $ImagenData = $_FILES["Imagen"]['tmp_name'];
  $Destacado = $_POST["Destacado"];
  $booleano = true;

  $path = "../images/" . basename($ImagenName);
  if (move_uploaded_file($ImagenData, $path)) {
      // Move succeed.
      echo "yeah";
  } else {
      // Move failed. Possible duplicate?
      echo "No!";
  }
  if ($Destacado) {
      $Destacado = 1;
  }
  else {
    $Destacado = 0;
  }
}

include '../be/apis/conn.php';

if (!empty($_POST)) {
    // handle post data

    // Create connection
    $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($booleano) {
      // lo guardo en la bd
      $sql = "INSERT INTO Productos (idCategoria, Codigo, Nombre, Precio, Destacado, Descripcion, Imagen)
      VALUES (".$idCategoria.", ".$Codigo.", '" . $Nombre . "', " . $Precio . ", " . $Destacado . ", '" . $Descripcion. "', '" . $ImagenName . "')";

      $result = $conn->query($sql);

      header('Location: products.php');
    } else {
      // show error to users
    }
}
?>
<form>
  <div class="form-group row">
    <label for="inputNombre" class="col-sm-2 col-form-label">Nombre del recurso</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNombre" placeholder="Nombre del recurso">
    </div>
  </div>
  <div class="form-group row">
    <label for="idRecurso" class="col-sm-2 col-form-label">Id del recurso</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="idRecurso" placeholder="Product ID" disabled>
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            First radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Second radio
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
          <label class="form-check-label" for="gridRadios3">
            Third disabled radio
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Example checkbox
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
---------------------------------------------
    <form method="POST" action="Producto-Form.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="formGroupExampleInput2">idCategoría</label>
        <input type="number" class="form-control" name="idCategoria" placeholder="idCategoría" required/>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Código</label>
        <input type="number" class="form-control" name="Codigo" placeholder="Código" required/>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Nombre</label>
        <input type="text" class="form-control" name="Nombre" placeholder="Nombre" required/>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Precio</label>
        <input type="number" class="form-control" name="Precio" placeholder="Precio" required/>
      </div>
      <div>
      <label class="custom-control custom-checkbox">
        <input type="checkbox" name="Destacado" class="custom-control-input" value="true" />
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Destacado</span>
      </label>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Descripción</label>
      <input type="text" class="form-control" name="Descripcion" placeholder="Descripción" required/>
    </div>
    <div>
      <label>

      </label>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-primary" onclick="window.location.href='recursos.php';">Regresar</button>
    </div>
  </form>
<?php
  include "./indexdown.php";
?>
