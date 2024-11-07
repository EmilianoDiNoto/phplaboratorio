<?php 
$server = 'mysql:host=localhost;port=3307;dbname=youtube_permisos;charset=utf8mb4';
$usuario = 'root';
$clave = '';
try {
  $cnx = new PDO($server, $usuario, $clave);
  $cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  
} catch (PDOException $e) {
  echo "Error en la conexión: " . $e->getMessage();
}
?>
