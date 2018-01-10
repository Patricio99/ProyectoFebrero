<!-- VALIDATION -->
<?php
$email = $password = $unid = "";
$todoOK = "no";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  $unid = $_POST["unid"];

  $todoOK = "si";
}

include '../be/apis/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuarios (mail, contrasena, unid)
VALUES ('" . $email . "', '" . $password . "', '" . $unid . "')";
if ($todoOK == "si") {
  $result = $conn->query($sql);
} else {
    echo $conn->error;
}


if ($todoOK == "si") {
  header('Location: login.php');
}
else{
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
        <div class="form-group">
          <label for="formGroupExampleInput2">Unique ID</label>
          <input type="text" class="form-control" name="unid" value="<?php echo uniqid(); ?>" readonly>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" onclick="javascript:history.go(-1)" class="btn btn-primary">Regresar</button>
        </div>
      </form>
  </div>
  <?php
    include "./indexdown.php";
  ?>
