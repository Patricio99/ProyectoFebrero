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
          <input type="text" class="form-control" name="password" placeholder="Password" required>
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
