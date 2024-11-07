<?php
include 'php/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/estilos.css" />
  <title>CMS</title>
</head>
<body>
  <header>
    <h1>Mi Web con Panel</h1>
    <?php include 'php/botonera.php'; ?>
  </header>
  <main>
    <h2>Ingresar al sistema</h2>
    <?php 
    if (isset($_SESSION['error'])) {
      echo "<p class='error'>$_SESSION[error]</p>";
      unset($_SESSION['error']);
    }
    ?>
    <form method="post" action="acciones/login.php">
      <div>
        <label for="usuario">Usuario</label>
        <input type="email" name="usuario" id="usuario" autocomplete="off" />
      </div>
      <div>
        <label for="clave">Clave</label>
        <input type="password" name="clave" id="clave" />
      </div>
      <div class='buttons'>
        <button type="submit">Ingresar</button>
        <button type="button" onclick="location.href='index.php'">Cancelar</button>
      </div>
    </form>
  </main>
</body>