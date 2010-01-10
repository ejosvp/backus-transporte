<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('ysUtil') ?>

<h1>Pendientes para <?php echo $titulo ?></h1>
<table>
  <thead>
    <tr>
      <th>numero</th>
      <th>nombre</th>
      <th>placa</th>
      <th>registro</th>
      <th>ingreso</th>
        <th>termino descarga</th>
      <th>operacion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $i => $registro): ?>
    <tr id="registro-<?php echo $registro->getId() ?>" class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td><?php echo $registro->getId() ?></td>
      <td><?php echo $registro->getChofer() ?></td>
      <td><?php echo $registro->getTracto() ?></td>
      <td><?php echo $registro->getCreatedAt() ?></td>
      <td><?php echo $registro->getIngresoAt() ?></td>
      <?php if(is_object($registro->getOpera(0))) : ?>
        <td><?php echo $registro->getOpera(0)->getTerminoAt() ?></td>
      <?php else : ?><td></td><?php endif; ?>
      <td id="op-<?php echo $registro->getId() ?>">
        <input type="button" id="ini-<?php echo $registro->getId() ?>" value="Iniciar" <?php echo ($registro->getEstado() == 1 || $registro->getEstado() == 3) ? '' : 'style="display: none"' ?> />
        <input type="button" id="fin-<?php echo $registro->getId() ?>" value="Detener" <?php echo ($registro->getEstado() == 2 || $registro->getEstado() == 4) ? '' : 'style="display: none"' ?> />
        <span class="crono" id="crono-<?php echo $registro->getId() ?>" <?php echo ($registro->getEstado() == 2 || $registro->getEstado() == 4) ? '' : 'style="display: none"' ?>></span>
      </td>
<?php echo core_init_javasacript_tag() ?>
<?php echo jquery_support('#ini-'.$registro->getId(),'click', 'ajaxConfirmIni'); ?>
<?php echo jquery_support('#fin-'.$registro->getId(),'click', 'ajaxConfirmFin'); ?>
  function ajaxConfirmIni(){
    if(confirm('Iniciar la <?php echo $titulo ?> de la unidad Nº <?php echo $registro->getId() ?>, ¿esta seguro?')){
      <?php echo jquery_ajax(array(
        'url' => url_for('inicio', $registro),
        'complete' => like_function("
          $('#crono-".$registro->getId()."').show();
          $('#fin-".$registro->getId()."').show();
          $('#ini-".$registro->getId()."').hide();
         "),
      ));?>
    }
  }
  function ajaxConfirmFin(){
    if(confirm('Finalizar la <?php echo $titulo ?> de la unidad Nº <?php echo $registro->getId() ?>, ¿esta seguro?')){
      <?php echo jquery_load(
        '#op-'.$registro->getId(),
        array(
          'url' => url_for('detener',$registro),
        )
      )?>
    }
  }



function cronometro<?php echo $registro->getId() ?>()
{
  var x = new Date()
  var ho = x.getHours() - parseInt('<?php echo $registro->getDateTimeObject('created_at')->format('G') ?>');
  var mi = x.getMinutes() - parseInt('<?php echo $registro->getDateTimeObject('created_at')->format('i') ?>');
  var se = x.getSeconds() - parseInt('<?php echo $registro->getDateTimeObject('created_at')->format('s') ?>');
  var <?php echo "var".$registro->getId() ?> = ho + ":" + mi + ":" + se;
  $("#crono-<?php echo $registro->getId() ?>").html(<?php echo "var".$registro->getId() ?>);
  setTimeout('cronometro<?php echo $registro->getId() ?>()',1000);
}


<?php echo core_end_javasacript_tag() ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>