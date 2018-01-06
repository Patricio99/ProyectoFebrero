<?php
include '../../be/apis/conn.php';

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Conneccion Falllida: " . $conn->connect_error);
}

$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$result = explode('/', end($c));

$sql = "DELETE FROM categorias WHERE id=$result[0]";

if ($conn->query($sql) === TRUE) {
    echo "Categoría eliminada satisfactoriamente.";
} else {
    echo "Ocurrio un error al intentar eliminar la categoría: " . $conn->error;
}

$conn->close();

?>
</br>
<a href="categories.php"><button>Regresar</button></a>
