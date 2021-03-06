<!-- VALIDATION -->
<?php

$email = $password = $idurl = NULL;
$correcto = NULL;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
}

include '../be/apis/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT mail, contrasena, unid FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if (strcmp($email, $row["mail"]) == 0 && strcmp($password, $row["contrasena"]) == 0) {
          $idurl = $row["unid"];
          $correcto = "si";
        }
    }
} else {
    echo "0 results";
}
if ($correcto == "si") {
  session_start();
  $_SESSION["session"] = $idurl;
  header('Location: dashboard.php');
}
if(isset($email) && $correcto == NULL){
  echo '<script type="text/javascript">alert("¡Datos incorrectos!");</script>';

}
$conn->close();
?>
<!-- END VALIDATION -->

<?php
  include "./indextop.php";
?>
  <div>
      <form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="formGroupExampleInput2">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Log In</button>
          <a href="./register.php">Create new account</a>
        </div>
      </form>
  </div>
  <?php
    include "./indexdown.php";
  ?>
