<?php
  include "./indexlogged.php";

include '../be/apis/conn.php';

$nombre = $idprod = "";

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql= "SELECT id, nombre, recursoid FROM recursos WHERE userid='" . $_SESSION["session"] . "'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nombre = $row["nombre"];
        $idprod = $row["recursoid"];
        ?>
            <div class="card" style="width: 20rem;">
              <div class="card-block">
                <h3 class="card-title"><?php echo $nombre; ?></h3>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="deletesource.php?id=<?php echo $idprod; ?>&nomRec=<?php echo $nombre; ?>" class="btn btn-link">Eliminar recurso</a>
              </div>
            </div>
                <?php

        }
    }
  $conn->close();
      ?>

<button type="button" class="btn btn-danger w-25 h-25" onclick="window.location.href='recursoform.php';">Añadir recurso</button>
<?php
  include "./indexdown.php";
?>
