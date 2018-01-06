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
    if ($_FILES["Imagen"]["name"] != "") {
      $ImagenName = $_FILES["Imagen"]["name"];
      $ImagenData = $_FILES["Imagen"]['tmp_name'];
    }
    else {
      $ImagenName = $_POST["imgVieja"];
    }
    $Destacado = $_POST["Destacado"];
    $booleano = true;

    $path = "../images/" . basename($ImagenName);
    if (move_uploaded_file($ImagenData, $path)) {
      echo "yeah";
    }
    else {
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
$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$results = explode('/', end($c));

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
      $sql = "UPDATE Productos SET idCategoria=$idCategoria, Codigo=$Codigo, Nombre='$Nombre', Precio=$Precio, Destacado=$Destacado, Descripcion= '$Descripcion', Imagen='$ImagenName' WHERE id=$results[0]";
      echo $sql;

      $result = $conn->query($sql);

      header('Location: products.php');
    } else {
      // show error to users
    }
}
if (!$booleano) {

$sql = "SELECT idCategoria, Codigo, Nombre, Precio, Destacado, Descripcion, Imagen FROM productos where id=$results[0]";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row[] = $result->fetch_assoc()) {
    $tem = $row;
  }
} else {
 echo "No hay resultados.";
}

if ($tem[0]['Destacado'] === "0") {
  $chequeado = "";
}
else {
  $chequeado ="checked";
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
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>?id=<?=$results[0];?>" enctype="multipart/form-data">
    </br>
  </br>
      <div class="form-group">
        <label for="formGroupExampleInput2">idCategoría</label>
        <input type="text" class="form-control" name="idCategoria" value="<?php echo $tem[0]['idCategoria'];?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Código</label>
        <input type="text" class="form-control" name="Codigo" value="<?php echo $tem[0]['Codigo'];?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Nombre</label>
        <input type="text" class="form-control" name="Nombre" value="<?php echo $tem[0]['Nombre'];?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Precio</label>
        <input type="text" class="form-control" name="Precio" value="<?php echo $tem[0]['Precio'];?>">
      </div>
      <div>
      <label class="custom-control custom-checkbox">
        <input type="checkbox" name="Destacado" class="custom-control-input" value="true" <?php echo $chequeado; ?>>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Destacado</span>
      </label>
    </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Descripción</label>
        <input type="text" class="form-control" name="Descripcion" value="<?php echo $tem[0]['Descripcion'];?>">
      </div>
      <div>
      <label>
        <input type="file" name="Imagen">
        <span class="custom-file-control"></span>
    </label>
  </div>
    <div>
    <img src="../images/<?php echo $tem[0]['Imagen'];?>" width="42" height="42">
    <a href="products.php"><button type="submit" class="btn btn-primary">Submit</button></a>
    <a href="products.php"><button type="button" class="btn btn-primary">Regresar</button></a>
  </div>
  <input type="hidden" value="<?php echo $tem[0]['Imagen']?>" name="imgVieja"/>
  </form>
  </body>
</html>
