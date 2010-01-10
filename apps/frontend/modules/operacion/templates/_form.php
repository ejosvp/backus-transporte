<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('Date') ?>
<form action="<?php echo url_for('operacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo html_entity_decode($check) ?>
          <input type="submit" value="Terminar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <th>
          Tiempo transcurrido
        </th>
        <td>
        </td>
      </tr>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
