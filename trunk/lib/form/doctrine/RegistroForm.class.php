<?php

/**
 * Registro form.
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegistroForm extends BaseRegistroForm
{
  public function configure()
  {
    /** Widgets **/
    $this->widgetSchema['empresa_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Empresa',
      'add_empty' => true
    ));

    $this->widgetSchema['chofer_id'] = new sfWidgetFormChoice(array(
      'choices'   => array()
    ));

    $this->widgetSchema['tracto_id'] = new sfWidgetFormChoice(array(
      'choices'   => array()
    ));

    $this->widgetSchema['carreta_id'] = new sfWidgetFormChoice(array(
      'choices'   => array()
    ));

    $this->widgetSchema['tipo_carga_id'] = new sfWidgetFormChoice(array(
      'choices'   => array()
    ));

    $this->widgetSchema['lugar_id'] = new sfWidgetFormChoice(array(
      'choices'   => array()
    ));

    /** Validators **/

    /** Misc **/
    $this->fields();
  }
  protected function fields()
  {
    $this->useFields(array(
      'empresa_id',
      'chofer_id',
      'tracto_id',
      'carreta_id',
      'lugar_id',
      'tipo_carga_id',
      'motivo_id',
      'cantidad',
      'guia1',
      'guia2',
      'observacion'
    ));
  }
}
