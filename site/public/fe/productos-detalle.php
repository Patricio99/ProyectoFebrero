<?php
include './masterpage.php';
function render() {
 ?>
 <div id="productId"></div>
 <script>
 const quertString = {};
  window.location.search
    .split('&')
    .map((item) => {
      let key = item.split('=')[0].replace('?', '');
      let value = item.split('=')[1];
      quertString[key] = value;
    });
    console.log(quertString);
  getProduct(quertString.idproducto);
 </script>
 <?php
}

include '../be/apis/conn.php';

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Conneccion Falllida: " . $conn->connect_error);
}


$c = explode('=',$_SERVER[ 'REQUEST_URI' ]);
$result = explode('/', end($c));

$sql = "SELECT idCategoria, Codigo, Nombre, Precio, Destacado, Descripcion, Imagen FROM productos where id=$result[0]";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row[] = $result->fetch_assoc()) {
    $tem = $row;
  }
} else {
 echo "No hay resultados.";
}
$destaca3 = "";
if ($tem[0]['Destacado'] == 1) {
  $destaca3 = "Si";
}
else {
  $destaca3 = "No";
}

?>
<head>
  <script src="../node_modules/jquery/dist/jquery.js"></script>

  <script src="../node_modules\tether\dist\js\tether.js"></script>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css"/>
  <link rel="stylesheet" href="../node_modules\tether\dist\css\tether.css"/>
</head>
<body>
<div class="w-25 p-1">
<ul class="list-group">
  <li class="list-group-item">IdCategoria - <?php echo $tem[0]['idCategoria'];?></li>
  <li class="list-group-item">Codigo - <?php echo $tem[0]['Codigo'];?></li>
  <li class="list-group-item">Nombre - <?php echo $tem[0]['Nombre'];?></li>
  <li class="list-group-item">Precio - <?php echo $tem[0]['Precio'];?></li>
  <li class="list-group-item">Destacado - <?php echo $destaca3;?></li>
  <li class="list-group-item">Descripcion - <?php echo $tem[0]['Descripcion'];?></li>
  <li class="list-group-item"><div class="product-image"><img src="images/<?php echo $row[0]['Imagen'];?>"></div></li>
</ul>
</div>
<div class="p-1">
<a href="javascript:history.go(-1)">Regresar</a>
</div>
</body>
