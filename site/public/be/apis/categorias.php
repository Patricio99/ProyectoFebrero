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

    $sql = "SELECT id, Nombre FROM categorias where " .
    "(id=" . $id . " or 0=" . $id . ")";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row[] = $result->fetch_assoc()) {
        $tem = $row;
        $json = json_encode($tem);
      }

    } else {
     echo "No hay resultados.";
    }

    echo $json;
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
