<?php
include 'php/config.php';
include 'php/conexion.php';

// Consulta solo videos habilitados
$sql = "SELECT * FROM videos_youtube WHERE estado = 1";
$stmt = $cnx->query($sql);
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
function obtenerIdVideo($url) {
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    return $params['v'] ?? null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/estilos.css">
  <title>Videos Disponibles</title>
</head>
<body>
  <header>
    <h1>Galería de Videos</h1>
    <?php include 'php/botonera.php'; ?>
  </header>
  <main>
    <section class="video-gallery">
      <?php foreach ($videos as $video): ?>
        <div class="video-item">
          <a href="ver_video.php?id=<?php echo $video['id']; ?>">
            <img src="https://img.youtube.com/vi/<?php echo obtenerIdVideo($video['url_video']); ?>/hqdefault.jpg" alt="Miniatura del video">
            <p><?php echo $video['url_video']; ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </section>
  </main>
</body>
</html>