<?php use_helper('Date') ?>
<?php $c_t77 = $sf_user->hasCredential('t77') ?>
<div class="headVision">
<h1>Vision - <?php echo ($fecha) ? format_date($fecha,'D','es_PE') : format_date(time(),'D','es_PE') ?></h1>
<form action="<?php echo url_for1('@vision')?>" method="post">
  <?php echo $form; ?>
  <input type="submit" value="Filtrar">
</form>
</div>
<div class="estadistica">
  <table>
    <tr>
      <th>Unidades Atendidas</th>
      <td><b><?php echo $estadistica['atendidos'] ?></b></td>
    </tr>
    <tr>
      <th>Unidades Pendientes de Ingreso</th>
      <td><b><?php echo $estadistica['ingreso'] ?></b></td>
    </tr>
    <tr>
      <th>Unidades Pendientes de Salida</th>
      <td><b><?php echo $estadistica['salida'] ?></b></td>
    </tr>
  </table>
</div>
<div style="clear:both"></div>
<table class="vision" style="width: 6500px">
  <thead>
    <tr>
      <th style="border: 1px solid black" colspan="18">Registro</th>
      <th style="border: 1px solid black" colspan="4" >Ingreso</th>
      <th style="border: 1px solid black" colspan="1" >Tiempo entre procesos</th>
      <th style="border: 1px solid black" colspan="5" >Descarga</th>
      <th style="border: 1px solid black" colspan="3" >Tiempo entre procesos</th>
      <th style="border: 1px solid black" colspan="5" >Carga</th>
      <th style="border: 1px solid black" colspan="2" >Tiempo de Operacion</th>
      <th style="border: 1px solid black" colspan="3" >Tiempo entre procesos</th>
      <th style="border: 1px solid black" colspan="12">Salida</th>
    </tr>
    <tr>
      <th>Status</th>                 <!-- 1 -->
      <th>N#</th>                     <!-- 2 -->
      <th>Area Responsable</th>       <!-- 3 -->
      <th>Empresa</th>                <!-- 4 -->
      <th>Chofer</th>                 <!-- 5 -->
      <th>Tracto</th>                 <!-- 6 -->
      <th>Carreta</th>                <!-- 7 -->
      <th>Procedencia</th>            <!-- 8 -->
      <th>Tipo de carga</th>          <!-- 9 -->
      <th>Cantidad</th>               <!-- 10 -->
      <th>Guias</th>                  <!-- 11 -->
      <th>Tipo Unidad</th>            <!-- 12 -->
      <th>T77</th>                    <!-- 13 -->
      <th>Motivo Ing.</th>            <!-- 14 -->
      <th>Fecha</th>                  <!-- 15 -->
      <th>Hora</th>                   <!-- 16 -->
      <th>Turno</th>                  <!-- 17 -->
      <th>Observacion</th>            <!-- 18 -->
      
      <!-- todo ingreso -->
      
      <th>Fecha</th>                  <!-- 19 -->
      <th>Hora</th>                   <!-- 20 -->
      <th>Turno</th>                  <!-- 21 -->
      <th>T.Espera</th>               <!-- 22 -->  <!-- tiempo entre el registro y el ingreso -->
      <!--<th>Observacion</th>-->            <!-- 23 -->
      <!--<th>Observacion T77</th>-->        <!-- 24 -->

      <!-- control -->

      <th>T.Atencion Puerta</th>      <!-- 25 -->  <!---   diferencia entre lahora de ing y la hora de carga -->

      <!-- todo Descarga -->

      <th>Inicio</th>             <!-- 26 -->
      <th>Fin</th>                <!-- 27 -->
      <th>Tiempo Atencion</th>    <!-- 28 -->  <!-- hora inicio descarga  - hora termino descarga -->
      <th>Supervisor</th>         <!-- 29 -->
      <th>Obs Descarga</th>       <!-- 30 -->
      <th>Tiempo Desc/Ingr a Carg</th> <!-- 31 --> <!-- hora inicio carga  - hora termino descarga -->
      <th>Obs Demora </th>        <!-- 32 --> <!-- Obs demora para descargar vehiculo comun -->
      <th>Obs Demora T77</th>     <!-- 33 --> <!-- obs demora para descargar T777 -->

      <!-- Todo Carga -->

      <th>Inicio</th>                 <!-- 34 -->
      <th>Fin</th>                    <!-- 35 -->
      <th>Tiempo de Atencion</th>     <!-- 36 --> <!-- hora inicio carga  - hora termino carga -->
      <th>Supervisor</th>             <!-- 37 -->
      <th>Obs Carga</th>              <!-- 38 -->
      <th>Tiempo de Atencion D +C</th><!-- 39 --> <!-- suma de tiempo de descarga + tiempo de descarga - hora termino descarga -->
      <th>Obs D + C </th>             <!-- 30 --> <!-- Observacion demora suma de procesos  -->
      <th>Tiempo entre Proc</th>      <!-- 41 --> <!-- Tiempo entre Termino de Carga y Salida -->
      <th>Obs Demora </th>            <!-- 42 --> <!-- Obs demora para cargar vehiculo comun -->
      <th>Obs Demora T77</th>         <!-- 43 --> <!-- obs demora para cargar T777 -->

      <!-- Todo Salida -->

      <th>Fecha</th>
      <th>Hora</th>
      <th>Turno</th>
      <th>Tiempo de Permanencia</th> <!-- Hora de Salida  -  Hora de Ingreso -->
      <th>Obs Tiempo perm.</th>  	<!-- Obs demora en la planta -->
      <th>Guias</th> 				<!-- unir las guias -->
      <th>Tracto</th>
      <th>Carreta</th>
      <th>Destino</th>
      <th>Tipo de carga</th>
      <th>Cantidad</th>
      <th>Observacion</th>

    </tr>
  </thead>
  <tbody class="visionList">
    <?php foreach ($registros as $i => $registro): ?>
    <?php $descarga = $registro->getOpera(0) ?>
    <?php $carga = $registro->getOpera(1) ?>
    <?php $salida = $registro->getSalida() ?>
    <tr id="registro-<?php echo $registro->getId() ?>" class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="estado-<?php echo $registro->getEstado() ?>"><?php echo $registro->getEstadoName() ?></td>                                   <!-- 1 -->
      <td><?php echo $registro->getId() ?></td>                                       <!-- 2 -->
      <td><?php echo $registro->getTipoCarga()->getArea() ?></td>                     <!-- 3 -->
      <td><?php echo $registro->getEmpresa() ?></td>                                  <!-- 4 -->
      <td><?php echo $registro->getChofer() ?></td>                                   <!-- 5 -->
      <td><?php echo $registro->getTracto() ?></td>                                   <!-- 6 -->
      <td><?php echo $registro->getCarreta() ?></td>                                  <!-- 7 -->
      <td><?php echo $registro->getLugar() ?></td>                                    <!-- 8 -->
      <td><?php echo $registro->getTipoCarga() ?></td>                                <!-- 9 -->
      <td><?php echo $registro->getCantidad() ?></td>                                 <!-- 10 -->
      <td><?php echo $registro->getGuia() ?></td>                                     <!-- 11 -->
      <?php if($registro->getCarreta()) : ?>
      <td><?php echo $registro->getCarreta()->getTipoUnidad() ?></td>                 <!-- 12 -->
      <?php else : ?><td></td><?php endif; ?>
      <td><?php echo $registro->getTracto()->getT77() ?></td>                         <!-- 13 -->
      <td><?php echo $registro->getMotivo() ?></td>                                   <!-- 14 -->
      <td><?php echo $registro->getDateTimeObject('created_at')->format('d-m') ?></td><!-- 15 -->
      <td><?php echo $registro->getDateTimeObject('created_at')->format('G:i:s') ?></td><!-- 16 -->
      <td><?php echo $registro->getTurno() ?></td>                                    <!-- 17 -->
      <td><?php echo $registro->getObservacion() ?></td>                              <!-- 18 -->
      
      <!-- INGRESO -->
      <?php if($registro->ingresado()) : ?>
      <?php $ingreso_demora = $registro->getDateTimeObject('ingreso_at')->format('U') - $registro->getDateTimeObject('created_at')->format('U') ?>
        <td><?php echo $registro->getDateTimeObject('ingreso_at')->format('d-m') ?></td><!-- 19 -->
        <td><?php echo $registro->getDateTimeObject('ingreso_at')->format('G:i:s') ?></td><!-- 20 -->
        <td><?php echo $registro->getTurnoIngreso() ?></td>                             <!-- 21 -->
        <td><?php echo time_unix_to_number($ingreso_demora,false) ?></td>   <!-- 22 -->
      <?php else : ?><td class="lock" colspan="4">sin ingreso</td><?php endif; ?>
      <!-- FIN INGRESO -->

      <!-- CONTROL -->
      <?php if($descarga) : ?>
        <td><?php echo time_unix_to_number($descarga->getDateTimeObject('created_at')->format('U') - $registro->getDateTimeObject('ingreso_at')->format('U'),false) ?></td>   <!-- 25 -->
      <?php elseif($carga) : ?>
        <td><?php echo time_unix_to_number($carga->getDateTimeObject('created_at')->format('U') - $registro->getDateTimeObject('ingreso_at')->format('U'),false) ?></td>   <!-- 25 -->
      <?php else : ?><td></td><?php endif; ?>

      <!-- DESCARGA -->
      <?php if($descarga) : ?>
      <?php $descarga_demora = $descarga->getDateTimeObject('termino_at')->format('U') - $descarga->getDateTimeObject('created_at')->format('U') ?>
        <td><?php echo $descarga->getCreatedAt() ?></td>  <!-- 27- -->
        <?php if($descarga->getTerminoAt() != "0000-00-00 00:00:00") :?>
          <td><?php echo $descarga->getTerminoAt() ?></td>
          <td><?php echo time_unix_to_number($descarga_demora,false) ?></td>
        <?php else : ?><td class="lock" colspan="2">descarga en proceso</td><?php endif; ?>
        <td><?php echo $descarga->getSupervisor() ?></td><!-- 29- -->
        <td><?php echo $descarga->getObservacion() ?></td><!-- 30- -->
      <?php else : ?><td class="lock" colspan="5">sin descarga</td><?php endif; ?>

      <!-- CARGA -->
      <?php if($carga) : ?><!-- 31 -->
        <?php $carga_demora = $carga->getDateTimeObject('termino_at')->format('U') - $carga->getDateTimeObject('created_at')->format('U') ?>

      <?php if($descarga) : ?>
        <td><?php echo time_unix_to_number($carga->getDateTimeObject('created_at')->format('U') - $descarga->getDateTimeObject('termino_at')->format('U'),false) ?></td>
      <?php else : ?>
        <td><?php echo time_unix_to_number($carga->getDateTimeObject('created_at')->format('U') - $registro->getDateTimeObject('ingreso_at')->format('U'),false) ?></td>
      <?php endif; ?>
        <td><form><input type="text" /><input type="submit" value=">" /></form></td>
        <td><?php if($c_t77) : ?><form><input type="text" /><input type="submit" value=">" /></form><?php endif; ?></td>
        <td><?php echo $carga->getCreatedAt() ?></td>  <!-- 34- -->
        <td><?php echo $carga->getTerminoAt() ?></td>  <!-- 35- -->
        <td><?php echo time_unix_to_number($carga_demora,false) ?></td>
        <!-- hora inicio carga  - hora termino carga -->
        <td><?php echo $carga->getSupervisor() ?></td>
        <td><?php echo $carga->getObservacion() ?></td>
      <?php else : ?><td colspan="8">sin carga</td><?php endif; ?>

      <!-- DESCARGA & CARGA -->
      <?php if($descarga) : ?>
        <?php if($carga) : ?>
          <td><?php echo time_unix_to_number($descarga_demora + $carga_demora,false) ?></td>
          <td><form><input type="text" /><input type="submit" value=">" /></form></td>
        <?php else : ?>
          <td><?php echo time_unix_to_number($descarga_demora + $ingreso_demora,false) ?></td>
          <td><form><input type="text" /><input type="submit" value=">" /></form></td>
        <?php endif; ?>
      <?php elseif($carga) : ?>
        <td><?php echo time_unix_to_number($carga_demora + $ingreso_demora,false) ?></td>
        <td><form><input type="text" /><input type="submit" value=">" /></form></td>
      <?php else : ?><td colspan="2">sin carga y descarga</td><?php endif; ?>
      
      <!-- SALIDA -->
      <?php if($salida !== Null) : ?>
        <!-- tiempo entre proceso -->
        <?php if($descarga) : ?>
          <?php if($carga) : ?>
            <td><?php echo time_unix_to_number($salida->getDateTimeObject('created_at')->format('U') - $carga->getDateTimeObject('termino_at')->format('U'),false) ?></td>
          <?php else : ?>
            <td><?php echo time_unix_to_number($salida->getDateTimeObject('created_at')->format('U') - $descarga->getDateTimeObject('termino_at')->format('U'),false) ?></td>
          <?php endif; ?>
        <?php elseif($carga) : ?>
          <td><?php echo time_unix_to_number($salida->getDateTimeObject('created_at')->format('U') - $carga->getDateTimeObject('termino_at')->format('U'),false) ?></td>
        <?php else : ?><td></td><?php endif; ?>
        <td><form><input type="text" /><input type="submit" value=">" /></form></td>
        <td><form><input type="text" /><input type="submit" value=">" /></form></td>

        <td><?php echo $salida->getDateTimeObject('created_at')->format('d-m') ?></td>
        <td><?php echo $salida->getDateTimeObject('created_at')->format('G:i:s') ?></td>
        <td><?php echo $salida->getTurno() ?></td>
        <td><?php echo time_unix_to_number($salida->getDateTimeObject('created_at')->format('U') - $registro->getDateTimeObject('ingreso_at')->format('U'),false) ?></td>
        <td><form><input type="text" /><input type="submit" value=">" /></form></td>
        <td><?php echo $salida->getGuia() ?></td>
        <td><?php echo $salida->getTracto() ?></td>
        <td><?php echo $salida->getCarreta() ?></td>
        <td><?php echo $salida->getLugar() ?></td>
        <td><?php echo $salida->getTipoCarga() ?></td>
        <td><?php echo $salida->getCantidad() ?></td>
        <td><?php echo $salida->getObservacion() ?></td>

      <?php else : ?><td class="lock" colspan="15">sin salida</td><?php endif; ?>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>