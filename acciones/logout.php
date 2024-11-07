<?php 
session_start( );
session_destroy( );
$base_url = '/sitio_03';
header("Location: $base_url/index.php");
?>