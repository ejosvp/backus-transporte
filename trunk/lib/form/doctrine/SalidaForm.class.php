<?php

/**
 * Salida form.
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SalidaForm extends BaseSalidaForm
{
  public function configure()
  {
    $this->widgetSchema['registro_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['chofer_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => $this->getRelatedModelName('Chofer'),
      'add_empty' => true
      ));
    $this->widgetSchema['tracto_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => $this->getRelatedModelName('Tracto'),
      'add_empty' => true
      ));
    $this->widgetSchema['carreta_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => $this->getRelatedModelName('Carreta'),
      'add_empty' => true
      ));
    $this->widgetSchema['tipo_carga_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => $this->getRelatedModelName('TipoCarga'),
      'add_empty' => true
      ));
    $this->widgetSchema['lugar_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => $this->getRelatedModelName('Lugar'),
      'add_empty' => true
      ));
    unset(
            $this['created_at'],
            $this['updated_at']
            );
  }
}
