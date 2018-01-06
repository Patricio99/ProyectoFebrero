<?php
  include "./index1.php";
?>
  <div>
      <form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="formGroupExampleInput2">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Password</label>
          <input type="text" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Log In</button>
          <a href="./register.php">Create new account</a>
        </div>
      </form>
  </div>
  <?php
    include "./index2.php";
  ?>
