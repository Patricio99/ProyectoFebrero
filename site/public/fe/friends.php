<?php
  include "./indexlogged.php";

  include '../be/apis/conn.php';

  $toShow = NULL;
  $data[] = NULL;
  $name = "";
  $surname = "";

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
$aidi = $_SESSION["session"];
  $sql= "SELECT iduser, idfriend FROM amigos WHERE iduser='" . $aidi . "' OR idfriend = '" . $aidi . "'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if ($row["iduser"] == $_SESSION["session"]) {
          $toShow = $row["idfriend"];
        }else if($row["idfriend"] == $_SESSION["session"]){
          $toShow = $row["iduser"];
        }
      }
    }
    $conn->close();
    include '../be/apis/conn.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql= "SELECT nombre, apellido FROM usuarios WHERE unid= '" . $toShow . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $name = $row["nombre"];
          $surname = $row["apellido"];
          $data[] = $row;



          foreach($result as $data): ?>
              <div class="card" style="width: 20rem;">
                <div class="card-block">
                  <h3 class="card-title"><?php echo $data["nombre"];
                   ?></h3>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-link">Eliminar amigo</a>
                </div>
              </div>
              <?php endforeach;



          }
        }


?>
<div class="card-block p-3">
    <a href="addfriend.php"><button type="button" class="btn btn-success w-25 h-25">+ </br> Add Friends</button></a>
</div>



<?php
  //SELECT id, IF(`iduser`= 1, `idfriend`, `iduser`) AS idfriend FROM `amigos` WHERE `iduser`=1 OR `idfriend` = 1
  include "./indexdown.php";
?>
