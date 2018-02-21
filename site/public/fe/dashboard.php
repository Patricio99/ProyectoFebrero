<?php
  include "./indexlogged.php";
  //echo $_SESSION["session"];
?>
<h4> Solicitudes </h4>

<?php
  $name = $surname = $nombreRec = $id = $idrec = $fIni = $fFin = $hIni = $hFin = $respuesta = "";

include '../be/apis/conn.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT id, idrecurso, fInicio, fFin, hInicio, hFin, respuesta FROM solicitudes WHERE idsolicitante='" . $_SESSION["session"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $idrec = $row["idrecurso"];
    $fIni = $row["fInicio"];
    $fFin = $row["fFin"];
    $hIni = $row["hInicio"];
    $hFin = $row["hFin"];
    $respuesta = $row["respuesta"];
    ?>
    <div class="card" style="width: 20rem;">
      <div class="card-block">
        <?php
          $sql= "SELECT nombre FROM recursos WHERE recursoid= '" . $idrec . "'";
          $result1 = $conn->query($sql);
          if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
              $nombreRec = $row["nombre"];
            }
          }
          ?>
          <h3 class="card-title">Solicitud de uso de <?php echo $nombreRec; ?></h3>
          <p class="card-text">A utilizar desde <?php echo $fIni . " a las " . $hIni . " hasta el " . $fFin . " a las " . $hFin;  ?></p>
          <?php if ($respuesta == "") { ?>
          <p class="card-text">Estado: Pendiente</p>
          <?php
        }else {
          ?>
          <p class="card-text">Estado: <?php echo $respuesta; ?></p>
          <?php
        }
        ?>
        </div>
      </div>

    <?php
  }
}
$conn->close();
?>

<?php
  include "./indexdown.php";
?>
