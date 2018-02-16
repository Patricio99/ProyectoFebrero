<?php
  include "./indexlogged.php";
  include '../be/apis/conn.php';
  $c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
  $urlid = explode('/', end($c));
  $nombre = $userid = $recursoid = "";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT id, nombre, userid, recursoid FROM recursos WHERE userid='" . $urlid[0] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $recursoid = $row["recursoid"];
      $userid = $row["userid"];
      ?>
          <div class="card" style="width: 20rem;">
            <div class="card-block">
              <h3 class="card-title"><?php echo $nombre; ?></h3>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="solicitud.php?id=<?php echo $recursoid . "&" . "dueño_id=" . $userid; ?>" class="btn btn-link">Solicitar uso</a>
            </div>
          </div>
              <?php

      }
  }
$conn->close();

  include "./indexdown.php";
?>
