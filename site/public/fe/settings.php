<?php
  include "./indexlogged.php";
?>
<?php
$nombre = $apellido = $mail = $unid = "";
include '../be/apis/conn.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT nombre, apellido, mail, unid FROM usuarios where unid='" . $_SESSION["session"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $apellido = $row["apellido"];
      $mail = $row["mail"];
      $unid = $row["unid"];
    }
  }
?>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNombre">Nombre</label>
      <input type="text" class="form-control" id="inputNombre" value="<?php echo $nombre; ?>" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputApellido">Apellido</label>
      <input type="text" class="form-control" id="inputApellido" value="<?php echo $apellido; ?>" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" value="<?php echo $mail; ?>" id="inputEmail" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputUnid">Unique ID</label>
      <input type="text" class="form-control" id="inputUnid" value="<?php echo $unid; ?>" disabled>
    </div>
  </div>
</form>

<?php
  include "./indexdown.php";
?>
