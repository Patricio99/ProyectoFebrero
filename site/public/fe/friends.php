<?php
  include "./indexlogged.php";
?>
<div class="card-block p-3">
    <a href="addfriend.php?id=<?php echo $result[0]; ?>"><button type="button" class="btn btn-success w-25 h-25">+ </br> Add Friends</button></a>
</div>
<div class="card" style="width: 20rem;">
  <div class="card-block">
    <h3 class="card-title">Special title treatment</h3>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<?php
  //SELECT id, IF(`iduser`= 1, `idfriend`, `iduser`) AS idfriend FROM `amigos` WHERE `iduser`=1 OR `idfriend` = 1
  include "./indexdown.php";
?>
