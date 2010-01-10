<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('Date') ?>


<form action="<?php echo url_for('registro/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Nuevo Registro" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <th>Turno</th>
        <td>
          <?php
            if (date('G',time()) < sfConfig::get('app_cambio_turno'))
              echo "1";
            else
              echo "2";
            ?>
        </td>
      </tr>
      <?php echo $form['empresa_id']->renderRow() ?>
      <tr>
        <th><?php echo $form['chofer_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['chofer_id']->renderError() ?>
          <?php echo $form['chofer_id']->render() ?>
          <div class="metadata">
            <span class="icon iconPhone">telefono: <span id="chofer_phone"></span></span>
            <span class="icon iconBrevete">brevete: <span id="chofer_brevete"></span></span>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tracto_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['tracto_id']->renderError() ?>
          <?php echo $form['tracto_id']->render() ?>
          <div class="metadata">
            <span class="icon iconPeso">peso: <span id="tracto_peso"></span></span>
            <span class="icon iconConf">configuracion: <span id="tracto_config"></span></span>
            <span class="icon iconPropia"><span id="tracto_propia"></span></span>
            <span class="icon iconTara">tara: <span id="tracto_tara"></span></span>
            <span class="icon iconTipoUnidad">unidad: <span id="tracto_tipo_unidad"></span></span>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['carreta_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['carreta_id']->renderError() ?>
          <?php echo $form['carreta_id']->render() ?>
          <div class="metadata">
            <span class="icon iconPeso">peso: <span id="carreta_peso"></span></span>
            <span class="icon iconConf">configuracion: <span id="carreta_config"></span></span>
            <span class="icon iconPropia"><span id="carreta_propia"></span></span>
            <span class="icon iconTara">tara: <span id="carreta_tara"></span></span>
            <span class="icon iconTipoUnidad">unidad: <span id="carreta_tipo_unidad"></span></span>
          </div>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['lugar_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['lugar_id']->renderError() ?>
          <?php echo html_entity_decode($formExtend['tipo_lugar']->render('tipo_lugar',array('selected'=>$formExtend['tipo_lugar_default']))) ?>
          <?php echo $form['lugar_id']->render() ?>
        </td>
      </tr>
      <tr>
        <th>
          <label for="area">Area</label>
        </th>
        <td>
          <?php echo html_entity_decode($formExtend['area']->render('area',array('selected'=>$formExtend['area_default']))) ?>
        </td>
      </tr>
      <?php echo $form['tipo_carga_id']->renderRow() ?>
      <?php echo $form['motivo_id']->renderRow() ?>
      <?php echo $form['cantidad']->renderRow() ?>
      <?php echo $form['guia1']->renderRow() ?>
      <?php echo $form['guia2']->renderRow() ?>
      <?php echo $form['observacion']->renderRow() ?>
      <?php echo $form->renderHiddenFields() ?>
    </tbody>
  </table>
</form>
<script type="text/javascript">
  /* filtros */
  filtro("<?php echo url_for('@reload') ?>",'#registro_chofer_id','Chofer','#registro_empresa_id','empresa_id');
  filtro("<?php echo url_for('@reload') ?>",'#registro_carreta_id','Carreta','#registro_empresa_id','empresa_id');
  filtro("<?php echo url_for('@reload') ?>",'#registro_tracto_id','Tracto','#registro_empresa_id','empresa_id');
  filtro("<?php echo url_for('@reload') ?>",'#registro_lugar_id','Lugar','#tipo_lugar','tipo_lugar_id');
  filtro("<?php echo url_for('@reload') ?>",'#registro_tipo_carga_id','TipoCarga','#area','area_id');

  /* load data */

    /* chofer */
    filtro("<?php echo url_for('@loaddata') ?>",'#chofer_phone','Chofer','#registro_chofer_id','telefono');
    filtro("<?php echo url_for('@loaddata') ?>",'#chofer_brevete','Chofer','#registro_chofer_id','brevete');

    /* tracto */
    filtro("<?php echo url_for('@loaddata') ?>",'#tracto_peso','Tracto','#registro_tracto_id','peso');
    filtro("<?php echo url_for('@loaddata') ?>",'#tracto_config','Tracto','#registro_tracto_id','configuracion');
    filtro("<?php echo url_for('@loaddata') ?>",'#tracto_propia','Tracto','#registro_tracto_id','propia');
    filtro("<?php echo url_for('@loaddata') ?>",'#tracto_tara','Tracto','#registro_tracto_id','tara');
    filtro("<?php echo url_for('@loaddata') ?>",'#tracto_tipo_unidad','Tracto','#registro_tracto_id','tipo_unidad');

    /* carreta */
    filtro("<?php echo url_for('@loaddata') ?>",'#carreta_peso','Carreta','#registro_carreta_id','peso');
    filtro("<?php echo url_for('@loaddata') ?>",'#carreta_config','Carreta','#registro_carreta_id','configuracion');
    filtro("<?php echo url_for('@loaddata') ?>",'#carreta_propia','Carreta','#registro_carreta_id','propia');
    filtro("<?php echo url_for('@loaddata') ?>",'#carreta_tara','Carreta','#registro_carreta_id','tara');
    filtro("<?php echo url_for('@loaddata') ?>",'#carreta_tipo_unidad','Carreta','#registro_carreta_id','tipo_unidad');
</script>