<?php

/**
 * Salida form base class.
 *
 * @method Salida getObject() Returns the current form's model object
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSalidaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'registro_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Registro'), 'add_empty' => false)),
      'chofer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Chofer'), 'add_empty' => false)),
      'tracto_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tracto'), 'add_empty' => false)),
      'carreta_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Carreta'), 'add_empty' => false)),
      'tipo_carga_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCarga'), 'add_empty' => false)),
      'lugar_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lugar'), 'add_empty' => false)),
      'cantidad'      => new sfWidgetFormInputText(),
      'guia1'         => new sfWidgetFormInputText(),
      'guia2'         => new sfWidgetFormInputText(),
      'observacion'   => new sfWidgetFormTextarea(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'registro_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Registro'))),
      'chofer_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Chofer'))),
      'tracto_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tracto'))),
      'carreta_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Carreta'))),
      'tipo_carga_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCarga'))),
      'lugar_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lugar'))),
      'cantidad'      => new sfValidatorInteger(array('required' => false)),
      'guia1'         => new sfValidatorString(array('max_length' => 15)),
      'guia2'         => new sfValidatorString(array('max_length' => 15)),
      'observacion'   => new sfValidatorString(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('salida[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Salida';
  }

}
