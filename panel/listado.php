<?php
include '../php/config.php';
validarAdmin();
// Verificar si el usuario es administrador
$isAdmin = isAdmin();

// Definir la consulta según el rol
if ($isAdmin) {
    $sql = "SELECT * FROM videos_youtube";
} else {
    // Solo mostrar videos habilitados si es usuario estándar
    $sql = "SELECT * FROM videos_youtube WHERE estado = 1";
}

// Ejecutar la consulta
include '../php/conexion.php';
$stmt = $cnx->query($sql);
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/estilos.css" />
  <title>CMS</title>

  <script>
    function confirmarCambioEstado(event) {
      const action = event.target.innerText.includes("Deshabilitar") ? "Deshabilitar" : "Habilitar";
      const confirmar = confirm(`¿Confirmar ${action} de este video?`);
      if (!confirmar) {
        event.preventDefault();  // Evita que se envíe el formulario si el usuario cancela
      }
    }
  </script>

</head>
<body>
  <header>
    <h1>Mi Web con Panel</h1>
    <?php include '../php/botonera.php'; ?>
  </header>
  <main>
    <h2>Panel de control</h2>
    <section>
      <div class='subtitle'>
        <h3>Listado de posteos</h3>
        <?php $base_url = '/sitio_03' ?>
        <?php if ($isAdmin): ?>
          <a href='<?php echo $base_url; ?>/acciones/form.php'>Crear nuevo registro</a>
        <?php endif; ?>
      </div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>URL del Video</th>
            <th>Estado</th>
            <?php if ($isAdmin): ?>
              <th>Acción</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
  <?php foreach ($videos as $video): ?>
    <tr>
      <td><?php echo $video['id']; ?></td>
      <td><a href="<?php echo $video['url_video']; ?>" target="_blank"><?php echo $video['url_video']; ?></a></td>
      <td><?php echo $video['estado'] == 1 ? 'Habilitado' : 'Deshabilitado'; ?></td>
      <?php if ($isAdmin): ?>
        <td>
          <form action="<?php echo $base_url?>/acciones/update_estado.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
            <input type="hidden" name="estado" value="<?php echo $video['estado'] == 1 ? 0 : 1; ?>">
            <button type="submit" onclick="confirmarCambioEstado(event)">
              <?php echo $video['estado'] == 1 ? 'Deshabilitar' : 'Habilitar'; ?>
            </button>
          </form>
        </td>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
</tbody>
      </table>
    </section>
  </main>
</body>
</html>