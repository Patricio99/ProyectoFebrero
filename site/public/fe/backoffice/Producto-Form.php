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

include '../../be/apis/conn.php';

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
<html>
  <head>
    <script src="../node_modules/jquery/dist/jquery.js"></script>

		<script src="../node_modules\tether\dist\js\tether.js"></script>

		<script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../node_modules\tether\dist\css\tether.css"/>
  </head>
  <body>
  </br>
  </br>
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
          <input type="file" name="Imagen" required/>
          <span class="custom-file-control"></span>
      </label>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="products.php"><button type="button" class="btn btn-primary">Regresar</button></a>
    </div>
  </form>
  </body>
</html>
