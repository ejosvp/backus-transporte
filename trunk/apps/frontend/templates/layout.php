<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_title() ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <?php use_helper('Date') ?>
        <div class="backus"><span id="hora" style="font-size: 18px"></span><br /><span class="fecha"><?php echo format_date(time(),'D','es_PE') ?></span></div>
        <h1>
          <span style="color: #f7cd19">&bull;</span>Distribución
          <br /><span style="font-size: 12px">Sistema de control y seguimiento de unidades</span>
        </h1>
      </div>
      <div id="menu">
        <ul>
          <li id="vision"><?php echo link_to('Vision','@vision') ?></li>
          <li id="registro"><?php echo link_to('Registro','@registrar') ?></li>
          <li id="ingreso"><?php echo link_to('Ingreso','@ingreso') ?></li>
          <li id="descarga"><?php echo link_to('Operacion Descarga','@descarga') ?></li>
          <li id="carga"><?php echo link_to('Operacion Carga','@carga') ?></li>
          <li id="salida"><?php echo link_to('Salida','@salida') ?></li>
          <li><a href="#">T2</a></li>
          <li><?php echo link_to('Salir','@sf_guard_signout') ?></li>
        </ul>
      </div>

      <?php echo core_init_javasacript_tag() ?>
        $("#<?php echo $sf_user->getAttribute('activo') ?> > a").css("color","#000");
        $("#<?php echo $sf_user->getAttribute('activo') ?>").css("background","#E7EEF6");
          /* reloj */
        reloj();
      <?php echo core_end_javasacript_tag() ?>

      <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <p class="notice"><?php echo $sf_user->getFlash('notice') ?></p>
        <?php endif; ?>
        <?php if ($sf_user->hasFlash('error')): ?>
          <p class="error"><?php echo $sf_user->getFlash('error') ?></p>
        <?php endif; ?>
        <?php echo $sf_content ?>
      </div>

      <div id="footer">
      </div>
    </div>
  </body>
</html>