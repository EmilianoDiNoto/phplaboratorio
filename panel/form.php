<?php
include '../php/config.php'; // Incluye el archivo de configuración con la conexión
validarAdmin(); // Valida que el usuario es un administrador

// Consulta a la base de datos para obtener los videos
$sql = "SELECT * FROM videos_youtube";
$stmt = $pdo->query($sql);
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/estilos.css" />
  <title>CMS</title>
</head>
<body>
  <header>
    <h1>Mi Web con Panel</h1>
    <?php include '../php/botonera.php'; ?>
  </header>
  <main>
    <h2>Panel de control</h2>
    <form method="post" action="/acciones/form.php">
      <h3>Formulario de alta o edición</h3>
      <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" autocomplete="off" />
      </div>
      <div>
        <label for="dato2">Dato 2</label>
        <input type="text" name="dato2" id="dato2" autocomplete="off" />
      </div>
      <div>
        <label for="dato3">Dato 3</label>
        <input type="text" name="dato3" id="dato3" autocomplete="off" />
      </div>
      <div>
        <label for="dato4">Dato 4</label>
        <input type="text" name="dato4" id="dato4" autocomplete="off" />
      </div>
      <div class='buttons'>
        <button type="submit">Enviar</button>
        <button type="button" onclick="location.href='/panel/listado.php'">Cancelar</button>
      </div>
    </form>
  </main>
</body>
</html>