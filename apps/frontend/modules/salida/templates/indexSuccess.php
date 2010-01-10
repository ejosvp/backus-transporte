<h1>Salidas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Chofer</th>
      <th>Tracto</th>
      <th>Guia</th>
      <th>Ingreso</th>
      <th>Descarga</th>
      <th>Carga</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $i => $registro): ?>
    <tr id="registro-<?php echo $registro->getId() ?>" class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?> addPointer">
      <td><?php echo $registro->getId() ?></td>
      <td><?php echo $registro->getChofer() ?></td>
      <td><?php echo $registro->getTracto() ?></td>
      <td><?php echo $registro->getGuia() ?></td>
      <td><?php echo $registro->getIngresoAt() ?></td>
      <?php if(is_object($registro->getOpera(0))) : ?>
        <td><?php echo $registro->getOpera(0)->getTerminoAt() ?></td>
      <?php else : ?><td></td><?php endif; ?>
      <?php if(is_object($registro->getOpera(1))) : ?>
        <td><?php echo $registro->getOpera(1)->getTerminoAt() ?></td>
      <?php else : ?><td></td><?php endif; ?>
    </tr>
<?php echo core_init_javasacript_tag() ?>
<?php echo jquery_support('#registro-'.$registro->getId(),'click', 'ajaxConfirm'); ?>
  function ajaxConfirm(){
    //if(confirm('ingresara la Unidad Nº <?php echo $registro->getId() ?>, ¿esta seguro?')){
      var url = "<?php echo url_for('salida_new',$registro) ?>";
      $(location).attr('href',url);
    //}
  }
<?php echo core_end_javasacript_tag() ?>
    <?php endforeach; ?>
  </tbody>
</table>