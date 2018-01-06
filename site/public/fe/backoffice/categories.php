<?php
include 'masterpage.php';



function render() {

  include '../../be/apis/conn.php';


  $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
  if ($conn->connect_error) {
   die("Conneccion Falllida: " . $conn->connect_error);
  }

  $id = isset($_GET['id']) ? $_GET['id']:0;
  $sql = "SELECT id, Nombre FROM categorias where " .
  "(id=" . $id . " or 0=" . $id . ")";
  $result = $conn->query($sql);

  $conn->close();
  ?>
  <a href="Categoria-Form.php"><button>Crear</button></a>
  <table>
    <tr>
      <td>
        ID
      </td>
      <td>
        Nombre
      </td>
      <td>
        Acciones
      </td>
    </tr>
    <?php
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <td>
              <?php echo $row["id"]; ?>
            </td>
            <td>
              <?php echo $row["Nombre"]; ?>
            </td>
            <td>
              <a href="Categoria-Modificar.php?id=<?php echo $row["id"]; ?>">Modificar</a>
              <a href="Categoria-Eliminar.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('¿Seguro que desea eliminar la categoría?')">Eliminar</a>
            </td>
          </tr>
          <?php
        }
      } else {
       echo "No hay resultados.";
      }
    ?>
  </table>
</br>
  <a href="products.php">Ir a productos</a>
  <?php
}
?>
