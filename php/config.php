<?php 
session_start( );

function isLogged( ){
  return isset($_SESSION['logueado']); 
}

function isAdmin( ){
  return isLogged( ) &&
         $_SESSION['logueado']['NIVEL'] == 'admin' ;
}

function validarAdmin( ){
  if( !isAdmin( ) ){
    $_SESSION['error'] = "No se tienen permisos suficientes";
    header("Location: ../login.php");
    die( );
  }
}

