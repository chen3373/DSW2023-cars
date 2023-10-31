<?php
require '../src/models/Car.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Ejercicio de coches</h1>

  <?php
  $car1 = new Car("4563", "Toyota", "Corolla", 1998, "white");
  echo $car1->model;
  ?>
</body>

</html>