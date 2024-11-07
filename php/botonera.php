<nav>
  <ul>
    <li><a href='index.php'>Home</a></li>
    <li><a href='#'>Alguna sección</a></li>
    <?php if( isAdmin() ): ?>
    <li><a href='/panel'>Panel</a>
        <ul>
          <li><a href='listado.php'>Posteos</a></li>
          <li><a href='form.php'>Usuarios</a></li>
        </ul>
    </li>
    <?php endif; ?>
    <!-- aca necesito más botones -->
    <?php if( isLogged( ) ): ?>
    <?php $base_url = '/sitio_03'?>
    <li><a href='<?php echo $base_url;?>/acciones/logout.php'>Logout (<?php echo $_SESSION['logueado']['USUARIO']; ?>)</a></li>
    <?php else: ?>
    <li><a href='login.php'>Login</a></li>
    <?php endif; ?>
  </ul>
</nav>