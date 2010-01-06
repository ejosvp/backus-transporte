<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_title() ?>
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <?php use_helper('Date') ?>
        <div class="backus"><span class="fecha"><?php echo format_date(time(),'D','es_PE') ?></span></div>
        <h1>
          <span style="color: #f7cd19">&bull;</span>Distribución
          <br /><span style="font-size: 12px">Sistema de control y seguimiento de unidades</span>
        </h1>
      </div>

      <div id="menu">
        <ul>
          <li><?php echo link_to('Areas','@area') ?></li>
          <li><?php echo link_to('Carreta','@carreta') ?></li>
          <li><?php echo link_to('Chofer','@chofer') ?></li>
          <li><?php echo link_to('Empresa','@empresa') ?></li>
          <li><?php echo link_to('Lugar','@lugar') ?></li>
          <li><?php echo link_to('Motivo','@motivo') ?></li>
          <li><?php echo link_to('Supervisor','@supervisor') ?></li>
          <li><?php echo link_to('Tipo Carga','@tipo_carga') ?></li>
          <li><?php echo link_to('Tipo Lugar','@tipo_lugar') ?></li>
          <li><?php echo link_to('Tracto','@tracto') ?></li>
          <li><?php echo link_to('Usuarios','@sf_guard_user') ?></li>
          <li><?php echo link_to('Grupos','@sf_guard_group') ?></li>
          <li><?php echo link_to('Permisos','@sf_guard_permission') ?></li>
          <li><?php echo link_to('Salir','@sf_guard_signout') ?></li>
        </ul>
      </div>

      <div id="content">
        <?php echo $sf_content ?>
      </div>

      <div id="footer">
      </div>
    </div>
  </body>
</html>