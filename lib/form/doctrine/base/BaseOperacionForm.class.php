<?php

/**
 * Operacion form base class.
 *
 * @method Operacion getObject() Returns the current form's model object
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOperacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'registro_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Registro'), 'add_empty' => false)),
      'supervisor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Supervisor'), 'add_empty' => false)),
      'observacion'   => new sfWidgetFormTextarea(),
      'tipo'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'registro_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Registro'))),
      'supervisor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Supervisor'))),
      'observacion'   => new sfValidatorString(array('required' => false)),
      'tipo'          => new sfValidatorInteger(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('operacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Operacion';
  }

}
