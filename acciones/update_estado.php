<?php
require_once '../php/config.php';
include '../php/conexion.php';

$id = $_POST['id'];
$estado = $_POST['estado'];

$stmt = $cnx->prepare("UPDATE videos_youtube SET estado = ? WHERE id = ?");
$stmt->execute([$estado, $id]);

// Redirige de nuevo al listado
header("Location: ../panel/listado.php");
exit();