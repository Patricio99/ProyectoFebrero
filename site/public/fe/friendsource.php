<?php
  include "./indexlogged.php";
  include '../be/apis/conn.php';
  $c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
  $urlid = explode('/', end($c));
  $nombre = $userid = $recursoid = "";
  $test1 = $test2 = $test3 = "";
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

              <p class="card-text">Aquí puede solicitar el uso del recurso.</p>
              <?php
              $sql1= "SELECT idrecurso, idsolicitado, respuesta FROM solicitudes WHERE idsolicitante='" . $_SESSION["session"] . "' AND idrecurso= '". $recursoid ."'";
              $result1 = $conn->query($sql1);
              if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {

                  $test1 = $row1["idrecurso"];
                  $test2 = $row1["idsolicitado"];
                  $test3 = $row1["respuesta"];
                  if ($test1 == $recursoid && $test2 == $userid && $test3 != "") {
                    $YaSolicito = "si";
                  }
                }
              }
              if ($YaSolicito != "si") { ?>
              <a href="solicitud.php?recursoId=<?php echo $recursoid ?>&userId=<?php echo $userid ?>&nomRec=<?php echo $nombre ?>" class="btn btn-link">Solicitar uso</a>
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
