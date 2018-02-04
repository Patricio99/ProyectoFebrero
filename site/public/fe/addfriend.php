<?php
  include "./indexlogged.php";
?>
<?php
$search = $name = $surname = $busca3 = $nombut = "";
$correcto = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = test_input($_POST["search"]);
}

include '../be/apis/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nombre, apellido, unid FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if (strcmp($search, $row["unid"]) == 0 && strcmp($search, $url[0]) != 0) {
          $name = $row["nombre"];
          $surname = $row["apellido"];
          $busca3 = $row["unid"];
          $nombut = "Añadir amigo";
          $correcto = "si";
        }
    }
} else {
    echo "0 results";
}

if ($correcto == "si") {
//  header('Location: friends.php');
}
else {
}
$conn->close();

?>
<div class="container" style="margin-top: 5%;">
    <div class="col-md-6 col-md-offset-3">
      <form method="post" action="<?=$_SERVER['PHP_SELF']?>?id=<?php echo $url[0]; ?>" enctype="multipart/form-data">
            <div class="row">
                <h2 class="text-center">Introduce UniqueID</h2>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="Search" required/>
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"><span style="margin-left:10px;">Search</span></button>
                        </span>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card-generic">
  <div class="card-block">
    <h4 class="card-title"><?php echo $name . " " . $surname; ?></h4>
    <p class="card-text"><?php echo $busca3; ?></p>
    <form method="post" action="addfriendbut.php?id=<?php echo $url[0]; ?>" enctype="multipart/form-data">
      <input type="hidden" name="amigo" value="<?php echo $busca3; ?>">
      <button class="btn btn-link" type="submit"><?php echo $nombut; ?></button>
    </form>
  </div>
</div>
<?php
  include "./indexdown.php";
?>
