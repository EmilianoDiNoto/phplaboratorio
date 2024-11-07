<?php 
include '../php/conexion.php'; 
include '../php/config.php'; 
validarAdmin( );
?>


<?php
// Obtener todos los videos de la base de datos
$sql = "SELECT * FROM videos_youtube";
$stmt = $pdo->query($sql);
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Videos</title>
    <link rel="stylesheet" href="assets/estilos.css"> <!-- Opcional: Si tienes un archivo CSS -->
</head>
<body>

    <h1>Lista de Videos de YouTube</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>URL del Video</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos as $video): ?>
                <tr>
                    <td><?php echo $video['id']; ?></td>
                    <td><a href="<?php echo $video['url_video']; ?>" target="_blank"><?php echo $video['url_video']; ?></a></td>
                    <td><?php echo $video['estado'] == 1 ? 'Habilitado' : 'Deshabilitado'; ?></td>
                    <td>
                        <!-- Formulario para habilitar o deshabilitar el video -->
                        <form action="update_estado.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                            <input type="hidden" name="estado" value="<?php echo $video['estado'] == 1 ? 0 : 1; ?>">
                            <button type="submit">
                                <?php echo $video['estado'] == 1 ? 'Deshabilitar' : 'Habilitar'; ?>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
