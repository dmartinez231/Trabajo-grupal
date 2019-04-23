
<nav class="container-navegador">
  <div id="logo">
    <h2 class="marca"><a href="index.php">WINE</a></h2>
  </div>
  <div id="menu">
    <div class="control-menu">
      <a href="#menu" class="open"><span>Menu</span></a>
      <a href="#" class="close"><span>Cerrar</span></a>
    </div>
    <ul class="list-menu">
      <?php foreach ($menuNav as $posicion => $dato): ?>
        <li>
           <a href="<?php echo $dato["sitio"] ?>"><?php echo $dato["nombre"]; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
