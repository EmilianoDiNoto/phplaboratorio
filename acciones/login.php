<?php
require_once '../php/config.php';
include '../php/conexion.php';

$usuario = $_POST['usuario'] ?? null;
$clave = $_POST['clave'] ?? null;

if (!$usuario || !$clave) {
  $_SESSION['error'] = "Debes ingresar usuario y clave.";
  header("Location: /login.php");
  die();
}

$base_url = '/sitio_03'; // Define la URL base de tu proyecto

$consulta = <<<SQL
  SELECT
    ID,
    SUBSTRING_INDEX( EMAIL, '@', 1 ) AS USUARIO,
    NIVEL
  FROM usuarios 
  WHERE EMAIL = ? 
  AND CLAVE = SHA1( ? )
SQL;

$stmt = $cnx->prepare($consulta);
$stmt->execute([ $usuario, $clave ]);

$datos = $stmt->fetch();
if ($datos === false) {
  $_SESSION['error'] = "Mal usuario o clave";
  header("Location: $base_url/login.php");
  die();
}

//Si el login es exitoso
$_SESSION['logueado'] = $datos;

//Verifica el nivel y redirige
if ($datos['NIVEL'] === 'admin') {
    header("Location: $base_url/panel/index.php"); // Para administrador
} else {
    header("Location: $base_url/index.php"); // Para usuario
}
