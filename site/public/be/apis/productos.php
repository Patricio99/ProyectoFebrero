<?php
include 'conn.php';

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Conneccion Falllida: " . $conn->connect_error);
}
$action = $_SERVER['REQUEST_METHOD'];

switch($action) {
  case 'GET':
    $id = isset($_GET['id']) ? $_GET['id']:0;
    $destacado = isset($_GET['destacados']) ? $_GET['destacados']:0;
    $idCategoria = isset($_GET['idCategoria']) ? $_GET['idCategoria']:0;

    $sql = "SELECT id, idCategoria, Codigo, Nombre, Precio, Destacado, Descripcion, Imagen FROM productos where " .
    "(id=" . $id . " or 0=" . $id . ") AND (Destacado=" . $destacado . " or 0=" . $destacado . ") AND (idCategoria=" . $idCategoria . " or 0=" . $idCategoria . ")";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row[] = $result->fetch_assoc()) {
        $tem = $row;
        $json = json_encode($tem);
      }
      echo $json;
    } else {
      echo "{}";
    }
  break;
  case 'POST':
    // $_POST
    echo 'alta';
    break;
  case 'PUT':
    // $_POST
    echo 'update';
    break;
  case 'DELETE':
    echo 'delete';
    // $_GET
    break;
}
exit(0);
$conn->close();
?>
