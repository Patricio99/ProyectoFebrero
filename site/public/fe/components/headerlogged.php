<?php
$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$result = explode('/', end($c));
?>
<header>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="dashboard.php?id=<?php echo $result[0]; ?>">ProyectoFebrero</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="recursos.php?id=<?php echo $result[0]; ?>">Mis recursos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="peticiones.php?id=<?php echo $result[0]; ?>">Peticiones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="friends.php?id=<?php echo $result[0]; ?>">Amigos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="settings.php?id=<?php echo $result[0]; ?>">Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Exit</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
