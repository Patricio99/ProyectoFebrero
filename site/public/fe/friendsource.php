<?php
  include "./indexlogged.php";
  include '../be/apis/conn.php';
  $c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
  $urlid = explode('/', end($c));
  $nombre = $userid = $recursoid = "";
  $test1 = $test2 = "";
  $YaSolicito = "";



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
              <?php
              $sql= "SELECT idrecurso, idsolicitado FROM solicitudes WHERE idsolicitante='" . $_SESSION["session"] . "'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $test1 = $row["idrecurso"];
                  $test2 = $row["idsolicitado"];
                  if ($test1 == $recursoid && $test2 == $userid) {
                    $YaSolicito = "si";
                  }
                }
              }
              if ($YaSolicito != "si") { ?>
              <a href="solicitud.php?recursoId=<?php echo $recursoid ?>&userId=<?php echo $userid ?>" class="btn btn-link">Solicitar uso</a>
            <?php
          }else { ?>
            <p class="card-text">Ya solicitó el uso del recurso</p>
            <?php
          }
            ?>
            </div>
          </div>
              <?php

      }
  }
$conn->close();

  include "./indexdown.php";
?>
