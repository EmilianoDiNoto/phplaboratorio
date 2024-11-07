<?php
include 'php/config.php';
include 'php/conexion.php';
include '../index.php';

// Obtener ID del video desde el parámetro de la URL
$id = $_GET['id'];
$sql = "SELECT * FROM videos_youtube WHERE id = ? AND estado = 1";
$stmt = $cnx->prepare($sql);
$stmt->execute([$id]);
$video = $stmt->fetch(PDO::FETCH_ASSOC);

// Redirigir si el video no existe o está deshabilitado
if (!$video) {
  header("Location: index.php");
  exit;
}

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
  <title>Reproducción de Video</title>
</head>
<body>
  <main>
    <h1>Reproducción de Video</h1>
    <iframe width="100%" height="600" src="https://www.youtube.com/embed/<?php echo obtenerIdVideo($video['url_video']); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </main>
</body>
</html>