<?php

$Nombre = "";


include '../../be/apis/conn.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Conneccion Falllida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Nombre = test_input($_POST["Nombre"]);
  $id = $_POST["id"];

  $sql = "UPDATE categorias SET Nombre='" . $Nombre . "' WHERE id=$id";


    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: categories.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
  // hago lo que vengo haciendo aca abajo
}


$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$result = explode('/', end($c));

$sql = "SELECT id, Nombre FROM categorias where id=$result[0]";

if ($result = $conn->query($sql)) {
  if ($result->num_rows > 0) {
    while($row[] = $result->fetch_assoc()) {
      $tem = $row;
    }
  } else {
   echo "No hay resultados.";
  }
}else {
  var_dump($conn->error);

}

$conn->close();

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
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
    </br>
  </br>
      <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $tem[0]['id']; ?>">
        <label for="formGroupExampleInput2">Nombre</label>
        <input type="text" class="form-control" name="Nombre" value="<?php echo $tem[0]['Nombre'];?>">
      </div
    <div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button onclick="javascript:history.go(-1)" type="button" class="btn btn-primary">Regresar</button>
  </div>
  </form>
  </body>
</html>
