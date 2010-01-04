<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('Date') ?>

<h1>Pendientes para <?php echo $titulo ?></h1>

<div>
  N&ordm; <span id="numero"></span>

<span id="crono"></span>
<a id="ini" href="#" onclick="IniciarCrono();$('#ini').hide();$('#det').show();">iniciar</a>
<a id="det" style="display: none" href="#" onclick="DetenerCrono()">detener</a>
</div>

<table>
  <thead>
    <tr>
      <th>numero</th>
      <th>nombre</th>
      <th>placa</th>
      <th>hora registro</th>
      <th>hora ingreso</th>
      <th>inicio</th>
      <th>fin</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $registro): ?>
    <tr id="registro-<?php echo $registro->getId() ?>" class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td id="id-<?php echo $registro->getId() ?>"><?php echo $registro->getId() ?></td>
      <td><?php echo $registro->getChofer() ?></td>
      <td><?php echo $registro->getTracto() ?></td>
      <td><?php echo $registro->getCreatedAt() ?></td>
      <td><?php echo $registro->getIngresoAt() ?></td>
    </tr>
    <?php echo core_init_javasacript_tag() ?>
    <?php echo jquery_support(
      '#registro-'.$registro->getId(),
      'click',
      like_function("$('#numero').text($('#id-".$registro->getId()."').text())"));
    ?>
    <?php echo core_end_javasacript_tag() ?>
    <?php endforeach; ?>
  </tbody>
</table>