<h1>Operacions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Registro</th>
      <th>Supervisor</th>
      <th>Observacion</th>
      <th>Tipo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($operacions as $operacion): ?>
    <tr>
      <td><a href="<?php echo url_for('operacion/edit?id='.$operacion->getId()) ?>"><?php echo $operacion->getId() ?></a></td>
      <td><?php echo $operacion->getRegistroId() ?></td>
      <td><?php echo $operacion->getSupervisorId() ?></td>
      <td><?php echo $operacion->getObservacion() ?></td>
      <td><?php echo $operacion->getTipo() ?></td>
      <td><?php echo $operacion->getCreatedAt() ?></td>
      <td><?php echo $operacion->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('operacion/new') ?>">New</a>
