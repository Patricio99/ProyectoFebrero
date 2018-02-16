<?php
  include "./indexlogged.php";

  $nombre = $name = $surname = $nombreRec = $id = $idrec = $fIni = $fFin = $hIni = $hFin = $respuesta = "";

  include '../be/apis/conn.php';

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $aidi = $_SESSION["session"];

  $sql= "SELECT id, idsolicitante, idrecurso, fInicio, fFin, hInicio, hFin, respuesta FROM solicitudes WHERE idsolicitado='" . $aidi . "'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $nombre = $row["idsolicitante"];
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
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $nombreRec = $row["nombre"];
            }
          }
          ?>
        <h3 class="card-title"><?php echo $nombreRec; ?></h3>
        <?php
        $sql= "SELECT nombre, apellido FROM usuarios WHERE unid= '" . $nombre . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $name = $row["nombre"];
            $surname = $row["apellido"];
          }
        }
        ?>
        <p class="card-text">Solicitado por <?php echo $name . " " . $surname; ?></p>
        <p class="card-text">A utilizar desde <?php echo $fIni . " a las " . $hIni . " hasta el " . $fFin . " a las " . $hFin;  ?></p>
        <?php
          if ($respuesta == "") {
            ?>
            <a href="permitir.php?id=<?php echo $id; ?>" class="btn btn-link">Permitir</a>
            <a href="denegar.php?id=<?php echo $id; ?>" class="btn btn-link">Denegar</a>
            <?php
          }else {
            ?>
            <p class="card-text"><?php echo $respuesta; ?></p>
            <?php
          }
        ?>

      </div>
    </div>
<?php
    }
}

?>

<?php
  include "./indexdown.php";
?>
