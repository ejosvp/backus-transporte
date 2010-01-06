<h1>Vision</h1>

<table>
  <thead>
    <tr>
    	<th>Status</th>
      <th>N#</th>
      <th>Area</th>
      <th>Empresa</th>
      <th>Chofer</th>
      <th>Tracto</th>
      <th>Carreta</th>
      <th>Procedencia</th>
      <th>Tipo de carga</th>
      <th>Cantidad</th>
      <th>Guias</th> 				<!- unir las guias -->
      <th>Tipo Unida</th>
      <th>T77</th>
      <th>Motivo Ing.</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Turno</th>
      <th>Observaciont</th>
      
      <!- todo ingreso -->
      
      <th>Fecha</th>
      <th>Hora</th>
      <th>Turno</th>
      <th>T.Espera</th>  <!- tiempo entre el registro y el ingreso -->

 	<!- todo Descarga -->

	<th>T.Atencion Puerta</th> <!--   diferencia entre lahora de ing y la hora de carga -->
	<th>Inicio</th>
      	<th>Fin</th>
      	<th>Tiempo Desc.</th>
      	<th>Supervisor</th>
      	<th>Obs Descarga</th>
      	<th>Tiempo Desc a Carg</th>

	<!- Todo Carga -->		

       <th>Inicio</th>
	<th>Fin</th>
	<th>Supervisor</th>
      	<th>Obs Carga</th>
	<th>Tiempo de Atencion D +C</th>
      	<th>Obs Descarga</th>
	<th>Tiempo entre Proc</th> <!- Tiempo entre Carga Fin y Salida -->

	<!- Todo Salida -->

	<th>Fecha</th>
      	<th>Hora</th>
      	<th>Turno</th>
	<th>Tiempo de Permanebcia</th> <!- Hora de Salida  -  Hora de Ingreso -->
       <th>Observacion de Permanencia</th>
 	<th>Guias</th> 				<!- unir las guias -->
      	<th>Tracto</th>
      	<th>Carreta</th>
      	<th>Destino</th>
      	<th>Tipo de carga</th>
      	<th>Cantidad</th>
      <th>Observacion</th>
      	
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $registro): ?>
    <tr>
	<td><?php echo $registro->getEstado() ?></td>
      	<td><?php echo $registro->getId() ?></td>
      	<td><?php echo $registro->getTipoCarga()->getArea() ?></td>
      	<td><?php echo $registro->getEmpresa() ?></td>
      	<td><?php echo $registro->getChofer() ?></td>
      	<td><?php echo $registro->getTracto() ?></td>
      	<td><?php echo $registro->getCarreta() ?></td>
      	<td><?php echo $registro->getLugar() ?></td>
      	<td><?php echo $registro->getTipoCarga() ?></td>
      	<td><?php echo $registro->getCantidad() ?></td>
      	<td><?php echo $registro->getGuia1() ?></td>
      	<td><?php echo $registro->getCarreta()->getTipoUnidad() ?></td>
      	<td><?php echo $registro->getTracto()->getPropia() ?></td>
	<td><?php echo $registro->getMotivo() ?></td>
	<td><?php echo $registro->getCreatedAt() ?></td> <!- la fecha -->
	<td><?php echo $registro->getCreatedAt() ?></td> <!- la Hora -->
	<td><?php
            if ($registro->getCreatedAt() < sfConfig::get('app_cambio_turno'))
              echo "1";
            else
              echo "2";
            ?></td>

	<td><?php echo $registro->getObservacion() ?></td>

<!- Todo Ingreso -->

      	<td><?php echo $registro->getIngresoAt('G');?></td>
	<td><?php echo $registro->getIngresoAt() ?></td>
	<td><?php
            if ($registro->getIngresoAt() < sfConfig::get('app_cambio_turno'))
              echo "1";
            else
              echo "2";
            ?></td>
	<td><?php echo $registro->getIngresoAt()- $registro->getCreatedAt() ?></td>

      	
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>