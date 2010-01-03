<?php

/**
 * Registro form base class.
 *
 * @method Registro getObject() Returns the current form's model object
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRegistroForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'empresa_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'chofer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Chofer'), 'add_empty' => false)),
      'tracto_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tracto'), 'add_empty' => false)),
      'carreta_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Carreta'), 'add_empty' => false)),
      'lugar_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lugar'), 'add_empty' => false)),
      'tipo_carga_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCarga'), 'add_empty' => false)),
      'motivo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Motivo'), 'add_empty' => false)),
      'cantidad'      => new sfWidgetFormInputText(),
      'guia1'         => new sfWidgetFormInputText(),
      'guia2'         => new sfWidgetFormInputText(),
      'estado'        => new sfWidgetFormInputText(),
      'observacion'   => new sfWidgetFormTextarea(),
      'ingreso_at'    => new sfWidgetFormDateTime(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'empresa_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'))),
      'chofer_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Chofer'))),
      'tracto_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tracto'))),
      'carreta_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Carreta'))),
      'lugar_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lugar'))),
      'tipo_carga_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCarga'))),
      'motivo_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Motivo'))),
      'cantidad'      => new sfValidatorInteger(),
      'guia1'         => new sfValidatorString(array('max_length' => 15)),
      'guia2'         => new sfValidatorString(array('max_length' => 15)),
      'estado'        => new sfValidatorInteger(),
      'observacion'   => new sfValidatorString(array('required' => false)),
      'ingreso_at'    => new sfValidatorDateTime(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('registro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Registro';
  }

}
