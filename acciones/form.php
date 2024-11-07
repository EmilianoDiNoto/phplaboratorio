<?php
require_once '../php/config.php';
include '../php/conexion.php';
validarAdmin( );

$sql = "SELECT * FROM videos_youtube";
$stmt = $cnx->query($sql);
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);



