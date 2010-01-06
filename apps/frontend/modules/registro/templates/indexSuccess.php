<?php use_helper('ysJQueryRevolutions') ?>
<h1>Unidades pendientes de Ingreso</h1>
<?php if(count($registros)) : ?>
<table>
  <thead>
    <tr>
      <th>N&deg;</th>
      <th>Turno</th>
      <th>Empresa</th>
      <th>Chofer</th>
      <th>Tracto</th>
      <th>Carreta</th>
      <th>Procedencia</th>
      <th>Area</th>
      <th>Tipo Carga</th>
      <th>Motivo</th>
      <th>Cantidad</th>
      <th>Fecha/Hora Registro</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $i => $registro): ?>
   <tr id="registro-<?php echo $registro->getId() ?>" class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?> addPointer">
      <td><?php echo $registro->getId() ?></td>
      <td><?php echo $registro->getTurno() ?></td>
      <td><?php echo $registro->getEmpresa() ?></td>
      <td><?php echo $registro->getChofer() ?></td>
      <td><?php echo $registro->getTracto() ?></td>
      <td><?php echo $registro->getCarreta() ?></td>
      <td><?php echo $registro->getLugar() ?></td>
      <td><?php echo $registro->getTipoCarga()->getArea() ?></td>
      <td><?php echo $registro->getTipoCarga() ?></td>
      <td><?php echo $registro->getMotivo() ?></td>
      <td><?php echo $registro->getCantidad() ?></td>
      <td><?php echo $registro->getCreatedAt() ?></td>
    </tr>
<?php echo core_init_javasacript_tag() ?>
<?php echo jquery_support('#registro-'.$registro->getId(),'click', 'ajaxConfirm'); ?>
  function ajaxConfirm(){
    if(confirm('ingresara la Unidad Nº <?php echo $registro->getId() ?>, ¿esta seguro?')){
      <?php echo jquery_ajax(array(
        'url' => url_for('ingresar', $registro),
        'complete' => like_function("jQuery('#registro-".$registro->getId()."').fadeOut('fast')"),
      ));?>
    }
  }
<?php echo core_end_javasacript_tag() ?>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else : ?>
<p class="notice">Sin Registros Pendientes</p>
<?php endif; ?>