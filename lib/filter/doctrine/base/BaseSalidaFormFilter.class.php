<?php

/**
 * Salida filter form base class.
 *
 * @package    transporte
 * @subpackage filter
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSalidaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'registro_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Registro'), 'add_empty' => true)),
      'chofer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Chofer'), 'add_empty' => true)),
      'tracto_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tracto'), 'add_empty' => true)),
      'carreta_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Carreta'), 'add_empty' => true)),
      'tipo_carga_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCarga'), 'add_empty' => true)),
      'lugar_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lugar'), 'add_empty' => true)),
      'cantidad'      => new sfWidgetFormFilterInput(),
      'guia1'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'guia2'         => new sfWidgetFormFilterInput(),
      'observacion'   => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'registro_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Registro'), 'column' => 'id')),
      'chofer_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Chofer'), 'column' => 'id')),
      'tracto_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tracto'), 'column' => 'id')),
      'carreta_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Carreta'), 'column' => 'id')),
      'tipo_carga_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoCarga'), 'column' => 'id')),
      'lugar_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Lugar'), 'column' => 'id')),
      'cantidad'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'guia1'         => new sfValidatorPass(array('required' => false)),
      'guia2'         => new sfValidatorPass(array('required' => false)),
      'observacion'   => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('salida_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Salida';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'registro_id'   => 'ForeignKey',
      'chofer_id'     => 'ForeignKey',
      'tracto_id'     => 'ForeignKey',
      'carreta_id'    => 'ForeignKey',
      'tipo_carga_id' => 'ForeignKey',
      'lugar_id'      => 'ForeignKey',
      'cantidad'      => 'Number',
      'guia1'         => 'Text',
      'guia2'         => 'Text',
      'observacion'   => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
