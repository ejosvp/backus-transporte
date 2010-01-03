<h1>Salidas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Chofer</th>
      <th>Tracto</th>
      <th>Carreta</th>
      <th>Tipo carga</th>
      <th>Lugar</th>
      <th>Cantidad</th>
      <th>Guia1</th>
      <th>Guia2</th>
      <th>Observacion</th>
      <th>Registro</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($salidas as $salida): ?>
    <tr>
      <td><a href="<?php echo url_for('salida/edit?id='.$salida->getId()) ?>"><?php echo $salida->getId() ?></a></td>
      <td><?php echo $salida->getChoferId() ?></td>
      <td><?php echo $salida->getTractoId() ?></td>
      <td><?php echo $salida->getCarretaId() ?></td>
      <td><?php echo $salida->getTipoCargaId() ?></td>
      <td><?php echo $salida->getLugarId() ?></td>
      <td><?php echo $salida->getCantidad() ?></td>
      <td><?php echo $salida->getGuia1() ?></td>
      <td><?php echo $salida->getGuia2() ?></td>
      <td><?php echo $salida->getObservacion() ?></td>
      <td><?php echo $salida->getRegistroId() ?></td>
      <td><?php echo $salida->getCreatedAt() ?></td>
      <td><?php echo $salida->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('salida/new') ?>">New</a>
