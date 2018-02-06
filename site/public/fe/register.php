<!-- VALIDATION -->
<?php
$nombre = $apellido = $email = $password = $unid = NULL;
$todoOK = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_email($_POST["email"]);

}
function test_email($data){
    include '../be/apis/conn.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mail FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if (strcmp($data, $row["mail"]) == 0) {
                $data = NULL;
            }
        }
    }
    return $data;
    $conn->close();
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}
if (isset($email)) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST["nombre"]);
    $apellido = test_input($_POST["apellido"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $unid = $_POST["unid"];

    $todoOK = "si";
  }
}

if (isset($todoOK)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  } else {
    $todoOK = "mailmal";
  }
  include '../be/apis/conn.php';

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO usuarios (nombre, apellido, mail, contrasena, unid)
  VALUES ('" . $nombre . "', '" . $apellido . "', '" . $email . "', '" . $password . "', '" . $unid . "')";
  if ($todoOK == "si") {
    $result = $conn->query($sql);
  } else {
      echo $conn->error;
  }


  if ($todoOK == "si") {
    header('Location: login.php');
  }
  else if($todoOK == "no"){
  }
  else if($todoOK == "mailmal"){
    echo '<script type="text/javascript">alert("Email incorrecto!");</script>';
  }

$conn->close();
}


  ?>
<!-- END VALIDATION -->


<?php
  include "./indextop.php";
?>
  <div>
      <form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="formGroupExampleInput2">Nombre</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Apellido</label>
          <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Unique ID</label>
          <input type="text" class="form-control" name="unid" value="<?php echo uniqid(); ?>" readonly>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="./login.php"><button type="button" class="btn btn-primary">Regresar</button></a>
        </div>
      </form>
  </div>
  <?php
    include "./indexdown.php";
  ?>
